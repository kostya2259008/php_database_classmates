<?php
session_start();
unset($_SESSION['error_id']);
$mysql = new mysqli('localhost', 'root', 'Ag@16!,4zxFS', 'myclass');
$mysql -> query("SET NAMES 'utf8'");
//$result = $mysql -> query("SELECT * FROM `classmates`");
//$res = $mysql -> query("SELECT id FROM `classmates`");
//$number = $res->num_rows;

unset($_SESSION['id']);
unset($_SESSION['new_name']);

$user_id = $_POST['id'];
$user_new_name = $_POST['new_name'];


function redirect() {
    header('location: ./');
    exit;
}

$_SESSION['id'] = $user_id;
$_SESSION['new_name'] = $user_new_name;

if ($user_id < 1 || $user_id == "") {
    $_SESSION['error_id'] = 'Incorrect ID!';
    $mysql -> close();
    redirect();
} else if (strlen($user_new_name) <= 1) {
    $_SESSION['error_name'] = 'Incorrect Name!';
    $mysql -> close();
    redirect();
} else {
    $mysql -> query("UPDATE `classmates` SET `name/subname` = '$user_new_name' WHERE `id` = '$user_id'");
    $mysql -> close();
    $_SESSION['success-text-edit-name'] = 'Cuccessfuly Edit 1 Object';
    redirect();
}