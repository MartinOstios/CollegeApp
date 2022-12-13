<main class="container">
    <section class="row mt-5">
        <div class="col-md-8 offset-md-2 text-center">
            <h1 class="">CRUD Usuarios</h1>
            <br>
            <!--  -->
            <?php if (verificarPermisos($_SESSION['ss-rol'], 1, $conn)) : ?>
                <a href="users/add.php" class="btn btn-cancel mt-3">
                    <i class="fas fa-plus"></i> Agregar usuario
                </a>
            <?php endif; ?>
            <table class="table table-striped mt-4">
                <thead>
                    <tr class="letter-title">
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $users = listUsers($conn); ?>
                    <?php foreach ($users as $user) : ?>
                        <tr class="letter2">
                            <td><?php echo $user['nombre']; ?></td>
                            <td><?php echo $user['correo']; ?></td>
                            <?php $rol = showRol($user['id_rol'], $conn) ?>
                            <?php foreach ($rol as $rl) : ?>
                                <td><?php echo $rl['nombre']; ?></td>
                            <?php endforeach; ?>
                            <td>
                                <?php if (verificarPermisos($_SESSION['ss-rol'], 2, $conn)) : ?>
                                    <a href="users/show.php?id=<?php echo $user['id_usuario']; ?>" class="btn btn-sm btn-actions">
                                        <i class="fas fa-search"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (verificarPermisos($_SESSION['ss-rol'], 3, $conn)) : ?>
                                    <a href="users/edit.php?id=<?php echo $user['id_usuario']; ?>" class="btn btn-sm btn-actions">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (verificarPermisos($_SESSION['ss-rol'], 4, $conn)) : ?>
                                    <a href="javascript:;" class="btn btn-sm btn-actions btn-delete" data-id="<?php echo $user['id_usuario']; ?>" data-dir="users">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <!--  -->
        </div>
    </section>
</main>