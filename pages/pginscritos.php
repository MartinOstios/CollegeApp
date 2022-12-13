<main class="container">
    <section class="row mt-5">
        <div class="col-md-8 offset-md-2 text-center">
            <h1>Inscritos</h1>
            <div class="row g-0 centrar">
                <?php $games = listGames($conn); ?>
                <?php foreach ($games as $game) : ?>
                    <div class="card card-object" style="width: 21rem;">
                        <div class="letter">
                            <h5 class="card-header"><strong><?php echo $game['nombre']; ?></strong></h5>
                            <?php $regPpl = showRegPpl($game['id_curso'], $conn) ?>
                            <?php //var_dump($regPpl); 
                            ?>
                            <p class="card-text">Personas inscritas: <?php echo sizeof($regPpl) ?></p>
                            <a href="registeredPeople.php?id_curso=<?php echo $game['id_curso']; ?>" class="btn btn-sm2 btn-card">
                                VER MÁS <i class="fas fa-search"></i>
                            </a>
                        </div>
                    </div>

                <?php endforeach ?>
                <a href="dashboard.php" class="btn btn-cancel mt-3">
                    <i class="fas fa-arrow-left"></i> Atrás
                </a>
            </div>
        </div>
    </section>
</main>