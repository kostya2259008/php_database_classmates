<?php
    session_start();

    $mysql = new mysqli('localhost', 'root', 'Ag@16!,4zxFS', 'myclass');
    $mysql -> query("SET NAMES 'utf8'");
    $result = $mysql -> query("SELECT * FROM `classmates`");
    $res = $mysql -> query("SELECT id FROM `classmates`");
    $number = $res->num_rows + 1;

    unset($_SESSION['name']);
    unset($_SESSION['phone']);
    unset($_SESSION['av_ra']);

    unset($_SESSION['error_name']);
    unset($_SESSION['error_phone']);
    unset($_SESSION['error_av_ra']);

    unset($_SESSION['success-text']);

    function redirect() {
        header('location: ./');
        exit;
    }

    $user_name = htmlspecialchars(trim($_POST['name']));
    $user_phone = htmlspecialchars(trim($_POST['phone']));
    $user_av_ra = htmlspecialchars(trim($_POST['av_ra']));

    $_SESSION['name'] = $user_name;
    $_SESSION['phone'] = $user_phone;
    $_SESSION['av_ra'] = $user_av_ra;

    if (strlen($user_name) <= 1 || $user_name == "") {
        $_SESSION['error_name'] = 'Enter Correct Name!';
        $mysql -> close();
        redirect();
    } else if (strlen($user_phone) <= 10 || $user_phone == "") {
        $_SESSION['error_phone'] = 'Enter Correct Phone Number!';
        $mysql -> close();
        redirect();
    } else if ($user_av_ra < 1 || $user_av_ra > 5 || $user_av_ra == "") {
        $_SESSION['error_av_ra'] = 'Enter Correct Average Rating!';
        $mysql -> close();
        redirect();
    } else {
        $mysql -> query("INSERT INTO `classmates` (`name/subname`, `phonenumber`, `primoc`, `id`) VALUES('$user_name', '$user_phone', '$user_av_ra', '$number')");

        $_SESSION['success-text'] = 'Cuccessly Edit Member List!';
        $mysql -> close();
        redirect();
    }