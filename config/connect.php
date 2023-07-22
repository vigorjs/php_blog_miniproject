<?php
session_start();
$connect = new mysqli("localhost", "root", "", "db_blog");

if ($connect->connect_errno) {
  echo "Failed to connect to MySQL: " . $connect->connect_error;
  exit();
}

?>