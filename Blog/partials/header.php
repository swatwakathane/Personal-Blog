<?php
require 'config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWAT Blog</title>
    <!-- linking to stylesheet -->
    <link rel="stylesheet" href="./css/style2.css">
    <!-- ------------------- font awesome -----------------  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    <!-- ------------------- GOOGLE FONTS ---------------- -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- ---------------- Navigation Panel ------------------------ -->
    <nav>
        <div class="container nav__container">
            <a href="./index2.php" class="nav__logo">S.W.A.T blog</a>
            <ul class="nav__items">
                <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
                <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
                <li><a href="<?= ROOT_URL ?>service.php">Services</a></li>
                <li><a href="..\index.html#contact" target="_blank">Contact</a></li>
                <!-- <li><a href="<?= ROOT_URL ?>signin.php" target="_blank">Sign In</a></li> -->
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="images/avatar1.jpg" alt="">
                    </div>
                    <ul>
                        <li><a href="<?= ROOT_URL ?>admin/dashboard.html">Dashboard</a></li>
                        <li><a href="<?= ROOT_URL ?>logout.html">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <button id="open__nav-btn"><i class="fa-solid fa-bars"></i></button>
            <button id="close__nav-btn"><i class="fa-solid fa-x"></i></button>
        </div>
    </nav>