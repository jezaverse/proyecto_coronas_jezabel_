<div class ="container-fluid">
  <h1 class= "texto"> Detalle de la Venta</h1>
    <div class= "text-white p-4">
        <p>Nombre: = $venta['persona_nombre']</p>
        <p>Correo: = $venta['persona_correo']</p>
    </div>
    <table class= "table table-hover mb-0">
        <thead>
            <tr class= "table-dark">
                <th scope= "col">#ID</th>
                <th scope= "col">Producto</th>
                <th scope ="col">Precio</th>
                <th scope= "col">Cantidad</th>
                <th scope="col">Subtotal</th>
</tr>
</thead>
<tbody class="table-group-divider">
    <?php foreach ($detalle as $row){ ?>
       <tr class= "table-dark">
        <th scope= "row"><?=$row['id_venta'];?></th>
        <td> $<?= number_format($row['producto_precio'], 0, ',', '-'); ?></td>
        <td><?= $row['detalle_cantidad'];?></td>
        <td>$<?= number_format($row['detalle_precio'],0, ',','-'); ?></td>
        </tr>
    <?php } ?>


   <tr class= "table-dark">
    <td></td>
    <td></td>
    <td></td>
    <td class= "fw-bold text-white">Monto total: </td>
    <td class= "fw-bold text-white">$ <?= number_format($venta['venta_total'], 0, ',','-'); ?></td>
    </tr>
    </tbody>
    </table>
</div>