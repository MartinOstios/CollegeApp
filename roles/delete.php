<?php require '../config/app.php'; ?>
<?php require '../config/database.php'; ?>
<?php
//POR TERMINAR//
if ($_GET) {
    $id = $_GET['id'];
    if (deleteRol($id, $conn)) {
        $_SESSION['message'] = '¡El rol fue eliminado satisfactoriamente!';
        echo "<script>
            setTimeout(function() {
                window.location.replace('../users.php');
            }, 500);
        </script>";
    } else {
        $_SESSION['error'] = '¡El usuario no pudo ser eliminado!';
    }
}

?>