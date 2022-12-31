<?php
session_start();



include("../inc/dbconnection.php");

// Code pour calculer le score 

$req=$bdd->prepare("SELECT * FROM examuserquestionreponse WHERE iduser=? AND idexam=?");
    $req->execute((array($_SESSION['iduser'],$_SESSION['idexam'])));
    $a=0;
    while ($data = $req->fetch()){
        $nb_data = count($data);
        $a=$a+$data['point'];
        
    
    }
    $req31=$bdd->prepare("SELECT * FROM exam WHERE idexam =?");
    $req31->execute( array($_SESSION['idexam']) ) ;
    While($d31=$req31->fetch()){
        $titre=$d31['titre'];
        $pt=$d31['nombrequestion']*$d31['pointbonnereponse'];
    }
    if($a>=($pt/2)){
        $admission='vous etes admis';
    }
    else{
        $admission='vous n\'etes pas admis';
    }


$req2=$bdd->prepare("SELECT * FROM user WHERE iduser=?");
$req2->execute(array($_SESSION['iduser']));
$_SESSION['nom']=$req2->fetch()['nom'];

  

?>
<div style ="margin : auto;  margin-top : 300px; text-align : center; font-size : 1.5em; color : red;">
     <span style="color:blue;"> Merci de passer le test <span style="color:black; font-weight:bold;"><?php echo $_SESSION['nom'].', '.$admission;?>,</span> et votre Score est </span>: <?php echo $a; ?>
        <div style="margin-top:20px;"> <span><a  style="color:yellow; font-weight:bold; text-decoration :none;" href="resultat.php">Cliquez pour voir le resultat</a> </span> </div>
    </div>