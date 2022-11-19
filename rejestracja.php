<?php
session_start();?>
<?php
        $pseudonim = $_POST['pseudonim'];
        $haslo = $_POST['haslo'];
        $haslo1= $_POST['haslo1'];
        $email = $_POST['email'];
        $tab = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
        $tab1 = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
        $tab2 = ['0','1','2','3','4','5','6','7','8','9'];
        $tab3 = ['`','!','@','#','$','%','^','&','*','(',')','_','-','+','=',':','|',';','.','?','ą','ń','ć','ś','ę','ó','ź','ż','ł','Ą','Ń','Ć','Ś','Ę','Ó','Ź','Ż','Ł'];

        function haslo($haslo, $tablica){
            $t = false;
            foreach(str_split($haslo) as $value){
                foreach($tablica as $char){
                    if($value == $char){
                        $t = true;
                        break;
                    }
                }
                if($t){
                    break;
                }
            }
            return $t;
        }

        if ($pseudonim!="" && $email !="" &&  $haslo !="" && $haslo1!=""){
            if($haslo==$haslo1){
                if(strlen($haslo)>8){
                    if(haslo($haslo, $tab) && haslo($haslo, $tab1) && haslo($haslo, $tab2) && haslo($haslo, $tab3)){
                        $con = mysqli_connect('localhost','root','','todolist');
                        $q = " INSERT INTO rejestracja
                               VALUES ('$pseudonim',MD5('$haslo'),'$email')";
                        mysqli_query($con, $q);
                        mysqli_close($con);
                        echo("ZAREJSTROWANO!!");
                        echo("<a href='todolist.php'><br>
                        Przejdź do Głownej Strony</a>");
                    }else{
                        echo("Błąd: Twoje haslo nie ma małej litery lub dużej lub cyfry lub znaku specjalnego <br>");
                    }
                }else{
                    echo("Haslo jest za krótkie");
                }
            }else{
                echo("Hasła są różne!!!");
            }
        }else{
            echo("Błąd nie uzupełniłeś pola!!!");
        }
?>