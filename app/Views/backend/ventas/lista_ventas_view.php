<!doctype html>
<html lang="en">

<body>
    <div class="container">
        <h1>Ventas</h1>
        
        <div class="container mt-5">
    <div class="table-responsive">
        <table class="table  producto-table">
            <thead>
                <tr>
                    <th>Venta ID</th>
                    <th>usuario ID</th>
                    <th>fecha</th>
                    <th>total</th>
                    <th>ver detalles</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventaDetalle as $detalle) : ?>
                    <tr>

                        <td><?= $detalle['id'] ?></td>
                        <td><?= $detalle['id_cliente'] ?></td>
                        <td><?= $detalle['fecha'] ?></td>
                        <td><?= $detalle['total_venta'] ?></td>
                        <td>
                        <form action="<?= base_url('factura/' . $detalle['id']) ?>" method="post" style="display: inline;">
                        <button type="submit" class="btn btn-sm btn-success">factura</button>
                        <td>
                    </form>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</div> </div>      <div class="pagination">
    <?= $paginador->links(); ?>
</div>
</html>


	
