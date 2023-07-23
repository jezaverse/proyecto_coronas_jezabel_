            <!-- Mostrar errores de validación -->
            <?php if (isset($validation) && $validation->getErrors()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($validation->getErrors() as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <?php $validation = \Config\Services::validation(); ?>
            <!-- Mostrar mensajes de exito -->
            <?php if (session()->getFlashdata('success')) {
                    echo " <div class='h4 text-center alert alert-info alert-dismissible' style='border-radius: 40px;'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' style='font-size:1.2rem; color: red;'></button>" . session()->getFlashdata('success') . "
                        </div>";
                }
              ?>
            <!-- Mostrar mensajes de error -->
              <?php if (session()->getFlashdata('msg')) {
                    echo " <div class='h4 text-center alert alert-warning alert-dismissible' style='border-radius: 40px;'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' style='font-size:1.2rem; color: red;'></button>" . session()->getFlashdata('msg') . "
                        </div>";
                }
                ?>

       <!-- FORMULARIO REGISTRO-->
       <div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header text-center">
						<h1 class = "texto">Registrarse</h1>
					</div>
					<div class="card-body">
        <?php echo form_open('registro_usuario')?>

                  <div class = "form-group">
                    <label for= "nombre">Nombre</label>
                    <?php echo form_input(['name' => 'nombre',
                    'id'=>'nombre', 'class'=>'form-control', 
                    'placeholder'=> 'Ingrese nombre de usuario']);?>
                  </div>
                  <div class = "form-group">
                    <label for= "pass">Contraseña</label>
                    <?php echo form_password(['name'=>'pass',
                    'id'=>'pass','class'=>'form-control',
                    'placeholder'=>'Ingrese contraseña']);?>
                  </div>
                  <div class = "form-group">
                    <label for= "repass">Repetir contraseña</label>
                    <?php echo form_password(['name'=>'repass',
                    'id'=>'repass','class'=>'form-control',
                    'placeholder'=>'Ingrese contraseña']);?>
                  </div>
                  <div class = "form-group">
                    <label for= "correo">Correo electrónico</label>
                    <?php echo form_input(['name'=>'correo',
                    'id'=>'correo','class'=>'form-control',
                    'placeholder'=>'Ingrese correo']);?>
                  </div>

          <?php echo form_submit('Registrarse', 'Registrarse',
              "class= 'btn btn-success' ");?>
              </div>
					</div>
				</div>
			</div>
		</div>
	</div>
  <?php echo form_close();?>

  <div class="text-center mt-3">
							<a href= "<?php echo base_url('login'); ?>"; ?>¿Ya tiene una cuenta? Inicie sesión</a>
						</div>