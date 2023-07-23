<h1 class ="texto1">Listado de Productos</h1>
    <div class= "container">
    <table id= "mytable" class="table table-bordred table-striped table-hover">
        <thead>
             <th> Titulo</th>
                 <!--Completar con los otros encabezados-->
                 <th>Categoria</th>
                 <th>Imagen</th>
                 <th>Editar</th>
                 <th>Activar/eliminar</th>
        </thead>
        
    <tbody>
        <?php foreach($libro as $row){ ?>
        <tr>
            <td><? php echo $row['producto_titulo']; ?></td>
            <!--Completar con las otras columnas-->
            <td><? php echo $row['categoria_desc']; ?></td>

            <td><img src= "<? php echo base_url('public/assets/uploads/'.$row['producto_imagen']);? >"alt="" height= "100" width= "100""/></td>
            
            <a class= "btn btn-success" href="<? php echo base_url('producto_controller/editar_producto/'.$row['producto_id]
        ); ?> "Editar</a> </td>

        <?php
        if($row['producto_estado']==1)
          {?>
            <td><a class= "btn btn-danger" href="<? php echo base_url('producto_controller/eliminar_producto/'.$row['producto_id']);?>"> Activar</a></td>
        <?php }?>
        </tbody>
        </table>
        </div>
        }
        