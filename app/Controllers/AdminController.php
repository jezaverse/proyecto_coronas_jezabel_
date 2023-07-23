<?php

namespace App\Controllers;
use App\Models\User_model;
use App\Models\Consulta_model;
use CodeIgniter\Controller;

class AdminController extends BaseController {


        // Se buscan las consultas realizadas
   public function listarConsultas()
   {
       $datosConsulta['titulo']            = "Lista de Consultas";
       $datosConsulta['titulo_Leidos']     = "Mensajes Leidos";
       $datosConsulta['consultas']         = $this->consultas->findAll();
       $datosConsulta['consultas_Leidas']  = $this->consultas->onlyDeleted()->findAll();
       
       if($datosConsulta['consultas'] == null && $datosConsulta['consultas_Leidas'] !=null)
       {
           $datosConsul['titulo']              = "Lista de Consultas";
           $datosConsul['titulo_Leidos']       = "Mensajes Leidos";
           $datosConsul['consultas_Leidas']    = $this->consultas->onlyDeleted()->findAll();

           $data = ["titulo" => "Handball Gear Central - Consultas"];
           echo view("vista_head", $data);
           echo view("vista_nav");
           echo view("Consulta/Tabla_Consultas", $datosConsul);
           echo view("vista_footer");
       }else if($datosConsulta['consultas'] != null && $datosConsulta['consultas_Leidas'] == null)
       {
           $datosConsul['titulo']          = "Lista de Consultas";
           $datosConsul['consultas']       = $this->consultas->findAll();
           $datosConsul['titulo_Leidos']   = "Mensajes Leidos";
           

           $data = ["titulo" => "Handball Gear Central - Consultas"];
           echo view("vista_head", $data);
           echo view("vista_nav");
           echo view("Consulta/Tabla_Consultas", $datosConsul);
           echo view("vista_footer");
       }else
       {
           $datosConsul['titulo']              = "Lista de Consultas";
           $datosConsul['titulo_Leidos']       = "Mensajes Leidos";
           $datosConsul['consultas']           = $this->consultas->findAll();
           $datosConsul['consultas_Leidas']    = $this->consultas->onlyDeleted()->findAll();

           $data = ["titulo" => "Handball Gear Central - Consultas"];
           echo view("vista_head", $data);
           echo view("vista_nav");
           echo view("Consulta/Tabla_Consultas", $datosConsul);
           echo view("vista_footer");
       }
   }
   // Se borra lógicamente al leer la consulta
   public function consultaVerificada($id = null)
   {
       $this->consultas->delete($id);
       return redirect()->to(base_url('').'/administrador/listarConsultas')->with('alertaExitosa', 'Consulta de Cliente Leída!');
   }

}

