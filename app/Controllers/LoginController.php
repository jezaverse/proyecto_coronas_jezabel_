<?php

namespace App\Controllers;

use App\Models\User_model;
use CodeIgniter\Controller;

class LoginController extends BaseController {

    public function ver_login(){
        $data['titulo'] = 'Login';
        return view('plantillas/header', $data).
        view('plantillas/navbar').view('login_usuario_view').
        view('plantillas/footer');
    }

    public function login_usuario(){
        $request = \Config\Services::request();
        $User_model= new User_model();
        $session = session();

        //valida los datos ingresados

        $correo = $request-> getPost('correo');
        $pass= $request->getPost('pass');
        $user= $User_model->where('persona_correo', $correo)->first();
        if($user){
            $pass_user = $user['persona_pass'];
            $pass_verif= password_verify($pass, $pass_user);
            
            if($pass_verif){
                $data= [
                    'id'=> $user['id_persona'],
                    'nombre'=> $user['persona_nombre'],
                    'pass'=> $user['persona_pass'],
                    'perfil'=> $user['perfil_id'],
                    'login'=> TRUE
                ];


                $session->set($data);

                switch(session('perfil')){
                    case '1':
                        return redirect()->route('/');
                        break;
                        case '2':
                            return redirect()->route('/');
                            break;
                }
            }else{
                $session->setFlashdata('mensaje', 'Usuario y/o contraseña incorrecto');
            }
        }
        
      return redirect()->route('login');
    }
     
    
     


    public function cerrar_sesion(){
        $session= session();
        $session->destroy();
        return redirect()-> route('login');
    }


}