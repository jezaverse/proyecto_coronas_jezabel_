<?php 
  <h1 class = "text-center">Registro de Productos</h1>
    <div class = "container">
      <div class = "w-50 mx-auto">
         <?php if(isset($validation)){?
            <div class= "alert-danger">
             <?= $validation->listErrors();?>
             </div>
         <?php }?>
   

     <?php echo form_open_multipart('insert_producto')?>

     <div class= "form-group">

     <label for= "nombre">Nombre del Producto</label>
     <?php echo form_input(['name'=> 'nombre', 'id'=> 'nombre',
     'class'=> 'form-control', 'placeholder'=>
     'ingrese nombre producto', 'value'=> set_value('nombre')]); ?>
     </div>


     <div class= "form-group">
         <label for= "imagen">Imagen</label>
         <?php echo form_input(['name'=>'imagen', 'id'=> 'imagen', 
         'type'=> 'file', 'value'=>set_value('imagen')]); ?>
         </div>

     <div class= "form-group">
         <label for= "categoria">Categoria</label>
        <?php 
            $lista['0']='Seleccione Categoria';
            foreach($categorias as $row){
                $categoria_id = $row['categoria_id'];
                $categoria_desc= $row['categoria_desc'];
                $lista[$categoria_id]= $categoria_desc;
            }

            echo form_dropdown('categoria', $lista, '0', 'class="form-control"');
         ?>
         </div>


         <div class= "form-group mt-3">

         <?php echo form_submit('Agregar', 'Agregar', "class= 'btn btn-success'"); '<'
        </div>
        <?php echo form_close();?>

        </div>
        </div>
        

         



