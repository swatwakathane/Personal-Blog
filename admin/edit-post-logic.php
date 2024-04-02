<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    $is_featured = $is_featured == 1 ?: 0;

    // validate input value
    if (!$title) {
        $_SESSION['edit-post'] = "Invalid title";
    } elseif (!$category_id) {
        $_SESSION['edit-post'] = "Please select category";
    } elseif (!$body) {
        $_SESSION['edit-post'] = "Invalid Blog content";
    } else {
        //inserting new thumbnail if available
        if ($thumbnail['name']) {
            $previous_thumbnail_path = '../images/' . $previous_thumbnail_name;
            if ($previous_thumbnail_path) {
                unlink($previous_thumbnail_path);
            }

            // inserting new thumbnail
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
                    $_SESSION['edit-post'] = "File size too big, should be less than 2mb";
                }
            } else {
                $_SESSION['edit-post'] = "file should be png, jpg or jpeg";
            }
        }
    }

    if (isset($_SESSION['edit-post'])) {
        header('location: ' . 'index.php');
        die();
    } else {
        if ($is_featured == 1) {
            $zero_all_is_featured_query = "UPDATE posts SET is_featured=0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
        }

        // set thumbnail name if new one if available
        $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;

        // insert post into database
        $query = "UPDATE posts SET title='$title', body='$body', thumbnail='$thumbnail_to_insert',
        category_id=$category_id, is_featured=$is_featured WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

    }

    if (!mysqli_errno($connection)) {
        $_SESSION['edit-post-success'] = "Blog edited successfully";
    }
}

header('location: ' . 'index.php');
die();
