<?php
    if (!isset($_SESSION['ss-fullname']) || $_SESSION['ss-rol'] == 2) {
        echo "<script> window.location.replace('index.php'); </script>";
    }

?>