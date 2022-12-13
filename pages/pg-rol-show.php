<main class="container">
    <section class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center">Ver rol</h1>
            <br>
            <!--  -->
            <?php if ($_GET) : ?>
                <?php
                $id_rol   = $_GET['id'];
                $rol = showRol($id_rol, $conn);
                ?>
                <table class="table table-striped mt-4 letter2">
                    <?php foreach ($rol as $rl) : ?>
                        <tr class="text-start">
                            <th>ID:</th>
                            <td><?php echo $rl['id_rol']; ?></td>
                        </tr>
                        <tr class="text-start">
                            <th>Nombre: </th>
                            <td><?php echo $rl['nombre']; ?></td>
                        </tr>
                        <tr class="text-center">
                            <th colspan="2"> Permisos: </th>
                        </tr>
                    <?php endforeach ?>
                    <?php $permiso = showPermisos($conn); ?>
                    <?php foreach ($permiso as $prms) : ?>
                        <?php $id_modulo = $prms['id_modulo']; ?>
                        <?php $modulo = showModulo($id_modulo, $conn); ?>
                        <?php foreach ($modulo as $mod) : ?>
                            <tr>
                                <th>Módulo: <?php echo $mod['nombre']; ?> - Permiso: <?php echo $prms['nombre']; ?></th>

                                <td>
                                    
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDisabled"
                                            <?php $rol_permiso = showRolPermiso($id_rol, $conn); ?>
                                            <?php foreach ($rol_permiso as $rol_prms) : ?>
                                                <?php if ($rol_prms['id_permiso'] == $prms['id']) : ?>checked<?php endif; ?> 
                                            <?php endforeach; ?>
                                            disabled>
                                        </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </table>
                <div class="text-center mb-5">
                    <a href="../roles.php" class="btn btn-cancel mt-3">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            <?php endif ?>

            <!--  -->
        </div>
    </section>
</main>