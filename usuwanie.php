<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: logowanie.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['usun_zadanie'])) {
            $task_id = $_GET['usun_zadanie'];
            
            $con = mysqli_connect('localhost','root','','todolist'); 
            $q = " DELETE FROM lista WHERE id =". $task_id;
            mysqli_query($con, $q);
            mysqli_close($con);
            header('location: lista.php');
        }
    ?>
</body>
</html>