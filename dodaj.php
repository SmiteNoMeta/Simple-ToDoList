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
        if ($_POST){
            $tresc = $_POST['tresc'];
            $email = $_SESSION['user'];
            $data = date('Y-m-d', strtotime($_POST['data']));

            if($tresc!=""){
                $con = mysqli_connect('localhost','root','','todolist');
                $q = " INSERT INTO lista VALUES ('$email','$tresc','$data','') ";
                mysqli_query($con, $q);
                mysqli_close($con);
                header('Location: lista.php');
            }
        }
    ?>
</body>
</html