<?php
session_start();

?>











<!DOCTYPE html>
<html>
    <head>
        <meta-charset="utf-8"/>
        <title>Suppression de l'enrollement</title>
    </head>
    <body>
        <?php
        $user="root";
        $mdp="";
        $db="examen";
        $server="localhost";
        $link=mysqli_connect($server,$user,$mdp,$db);
        if(isset($_POST['idenrollement']) && isset($_POST['iduser'])){
            $idenrollement=htmlspecialchars($_POST['idenrollement']);
            $iduser=htmlspecialchars($_POST['iduser']);

            $req2=mysqli_query($link,"DELETE FROM examuserquestionreponse WHERE iduser=$iduser");
            $req=mysqli_query($link,"DELETE FROM enrollement WHERE idenrollement=$idenrollement");
            
            if($req){
                header("Location:listeenrollement.php");
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