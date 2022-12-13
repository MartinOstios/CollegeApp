<main class="container">
    <section class="row mt-5">
        <div class="col-md-8 offset-md-2">
            <?php $id_curso  = $_GET['id_curso']; 
            ?>
            <?php $game = showGame($id_curso, $conn); ?>
            <?php foreach ($game as $gm) : ?>
                <h1 class="text-center">Personas inscritas en: <?php echo $gm['nombre']; ?></h1>
            <?php endforeach; ?>
            <div class="row">
                <?php $regPpl = showRegPpl($id_curso, $conn); ?>
                <?php foreach ($regPpl as $reg) : ?>

                    <?php $users = showUser($reg['id_usuario'], $conn); ?>
                    <?php foreach ($users as $user) : ?>
                        <p>
                            - <?php echo $user['nombre']; ?>
                        </p>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                <a href="inscritos.php" class="btn btn-cancel mt-3 mb-5">
                    <i class="fas fa-arrow-left"></i> Atrás
                </a>
            </div>
        </div>

    </section>
</main>