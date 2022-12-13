<nav class="navbar navbar-expand-lg navbar-dark bg-navbar">
  <div class="container-fluid">
    <!-- Logo -->
    <a class="navbar-brand" href="<?php echo $url; ?>index.php">
      <img src="<?php echo $imgs; ?>logo.svg" width="40px">
    </a>
    <!-- Fin logo -->

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Primer botón -->
        <li class="nav-item active">
          <?php if ($_SESSION['ss-rol'] != 2) : ?>
            <a class="nav-link <?php if ($section == 'dashboard') : ?>active<?php endif; ?>" href="<?php echo $url; ?>dashboard.php">
              <i class="fas fa-user-cog"></i>
              Panel de administración <span class="sr-only">(current)</span>
            </a>
          <?php else : ?>
            <a class="nav-link text-center<?php if ($section == 'dashboard') : ?>active<?php endif; ?>" href="<?php echo $url; ?>profile.php">
              <i class="fas fa-user-cog"></i>
              Perfil <span class="sr-only">(current)</span>
            </a>
          <?php endif ?>
        </li>
        <!-- Fin primer botón -->

        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-circle"></i>
            <?php echo $_SESSION['ss-fullname']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item text-center disabled">
                <strong class="admin">
                  <?php $rol = showRol($_SESSION['ss-rol'], $conn); ?>
                  <?php foreach ($rol as $rl) : ?>
                    <?php echo $rl['nombre']; ?>
                  <?php endforeach; ?>
                </strong>
              </a></li>

            <?php if ($_SESSION['ss-rol'] != 2) : ?>
              <?php if (verificarPermisos($_SESSION['ss-rol'], 2, $conn)) : ?>
                <li><a class="dropdown-item" href="<?php echo $url; ?>users.php">
                    <i class="fas fa-users"></i>
                    MOD Usuarios
                  </a></li>
              <?php endif; ?>
              <?php if (verificarPermisos($_SESSION['ss-rol'], 6, $conn)) : ?>
                <li><a class="dropdown-item" href="<?php echo $url; ?>course.php">
                    <i class="fas fa-dice"></i>
                    MOD Cursos
                  </a></li>
              <?php endif; ?>
              <?php if (verificarPermisos($_SESSION['ss-rol'], 12, $conn)) : ?>
                <li><a class="dropdown-item" href="<?php echo $url; ?>roles.php">
                    <i class="fas fa-user-tag"></i>
                    MOD Roles
                  </a></li>
              <?php endif; ?>
              <?php if (verificarPermisos($_SESSION['ss-rol'], 9, $conn)) : ?>
                <li><a class="dropdown-item" href="<?php echo $url; ?>ventas.php">
                    <i class="fas fa-chart-line"></i>
                    MOD Ventas
                  </a></li>
              <?php endif; ?>
              <?php if (verificarPermisos($_SESSION['ss-rol'], 10, $conn)) : ?>
                <li><a class="dropdown-item" href="<?php echo $url; ?>inscritos.php">
                    <i class="fas fa-pen"></i>
                    MOD Inscr
                  </a></li>
              <?php endif;  ?>
            <?php else : ?>
              <li><a class="dropdown-item" href="<?php echo $url; ?>profile/edit.php?id=<?php echo $_SESSION['ss-id']; ?>">
                  <i class="fas fa-address-card"></i>
                  Editar perfil
                </a></li>
              <li><a class="dropdown-item" href="<?php echo $url; ?>boughtCourses.php?id_usuario=<?php echo $_SESSION['ss-id']; ?>">
                  <i class="fas fa-clipboard-list"></i>
                  Ver Cursos
                </a></li>
            <?php endif ?>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="<?php echo $url; ?>exit.php">
                <i class="fas fa-times"></i>
                Cerrar sesión
              </a></li>
          </ul>
        </li>
        <!-- Fin dropdown -->
      </ul>
    </div>
  </div>
</nav>