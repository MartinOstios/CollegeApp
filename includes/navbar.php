<!-- Start Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo $url; ?>index.php">
            <img src="<?php echo $imgs; ?>logo.svg" width="40px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if ($section == 'home') : ?>active<?php endif; ?>" href="<?php echo $url; ?>index.php">
                        <i class="fas fa-home"></i>
                        Cursos <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($section == 'login') : ?>active<?php endif; ?>" href="<?php echo $url; ?>login.php">
                        <i class="fas fa-user-lock"></i>
                        Iniciar sesión
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link <?php if ($section == 'register') : ?>active<?php endif; ?>" href="<?php echo $url; ?>register.php">
                        <i class="fas fa-user-edit"></i>
                        Registro
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav> <!-- End Navbar -->