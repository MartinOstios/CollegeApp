<main class="container">
    <section class="row mt-5">
        <div class="col-md-6 offset-md-3 text-center">
            <h1 class="">Iniciar sesión</h1>
            <br>
            <!--  -->
            <form action="" method="post" class="mt-5">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="CORREO" required>
                </div>
                <div class="form-group mt-3">
                    <input type="password" class="form-control" name="password" placeholder="CONTRASEÑA" required>
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-login btn-block text-uppercase">
                        <i class="fas fa-user-lock"></i>
                        Iniciar sesión
                    </button>
                    <a class="btn btn-cancel btn-block text-uppercase mt-2" href="index.php">
                        <i class="fas fa-times"></i>
                        Cancelar
                    </a>
                </div>
            </form>
            <?php 
                if ($_POST) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    if (login($username, $password, $conn)) {
                            echo "<script> window.location.replace('dashboard.php'); </script>";
                    }
                }
            ?>
            <!--  -->
        </div>
    </section>
</main>