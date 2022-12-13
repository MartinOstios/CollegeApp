<?php

    session_start();

    unset($_SESSION['ss-fullname']);
    unset($_SESSION['ss-photo']);
    unset($_SESSION['ss-rol']);

    session_destroy();

    echo "<script> window.location.replace('index.php'); </script>";