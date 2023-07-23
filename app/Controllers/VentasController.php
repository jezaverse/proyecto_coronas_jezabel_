<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\productModel;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;


class VentasController extends Controller
{
    public function __construct() {

        $session=session();
         $cart = \Config\Services::cart();
         $cart->contents();


    }    

    public funcion listar_ventas(){
        $venta= new Ventas_model();
        $detalle_venta= new Detalle_venta_model;
        $data['titulo']= "Listado de ventas";
        $data['ventas']= $venta->join('persona', 'persona.id_persona= venta.id_cliente')->findAll();
        return view('plantillas/header', $data).view('plantillas/navbar').
        view('lista_ventas_view').view('plantillas/footer'); 
    }

    public funcion listas_detalle_ventas($id= NULL){
        $venta= new Ventas_model();
        $detalle_venta= new Detalle_ventas_model();
        $data['titulo']= "Detalle de ventas";
        $data['detalle']= $detalle_venta-> where('id_venta', $id)->join('libro', 'libro.libro_id = detalle_venta.id_producto')->findAll();
        return view('plantillas/encabezado', $data).view('plantillas/navbar').view('lista_detalle_ventas_view').view('plantillas/footer');    }

    public function ventas(){
        $session = session();
        $id=$session->get('id');
        $perfil=$session->get('perfil_id');
        if($perfil == '1'){
            $detalle_ventas = new Ventas_cabecera_model();
            $data['ventaDetalle'] = $detalle_ventas ->orderBy('id','DESC')->findall();
            
                echo view('front/header');
                echo view('front/navbar');
                echo view('backend/vista_ventas', $data);
                echo view('front/footer');
            } else if ($perfil == '2') {
                $detalle_ventas = new Ventas_cabecera_model();
                $data['ventaDetalle'] = $detalle_ventas->where('usuario_id', $id)->orderBy('id', 'DESC')->findAll();
                
                echo view('front/header');
                echo view('front/navbar');
                echo view('backend/vista_ventas', $data);
                echo view('front/footer');
            }
        }



public function comprar_carrito()
{
    $cart = \Config\Services::cart();
    $productos = $cart->contents();
    $request = \Config\Services::request();
    $montoTotal = 0;

    foreach ($productos as $producto) {
        $montoTotal += $producto["price"] * $producto["qty"];
    }

    $ventaCabecera = new Ventas_cabecera_model();
    $id_session=intval(session()->id);

    $fechaActual = date('Y-m-d'); // Obtener la fecha actual en el formato deseado

    $idcabecera = $ventaCabecera->insert([
        "total_venta" => $montoTotal,
        "usuario_id" => $id_session,
        "fecha" => $fechaActual // Agregar la fecha actual al array de datos
    ]);
    $ventaDetalle = new Ventas_detalle_model();
    $productModel = new productModel();

    foreach ($productos as $producto) {
        $ventaDetalle->insert([
            "venta_id" => $idcabecera,
            "producto_id" => $producto['id'],
            "cantidad" => $producto["qty"],
            "precio" => $producto["price"]
        ]);
        $productStock = $productModel->find($producto["id"]); // Obtener los detalles del producto


            $stock = $productStock["stock"]; // Obtener el stock del producto
            // Restar la cantidad del carrito al stock actual
            $newStock = $stock - $producto["qty"];

        $productModel->update($producto["id"], ['stock' => $newStock]);
    }
    $cart->destroy();
    return redirect()->back()->withInput();
}
}


