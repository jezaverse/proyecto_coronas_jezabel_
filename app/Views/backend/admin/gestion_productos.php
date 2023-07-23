<h1 class= "text-center">Registro de Productos</h1>
<div class= "container">
    <div class= "w-50 mx-auto">
        <?php if(isset($validation)) {?>
            <div class= "alert-danger">
                <?=$validation->listErrors(); ?>
        </div>

        <?php} ?>

        <?php echo form_open_multipart('inseertar_producto')?>

        <div class= "form-group">

        <label for= "nombre">Nombre Producto</label>
        <''