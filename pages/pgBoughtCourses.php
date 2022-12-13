<main class="container">
    <section class="row mt-5">
        <div class="col-md-8 offset-md-2 text-center">
            <h1>Cursos comprados</h1>
            <div class="row g-0 centrar">
                <?php $boughtCourses = boughtCourses($_SESSION['ss-id'], $conn); ?>
                <?php //var_dump($boughtCourses); 
                ?>
                <?php foreach ($boughtCourses as $bought) : ?>
                    <div class="card card-object" style="width: 21rem;">
                        <div class="letter">
                            <?php $game = showGame($bought['id_curso'], $conn) ?>
                            <?php foreach ($game as $gm) : ?>
                                <h5 class="card-header"><strong><?php echo $gm['nombre']; ?></strong></h5>
                            <?php endforeach; ?>
                            <p class="card-text">Precio: <?php echo $gm['precio']; ?></p>
                            <a href="course/show.php?id=<?php echo $gm['id_curso']; ?>" class="btn btn-sm2 btn-card">
                                VER MÁS <i class="fas fa-search"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
</main>