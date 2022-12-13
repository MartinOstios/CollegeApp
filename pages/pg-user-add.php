<main class="container">
    <section class="row mt-5">
        <div class="col-md-6 offset-md-3 text-center">
            <h1 class="">Agregar usuario</h1>
            <br>
            <!--  -->
            <form action="" method="post" class="mt-5" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" name="fullname" placeholder="NOMBRE" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control mt-3" name="email" placeholder="CORREO" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control mt-3" name="username" placeholder="TELÉFONO" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control mt-3" name="password" placeholder="CONTRASEÑA" required>
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-register btn-block text-uppercase">
                        <i class="fas fa-user-plus"></i>
                        Agregar
                    </button>
                    <a class="btn btn-cancel btn-block text-uppercase mt-2" href="../users.php">
                        <i class="fas fa-times"></i>
                        Cancelar
                    </a>
                </div>
            </form>
            <?php
            if ($_POST) {
                $fullname = $_POST['fullname'];
                $email    = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];

                if (addUser($fullname, $email, $username, $password, $conn)) {
                    $_SESSION['message'] = '¡El usuario: ' . $fullname . ' fue agregado satisfactoriamente!';
                    echo "<script>
                            setTimeout(function() {
                                window.location.replace('../users.php');
                            }, 3000);
                          </script>";
                } else {
                    $_SESSION['error'] = 'El correo existe actualmente...';
                }
            }
            ?>
            <!--  -->
        </div>
    </section>
</main>