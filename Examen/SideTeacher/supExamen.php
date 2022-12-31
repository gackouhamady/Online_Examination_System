<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta-charset="utf-8"/>
        <title>Modification</title>
    </head>
    <body>
        <?php
        $user="root";
        $mdp="";
        $db="examen";
        $server="localhost";
        $link=mysqli_connect($server,$user,$mdp,$db);
        if(isset($_POST['idexam'])){
            $idexam=$_POST['idexam'];
            $req1=mysqli_query($link,"SELECT * FROM question WHERE idexam=$idexam");
            $total=mysqli_num_rows($req1);
            if(isset($total)){
                header("Location:listeExamen.php?error=exitse");
            }
            $req=mysqli_query($link,"DELETE FROM exam WHERE idexam=$idexam");
            if($req){
                header("Location:listeExamen.php");
            }
            else {
                echo "Erreur de Suppression";
            }
        }
        else{
            echo"Enregistrement non retrouvé";
        }    
        
        ?>
    </body>
</html>