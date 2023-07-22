<?php
include('../config/connect.php');

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = mysqli_query($connect, "SELECT * FROM user WHERE email='$email' AND password='$password'");
    if(mysqli_num_rows($query)> 0){
        $data = mysqli_fetch_array($query);

        $_SESSION['user_id'] = $data['id'];
        header('location: ../blogger');
    } else {
        header('location: ../login.php');
    }
} else {
    header('location: ../login.php');
}