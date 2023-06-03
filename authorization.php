<?php
session_start();
$login=$_POST['login'];
$pas=$_POST['password'];
if ($login == 'admin' && $pas == 'Ag@16!,4zxFS') {
    $_SESSION['login']=$login;
    header("Location: ./admin-panel");
}
else {
    $_SESSION['login']='er login';
    header("Location: index.php");
}