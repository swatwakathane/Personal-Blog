<?php
require 'config/database.php';

// Get signup form data after clicking on submit
if(isset($_POST['submit'])){
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

    // validate input values
    if(!$firstname){
        $_SESSION['signup'] = "Please enter your First Name";
    } elseif (!$lastname){
        $_SESSION['signup'] = "Please enter your Last Name";
    } elseif (!$username){
        $_SESSION['signup'] = "Please enter your Username";
    } elseif (!$email){
        $_SESSION['signup'] = "Please enter a Valid Email!";
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8){
        $_SESSION['signup'] = "Please enter strong password above 8 characters";
    } elseif (!$avatar['name']){
        $_SESSION['signup'] = "Please Select an Avatar";
    } else {
        // checking for valid passwords
        if($createpassword !== $confirmpassword){
            $_SESSION['signup'] = "Passwords do not match";
        } else {
            // hash password
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);
            
            //check for username already existed in database
            $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if(mysqli_num_rows($user_check_result) > 0){
                $_SESSION['signup '] = "Username or Email Already Exist";
            }
            else {
                // Rename avatar
                $time = time();
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = 'images/' . $avatar_name;

                // check if file is an image
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extension = explode('.', $avatar_name);
                $extension = end($extension);

                if(in_array($extension, $allowed_files)) {
                    // make sure that image is not too large i.e 1mb
                    if($avatar['size'] < 1000000){
                        //upload successful
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    }
                    else{
                        $_SESSION['signup'] = "File size should be less than 1mb";
                    }
                }
                else{
                    $_SESSION['signup'] = "File should be png, jpg, or jpeg";
                }
            }
        }
    }
    // redirect if any error occurs
     if($_SESSION['signup']){
        $_SESSION['signup-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signup.php');
        die();
     } else {
        $inset_user_query = "INSERT INTO users SET firstname='$firstname', lastname='$lastname', username='$username',
         email='$email', password='$hashed_password', avatar='$avatar_name', is_admin=0";
         $insert_user_result = mysqli_query($connection, $inset_user_query);
     }

     if (!mysqli_errno($connection)) {
        // redirect to login page
        $_SESSION['signup-success'] = "Registration successful, Please log in!";
        header('location: ' . ROOT_URL . 'signin.php');
        die();
     }

}
else{
    // if button is not set the bounce back to signup page
    header('location: ' . ROOT_URL . 'signup.php');
    die();
}