<?php
require 'config/database.php';

if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_GET['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // if category_id posts are deleted 
    // assigning them to new category
    $query = "DELETE FROM categories WHERE id=$id LIMIT 1";
    $result = mysqli_query($connection, $query);


    if(mysqli_errno($connection)) {
        $_SESSION['delete-category'] = "Category is not deleted, Please try again";
    } else {
        $_SESSION['delete-category-success'] = "Category deleted successfully!";
    }

}

header('location: '. ROOT_URL . 'admin/manage-categories.php');