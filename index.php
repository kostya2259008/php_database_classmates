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
        session_start();
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

        <form action="authorization.php" method="post">
            <input name="login" placeholder="Admin Login" class="form-control"><br>
            <input type="password" name="password" placeholder="Admin Password" class="form-control"><br>
            <input type="submit" value="Войти" class="btn btn-success">
        </form><br>
        <footer>MСС V. 1.6</footer>
    </div>
    <?php
        $mysql -> close();
    ?>
</body>
</html>

