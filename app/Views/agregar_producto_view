<!doctype html>
<html lang="en">
 
   <body> 
 
 <!-- Información de contacto -->
 
 <hr class="hr" />
    <h1 class="texto"> Agregar Producto </h1>
    
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

			    	<?php echo form_open_multipart('/registro_producto');?>
					
					
						<div class="form-group mt-2">
							<label for="nombre" class="fw-bold">Ingrese Nombre: </label>
							<?php echo form_input(['name' => 'nombre', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese Nombre']); ?>
						</div>


				    <div class="form-group mt-2">
			            <label for="descripcion" class="fw-bold">Descripcion:</label>
			            <?php echo form_input(['name' => 'correo', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese Correo Electronico']); ?>
			        </div>

			        <div class="form-group mt-2">
			            <label for="precio" class="fw-bold">Precio:</label>
			            <?php echo form_input(['name' => 'telefono', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese Telefono']); ?>
			        </div>

                    <div class="form-group mt-2">
                    <label for="stock" class="fw-bold">Imagen: </label>

                    <td><img src="<?php echo base_url('assets/ImagenesProducto/' . $row['producto_imagen']); ?>" width="100px" height="100px" alt=""></td>
                        <td>
                    </div>

			        <div class="form-group mt-2">
			            <label for="stock" class="fw-bold">Stock: </label>
			            <?php echo form_input(['name' => 'mensaje', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese Mensaje']); ?>
			        </div>


                    <div class="form-group mt-2">
			            <label for="categoria" class="fw-bold">Categoria: </label>
			            <?php echo form_input(['name' => 'mensaje', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese Mensaje']); ?>
			        </div>
        
                    <div class="form-group mt-2">
			            <label for="estado" class="fw-bold">Estado: </label>
			            <?php echo form_input(['name' => 'mensaje', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese Mensaje']); ?>
			        </div>


			        <?php echo form_submit('registrar_producto', 'enviar', "class='btn btn-success mt-3'"); ?>
    				<?php echo form_close();?>
				</div>
			</div>
	  
           
        <div class="col-md-3">
        </div>

      </div>
    </div>
   
                          

    <script src=" <?php echo base_url("assets/js/bootstrap.bundle.min.js")?>" type="text/javascript"></script>

</body> 
