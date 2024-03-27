<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    //fetch user from database
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
    $firstname = $user['firstname'];
    $lastname = $user['lastname'];

    if (mysqli_num_rows($result) == 1) {
        $avatar_name = $user['avatar'];
        $avatar_path = '../images/' . $avatar_name;

        //delete image if available
        if ($avatar_path) {
            unlink($avatar_path);
        }
    }

    // delete post and thumbnails data
    $thumbnail_query = "SELECT thumbnail FROM posts WHERE author_id=$id";
    $thumbnail_result = mysqli_query($connection, $thumbnail_query);
    if (mysqli_num_rows($thumbnail_result) > 0) {
        while ($thumbnail = mysqli_fetch_assoc($thumbnail_result)) {
            $thumbnail_path = '../images/' . $thumbnail['thumbnail'];
            //delete thumbnail of blog
            if ($thumbnail_path) {
                unlink($thumbnail_path);
            }
        }
    }

    // delete user data from server
    $delete_user_query = "DELETE FROM users WHERE id=$id";
    $delete_user_result = mysqli_query($connection, $delete_user_query);
    if (mysqli_errno($connection)) {
        $_SESSION['delete-user'] = "User $firstname $lastname not deleted, Please Try again!";
    } else {
        $_SESSION['delete-user-success'] = "User $firstname $lastname deleted successfully!";
    }
}

header('location: ' . ROOT_URL . 'admin/manage-users.php');
die();
