<main class="container">
    <section class="row mt-5">
        <div class="col-md-6 offset-md-3 text-center">
            <!--  -->
            <?php if ($_GET) : ?>
                <?php
                $id   = $_GET['id'];
                $game = showGame($id, $conn);
                ?>
                <?php foreach ($game as $gm) : ?>
                    <h1 class=""><?php
                                    if (!isset($_SESSION['ss-fullname']) || $_SESSION['ss-rol'] == 2) {
                                        echo $gm['nombre'] ?>

                        <?php } else { ?>
                            Ver cursos
                        <?php } ?></h1>

                    <img src="<?php echo $public . $gm['imagen'] ?>" width="380px" class="img-thumbnail">
                    <br>
                    <table class="table table-striped mt-4 letter2">


                        <?php
                        if (isset($_SESSION['ss-fullname']) && $_SESSION['ss-rol'] == 1) { ?>
                            <tr class="text-start">
                                <th>ID:</th>
                                <td colspan="3"><?php echo $gm['id_curso']; ?></td>
                            </tr>
                        <?php } ?>

                        <tr class="text-start">
                            <th>Nombre: </th>
                            <td colspan="3"><?php echo $gm['nombre']; ?></td>
                        </tr>
                        <tr class="text-start">
                            <th>Descripción: </th>
                            <td colspan="3"><?php echo $gm['descripcion']; ?></td>
                        </tr>
                        <tr class="text-start">
                            <th>Precio: </th>
                            <td colspan="3">$<?php echo $gm['precio']; ?></td>
                        </tr>
                        <tr class="text-start">
                            <th>Duración: </th>
                            <td colspan="3"><?php echo $gm['duracion']; ?></td>
                        </tr>


                        <?php $id = $gm['id_usuario']; ?>
                        <?php $users = showUser($id, $conn); ?>
                        <?php foreach ($users as $user) : ?>
                            <?php
                            if (isset($_SESSION['ss-fullname']) && $_SESSION['ss-rol'] == 1) { ?>
                                <tr class="text-start">
                                    <th>Creador por: </th>
                                    <td><?php echo $user['nombre']; ?></td>
                                    <th>ID:</th>
                                    <td><?php echo $user['id_usuario']; ?></td>
                                </tr>
                            <?php } ?>

                        <?php endforeach ?>
                    <?php endforeach ?>
                    </table>
                    <form id="form" action="" method="post" class="mt-5" enctype="multipart/form-data">
                        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ss-id']; ?>">

                        <?php
                        $id   = $_GET['id'];
                        $alreadyBought = array("foo", "bar", "hello", "world");
                        ?>

                        <input type="hidden" name="id_curso" value="<?php echo $id; ?>">

                        <?php
                        if (isset($_SESSION['ss-rol'])) :
                            if (verificarPermisos($_SESSION['ss-rol'], 11, $conn)) : ?>
                                <!-- Prueba -->
                                <!-- Button trigger modal -->
                                <?php $alreadyBought = alreadyBought($_SESSION['ss-id'], $id, $conn) ?>
                                <a class="btn btn-inscrito btn-block mt-3 <?php if (sizeof($alreadyBought) > 0) : ?>disabled<?php endif; ?>">
                                    <?php if (sizeof($alreadyBought) > 0) : ?>Ya está inscrito en este curso
                                <?php else : ?>
                                    <i class="fas fa-pen"></i>
                                    Inscribirse en el curso
                                <?php endif ?>
                            <?php endif ?>
                                </a>
                                <!-- Este botón no se ve realmente, es solo para mostrar la factura, se activa cuando se compra el curso -->
                                <button type="button" class="btn btn-primary boton-presionado" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Lanzar modal
                                </button>
                                <button type="reset" class="boton-presionado">
                                    Reiniciar formulario
                                </button>
                    </form>
                    <?php
                            if (!sizeof($alreadyBought) > 0) :
                                if ($_POST) {
                                    $id_usuario = $_POST['id_usuario'];
                                    $id_curso   = $_POST['id_curso'];

                                    if (addBill($id_usuario, $id_curso, $conn)) {
                                        $_SESSION['presionado'] = 'true'; ?>
                                <!-- -->
                                <?php

                                        $bill = showBill($conn);
                                ?>
                                <!-- -->
                                <?php foreach ($bill as $bl) : ?>
                                    <!-- -->

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <img src="<?php echo $imgs; ?>logo.svg" width="40px">
                                                    <h5 id="tituloFactura">Factura electrónica</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table>
                                                        <tr>
                                                            <th>
                                                                Fecha y hora:&nbsp;
                                                            </th>
                                                            <td>
                                                                <?php echo $bl['fecha'] ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                Factura #: &nbsp;
                                                            </th>
                                                            <td>
                                                                <?php echo $bl['id_factura'] ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                Curso: &nbsp;
                                                            </th>
                                                            <td>
                                                                <?php echo $gm['nombre'] ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                Persona inscrita: &nbsp;
                                                            </th>
                                                            <td>
                                                                <?php echo $_SESSION['ss-fullname'] ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                Precio: &nbsp;
                                                            </th>
                                                            <td>
                                                                $<?php echo $gm['precio'] ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <p><br><br>¡Gracias por adquirir un curso en CollegeApp!</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="<?php echo $url; ?>factura.php?id=<?php echo $bl['id_factura'] ?>" target="_blank" class="btn btn-primary">Descargar</a>
                                                    <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>


                    <?php
                                    } else {
                                        $_SESSION['error'] = 'Error';
                                    }
                                }
                            endif;
                    ?>


                <?php endif ?>

                </form>
                <a href="<?php
                            if (!isset($_SESSION['ss-fullname'])) { ?>
                                            ../index.php
                                        <?php } else { ?>
                                            ../course.php
                                        <?php } ?>" class="btn btn-cancel mt-2 mb-5">
                    <i class="fas fa-arrow-left"></i> Atrás
                </a>
            <?php endif ?>



        </div>
    </section>
</main>