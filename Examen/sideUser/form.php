<?php
session_start();
    
?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement de L'utilisateur</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
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
	margin: 10px;
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
    margin: 10px;
    width: 60%;
    border-radius: 10px;
    font-size: 1.2em;
}
input[type="reset"]{
    background-color:green;
    color : white;
}
    </style>
<body>
<?php
        if(isset($_GET['info'])){?>
          <div style="text-align:center; color: green; font-size:1.5em"> <?php echo"Utilisateur enregistré avec  succès <br/>"; ?></div>  
        <?php
        }
        if(isset($_GET['error'])){ ?>
                      <div style="text-align:center; font-size :1.5em; color :red;"> <?php echo "Saisi incorrect ou e-mail dejà enregistré  <br/>"; ?></div>
        <?php }
        ?>
        
    <div class="container-fluid">
        <div class="row">
        <form action="enregistrer.php" enctype="multipart/form-data" method="POST" style="margin:auto;">
        <fieldset>
            <legend>
            Enregistrement
            </legend>
             
            

            <input type="hidden" name='send' value="send">

            <div class="form-group">
            <label for="nom">Nom :</label>
            <input class="form-control" type="text" name="nom" id="nom" placeholder="Tapez votre nom complet ici ..."> 
            </div>
            <div class="form-group">
            <label for="e_mail">e-mail :</label>
            <input class="form-control" type="text" name="mail" id="e_mail" placeholder="Tapez votre adresse email ici ..."> 
            </div>

            <div class="form-group">     
            <label for="mot_de_passe">mot de passe :</label>
            <input  class="form-control" type="password" name="password" id="mot_de_passe" placeholder="Tapez votre mot de passe ici..."> 
            </div>

            <div class="form-group" >
            <label for="image">image :</label>
            <input  class="form-control" type="file" name="file" id="image"> 
            </div>

            <div class="form-group">
                <input class="form-control" type="submit" name="sub" value="Envoyer">
            </div>
            <div class="form-group">
                <input class="form-control" type="reset"  value="Vider">
            </div>
        </fieldset>
    </form>
        </div>
    </div>


    <div style="margin-left : 50px ; font-size: 1.5em;" >Return To<a  style="margin-left:5px;" href="index.php">Connect</a></div>
</body>

</html>
