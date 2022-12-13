<?php require 'config/app.php'; ?>
<?php require 'config/database.php'; ?>
<?php require 'config/security.php'; ?>
<?php if (!verificarPermisos($_SESSION['ss-rol'], 2, $conn)) : ?>
    <?php echo "<script> window.location.replace('index.php'); </script>"; ?>
<?php endif; ?>
<?php $section = 'dashboard'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'pages/pgusers.php'; ?>
<?php include 'includes/footer.php'; ?>