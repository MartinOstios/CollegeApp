<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css; ?>bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $css; ?>fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo $css; ?>owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $css; ?>owl.theme.green.min.css">
    <link rel="stylesheet" href="<?php echo $css; ?>custom.css">
    <title>CollegeApp</title>
</head>

<body>
    <?php if (isset($_SESSION['ss-fullname'])) : ?>
        <?php include 'navbar-user.php'; ?>
    <?php else : ?>
        <?php include 'navbar.php'; ?>
    <?php endif; ?>