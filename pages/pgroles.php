<main class="container">
    <section class="row mt-5">
        <div class="col-md-8 offset-md-2 text-center">
            <h1 class="">Módulo roles</h1>
            <br>
            <!--  -->
            <a href="roles/add.php" class="btn btn-cancel mt-3">
                <i class="fas fa-plus"></i> Agregar rol
            </a>
            <table class="table table-striped mt-4">
                <thead>
                    <tr class="letter-title">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $rol = listRol($conn); ?>
                    <?php foreach ($rol as $rl) : ?>
                        <tr class="letter2">
                            <td><?php echo $rl['id_rol']; ?></td>
                            <td><?php echo $rl['nombre']; ?></td>
                            <td>
                                <a href="roles/show.php?id=<?php echo $rl['id_rol']; ?>" class="btn btn-sm btn-actions">
                                    <i class="fas fa-search"></i>
                                </a>
                                <a href="roles/edit.php?id=<?php echo $rl['id_rol']; ?>" class="btn btn-sm btn-actions">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="javascript:;" class="btn btn-sm btn-actions btn-delete" data-id="<?php echo $rl['id_rol']; ?>" data-dir="roles">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <!--  -->
        </div>
    </section>
</main>