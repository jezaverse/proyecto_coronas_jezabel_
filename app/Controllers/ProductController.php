<?php 

namespace App\Controllers;  
use App\Models\Categoria_model;
use App\Models\Producto_model;
use Config\Services;
use CodeIgniter\Controller;

class ProductController extends BaseController{
       

    //AÑADIR UN PRODUCTO NUEVO
    public function registrar_producto(){

        $validation= \Config\Services::validation();
        $request= \Config\Services:: request();
          
        if ($request->is('post')) {
            $rules = [
                'nombre' => 'required',
                'descripcion' => 'required',
                'precio' => 'required',
                'imagen' => 'uploaded[imagen]|max_size[imagen, 4096]|is_image[imagen]',
                'stock' => 'required|is_natural',
                'categoria' => 'required',
                
            ];

            $validations = $this->validate($rules);

            if ($validations) {
                $img = $this->request->getFile('imagen');
                $nombreAleatorio = $img->getRandomName();
                $img->move(ROOTPATH . 'assets/img/producto', $nombreAleatorio);

                $precio = $this->request->getPost('precio');
                $precioSinFormato = str_replace('.', '', $precio);

                $data = [
                    'producto_nombre' => $request->getPost('nombre'),
                    'producto_descripcion' => $request->getPost('descripcion'),
                    'producto_precio' => $precioSinFormato,
                    'producto_imagen' => $nombreAleatorio,
                    'producto_stock' => $request->getPost('stock'),
                    'producto_categoria' => $request->getPost('categoria'),
                    'producto_estado' => 1,
                    'producto_id'=>2,

                ];

                $registroProducto = new Producto_model();
                $registroProducto->insert($data);

                return redirect()->to('agregar_producto_view')->with('MensajeProducto', 'Producto nuevo cargado.');

            
            }
        }
    }
       

    //VISUALIZAR PRODUCTOS
    public function ver_productos(){
        $productos = new Producto_model();
        $data['productos'] = $productos->findAll();
       // $categoriasModel = new Categoria_model();

       // $data['tipos'] = $categoriasModel->findAll();
        $data['titulo'] = 'Administrador';
        echo view('plantillas/header', $data);
        echo view('plantillas/navbar');
        echo view('listar_productos_view');
        echo view('plantillas/footer');
    }


    //LLAMAR LA VISTA DE AGREGAR PRODUCTO EN ROUTES
    public function llamarAgregarProducto(){

        $data  ['titulo']= 'Agregar Producto';
        echo view("plantillas/header", $data);
        echo view ("plantillas/navbar");
        echo view('agregar_producto_view');
        echo view("plantillas/footer");
    
    }
    
        

    //FALTA DESARROLLAR DE AHORA EN ADELANTE: EDITAR, ELIMINAR, ACTUALIZAR
    
    //public function editar_productos_view($id = null){
//        $productoModel = new Producto_model();
  //      $categoriaModel = new Categoria_model();

    //    $data['tipos'] = $categoriaModel->findAll();
      //  $data['producto'] = $productoModel->where('id_producto', $id)->first();
      //  $data['tipos'] = $categoriaModel->findAll();
    // $data['titulo'] = 'Editar Producto';
      //  echo view('plantillas/header', $data);
       // echo view('plantillas/navbar');
       // echo view('editar_productos_view');
       // echo view('plantillas/footer');
   // }


        public function actualizarProducto(){
            $request = \Config\Services::request();
    
            $idProducto = $this->request->getPost('id_producto');
            $precio = $this->request->getPost('precioProducto');
            $precioSinFormato = str_replace('.', '', $precio);
    
            if ($request->is('post')) {
    
                if ($this->request->getFile('imagen')->isValid()) {
                    $rules = [
                        'nombreProducto' => 'required',
                        'tipoProducto' => 'required|is_not_unique[tipo.id_tipo]',
                        'descripcionProducto' => 'required',
                        'precioProducto' => 'required',
                        'imagen' => 'uploaded[imagen]|max_size[imagen, 4096]|is_image[imagen]',
                        'stockProducto' => 'required|is_natural'
                    ];
    
                    $validations = $this->validate($rules);
    
                    $img = $this->request->getFile('imagen');
                    $nombreAleatorio = $img->getRandomName();
                    $img->move(ROOTPATH . 'assets/imagenesproducto', $nombreAleatorio);
    
                    $data = [
                        'producto_nombre' => $request->getPost('nombreProducto'),
                        'producto_descripcion' => $request->getPost('descripcionProducto'),
                        'producto_precio' => $precioSinFormato,
                        'producto_stock' => $request->getPost('stockProducto'),
                        'producto_tipo' => $request->getPost('tipoProducto'),
                        'producto_imagen' => $nombreAleatorio
                    ];
                } else {
    
                    $rules = [
                        'nombreProducto' => 'required',
                        'tipoProducto' => 'required|is_not_unique[tipo.id_tipo]',
                        'descripcionProducto' => 'required',
                        'precioProducto' => 'required',
                        'stockProducto' => 'required|is_natural'
                    ];
    
                    $validations = $this->validate($rules);
    
                    $data = [
                        'producto_nombre' => $request->getPost('nombreProducto'),
                        'producto_descripcion' => $request->getPost('descripcionProducto'),
                        'producto_precio' => $precioSinFormato,
                        'producto_stock' => $request->getPost('stockProducto'),
                        'producto_tipo' => $request->getPost('tipoProducto'),
                    ];
                }
    
                if ($validations) {
    
                    $productoModel = new Producto_model();
    
                    $productoModel->update($idProducto, $data);
    
                    return redirect()->to('gestionProductos')->with('MensajeProducto', 'Producto editado.');
                } else {
                    $data['validation'] = $this->validator;
                    $productoModel = new Producto_model();
                    $categoriaModel = new Categoria_model();
    
                    $data['tipos'] = $categoriaModel->findAll();
                    $data['producto'] = $productoModel->where('id_producto', $idProducto)->first();
    
                    $data['titulo'] = 'Editar Producto';
                    echo view('plantillas/header', $data);
                    echo view('plantillas/navbar');
                    echo view('plantillas/editar_productos_view');
                    echo view('plantillas/footer');
                }
            } else {
                $data['validation'] = $this->validator;
                $productoModel = new Producto_model();
                $categoriaModel = new Categoria_model();
    
                $data['tipos'] = $categoriaModel->findAll();
                $data['producto'] = $productoModel->where('id_producto', $idProducto)->first();
    
                $data['titulo'] = 'Editar Producto';
                echo view('plantillas/header', $data);
                echo view('plantillas/navbar');
                echo view('plantillas/editar_productos_view');
                echo view('plantillas/footer');
            }
        }
    
        public function eliminarProducto($id = null)
        {
            $data = array('producto_estado' => 0);
            $productoModel = new Producto_model();
            $productoModel->update($id, $data);
            return redirect()->to('listar_productos_view')->with('MensajeProducto', 'Producto editado.');
        }
    

    
    
     
    
}

