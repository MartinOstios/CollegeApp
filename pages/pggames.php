<main class="container">
    <section class="row mt-5">
        <div class="col-md-8 offset-md-2 text-center">
            <h1 class="">CRUD Cursos</h1>
            <br>
            <!--  -->
            <?php if (verificarPermisos($_SESSION['ss-rol'], 5, $conn)) : ?>
                <a href="course/add.php" class="btn btn-cancel mt-3">
                    <i class="fas fa-plus"></i> Agregar cursos
                </a>
            <?php endif; ?>
            <table class="table table-striped mt-4">
                <thead>
                    <tr class="letter-title">
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $games = listGames($conn); ?>
                    <?php foreach ($games as $game) : ?>
                        <tr class="letter2">
                            <td><?php echo $game['nombre']; ?></td>
                            <td>$<?php echo $game['precio']; ?></td>
                            <td><img src="<?php echo $public . $game['imagen']; ?>" width="40px" class="img-thumbnail"></td>
                            <td>
                                <?php if (verificarPermisos($_SESSION['ss-rol'], 6, $conn)) : ?>
                                    <a href="course/show.php?id=<?php echo $game['id_curso']; ?>" class="btn btn-sm btn-actions">
                                        <i class="fas fa-search"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (verificarPermisos($_SESSION['ss-rol'], 7, $conn)) : ?>
                                    <a href="course/edit.php?id=<?php echo $game['id_curso']; ?>" class="btn btn-sm btn-actions">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (verificarPermisos($_SESSION['ss-rol'], 8, $conn)) : ?>
                                    <a href="javascript:;" class="btn btn-sm btn-actions btn-delete" data-id="<?php echo $game['id_curso']; ?>" data-dir="course">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <!--  -->
        </div>
    </section>
</main>