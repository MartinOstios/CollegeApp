<main class="container">
    <section class="row mt-5">
        <div class="col-md-12 offset-md-0 text-center">
            <h1 class="">Cursos</h1>

                <div class="row g-0 centrar">
                        <?php $games = listGames($conn); ?>
                        <?php foreach ($games as $game) : ?>
                            <div class="card card-object" style="width: 21rem;">
                                <div class="letter">
                                    <img src="<?php echo $public . $game['imagen']; ?>" class="card-img-top img-card" alt="...">
                                    <h5 class="card-header"><strong><?php echo $game['nombre']; ?></strong></h5>
                                    <p class="card-text text-card"><?php echo $game['descripcion']; ?></p>
                                    <a href="course/show.php?id=<?php echo $game['id_curso']; ?>" class="btn btn-sm2 btn-card">
                                            VER MÁS <i class="fas fa-search"></i>
                                    </a>    
                                </div>    
                            </div>  
                            
                        <?php endforeach ?>
                    
                </div>
        </div>
    </section>
</main>