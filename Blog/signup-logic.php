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
            
        }
    }
}
else{
    header('location: ' . ROOT_URL . 'signup.php');
    die();
}