<h1 class= "texto1">Edición de Productos</h1>
<div class= "container">
    <div class= "w-50 mx-auto">
        <?php echo form_open_multipart("libro_controller/actualizar_libro");?>

        <div class= "form-group">
            <label for="titulo"> Titulo</label>
            <?php echo form_input(['name'=> 'titulo', 'id'=>
            'titulo', 'class'=> 'form-control', 
            'autofocus'=>'autofocus', 'value'=>$lbro['libro_titulo']]); ?>
            </div>
            
            <div class= "form-group">
                <label for="stock">Stock</label>
                <?php echo form_input(['name'=> 'stock', 'class'=>
                'form-control', 'value'=> $libro['libro_stock']]); ?>
                </div>

                <!--Completar con los otros controles-->
                <div class= "form-group">
                    <label for="imagen">Imagen</label>
                    <img src="<?php echo base_url('public/assets/uploads/'.$libro['libro_imagen']);?> "alt="
                    "height="100" width="100"/>
                    <?php echo form_input(['name'=> 'imagen', 'id'=>'imagen',
                    'type'=>'file']);?>
                    </div>
                    
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <?php
                        $lista['0']='Seleccione Categoría';
                             foreach($categorias a $row){
                                $lista[$row['categoria_id']]= $row['categoria_desc'];
                             }
                             $sel= $libro['libro_categoria'];
                             echo form_dropdown('categoria', $lista, $sel, class="form-control");?>
                             </div>

                             <?php echo form_hidden('id', $libro['libro_id']); ?>
                             <div class= "form-group">
                                <? php echo form_submit('Modificar', 'Modificar', "class= 'btn btn-success'");?>
                            </div>
                                 <? php echo form_close();?>
                            </div>
                            </div>