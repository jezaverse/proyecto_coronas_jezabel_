<?php 
namespace App\Controllers;  

use App\Models\Producto_model;
use App\Models\Categoria_model;

class ProductController extends Controller{
        public funcion form_agregar_producto(){
            $categoria= new Categoria_model;
            $data['categorias']= $categoria->findAll();
            $data['titulo']= 'Agregar Producto';
            return view('plantillas/header', $data).view('plantillas/navbar').view
            ('backend/productos/agregar_producto_view');
        }

        public function registrar_producto(){
            $request= \Config\Services::request();
            $rules =[
                'categoria'=> 'is_not_unique[producto_categoria.categoria_id]',
                'imagen'=> 'uploaded[imagen]|max_size[imagen, 4096]|is_imagen[imagen]'
            ];

            $validation= $this->validate($rules);
            if($validations){
                $img= $this->request->getFile('imagen');
                $nombre_aleatorio = $img->getRandomName();
                $img->move(ROOTPATH.'public/assets/uploads', $nombre_aleatorio);
                $data=[
                    'producto_nombre'=>$request->getPost('nombre'),
                    'producto_descripcion'=>$request->getPost('descripcion'),
                    'producto_precio'=>$request->getPost('precio'),
                    'producto_imagen'=>$nombre_aleatorio,
                    'producto_stock'=> $request->getPost('stock'),
                    'producto_categoria'=>$request->getPost('categoria'),
                    'producto_estado'=>1

                ];
                $producto= new Producto_model();
                $producto-> insert($data);
                return redirect()->route('agregar');
            }else{
                $categoria= new Categoria_Model();
                $data['categorias']= $categoria->findAll();
                $data['validation']=$this->validator;
                $data['titulo']='Agregar producto';
                return view('plantillas/encabezado', $data).
                view('plantillas/navbar').view
                ('backend/productos/agregar_producto_view');
            }
        }
     function listar_productos(){
        $producto_model= new Producto_model();
        $data['producto'] =$producto_model-> where('producto_estado', 1)->
        where('producto_stock >', 0)> join('producto_categoria',
        'producto_categoria.categoria_id = producto.producto_categoria')->getAll();
        $data['titulo']= 'listar productos';

        return view('plantillas/header', $data).
        view('plantillas/nav').view('Contenidos/catalogo_productos_view').view('plantillas/footer');
    }



    function gestionar_productos(){
        $producto_model= new Producto_model();
        $categoria = new Categoria_model();
        $data['categorias']= $categoria->findAll();
        $data['producto']= $producto_model->join('producto_categoria', 'producto_categoria.categoria_id =producto.producto_categoria')->findAll();
        $data['nombre']= 'listar producto';
        return view ('plantillas/header', $data).view('plantillas/navbar').view('backend/productos/listar_productos_view');
            
    }

    function editar_producto($id=null){
        $libro_Model= new Libro_model():
        $categoria= new Categoria_model();
        $data['categorias']= $categoria->findAll();
        $data['producto']= $Producto_model->where('producto_id', $id)->first();
        $data['nombre']= 'Nombre producto';

        return view('plantillas/header',$data).view('plantillas/navbar').
        view('backend/productos/editar_producto_view');
        
    }
    
    function actualizar_producto(){
        $request= \Config\Services:: request();
        //Validar los datos ingresados
        //Controlar si se cambió la imagen

        $id= $request-> getPost('id'); //se obtiene el id del producto a moficiar
        $data = [
            'producto_nombre'=> $request->getPost('nombre'),
            //completar con demas campos
        ];
          $libro = new Libro_model();
          $libro->update($id , $data);

          //mensaje qeue se actualizo correctamente el libro

          return redirect()->route ('gestionar');
    }


     public function eliminar_producto($id=null){
         $data = array ('producto_estado'=> '0');
         $producto= new Producto_model();
         $producto->update($id, $data);
         return redirect()->route('gestionar');

     }


     public function activar_producto($id=null){
        //actualiza estado del producto

        $data = array ('producto_estado'=> '1');
        $producto = new Producto_model();
        $producto->update($id, $data);
        return redirect()->route('gestionar');
     }
}

