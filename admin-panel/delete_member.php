<?php
session_start();
unset($_SESSION['error_id']);
$mysql = new mysqli('localhost', 'root', 'Ag@16!,4zxFS', 'myclass');
$mysql -> query("SET NAMES 'utf8'");
$result = $mysql -> query("SELECT * FROM `classmates`");
$res = $mysql -> query("SELECT id FROM `classmates`");
$number = $res->num_rows;

$user_id = $_POST['id'];

function redirect() {
    header('location: ./');
    exit;
}

$_SESSION['id'] = $user_id;

if ($user_id < 1 || $user_id == "") {
    $_SESSION['error_id'] = 'Incorrect ID!';
    $mysql -> close();
    redirect();
} else {
    $mysql -> query("DELETE FROM `classmates` WHERE id = $user_id");
    $mysql -> close();
    $_SESSION['success-text-del'] = 'Cuccessfuly Deleted 1 Object Form "Memebers"';
    redirect();
}