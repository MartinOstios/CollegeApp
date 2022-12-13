<main class="container">
    <section class="row mt-5">
        <div class="col-md-4 offset-md-4 text-center">
            <h1>Panel de administración</h1>
            <br>
            <!--Tarjetas start-->
            <?php if (verificarPermisos($_SESSION['ss-rol'], 2, $conn)) : ?>
                <a href="users.php" class="btn btn-module mt-5 dashboard-button">
                    <img src="<?php echo $imgs; ?>icon-mod1.svg" alt="">
                    MOD <strong>USUARIOS</strong>
                </a>
            <?php endif; ?>
            <?php if (verificarPermisos($_SESSION['ss-rol'], 6, $conn)) : ?>
                <a href="course.php" class="btn btn-module mt-3 dashboard-button">
                    <img src="<?php echo $imgs; ?>icon-mod2.svg" alt="">
                    MOD <strong>CURSOS</strong>
                </a>
            <?php endif; ?>
            <?php if (verificarPermisos($_SESSION['ss-rol'], 12, $conn)) : ?>
                <a href="roles.php" class="btn btn-module mt-3 dashboard-button">
                    <img src="<?php echo $imgs; ?>icon-mod6.svg" alt="">
                    MOD <strong>ROLES</strong>
                </a>
            <?php endif; ?>
            <?php if (verificarPermisos($_SESSION['ss-rol'], 9, $conn)) : ?>
                <a href="ventas.php" class="btn btn-module mt-3 dashboard-button">
                    <img src="<?php echo $imgs; ?>icon-mod33.svg" alt="">
                    MOD <strong>VENTAS</strong>
                </a>
            <?php endif; ?>
            <?php if (verificarPermisos($_SESSION['ss-rol'], 10, $conn)) : ?>
                <a href="inscritos.php" class="btn btn-module mt-3 dashboard-button">
                    <img src="<?php echo $imgs; ?>icon-mod5.svg" alt="">
                    MOD <strong>INSCR</strong>
                </a>
            <?php endif; ?>
            <!--Tarjetas end-->
        </div>
    </section>
</main>