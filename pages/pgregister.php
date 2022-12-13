<main class="container">
    <section class="row mt-5">
        <div class="col-md-6 offset-md-3 text-center">
            <h1 class="">Registro</h1>
            <br>
            <!--  -->
            <form action="" method="post" class="mt-5">
                <div class="form-group">
                    <input type="text" class="form-control" name="fullname" placeholder="NOMBRE" required>
                </div>
                <div class="form-group mt-3">
                    <input type="email" class="form-control" name="email" placeholder="CORREO" required>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="username" placeholder="TELÉFONO" required>
                </div>
                <div class="form-group mt-3">
                    <input type="password" class="form-control" name="password" placeholder="CONTRASEÑA" required>
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-register btn-block text-uppercase">
                        <i class="fas fa-user-edit"></i>
                        Registrar
                    </button>
                    <a class="btn btn-cancel btn-block text-uppercase mt-2" href="index.php">
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

                    if (regUser($fullname, $email, $username, $password, $conn)) {
                        $_SESSION['message'] = '¡El usuario: ' . $fullname . ' ha sido creado de manera exitosa!';
                    } else {
                        $_SESSION['error'] = '¡Ese correo ya está registrado!';
                    }
                }
            ?>
            <!--  -->
        </div>
    </section>
</main>