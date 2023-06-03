<?php
session_start();
unset($_SESSION['error_id']);
$mysql = new mysqli('localhost', 'root', 'Ag@16!,4zxFS', 'myclass');
$mysql -> query("SET NAMES 'utf8'");
//$result = $mysql -> query("SELECT * FROM `classmates`");
//$res = $mysql -> query("SELECT id FROM `classmates`");
//$number = $res->num_rows;

unset($_SESSION['id']);
unset($_SESSION['new_av_ra']);

$user_id = $_POST['id'];
$user_new_av_ra = $_POST['new_av_ra'];


function redirect() {
    header('location: ./');
    exit;
}

$_SESSION['id'] = $user_id;
$_SESSION['new_av_ra'] = $user_new_av_ra;

if ($user_id < 1 || $user_id == "") {
    $_SESSION['error_id'] = 'Incorrect ID!';
    $mysql -> close();
    redirect();
} else if ($user_new_av_ra < 1 || $user_new_av_ra > 5) {
    $_SESSION['error_av_ra'] = 'Incorrect Average Rating!';
    $mysql -> close();
    redirect();
} else {
    $mysql -> query("UPDATE `classmates` SET `primoc` = '$user_new_av_ra' WHERE `id` = '$user_id'");
    $mysql -> close();
    $_SESSION['success-text-edit-av-ra'] = 'Cuccessfuly Edit 1 Object';
    redirect();
}