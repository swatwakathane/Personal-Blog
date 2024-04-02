<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_GET['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // if category_id posts are deleted 
    // assigning them to new category
    $update_query = "UPDATE posts SET category_id=8 WHERE category_id=$id";
    $update_result = mysqli_query($connection, $update_query);

    if (!mysqli_errno($connection)) {
        // deleting a category from database
        $query = "DELETE FROM categories WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);
        $_SESSION['delete-category-success'] = "Category deleted successfully!";
    }
}

header('location: ' . 'manage-categories.php');
die();
