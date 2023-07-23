<?php

namespace App\Controllers;
use App\Models\Producto_Model;
use App\Models\Categoria_Model;

class CartController extends BaseController {
        public function ver_carrito(){
            $cart= \Config\Services:: cart();
            $data['titulo']= 'Carrito de Compras';
            return view('plantillas/header', $data).view
            ('plantillas/nav').view('contenidos/carrito_view').view
            ('plantillas/footer');

        }

        public funcion agregar_carrito(){
            $cart= \Config\Services:: cart();
            $request= \Config\Services:: request();
              $data= array(
                'id'=> $request-> getPost('id'),
                'name'=> $request->getPost('titulo'),
                'price'=> $request->getPost('precio'),
                'qty'=> 1
              );
              $cart ->insert($data);

              //Mensaje que se agergó al carrito

              return reditect()->route('ver_carrito';)
        }
   
        
}




















