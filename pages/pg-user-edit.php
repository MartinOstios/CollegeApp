<main class="container">
    <section class="row mt-5">
        <div class="col-md-6 offset-md-3 text-center">
            <h1 class="">Editar usuario</h1>
            <br>
            <!--  -->
            <?php if ($_GET) : ?>
                <?php
                $id   = $_GET['id'];
                $user = showUser($id, $conn);
                ?>
                <?php foreach ($user as $ur) : ?>
                    <form action="" method="post" class="mt-5" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $ur['id_usuario']; ?>">
                            <input type="text" class="form-control" name="fullname" placeholder="NOMBRE" value="<?php echo $ur['nombre']; ?>" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="email" class="form-control" name="email" placeholder="CORREO" value="<?php echo $ur['correo']; ?>" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="username" placeholder="TELÉFONO" value="<?php echo $ur['telefono']; ?>" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="password" placeholder="CONTRASEÑA" value="<?php echo $ur['contrasena']; ?>" required>
                        </div>
                        <select name="id_rol" class="form-control form-select mt-3" placeholder="Escoge rol..." required>
                            <?php $rol = listRol($conn) ?>
                            <?php foreach ($rol as $rl) : ?>
                                <option value="<?php echo $rl['id_rol'] ?>" <?php if($ur['id_rol'] == $rl['id_rol']) : ?> selected <?php endif ?>><?php echo $rl['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="form-group">
                            <button class="btn btn-register btn-block text-uppercase mt-3">
                                <i class="fas fa-user-edit"></i>
                                Editar
                            </button>
                            <a class="btn btn-cancel btn-block text-uppercase mt-2" href="../users.php">
                                <i class="fas fa-times"></i>
                                Cancelar
                            </a>
                        </div>
                    </form>
                <?php endforeach ?>
            <?php endif ?>
            <?php
            if ($_POST) {
                $id       = $_POST['id'];
                $id_rol   = $_POST['id_rol'];
                $fullname = $_POST['fullname'];
                $email    = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];

                if (editUser($id, $id_rol, $fullname, $email, $username, $password, $conn)) {
                    $_SESSION['message'] = '¡El usuario: ' . $fullname . ' fue editado exitosamente!';
                    echo "<script>
                            setTimeout(function() {
                                window.location.replace('../users.php');
                            }, 4000);
                          </script>";
                } else {
                    $_SESSION['error'] = 'El correo ya existe...';
                }
            }
            ?>
            <!--  -->
        </div>
    </section>
</main>