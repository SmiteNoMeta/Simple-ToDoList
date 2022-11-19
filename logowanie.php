<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="logowanie.php" method="post">
        <h1>Logowanie</h1>
        Podaj login: <input type="text" name="log"><br>
        Podaj haslo: <input type="password" name="haslo"><br>
        <input type="submit" value="Zaloguj sie">
    </form>
    <?php
    if ($_POST){
        $log = $_POST['log'];
        $haslo = $_POST['haslo'];
        if($log!="" && $haslo!=""){
            $con = mysqli_connect('localhost','root','','todolist');
            $q = " SELECT pseudonim, email, haslo FROM rejestracja WHERE haslo = MD5('$haslo') AND email = '$log' ";
            $_SESSION['user'] = $log;
            $data = mysqli_query($con, $q);
            while($row = mysqli_fetch_array($data)){
                $p = $row['pseudonim'];
                $e = $row['email'];
                $h = $row['haslo'];
                echo "<a href='zalogowany.php'>Dalej</a>";
            }
            mysqli_close($con);
        }
    }