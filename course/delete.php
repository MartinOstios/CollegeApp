<?php require '../config/app.php'; ?>
<?php require '../config/database.php'; ?>
<?php

if ($_GET) {
    $id = $_GET['id'];
    if (deleteGame($id, $conn)) {
        $_SESSION['message'] = '¡El curso fue eliminado satisfactoriamente!';
        echo "<script>
            setTimeout(function() {
                window.location.replace('../course.php');
            }, 500);
        </script>";
    } else {
        $_SESSION['error'] = 'El curso no puedo ser eliminado...';
    }
}

?>