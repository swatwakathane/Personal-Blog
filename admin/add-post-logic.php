<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $author_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    // check for is_featured
    $is_featured = $is_featured == 1 ?: 0;

    // validate form data
    if (!$title) {
        $_SESSION['add-post'] = "Enter valid title for blog";
    } elseif (!$category_id) {
        $_SESSION['add-post'] = "Select category for blog";
    } elseif (!$body) {
        $_SESSION['add-post'] = "Please write some content";
    } elseif (!$thumbnail['name']) {
        $_SESSION['add-post'] = "Please upload thumbnail";
    } else {
        // validate thumbnail
        $time = time();
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../images/' . $thumbnail_name;

        // check for file type
        $allowed_files = ['jpg', 'jpeg', 'png', 'JPG'];
        $extension = explode('.', $thumbnail_name);
        $extension = end($extension);
        if (in_array($extension, $allowed_files)) {
            if ($thumbnail['size'] < 2_000_000) {
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
            } else {
                $_SESSION['add-post'] = "File size too big, should be less than 2mb";
            }
        } else {
            $_SESSION['add-post'] = "file should be png, jpg or jpeg";
        }
    }

    if (isset($_SESSION['add-post'])) {
        $_SESSION['add-post-data'] = $_POST;
        header('location: ' . 'add-post.php');
        die();
    } else {
        if ($is_featured == 1) {
            $zero_all_is_featured_query = "UPDATE posts SET is_featured=0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
        }

        // insert post into database
        $query = "INSERT INTO posts (title, body, thumbnail, category_id, author_id, is_featured) 
        VALUES ('$title', '$body', '$thumbnail_name', $category_id, $author_id, $is_featured)";
        $result = mysqli_query($connection, $query);

        if (!mysqli_errno($connection)) {
            $_SESSION['add-post-success'] = "New Blog added successfully";
            header('location: ' . 'index.php');
            die();
        }
    }
}

header('location: ' . 'add-post.php');
die();
