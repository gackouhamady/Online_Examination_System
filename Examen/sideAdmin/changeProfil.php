<?php
session_start();
    include("../inc/dbConnection.php");

    if(isset($_SESSION['idadmin'])){
            $idadmin=$_SESSION['idadmin'];
        if(isset($_POST['send'])){
            $req1=$bdd->prepare("SELECT COUNT(mail) AS nbre_mail FROM admin WHERE mail=?");
            $req1->execute(array($_POST['mail']));
            $result=$req1->fetch();
            if($result['nbre_mail']>0){
                header("Location:changeProfil.php?error=email_existe");
            }

            elseif(empty($_POST['nom']) or empty($_POST['mail'])){
                header("Location:changeProfil.php?error=empty");

            }
            else{

            $nom=htmlspecialchars($_POST['nom']);
            $mail=htmlspecialchars($_POST['mail']);

            $req = $bdd->prepare("UPDATE admin SET nom= ?, mail = ? WHERE idadmin = $idadmin");

            $req->execute(array($nom,$mail));

            $req->closeCursor();
            header('Location:changeProfil.php?info= Enregistrer');
        }

    }
    }

    else{
    header('Location:accueilAdmin.php');
    }




if(isset($_GET['info'])){?>

    <div style="text-align:center; color:green; font-size:1.5em;"><?php echo "Profil changé avec succès"; ?></div>
    <?php
}

if(isset($_GET['error'])){?>

    <div style="text-align:center; color:red; font-size:1.5em;"><?php echo " Saisi incorrect ou email déjà enrégistré"; ?></div>
    <?php
}




?>









<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Modification du profil de L'utilisateur</title>
    <style>
        html{
    scroll-behavior: smoth;
}
legend{
    margin-bottom: 5px;
    font-weight: bold;
}
fieldset{
    border-radius: 20px;
    font-size: 1.5em;
    background-color:#f4f7f8;
    margin-top: 0px;
}

input[type="text"]{
     font-size: 1em;

}

input[type="text"]{
    border-radius: 10px;
	padding: 10px;
	width: 50%;
	background-color: #ffff;
	margin: 30px;
    
    
}

label{
    display:block;
    text-align: left;
    margin-right: 20px;
    color: green;
    font-size: 1.2em;
    
}
input[type="submit"],input[type="reset"]{
    position: relative;
    padding: 10px;
    margin: 30px;
    width: 60%;
    border-radius: 10px;
    font-size: 1em;
   
}
input[type="reset"]{
    background-color:green;
    color : white;
}
    </style>
</head>
<body>

<div class="container-fluid">
            <div class="row">


<form action="" method="POST" style="margin:auto;">       
<fieldset>
    <legend>
    Change profile
    </legend>
    <div class="form-group">
    <label for="nom">Nom :</label>
    <input type="hidden" name='send' value="send">
    <input class="form-control"  style="width:405px; font-size :1em;"type="text" name="nom" id="nom" placeholder="Tapez un nouveau nom complet ici ..."> 
    </div>
    <div  class="form-group">
    <label for="e_mail">Adresse Email:</label>
    <input class="form-control" type="text"  style="width:405px; font-size :1em;" name="mail" id="e_mail" placeholder="Tapez une nouvelle adresse email ici ..."> 
    </div>

    <div  class="form-group">
        <input class="form-control" type="submit" value="Envoyer">
        <input class="form-control" type="reset" value="Vider">
    </div>
</fieldset>
</form> 
            </div>
        </div>
    
    <div style="margin-left:50px; font-size : 1.5em;"><span>Return To </span><a style="margin-left:5px;" href="accueilAdmin.php">Accueil</a></div>
</body>

</html>
