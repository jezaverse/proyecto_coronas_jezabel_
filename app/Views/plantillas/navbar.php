
<div class = "container-fluid">
      <nav class = "navbar navbar-expand-lg navbar-light">
          <div class = "container-fluid">
             <a href= "<?php echo base_url('nueva_plantilla'); ?>" class= "navbar-brand">THUNDER STORE</a>
                  <button type= "button" class = "navbar-toggler" data-bs-toggle ="collapse" data-bs-target= "#MenuNavegacion">
                    <span class = "navbar-toggler-icon"> </span>
                 </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <?php if(session()->perfil== 1){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('/backend/admin/ver_consultas'); ?>">Ver Consultas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('/catalogo_productos_view'); ?>">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('/backend/admin/gestion_productos'); ?>">Gestión Producto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('/backend/admin/lista_usuarios_view'); ?>">Ver Lista Usuarios</a>
                    </li>
                    <li class= "nav-item">
                        <a class="nav-link" href="#"> Bienvenido/a</a>
                    </li>
                    <li class= "nav-item">
                        <a class="nav_link" href="#"><?php echo session('nombre'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('logout'); ?>">Logout</a>
                    </li>

                <?php }elseif(session()->perfil == 2){ ?>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('quienes_somos'); ?>"> Quiénes Somos </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('catalogo_productos_view'); ?>"> Productos </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('contacto'); ?>"> Contacto </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('terminos_usos'); ?>"> Términos y Usos </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('carrito_view'); ?>"> Ver Carrito </a>
                        </li>
                        <li class= "nav-item">
                        <a class="nav-link" href="#"> Bienvenido/a</a>
                        </li>
                        <li class= "nav-item">
                        <a class="nav_link" href="#"><?php echo session('nombre'); ?></a>
                        </li>
                        <li class= "nav-item">
                        <a class="nav-link" href="<?php echo base_url('logout')?>"> Logout </a>
                        </li>

                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('quienes_somos'); ?>">QUIÉNES SOMOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('comercializacion'); ?>">COMERCIALIZACIÓN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('contacto'); ?>">CONTACTO</a>
                    </li>
                            <!--Menú desplegable--->
                            <li class="nav-item">

                                <a class="nav-link" href="<?php echo base_url('catalogo_productos_view'); ?>" >PRODUCTOS</a>
                            
                            </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('terminos_usos'); ?>">TÉRMINOS Y USOS</a>
                    </li> 
                        <li class= "nav-item">
                            <a class= "nav-link" href= "<?php echo base_url('registro_usuario_view')?>">Registrarse</a>
                    </li>
                    <li class= "nav-item">
                            <a class="nav-link" href="<?php echo base_url('login')?>">Iniciar sesión</a>
                    </li>
              <?php }?>
                </ul>
                </div>
                </div>
                </div>

                <?php if (session()->getFlashdata('msg')): ?>
                         <div class="custom-alert h6 text-center alert alert-warning alert-dismissible">
                         <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <?= session()->getFlashdata('msg') ?>
                </div>
    <?php endif  ?>
        </nav>
                    

</div>
