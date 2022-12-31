<?php
session_start();

?>











<!DOCTYPE html>
<html>
    <head>
        <meta-charset="utf-8"/>
        <title>Suppression de l'option</title>
    </head>
    <body>
        <?php
        $user="root";
        $mdp="";
        $db="examen";
        $server="localhost";
        $link=mysqli_connect($server,$user,$mdp,$db);
        if(isset($_POST['idoption'])){
            $id=$_POST['idoption'];
            $req=mysqli_query($link,"DELETE FROM option WHERE idoption=$id");
            if($req){
                header("Location:listeOption.php");
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