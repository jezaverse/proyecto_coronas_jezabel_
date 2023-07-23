<!doctype html>
<html lang="en">
 
   <body> 
 
 <!-- Información de contacto -->
 
 <hr class="hr" />
    <h1 class="texto"> Consultas </h1>
    
    <!-- Formulario --> 
    <?php $validation = \Config\Services::validation(); ?>


    <div class="col border-start border-dark">
				
			    <div class="row">
			    	

			    	<?php 
					if(session()->getFlashdata('Msg')){

										echo session()->getFlashdata('Msg');
									}
									
								if(isset($errors)) { ?>
										<div class="alert alert-danger" role="alert">
													<ul>
													<?php foreach ($errors as $error): ?>
														<li><?= esc($error) ?></li>
													<?php endforeach ?>
													</ul>
					
					<?php } ?>

			    	<?php echo form_open('/registro_consulta');?>
					
					
						<div class="form-group mt-2">
							<label for="nombre" class="fw-bold">Ingrese Nombre: </label>
							<?php echo form_input(['name' => 'nombre', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese Nombre']); ?>
						</div>


				    <div class="form-group mt-2">
			            <label for="correo" class="fw-bold">Correo Electrónico:</label>
			            <?php echo form_input(['name' => 'correo', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese Correo Electronico']); ?>
			        </div>

			        <div class="form-group mt-2">
			            <label for="telefono" class="fw-bold">Teléfono:</label>
			            <?php echo form_input(['name' => 'telefono', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese Telefono']); ?>
			        </div>

			        <div class="form-group mt-2">
			            <label for="mensaje" class="fw-bold">Ingrese Su Mensaje: </label>
			            <?php echo form_input(['name' => 'mensaje', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese Mensaje']); ?>
			        </div>

			        <?php echo form_submit('registrar_consulta', 'enviar', "class='btn btn-success mt-3'"); ?>
    				<?php echo form_close();?>
				</div>
			</div>
	  
           
        <div class="col-md-3">
        </div>

      </div>
    </div>
   
                          

    <script src=" <?php echo base_url("assets/js/bootstrap.bundle.min.js")?>" type="text/javascript"></script>

</body> 