<?php
session_start();
include("../inc/dbConnection.php");

if(isset($_SESSION['idadmin'])){
   $idadmin =$_SESSION['idadmin'];
if(isset($_POST['send'])){
    if(isset($_POST['password']) && isset($_POST['password_verif'])){
        $password=htmlspecialchars($_POST['password']);
        $password_verif=htmlspecialchars($_POST['password_verif']);
        if($password!=$password_verif){
           header("Location:changePasse.php?error=correspondance");
        }
        else{
           try {
            $req=$bdd->prepare("UPDATE admin SET password=$password WHERE idadmin=$idadmin");
            $req->execute();
           header("Location:changePasse.php?info=modifier");
           } catch (Exception $e) {
            $e->getMessage();
           }
        }

    }
    if(empty($_POST['password'])  or empty($_POST['password_verif'])){
        header("Location:changePasse.php?error=vide");
    }

}
}

else{
    header("Location:accueilAdmin.php");
}

?>
  <?php 
   if(isset($_GET['info'])){?>
    <div style="font-size:1.5em;color : darkgreen;text-align:center"><?php echo "Mot de Passe changé avec succès !"; ?></div>
    <?php
} ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changement de mot de passe </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
html{
    scroll-behavior: smooth;
}

fieldset{
    background-color:#f4f7f8 ;
    margin: 0px;
    border-radius:20px ;
    padding: 40px;
}

body{
    margin: auto;
    text-align: center;

}
input[type="password"]{
    margin-top: 40px;
    display: block;
    padding: 20px;
    margin: 20px;
    font-size : 1.2em;
    

}
input[type="submit"],input[type="reset"]{
    position: relative;
    width :60%;
    margin : 40px;
    border-radius: 10px;
    font-size : 1.2em;

}
input[type="reset"]{
    color: white;
    background-color : green;
}


</style>

    
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            
            
        <form action="" method="POST" id="form" style="margin:auto;">
        <fieldset>
                <legend>Change Password</legend>
        <input type="hidden" name="send" value="send">
        <div class="form-group">
            <input class="form-control" style="width:310px;" type="password" name="password"  placeholder="Tapez le nouveau mot de passe"> <br>
       </div>
      
        <div class="form-group">
            <input class="form-control" style="width:310px;" type="password" name="password_verif"  placeholder="Confirmez le mot de passe"> <br>
        </div>
        <?php  if(isset($_GET['error'])){?>
    <div style="font-size:1.5em;color : red; margin-bottom:30px"><?php echo "Champs Vides ou Non correspondants <br/> ou password contient des caractères  !"; ?></div>
    <?php
} ?>
       <div class="form-group">
       <input type="submit" class="form-control" value="Envoyer" form="form">
       <input type="reset" class="form-control" value="Actualiser" form="form">
       </div>
       </fieldset>
    </form>
        </div>
    </div>
    
       
    
    <div style="text-align:left; margin-left:50px; font-size:1.5em;"><span>Return To</span><a style="margin-left:5px;"href="accueilAdmin.php">Accueil</a></div>
</body>
</html>



