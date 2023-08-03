<?php

   namespace App\Controllers;
   use App\Models\User_model;
   use App\Models\Consulta_model;
   use Config\Services;
   use CodeIgniter\Controller;


 class UserController extends BaseController{
        public function registrar_usuario(){
        
       //para validar el formulario de registro
       $validation= \Config\Services::validation();
       $request= \Config\Services:: request();
       
            //establece reglas de validacion
            $validation-> setRules([
                    'nombre'=> 'required',
                    'pass'=> 'required|min_length[8]',
                    'repass'=>'required|matches[pass]',
                    'correo'=> 'required|valid_email|is_unique[persona.persona_correo]',
            ],
                     [
                        "nombre" =>[
                        "required" => 'Este campo es obligatorio',
                        "is_unique"=> 'El nombre de usuario ya está registrado, intente otro',
                        ],
                         "pass"=> [
                            "required" => 'La contraseña es obligatoria',
                            "min_length"=> 'Debe tener al menos 8 caracteres',
                         ],
                         "repass"=> [
                            "required" => 'La contraseña es obligatoria',
                            "min_length"=> 'Debe tener al menos 8 caracteres',
                            "matches"=> 'Las contraseñas no coinciden.',
                         ],
                         "correo"=> [
                            "required" => 'El correo electrónico es obligatorio',
                            "is_unique"=> 'El correo electrónico ya ha sido registrado',
                            "valid_email"=>'Dirección de correo inválida, intente de nuevo.',
                            ],
                        ]);

                        if ($validation->withRequest($this->request)->run()){
                            //si la validación es correcta se crea el usuario
                            $data=[
                                'persona_nombre'=> $request->getVar('nombre'),
                                'persona_pass' => password_hash($request->getVar('pass'), PASSWORD_BCRYPT),                            
                                'persona_correo'=> $request->getPost('correo'),
                                'perfil_id'=>2,
                                'persona_estado'=>1,
                            ];
                             $userRegister= new User_model();
                             $userRegister->insert($data);
                             return redirect()->to(base_url('/registro_usuario_view'))->with('success','Usuario registrado!');
                        
                        }else{
                            $data['validation'] = $this->validator;
                            session()->setFlashdata('msg', '¡Datos no válidos!');
                            return redirect()->to(base_url('/registro_usuario_view'));
                      
                        }
                        
                        $data['titulo']= 'Registrarse';
                        return view('plantillas/header', $data).view('plantillas/navbar').view('registro_usuario_view').view('plantillas/footer');

                    }
                
                    public function registrar_consulta(){
        
                        //para validar el formulario 
                        $validation= \Config\Services::validation();
                        $request= \Config\Services:: request();
                        
                             //establece reglas de validacion
                             $validation-> setRules([
                                     'nombre'=> 'required',
                                     'correo'=> 'required|valid_email',
                                     'telefono'=> 'required',
                                     'mensaje'=>'required',
                                     ],
                                      [
                                         "nombre" =>[
                                         "required" => 'Este campo es obligatorio',
                                         ],
                                          "correo"=> [
                                             "required" => 'Este campo es obligatorio',
                                             "valid_email"=>'Dirección de correo inválida, intente de nuevo.',
                                          ],
                                          "telefono"=> [
                                             "required" => 'Este campo es obligatorio',
                                          ],
                                          "mensaje"=> [
                                             "required" => 'Este campo es obligatorio',
                                             ],
                                         ]);
                 
                                         if ($validation->withRequest($this->request)->run()){
                                             //si la validación es correcta carga los datos
                                             $data=[
                                                 'contacto_nombre'=> $request->getVar('nombre'),
                                                 'contacto_correo'=> $request->getPost('correo'),
                                                 'contacto_telefono'=> $request->getPost('telefono'),
                                                 'contacto_mensaje'=> $request->getPost('mensaje')
                                             ];
                                              $consultaRegister= new Consulta_model();
                                              $consultaRegister->insert($data);
                                              return redirect()->to(base_url('/contacto'))->with('msg','Consulta registrada!');
                                         
                                         }else{
                                             //$data['validation'] = $this->validator;
                                             $data['errors'] = $validation->getErrors();
                                             session()->setFlashdata('msg', '¡Datos no válidos!');
                                             return redirect()->to(base_url('/contacto'));
                                       
                                         }
                                         
                                         return view('plantillas/header', $data).view('plantillas/navbar').view('registro_usuario_view').view('plantillas/footer');
                 
                                     }


                                         
}     
        
  
