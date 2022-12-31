<?php
session_start();

?>











<!DOCTYPE html>
<html>
    <head>
        <meta-charset="utf-8"/>
        <title>Suppression de question</title>
    </head>
    <body>
        <?php
        $user="root";
        $mdp="";
        $db="examen";
        $server="localhost";
        $link=mysqli_connect($server,$user,$mdp,$db);
        if(isset($_POST['idquestion'])){
            $id=$_POST['idquestion'];
            $req1=mysqli_query($link,"SELECT * FROM option WHERE idquestion=$id");
            $total=mysqli_num_rows($req1);
            if(isset($total)){
                header("Location:listeQuestion.php?error=exitse");
            }
            $req=mysqli_query($link,"DELETE FROM question WHERE idquestion=$id");
            if($req){
                header("Location:listeQuestion.php");
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