<main class="container">
    <section class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center">Editar rol</h1>
            <br>
            <!--  -->
            <?php if ($_GET) : ?>
                <?php
                $id_rol   = $_GET['id'];
                $rol = showRol($id_rol, $conn);
                ?>
                <?php foreach ($rol as $rl) : ?>
                    <form action="" method="post" class="mt-5" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <input type="hidden" name="id" value="<?php echo $rl['id_rol'] ?>">
                            <input type="text" class="form-control" name="nombre" placeholder="NOMBRE" value="<?php echo $rl['nombre'] ?>" required>
                        </div>
                        <?php $permiso = showPermisos($conn); ?>
                        <?php foreach ($permiso as $prms) : ?>
                            <?php $id_modulo = $prms['id_modulo']; ?>
                            <?php $modulo = showModulo($id_modulo, $conn); ?>
                            <?php foreach ($modulo as $mod) : ?>
                                <div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" name="permiso<?php echo $prms['id'] ?>" type="checkbox" role="switch" id="flexSwitchCheckDisabled" <?php $rol_permiso = showRolPermiso($id_rol, $conn); ?> <?php foreach ($rol_permiso as $rol_prms) : ?> <?php if ($rol_prms['id_permiso'] == $prms['id']) : ?>checked<?php endif; ?> <?php endforeach; ?>>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Módulo: <?php echo $mod['nombre']; ?> - Permiso: <?php echo $prms['nombre']; ?></label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                        <div class="form-group text-center">
                            <button class="btn btn-register btn-block text-uppercase mb-2">
                                <i class="fas fa-pen"></i>
                                Editar
                            </button>
                            <a class="btn btn-cancel btn-block text-uppercase" href="../roles.php">
                                <i class="fas fa-times"></i>
                                Cancelar
                            </a>
                        </div>
                    </form>
                <?php endforeach ?>
            <?php endif ?>
            <?php
            if ($_POST) {
                $id_rol = $_POST['id'];
                $nombre = $_POST['nombre'];
                //Edita el rol, sólo el nombre
                if (editRol($id_rol, $nombre, $conn)) {
                    $permiso = showPermisos($conn);
                    //Trae información de los permisos
                    $permisosActuales = showPermisosRoles($id_rol, $conn);
                    for ($i = 0; $i < sizeof($permisosActuales); $i++) {
                        $permisoConcreto = $permisosActuales[$i];
                        $arrayPermisos[$i] = $permisoConcreto[0];
                    }

                    $permisoConcreto = $permisosActuales[0];
                    foreach ($permiso as $prms) {
                        //permisoPost sirve para nombrar la variable que se va a traer en el post, de acuerdo
                        // a los permisos que existan, si hay 12 permisos, trae los 12 que existen
                        //Cómo en el formulario en el "name" se le puso por ID, para simplificar,
                        //traerlos funciona de la misma manera, con la ID del permiso.
                        //Ejemplo: existe 1 permiso, entonces en el formulario se va a crear la opción de seleccionar o no ese permiso
                        //Luego acá se traerá lo que nos mandó el formulario y se guardará en la variable permisoFinal
                        //Si está seleccionado, la variable tiene como valor "on", si no está seleccionado, tiene como valor "off".

                        $permisoPost  = 'permiso' . $prms['id'];
                        $permisoFinal = $_POST[$permisoPost];
                        $rolesPermisos = showRolPermiso($id_rol, $conn);
                        if ($permisoFinal == "on") {
                            if (editAddPermisosRoles($id_rol, $prms['id'], $arrayPermisos, $conn)) {
                            } else {
                            }
                        }

                        if ($permisoFinal == "off") {
                            if (editDeletePermisosRoles($id_rol, $prms['id'], $conn)) {
                            } else {
                            }
                        }
                    }
                    $_SESSION['message'] = '¡Los cambios se realizaron satisfactoriamente!';
                    echo "<script>
                            setTimeout(function() {
                                window.location.replace('../roles.php');
                            }, 4000);
                          </script>";
                }
            }
            ?>
            <!--  -->
        </div>
    </section>
</main>