<?php require '../config/app.php'; ?>
<?php require '../config/database.php'; ?>
<?php $section = 'dashboard'; ?>
<?php require '../config/security.php'; ?>
<?php if (!verificarPermisos($_SESSION['ss-rol'], 1, $conn)) : ?>
    <?php echo "<script> window.location.replace('../index.php'); </script>"; ?>
<?php endif; ?>
<?php include '../includes/header.php'; ?>
<?php include '../pages/pg-user-add.php'; ?>
<?php include '../includes/footer.php'; ?>