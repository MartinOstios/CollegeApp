<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    if($id != $_SESSION['ss-id']){
        echo "<script> window.location.replace('../profile.php'); </script>";
    }
?>