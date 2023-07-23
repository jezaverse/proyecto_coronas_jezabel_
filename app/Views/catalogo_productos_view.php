<div class= "container">
      <h1 class= "display-4 text-center">Lista de Productos</h1>
      <div class= "row">


      <?php foreach($producto as $row) {?>
        <div class = "col-md 6">
        <div class= "card text-center">
        <img class= "carg-img-top" src= "<?php echo base_url
        ('public/assets/uploads/'.$row['libro_imagen']); ?>" 
        alt= "" height= "150" width ="150" width="150" alt="Card image cap">

        <div class= "card-body">
            <h5 class= "card-title"><?php echo $row['producto_nombre'];?></h5>
            <p class= "card-text"><?php echo $row['producto_descripcion'];?></p>
            <p class= "card-text"><?php echo $row['producto_precio'];?></p>
            <p class= "card-text"><?php echo $row['categoria_desc']; ?></p>
          <?php if(sesion('login')){

            echo form_open('add_cart');
                echo form_hidden('id', $row['libro_id']);
                echo form_hidden('nombre', $row['libro_titulo']);
                echo form_hidden('precio', $row['libro_precio']);
                echo form_submit('comprar', 'Agregar al carrito', "class= 'btn btn-success'");
          echo form_close();
          }?>
          <hr>
        </div>
        </div>
        </div>
    <?php} ? >
    </div>
    </div>