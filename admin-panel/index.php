<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP + MySql</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <?php
        $login=$_SESSION['login'];
        if ($login)
          {
          if ($login=='er login')
            {
            echo '<p>Че, самый умный чтоли?</p>';
            $_SESSION['login']='';
            exit;
            }
          else 
            $admin = true;
          }
        else {
            echo '<p>Че, самый умный чтоли?</p>';
            exit;
        }
        $mysql = new mysqli('localhost', 'root', 'Ag@16!,4zxFS', 'myclass');
        $mysql -> query("SET NAMES 'utf8'");
        $result = $mysql -> query("SELECT * FROM `classmates`");
    ?>
    <div class="container">
        <br><h1>Members</h1><br>
        <table border="1" class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Average Rating</th>
            </tr>
        <?php
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo '<td>'.$row["id"].'</td>';
                echo '<td>'.$row["name/subname"].'</td>';
                echo '<td>'.$row["phonenumber"].'</td>';
                echo '<td>'.$row["date"].'</td>';
                echo '<td>'.$row["primoc"].'</td>';
                echo "</tr>";
            }
        ?>
        </table><br>
        
        <h1>Add Member</h1><br>

        <form action="add_member.php" method="post">
            <input value="<?=$_SESSION['name']?>" type="text" name="name" placeholder="Name*" class="form-control">
            <div class="text-danger"><?=$_SESSION['error_name']?></div><br>
            <input value="<?=$_SESSION['phone']?>" type="tel" name="phone" placeholder="Phone*" class="form-control">
            <div class="text-danger"><?=$_SESSION['error_phone']?></div><br>
            <input value="<?=$_SESSION['av_ra']?>" type="number" name="av_ra" placeholder="Average rating* (max 5)" class="form-control">
            <div class="text-danger"><?=$_SESSION['error_av_ra']?></div><br>
            <input type="submit" name="submit" value="Submit" class="btn btn-success">
            <div class="text-success"><?=$_SESSION['success-text']?></div>
        </form><br>
        <h1>Delete Member</h1><br>
        <div class="text-danger">if you delete any member, please don't forget that the id doesn't change!</div><br>
        <form action="delete_member.php" method="post">
            <input type="number" name="id" class="form-control" placeholder="ID*">
            <div class="text-danger"><?=$_SESSION['error_id']?></div><br>
            <input type="submit" name="submit" value="Submit" class="btn btn-success">
            <div class="text-success"><?=$_SESSION['success-text-del']?></div>
        </form><br>
        <h1>Edit Member</h1><br>
        <h3>Edit Member ID</h3><br>
        <form action="edit_member_id.php" method="post">
            <input value="<?=$_SESSION['old_id']?>" type="number" name="old_id" class="form-control" placeholder="Old ID*">
            <div class="text-danger"><?=$_SESSION['error_id']?></div><br>
            <input value="<?=$_SESSION['new_id']?>" type="number" name="new_id" class="form-control" placeholder="New ID*">
            <div class="text-danger"><?=$_SESSION['error_id']?></div><br>
            <input type="submit" name="submit" value="Submit" class="btn btn-success">
            <div class="text-success"><?=$_SESSION['success-text-edit-id']?></div>
        </form><br>
        <h3>Edit Member Name</h3><br>
        <form action="edit_member_name.php" method="post">
            <input value="<?=$_SESSION['id']?>" type="number" name="id" class="form-control" placeholder="ID*">
            <div class="text-danger"><?=$_SESSION['error_id']?></div><br>
            <input value="<?=$_SESSION['new_name']?>" type="text" name="new_name" class="form-control" placeholder="New Name*">
            <div class="text-danger"><?=$_SESSION['error_name']?></div><br>
            <input type="submit" name="submit" value="Submit" class="btn btn-success">
            <div class="text-success"><?=$_SESSION['success-text-edit-name']?></div>
        </form><br>
        <h3>Edit Member Phone</h3><br>
        <form action="edit_member_phone.php" method="post">
            <input value="<?=$_SESSION['id']?>" type="number" name="id" class="form-control" placeholder="ID*">
            <div class="text-danger"><?=$_SESSION['error_id']?></div><br>
            <input value="<?=$_SESSION['new_tel']?>" type="tel" name="new_tel" class="form-control" placeholder="New Phone*">
            <div class="text-danger"><?=$_SESSION['error_tel']?></div><br>
            <input type="submit" name="submit" value="Submit" class="btn btn-success">
            <div class="text-success"><?=$_SESSION['success-text-edit-tel']?></div>
        </form><br>
        <h3>Edit Member Average Rating</h3><br>
        <form action="edit_member_av_ra.php" method="post">
            <input value="<?=$_SESSION['id']?>" type="number" name="id" class="form-control" placeholder="ID*">
            <div class="text-danger"><?=$_SESSION['error_id']?></div><br>
            <input value="<?=$_SESSION['new_av_ra']?>" type="number" name="new_av_ra" class="form-control" placeholder="New Average Rating*">
            <div class="text-danger"><?=$_SESSION['error_av_ra']?></div><br>
            <input type="submit" name="submit" value="Submit" class="btn btn-success">
            <div class="text-success"><?=$_SESSION['success-text-edit-av-ra']?></div>
        </form><br>
        <footer>MCC V. 1.6</footer>
    </div>
    <?php
        $mysql -> close();
    ?>
</body>
</html>

