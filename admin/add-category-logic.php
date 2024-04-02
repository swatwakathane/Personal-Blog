<?php
require 'config/database.php';

if(isset($_POST['submit'])) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$title) {
        $_SESSION['add-category'] = "Please enter valid title!";
    } elseif (!$description) {
        $_SESSION['add-category'] = "Please enter correct description";
    } 

    if(isset($_SESSION['add-category'])) {
        $_SESSION['add-category-data'] = $_POST;
        header('location: ' . 'add-category.php');
        die();
    } else {
        // insert category into database
        $query = "INSERT INTO categories (title, description) VALUES ('$title', '$description')";
        $result = mysqli_query($connection, $query);
        if(mysqli_errno($connection)) {
            $_SESSION['add-category'] = "Category is not added, Please retry";
            header('location: '. 'add-category.php');
            die();
        } else {
            $_SESSION['add-category-success'] = "$title category  added successfully";
            header('location: '. 'manage-categories.php');
            die();
        }
    }
}