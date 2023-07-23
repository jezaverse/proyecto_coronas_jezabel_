<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(){
    // titulo de etiqueta de la pagina va aca y no en plantilla
    $data = ["titulo" => "THUNDER STORE"];
    echo view("plantillas/header");
    echo view("plantillas/navbar");
    echo view("nueva_plantilla", $data);   //plantilla de inicio
    echo view("plantillas/footer");
    }

  
    public function llamarQuienesSomos(){
        $data = ["titulo" => "QUIENES SOMOS"];
        echo view("plantillas/header", $data);
        echo view ("plantillas/navbar") ;
        echo view('quienes_somos');
        echo view("plantillas/footer");
    


    }
    public function llamarComercializacion(){
        $data = ["titulo" => "COMERCIALIZACIÓN"];
        echo view("plantillas/header", $data);
        echo view ("plantillas/navbar");
        echo view('comercializacion');
        echo view("plantillas/footer");

    }
    

    public function llamarTerminosUsos(){
        $data = ["titulo" => "TERMINOS Y USOS"];
        echo view("plantillas/header", $data); 
        echo view ("plantillas/navbar");
        echo view('terminos_usos');
        echo view("plantillas/footer");

    }
    public function llamarContacto(){

        $data  ['titulo']= 'CONTACTO';
        echo view("plantillas/header", $data);
       echo view ("plantillas/navbar");
       echo view('contacto');
        echo view("plantillas/footer");

    }
   
    public function verConsultas(){
        $data  ['titulo']= 'LISTA DE CONSULTAS';
        echo view("plantillas/header", $data);
       echo view ("plantillas/navbar");
       echo view("backend/admin/ver_consultas");
        echo view("plantillas/footer");
    }
    //se repite lo mismo en todo, excepto el que va en medio
    //es decir, lo que vas a mostrar

    public function llamarRegistroUsuario(){

        $data  ['titulo']= 'REGISTRARSE/LOGIN';
        echo view("plantillas/header", $data);
       echo view ("plantillas/navbar");
       echo view('registro_usuario_view');
        echo view("plantillas/footer");

    }
   
    public function llamarCatalogoProductos(){

        $data  ['titulo']= 'PRODUCTOS';
        echo view("plantillas/header", $data);
       echo view ("plantillas/navbar");
       echo view('catalogo_productos_view');
        echo view("plantillas/footer");

    }
    public function perfil()
    {
        if (session()->login) {
            if (session()->perfil == 1) {
                $data['titulo'] = 'Perfil';
                echo view('plantillas/header', $data);
                echo view('plantillas/navbarAdmin');
                echo view('ver_consultas');
                // ACA EN VEZ DE USAR LA PLANTILLA DE PERFIL, PUEDE USAR LA PLANTILLA DE "INICIO" Y SI TENES MAS DE UN PHP PARA MOSTRAR EN INICIO LO METES EN ESTE LUGAR
                echo view('plantillas/footer');
            } else {
                $data['titulo'] = 'Perfil';
                echo view('plantillas/encabezado', $data);
                echo view('plantillas/navbarCliente');
                echo view('nueva_plantilla'); 
                //ACA EN VEZ DE USAR LA PLANTILLA DE PERFIL, PUEDE USAR LA PLANTILLA DE "INICIO" Y SI TENES MAS DE UN PHP PARA MOSTRAR EN INICIO LO METES EN ESTE LUGAR
                echo view('plantillas/footer');
            }
        } else {
            
            return redirect()->route('login_usuario_view');
        }
    }
}
