<?php
session_start();
if(isset($_POST['sub'])){
        $nom=htmlspecialchars($_POST['nom']);
        $mail=htmlspecialchars($_POST['mail']);
        $password=htmlspecialchars($_POST['password']);
        $req2=$bdd->prepare("SELECT * FROM admin WHERE nom=? AND mail=? AND password=? ");
        $req2->execute(array($nom,$mail,$password));
        if($req2->rowCount()>0){
            $_SESSION['nom']=$nom;
            $_SESSION['$mail']=$mail;
            $_SESSION['password']=$password;
            $_SESSION['idadmin']=$req2->fetch()['idadmin'];
        }
}

if(isset($_GET['error']) && $_GET['error']=='empty'){ ?>
    <div style="text-align:center; font-size :1.5em; color :red;"> <?php echo "Saisi incorrect ou e-mail dejà enregistré  <br/>"; ?></div>
<?php }

elseif(isset($_GET['error']) && $_GET['error']=='admin_atteinte'){ ?>
    <div style="text-align:center; font-size :1.5em; color :red;"> <?php echo "Pour des raisons de sécurité !<br/> Ce systeme ne permet pas l'enregistrement de plusieurs administrateurs !! <br/>"; ?></div>
<?php }
   
?>













<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Enregistrement de L'administrateur</title>
    <style>
        fieldset{
    background-color:#f4f7f8 ;
    margin: 20px;
    border-radius:20px ;
    padding-left: 40px;
    padding-right: 40px;
}
legend{
    margin-bottom: 10px;
    font-weight: bold;
}
input[type="text"], input[type="password"]{
    border: 2px solid #000;
    border-radius: 5px;
	padding: 10px;
	width: 300px;
    height: 50px;
	background-color: #ffff;
	margin: 20px;
    font-size: 1.2em;
    
    
}
label{
    display:block;
    text-align: left;
    margin-right: 20px;
    color: green;
    font-weight: bold;
    font-size: 1.2em;
    
}
input[type="submit"],input[type="reset"]{
    position: relative;
    padding: 10px;
    margin: 20px;
    width: 60%;
    border-radius: 10px;
    font-size: 1.2em;
}
input[type="reset"]{
    background-color:green;
    color : white;
}
    </style>
</head>
<body>
    
        <?php
        if(isset($_GET['info'])){?>
          <div style="text-align:center; color: green; font-size:1.5em"> <?php echo"Administrateur enregistré avec  succès <br/>"; ?></div>  
        <?php
        }  ?>
        <div class="container">
            <div class="row">
            <form action="enregistrer.php" method="POST" id="form" style="margin:auto;">
        <fieldset>
            <legend> Enregistrement </legend>
            
            <input type="hidden" name='send' value="send">
             
            <div class="form-group">
            <label for="nom" id="nom">Nom :    </label>
            <input class="form-control" type="text" name="nom" id="nom" placeholder="Tapez votre nom complet ici ..."> 
            </div>

            <div class="form-group">
            <label for="e_mail">Adresse email :</label>
            <input class="form-control" type="text" name="mail" id="e_mail" placeholder="Tapez votre adresse email"> 
            </div>

            <div class="form-group">
            <label for="mot_de_passe">mot de passe :</label>
            <input class="form-control" type="password" name="password" id="mot_de_passe" placeholder="Tapez votre mot de passe ici ..."> 
            </div>

            <div class="form-group">
                <input class="form-control" type="reset" value="Vider"  form="form" >
                <input class="form-control" type="submit" value="Envoyer" name="sub" form="form" >
            </div>
        </fieldset>
    </form>
      
            </div>
        </div>
        <div style="margin-left:50px; font-size:1.3em;" >Return to<a style="margin-left:5px;" href="index.php">Connect</a></div>
</body>
</html>
