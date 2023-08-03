<?php

namespace App\Controllers;
use App\Models\User_model;
use App\Models\Categoria_model;
use App\Models\Consulta_model;
use CodeIgniter\Controller;

class AdminController extends BaseController {

    public function ver_consultas(){
        $consultas = new Consulta_model();
        $data['consultas'] = $consultas->findAll();
       // $categoriasModel = new Categoria_model();

       // $data['tipos'] = $categoriasModel->findAll();
        $data['titulo'] = 'Administrador';
        echo view('plantillas/header', $data);
        echo view('plantillas/navbar');
        echo view("ver_consultas");
        echo view('plantillas/footer');
    }

    public function admin_view()
    {
        $categoriasModel = new Categoria_model();

        $data['tipos'] = $categoriasModel->findAll();
        if (session()->login && session()->perfil == 1) {
            $data['titulo'] = 'Administrador';
            echo view('plantillas/header', $data);
            echo view('plantillas/navbar');
            echo view('plantillas/footer');
        } else {
            return redirect()->route('/');
        }
    }

    public function ver_usuarios()
    {
        $usuarios = new User_model();
        $data['usuarios'] = $usuarios->findAll();
     
        $data['titulo'] = 'Administrador';
        echo view('plantillas/header', $data);
        echo view('plantillas/navbar');
        echo view("lista_usuarios_view");
        echo view('plantillas/footer');
    }
}

