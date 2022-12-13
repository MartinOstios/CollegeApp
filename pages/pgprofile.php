<main class="container">
        <section class="row mt-5">
            <div class="col-md-4 offset-md-4 text-center">
                <h1>Perfil</h1>
                <br>
                
                <!--Tarjetas start-->
                <a href="profile/edit.php?id=<?php echo $_SESSION['ss-id']; ?>" class="btn btn-module mt-5 dashboard-button">
                    <img src="<?php echo $imgs; ?>icon-mod1.svg" alt="">
                    Editar <strong>PERFIL</strong>
                </a>
                <a href="boughtCourses.php?id_usuario=<?php echo $_SESSION['ss-id']; ?>" class="btn btn-module mt-5 dashboard-button">
                    <img src="<?php echo $imgs; ?>icon-mod4.svg" alt="">
                    Ver <strong>CURSOS</strong>
                </a>

                <!--Tarjetas end-->
            </div>
        </section>
    </main>