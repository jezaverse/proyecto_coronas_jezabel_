<div class="container mt-5 login">
	
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
    </div>
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header text-white text-center">
					<h1 class = "texto">Iniciar Sesión</h1>
					</div>
					<div class="card-body">
						<!-- Formulario de inicio de sesion -->
						<?php echo form_open('authlogin')?>
							<div class="form-group">
								<label for="correo">Correo electrónico:</label>
								<input type="correo" class="form-control" id="correo" name="correo" required>
							</div>
							<div class="form-group">
								<label for="pass">Contraseña:</label>
								<input type="password" class="form-control" id="pass" name="pass" required>
							</div>
							<button type="submit" class="btn btn-primary btn-block" href="authlogin">Iniciar sesión</button>
							<?php echo form_close();?>

						<div class="text-center mt-3">
							<a href= <?php echo base_url('registro_usuario_view'); ?>>¿No tiene una cuenta? Regístrese aquí</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>