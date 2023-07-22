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
    "?" => "", 
);

if(isset($_POST['action'])) {
    $title = $_POST['title'];
    $slug = strtolower(strtr($title, $cek));
    $body = $_POST['body'];
    $category = $_POST['category'];
    $date = date('Y-m-d');
    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $image_file = strtolower(strtr($title, $cek)) . ".jpg";

    if($_POST['action'] == 'add'){
    $query = mysqli_query($connect, "INSERT INTO post SET user_id='$_SESSION[user_id]', 
                                                            title='$title', 
                                                            body='$body', 
                                                            photo='$image_file', 
                                                            category='$category', 
                                                            date='$date', 
                                                            slug='$slug'");
    copy($temp, "../../assets/img/post/" . $image_file);

    header("location:  ../post.php");
    } else if($_POST['action'] == 'update') {
        $id = $_POST['id'];

        if(!empty($image)){
            $query = mysqli_query($connect, "UPDATE post SET user_id='$_SESSION[user_id]', 
                                                                title='$title', 
                                                                body='$body', 
                                                                photo='$image_file', 
                                                                category='$category', 
                                                                date='$date', 
                                                                slug='$slug' WHERE id='$id'");
            copy($temp, "../../assets/img/post/" . $image_file);
            
            header('location: ../post.php');
        } else {
            $query = mysqli_query($connect, "UPDATE post SET user_id='$_SESSION[user_id]', 
                                                                title='$title', 
                                                                body='$body', 
                                                                category='$category', 
                                                                date='$date', 
                                                                slug='$slug' WHERE id='$id'");
        }
        header('location: ../post.php');
    }

} else if(isset($_GET['action'])){
    $id = $_GET['id'];

    $data = mysqli_fetch_array(mysqli_query($connect, "SELECT photo FROM post WHERE id='$id'"));
    $image_file = $data['photo'];

    $query = mysqli_query($connect, "DELETE FROM post WHERE id='$id'");

    if (file_exists("../../assets/img/post/" . $image_file)) {
        unlink("../../assets/img/post/" . $image_file);
    }

    header("location: ../post.php");
}else {
    header("location: ../post.php");
}
?>