<?php
include('../config/connect.php');

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);


    $query = mysqli_query($connect, "INSERT INTO user SET name='$name', email='$email', password='$password'");
    if($query){
        $data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM user WHERE email='$email' AND password='$password'"));

        $_SESSION['user_id'] = $data['id'];
        header('location: ../blogger');
    } else {
        header('location: ../register.php');
    }
} else {
    header('location: ../register.php');
}