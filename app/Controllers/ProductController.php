<?php 

namespace App\Controllers;  
use App\Models\Categoria_model;
use App\Models\Producto_model;
use Config\Services;
use CodeIgniter\Controller;

class ProductController extends BaseController{
       


    public function registrar_producto(){

        $validation= \Config\Services::validation();
        $request= \Config\Services:: request();
       //establece reglas de validacion
       $validation-> setRules([
        'nombre'=> 'required',
        'descripcion'=> 'required',
        'precio'=> 'required',
        'imagen'=>'required',
        'stock'=>'required',
        'categoria'=>'required',
        'estado'=>'required',
        ],
         [
            "nombre" =>[
            "required" => 'Este campo es obligatorio',
            ],
             "descripcion"=> [
                "required" => 'Este campo es obligatorio',
             ],
             "precio"=> [
                "required" => 'Este campo es obligatorio',
             ],

             //Como subimos la imagen??
             "imagen"=> [
                'uploaded[imagen]|max_size[imagen, 4096]|is_image[imagen]',
                ],

            "stock"=> [
                "required" => 'Este campo es obligatorio',
                ],
            "categoria"=> [
                "required" => 'Este campo es obligatorio',
            ],
            "estado"=> [
                "required" => 'Este campo es obligatorio',
                ],
            ]);

            if ($validation->withRequest($this->request)->run()){
                //si la validación es correcta carga los datos
                $img = $this->request->getFile('imagen');
                $nombreAleatorio = $img->getRandomName();
                $img->move(ROOTPATH . 'assets/ImagenesProducto/', $nombreAleatorio);


                
                $precio = $this->request->getPost('precio');
                $precioSinFormato = str_replace('.', '', $precio);

                $data=[
                    'producto_nombre'=> $request->getPost('nombre'),
                    'producto_descripcion'=> $request->getPost('descripcion'),
                    'producto_precio' => $precioSinFormato,
                    //ver lo de imagen
                   
                    'producto_imagen' => $nombreAleatorio,
                    'producto_stock'=> $request->getPost('stock'),
                    'producto_categoria'=> $request->getPost('categoria'),
                    'producto_estado'=> 1
                ];
                 $productRegister= new Producto_model();
                 $productRegister->insert($data);
                 return redirect()->to(base_url('/agregar_producto_view'))->with('msg','Producto registrado!');
            
            }else{
                //$data['validation'] = $this->validator;
                $data['errors'] = $validation->getErrors();
                session()->setFlashdata('msg', '¡Datos no válidos!');
                return redirect()->to(base_url('/agregar_producto_view'));
          
            }
            
            return view('plantillas/header', $data).view('plantillas/navbar').view('agregar_producto_view').view('plantillas/footer');

        }


            
    
     //acá iría gestión view pero lo borré
    public function editar_productos_view($id = null)
    {
        $productoModel = new Producto_model();
        $categoriaModel = new Categoria_model();

        $data['tipos'] = $categoriaModel->findAll();
        $data['producto'] = $productoModel->where('id_producto', $id)->first();
        $data['tipos'] = $categoriaModel->findAll();
        $data['titulo'] = 'Editar Producto';
        echo view('plantillas/header', $data);
        echo view('plantillas/navbar');
        echo view('editar_productos_view');
        echo view('plantillas/footer');
    }


        public function actualizarProducto(){
            $request = \Config\Services::request();
    
            $idProducto = $this->request->getPost('id_producto');
            $precio = $this->request->getPost('precioProducto');
            $precioSinFormato = str_replace('.', '', $precio);
    
            if ($request->is('post')) {
    
                if ($this->request->getFile('imagenProducto')->isValid()) {
                    $rules = [
                        'nombreProducto' => 'required',
                        'tipoProducto' => 'required|is_not_unique[tipo.id_tipo]',
                        'descripcionProducto' => 'required',
                        'precioProducto' => 'required',
                        'imagenProducto' => 'uploaded[imagenProducto]|max_size[imagenProducto, 4096]|is_image[imagenProducto]',
                        'stockProducto' => 'required|is_natural'
                    ];
    
                    $validations = $this->validate($rules);
    
                    $img = $this->request->getFile('imagenProducto');
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


