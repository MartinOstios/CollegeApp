<main class="container">
    <section class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center">Añadir rol</h1>
            <br>
            <!--  -->
            <form action="" method="post" class="mt-3" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="nombre" placeholder="NOMBRE" required>
                </div>
                <?php $permiso = showPermisos($conn); ?>
                <?php foreach ($permiso as $prms) : ?>
                    <?php $id_modulo = $prms['id_modulo'];?>
                    <?php $modulo = showModulo($id_modulo, $conn);?>
                    <?php foreach ($modulo as $mod) :?>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" name="permiso<?php echo $prms['id'] ?>" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Módulo: <?php echo $mod['nombre']; ?> - Permiso: <?php echo $prms['nombre']; ?></label>
                    </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>

                <div class="form-group text-center">
                    <button class="btn btn-register btn-block text-uppercase mb-2">
                        <i class="fas fa-plus"></i>
                        Agregar
                    </button>
                    <a class="btn btn-cancel btn-block text-uppercase" href="../roles.php">
                        <i class="fas fa-times"></i>
                        Cancelar
                    </a>
                </div>
            </form>
            <?php
            if ($_POST) {
                $nombre   = $_POST['nombre'];
                if (addRol($nombre, $conn)) {
                    $permiso = showPermisos($conn);
                    foreach ($permiso as $prms) {
                        $permisoPost  = 'permiso' . $prms['id'];
                        $permisoFinal = $_POST[$permisoPost];
                        if ($permisoFinal == "on") {
                            if (addPermisosRoles($prms['id'], $conn)) {
                                $_SESSION['message'] = '¡El rol: ' . $nombre . ' fue agregado satisfactoriamente!';
                                echo "<script>
                                        setTimeout(function() {
                                            window.location.replace('../');
                                        }, 3000);
                                      </script>";
                            } else {
                                $_SESSION['error'] = 'Error';
                            }
                        }
                    }
                }
            }
            ?>
            <!--  -->
        </div>
    </section>
</main>