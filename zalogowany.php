<?php
session_start();
if(!isset($_SESSION['user'])) {
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
    Brawo udało ci się zalogować
    <br>
    Zobacz swoją TO-DO-LIST!
    <a href="lista.php">LISTA</a>
    <form action="zalogowany.php" method="POST">
        Czy checesz się wylogować? ( Kliknij dwa razy!!!:) )
        <input type="submit" name="tak">
    </form>

    <?php
    if($_POST){
        $wyl = $_POST['tak'];
        if($wyl){
            session_destroy();
        }
    }
    ?>
</body>
</html>