<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: logowanie.php');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <h3>DODAJ TASK'a</h3>
    <form action="dodaj.php" method="post"><br>
    <textarea name="tresc"></textarea>
    <input class="data" type="date" name="data"><br><br>
    <input type="submit" value="Prześlij">
    <br><br><br>
    </form>
    <?php           
        $i = 1;
        $con = mysqli_connect('localhost','root','','todolist');
        $email = $_SESSION['user'];
        $q = " SELECT tresc, data, id FROM lista WHERE nadawca = '$email'";
        $data=mysqli_query($con, $q);
        ?><table class="bok"><?php
        while ($row = mysqli_fetch_array($data)) { ?>
        <tr>
	        <?php 
                echo "<td> ".$i." Zadanie:"." </td>"; 
				echo "<td> ".$row['tresc']."</td>";
                echo "<td> ".$row['data']."</td>"; ?> 
			<td class="usun"> 
				<a href="usuwanie.php?usun_zadanie='<?php echo $row['id']?>'">x</a> 
        </td>
		</tr>
        <?php $i++; } ?>
        </table>
    </br><br>
    <b><a class="powrot" href="zalogowany.php">Powrot</a></b><br>
</body>
</html>