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
        if(isset($_POST['iduser'])){
            $id=$_POST['iduser'];
            $req=mysqli_query($link,"DELETE FROM enrollement WHERE iduser=$id");
            $req2=mysqli_query($link,"DELETE FROM examuserquestionreponse WHERE iduser=$id");
            $req3=mysqli_query($link,"DELETE FROM user WHERE iduser=$id");
            if($req && $req2 && $req3){
                header("Location:user.php?info=effacer");
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