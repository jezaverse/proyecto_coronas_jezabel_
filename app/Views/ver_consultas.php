<div class="container-fluid">
    <h3 class="text-center text-dark">Lista de Consultas Recibidas</h3>
    <?php if (session()->getFlashdata('MensajeProducto')) { ?>
        <div class='alert alert-success alert-dismissible fade show text-center py-3 my-3' role='alert' id='mensaje'>
            <?= session()->getFlashdata('MensajeProducto'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
    <table class="table table-hover mb-0">
        <thead>
            <tr class="table-info">
                <th scope="col">N° Identificador</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Mensaje</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($consultas as $row) { ?>
                    <tr class="table-success">
                        <th scope="row"><?= $row['id_contacto']; ?></th>
                        <td><?= $row['contacto_nombre']; ?></td>
                        <td><?= $row['contacto_correo']; ?></td>
                        <td><?= $row['contacto_telefono']; ?></td>
                        <td><?= $row['contacto_mensaje']; ?></td>
                    </tr>
                

                <?php } ?>

        </tbody>
    </table>
</div>
