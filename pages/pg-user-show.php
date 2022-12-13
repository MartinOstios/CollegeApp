<main class="container">
    <section class="row mt-5">
        <div class="col-md-6 offset-md-3 text-center">
            <h1 class="">Mostrar usuario</h1>
            <br>
            <!--  -->
            <?php if ($_GET) : ?>
                <?php
                $id   = $_GET['id'];
                $user = showUser($id, $conn);
                ?>
                <table class="table table-striped mt-4 letter2">
                    <?php foreach ($user as $ur) : ?>
                        <tr class="text-start">
                            <th>ID:</th>
                            <td><?php echo $ur['id_usuario']; ?></td>
                        </tr>
                        <tr class="text-start">
                            <th>Nombre: </th>
                            <td><?php echo $ur['nombre']; ?></td>
                        </tr>
                        <tr class="text-start">
                            <th>Correo: </th>
                            <td><?php echo $ur['correo']; ?></td>
                        </tr>
                        <tr class="text-start">
                            <th>Teléfono: </th>
                            <td><?php echo $ur['telefono']; ?></td>
                        </tr>
                        <tr class="text-start">
                            <th>Contraseña: </th>
                            <td><?php echo $ur['contrasena']; ?></td>
                        </tr>
                        <tr class="text-start">
                            <th>Rol: </th>
                            <?php $rol = showRol($ur['id_rol'], $conn) ?>
                            <?php foreach ($rol as $rl) : ?>
                                <td><?php echo $rl['nombre']; ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach ?>
                </table>
                <a href="../users.php" class="btn btn-cancel mt-3">
                    <i class="fas fa-arrow-left"></i> Atrás
                </a>
            <?php endif ?>

            <!--  -->
        </div>
    </section>
</main>