<?php include('../../config/connect.php');

if(!isset($_SESSION['user_id'])) {
    header('location: ../login.php');
}

$cek = array(
    " " => "-", 
    ":" => "", 
    "," => "", 
    "." => "", 
    "-" => "", 
    "/" => "", 
    "'" => "", 
    '"' => "", 
    "`" => "", 
);

if(isset($_POST['action'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $photo = $_FILES['photo']['name'];
    $temp = $_FILES['photo']['tmp_name'];
    $photo_file = strtolower(strtr($email, $cek)) . ".jpg";


    if(!empty($photo)){
        if($password != ""){
            $query = mysqli_query($connect, "UPDATE user SET  name='$name', 
                                                            email='$email', 
                                                            photo='$photo_file', 
                                                            password='$password' WHERE id='$_SESSION[user_id]'");
        }else {
            $query = mysqli_query($connect, "UPDATE user SET  name='$name', 
                                                            email='$email', 
                                                            photo='$photo_file' WHERE id='$_SESSION[user_id]'");
        }
        copy($temp, "../../assets/img/user/" . $photo_file);
        
        header('location: ../profile.php');
    } else {
        if($password != ""){
            $query = mysqli_query($connect, "UPDATE user SET  name='$name', 
                                                            email='$email',
                                                            password='$password' WHERE id='$_SESSION[user_id]'");
        }else {
            $query = mysqli_query($connect, "UPDATE user SET  name='$name', email='$email' WHERE id='$_SESSION[user_id]'");
        }
        
        header('location: ../profile.php');
    }
    header('location: ../profile.php');
} else {
    header("location: ../profile.php");
}
?>