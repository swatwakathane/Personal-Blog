<?php
require 'config/database.php';

if(isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}
// check login status
if(!isset($_SESSION['user-id'])) {
    header('location: ' . '../signin.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swatwa Blog</title>
    <!-- linking to stylesheet -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- ------------------- font awesome -----------------  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    <!-- ------------------- GOOGLE FONTS ---------------- -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- ---------------- Navigation Panel ------------------------ -->
    <nav>
        <div class="container nav__container">
            <a href="../index.php" class="nav__logo">SWATWA</a>
            <ul class="nav__items">
                <li><a href="../blog.php">Blog</a></li>
                <li><a href="../about.php">About</a></li>
                <li><a href="https://swatwakathane.info#contact" target="_blank">Contact</a></li>
                <?php if(isset($_SESSION['user-id'])) : ?>
                    <li class="nav__profile">
                    <div class="avatar">
                        <img src="<?= '../images/' . $avatar['avatar'] ?>">
                    </div>
                    <ul>
                        <li><a href="index.php">Dashboard</a></li>
                        <li><a href="../logout.php">Logout</a></li>
                    </ul>
                </li>
                <?php else : ?>
                    <li><a href="../signin.php">Sign In</a></li>
                <?php endif ?>
            </ul>
            <button id="open__nav-btn"><i class="fa-solid fa-bars"></i></button>
            <button id="close__nav-btn"><i class="fa-solid fa-x"></i></button>
        </div>
    </nav>


