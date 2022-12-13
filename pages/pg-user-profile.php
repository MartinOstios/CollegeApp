<main class="container">
    <section class="row mt-5">
        <div class="col-md-6 offset-md-3 text-center">
            <h1 class="">Editar perfil</h1>
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
                            <label for="cambiarNombre" class="form-label">Cambiar nombre</label>
                            <input type="hidden" name="id" value="<?php echo $ur['id_usuario']; ?>">
                            <input type="text" class="form-control" id="cambiarNombre" name="fullname" placeholder="NOMBRE" value="<?php echo $ur['nombre']; ?>" required>
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label">Cambiar correo</label>
                            <input type="email" class="form-control" name="email" placeholder="CORREO" value="<?php echo $ur['correo']; ?>" required>
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label">Cambiar teléfono</label>
                            <input type="text" class="form-control" name="username" placeholder="TELÉFONO" value="<?php echo $ur['telefono']; ?>" required>
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label">Cambiar contraseña</label>
                            <input type="text" class="form-control" name="password" placeholder="CONTRASEÑA" value="<?php echo $ur['contrasena']; ?>" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-register btn-block text-uppercase mt-3">
                                <i class="fas fa-user-edit"></i>
                                Editar
                            </button>
                            <a class="btn btn-cancel btn-block text-uppercase mt-2" href="../profile.php">
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
                $fullname = $_POST['fullname'];
                $email    = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $id_rol   = $_SESSION['ss-rol'];

                $_SESSION['ss-fullname'] = $_POST['fullname'];

                if (editUser($id, $id_rol, $fullname, $email, $username, $password, $conn)) {
                    $_SESSION['message'] = '¡Se ha editado el perfil correctamente!';
                    echo "<script>
                            setTimeout(function() {
                                window.location.replace('../profile.php');
                            }, 4000);
                          </script>";
                } else {
                    $_SESSION['error'] = 'Error';
                }
            }
            ?>
            <!--  -->
        </div>
    </section>
</main>