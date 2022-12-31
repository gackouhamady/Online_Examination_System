<?php

    session_start();

    include("../inc/dbConnection.php");

    if(isset($_POST['send'])){

        $mail=htmlspecialchars($_POST['mail']);
        $password=htmlspecialchars($_POST['password']);
       

        $req=$bdd->prepare('SELECT COUNT(mail) AS nbre_mail FROM teacher WHERE mail=? AND password=?');
        $req->execute(array($_POST['mail'],$_POST['password']));
        $result1=$req->fetch();
        $req1=$bdd->prepare('SELECT COUNT(password) AS nbre_pass FROM teacher WHERE  mail=? AND password=?');
        $req1->execute(array($_POST['mail'],$_POST['password']));
        $result2=$req1->fetch();
    if($result1['nbre_mail']>0 && $result2['nbre_pass']>0){
        $req2=$bdd->prepare("SELECT * FROM teacher WHERE mail=? AND password=?");
        $req2->execute(array($mail,$password));
           if($req2->rowCount()>0){
            while ($a = $req2->fetch()) {
                $t=count($a);
                for ($i=0; $i < $t ; $i++) { 
                $_SESSION['idteacher']=$a['idteacher'];
                $_SESSION['nom']=$a['$nom'];
                $_SESSION['$mail']=$mail;
                $_SESSION['password']=$password;
            }
            
        }
    }
        header("Location:accueil.php");
        
    }
    

  else{
    ?>
<div style="color :red; font-size:1.5em; text-align:center;" ><?php echo "Votre Mot de passe ou Mail est incorrect !! "; ?></div>
<?php  
}
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConnexionUser</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        fieldset{
    background-color:#f4f7f8 ;
    margin: 20px;
    border-radius:20px ;
    padding: 40px;
}
input[type="text"],input[type="password"]{
    border: 2px solid #000;
    height:50px;
    margin: auto;
    padding: 20px;
    border-radius: 10px; 
    font-size: 1.2em;
}
label{
    display: block;
    font-weight: bold;
    text-align: left;
    margin-top: 0px;
    font-size: 1.5em;
}
legend{
    font-weight: bold;
    font-size: 1.5em;
}
input[type="submit"]{
    font-weight: bold;
}
input[type="reset"]{
    font-weight: bold;
    color :white;
    background-color: green;
    margin-top : 10px;
}
    </style>
</head>
<body>
<div class="container-fluid">
        <div class="row">
        <form action="" method="POST" style="margin:auto;">

<fieldset>
    <legend>Connection</legend>
    
     <input type="hidden" name="send" value="send">
     <div class="form-group">
        <label for="e_mail">e-mail</label> <br>
        <input class="form-control" type="text" name="mail" id="e_mail" placeholder="Saisir mail">
    </div class="form-group">

    <div class="form-group" >
        <label for="mot">Mot de passe</label> <br>
        <input class="form-control" type="password" name="password" id="mot"  placeholder="Saisir mot de passe">
    </div class="form-group">
    <a href="passwordOublier.php" style="font-size:1.2em;">Mot de passe oublié</a>
    <div class="form-group">
    <input class="form-control" type="submit" value="Se connecter">
    <input class="form-control" type="reset" value="Renitialiser">
    </div>

</fieldset>
</form>
        </div>
    </div>
    
    <div style=" text-align:left;margin-left:50px; font-size:1.5em;"><span>Return To </span><a style="font-size:1.2em;"  href="index.php"> register</a></div>
</body>
</html>