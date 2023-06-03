<?php
session_start();
unset($_SESSION['error_id']);
$mysql = new mysqli('localhost', 'root', 'Ag@16!,4zxFS', 'myclass');
$mysql -> query("SET NAMES 'utf8'");
//$result = $mysql -> query("SELECT * FROM `classmates`");
//$res = $mysql -> query("SELECT id FROM `classmates`");
//$number = $res->num_rows;

unset($_SESSION['old_id']);
unset($_SESSION['new_id']);

$user_old_id = $_POST['old_id'];
$user_new_id = $_POST['new_id'];


function redirect() {
    header('location: ./');
    exit;
}

$_SESSION['old_id'] = $user_old_id;
$_SESSION['new_id'] = $user_new_id;

if ($user_old_id < 1 || $user_old_id == "" || $user_new_id < 1 || $user_new_id == "") {
    $_SESSION['error_id'] = 'Incorrect ID!';
    $mysql -> close();
    redirect();
} else {
    $mysql -> query("UPDATE `classmates` SET `id` = '$user_new_id' WHERE `id` = '$user_old_id'");
    $mysql -> close();
    $_SESSION['success-text-edit-id'] = 'Cuccessfuly Edit 1 Object';
    redirect();
}