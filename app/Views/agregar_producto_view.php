<!doctype html>
<html lang="en">
 
   <body>
            <div class="col border-start border-dark">
                <h1 class= "text-lg-center">Agregar productos a la venta</h1>
                    <?php $validation = \Config\Services::validation(); ?>
                    <?php if (session()->getFlashdata('msg')) { ?>
                        <div class='alert alert-success alert-dismissible fade show text-center py-3 my-3' role='alert' id='mensaje'>
                            <?= session()->getFlashdata('msg'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

                    <?php echo form_open_multipart('registrar_producto') ?> 
                    <div class="row gy-4">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label text-lg-center">Nombre</label>
                        <input type="text" name="nombre" placeholder="Nombre del articulo" 
                        value="<?php echo set_value('nombre'); ?>" class="form-control" id="inputText4">
                        <?php if ($validation->getError('nombre')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('nombre'); ?>
                                </div>
                        <?php } ?>
                    </div>
                
                    <div class="col-6">
                        <label for="descripcion" for="descripcion" class="form-label">Descripcion del articulo</label>
                        <textarea class="form-control border border-dark" value="<?php echo set_value('descripcion'); ?>" name="descripcion" 
                        id="descripcion" rows="3" maxlength="1000" placeholder="Descripción del articulo"></textarea>
                        <?php if ($validation->getError('descripcion')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('descripcion'); ?>
                                </div>
                        <?php } ?>
                    </div>
                    <div class="col-6 input-group">
                        <label for="precio" class="input-group form-label">Precio del articulo</label>
                        <span class="input-group-text">$</span>
                        <input type="text" name="precio" id="precio" placeholder="Precio del producto" 
                        value="<?php echo set_value('precio'); ?>" 
                        class="form-control" id="inputText4">
                        <?php if ($validation->getError('precio')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('precio'); ?>
                                </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-4">
                        <label for="stock" class="form-label">Unidades en Stock</label>
                        <input type="number" name="stock" placeholder="Stock" value="<?php echo set_value('stock'); ?>" class="form-control" 
                        id="inputText4">
                        <?php if ($validation->getError('stock')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('stock'); ?>
                                </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-6">
                        <label for="imagen" class="form-label">Foto o Imagen</label>
                        <input class="form-control" name="imagen"  type="file" id="formFile">
                        <?php if ($validation->getError('imagen')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('imagen'); ?>
                                </div>
                        <?php } ?>
                    </div>

                    <div class="col-md-6">
                        <label for="categoria" class="form-label">Categoría</label>
                        <input type="text" name="categoria" placeholder="categoria" value="<?php echo set_value('categoria'); ?>" 
                        class="form-control" id="inputText4">
                        <?php if ($validation->getError('categoria')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('categoria'); ?>
                                </div>
                        <?php } ?>
                        </div>

                    
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Cargar</button>
                    </div>
                    </div>
                <?php form_close(); ?>
            </div>

            
</body>
</html>
