<?php
session_start(); // Ensure session is started for $_SESSION to work
include('config/dbcon.php');

// -------------------- Add User -------------------- //
if (isset($_POST['addUser'])) {
    $name     = mysqli_real_escape_string($con, $_POST['name']);
    $phone    = mysqli_real_escape_string($con, $_POST['phone']);
    $email    = mysqli_real_escape_string($con, $_POST['email']);
    $password = md5($_POST['password']); // Encrypting password (optional)

    // Prevent duplicates
    $check = "SELECT * FROM users WHERE email = '$email' OR phone = '$phone'";
    $check_run = mysqli_query($con, $check);
    if (mysqli_num_rows($check_run) > 0) {
        $_SESSION['status'] = "User already exists!";
        header("Location: registered.php");
        exit();
    }

    // Insert query
    $user_query = "INSERT INTO users(name, phone, email, password) VALUES('$name', '$phone', '$email', '$password')";
    $user_query_run = mysqli_query($con, $user_query);

    if ($user_query_run) {
        $_SESSION['status'] = "User Added Successfully";
    } else {
        $_SESSION['status'] = "User Registration Failed";
    }
    header("Location: registered.php");
    exit();
}

// -------------------- Update User -------------------- //
if (isset($_POST['updateUser'])) {
    $user_id  = $_POST['user_id'];
    $name     = mysqli_real_escape_string($con, $_POST['name']);
    $phone    = mysqli_real_escape_string($con, $_POST['phone']);
    $email    = mysqli_real_escape_string($con, $_POST['email']);
    $password = md5($_POST['password']); // Optional encryption

    $query = "UPDATE users SET name='$name', phone='$phone', email='$email', password='$password' WHERE id='$user_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['status'] = "User Updated Successfully";
    } else {
        $_SESSION['status'] = "User Update Failed";
    }
    header("Location: registered.php");
    exit();
}
?>
