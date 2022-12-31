<?php
session_start();
    include("../inc/dbConnection.php");
 if(isset($_SESSION['idteacher'])){
            $idteacher=$_SESSION['idteacher'];
 }
            else{
                eader('Location:accueil.php');
            }

   if(isset($_POST['send']) && isset($_FILES['file'])){
            
                $tmpName = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                $size = $_FILES['file']['size'];
                $error = $_FILES['file']['error'];
            
                $tabExtension = explode('.', $name);
                $extension = strtolower(end($tabExtension));
            
                $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                $maxSize = 400000;
            
    if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
            
                    $uniqueName = uniqid('', true);
                    //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                    $file = $uniqueName.".".$extension;
                    //$file = 5f586bf96dcd38.73540086.jpg
            
                    move_uploaded_file($tmpName, '../upload/'.$file);
                    $req1=$bdd->prepare("SELECT COUNT(mail) AS nbre_mail FROM teacher WHERE mail=?  ");
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
            $image=$file;

            $req = $bdd->prepare("UPDATE teacher SET nom= ?, mail = ?, image=? WHERE idteacher = $idteacher");

            $req->execute(array($nom,$mail,$image));

            $req->closeCursor();
            header('Location:changeProfil.php?info= Enregistrer');
        }


    }       
      else{
          echo "Une erreur est survenue";
       }

}


    if(isset($_GET['info'])){?>

        <div style="text-align:center; color:green; font-size:1.5em;"><?php echo "Profil changé avec succès"; ?></div>
        <?php
    }
    
    if(isset($_GET['error'])){?>
    
        <div style="text-align:center; color:red; font-size:1.5em;"><?php echo " Saisi incorrect ou email déjà enrégistrée"; ?></div>
        <?php
    }
    
    
    
    
    ?>
    









<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification du profil de L'utilisateur</title>
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
input[type="text"]{
    border: 2px solid #000;
    border-radius: 5px;
	padding: 10px;
	width: 370px;
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
</head>
<body>
<div class="container-fluid">
        <div class="row">
        <form action="changeProfil.php" enctype="multipart/form-data" method="POST" style="margin:auto;">
        <fieldset>
            <legend>
            Change Profile
            </legend>
             
            

            <input type="hidden" name='send' value="send">

            <div class="form-group">
            <label for="nom">Nom :</label>
            <input class="form-control" type="text" name="nom" id="nom" placeholder="Tapez un nouveau nom complet ici ..."> 
            </div>
            <div class="form-group">
            <label for="e_mail">e-mail :</label>
            <input class="form-control" type="text" name="mail" id="e_mail" placeholder="Tapez une nouvelle votre adresse email ici ..."> 
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


    <div style="margin-left : 50px ; font-size: 1.5em; font-weight :bold;" >Return To<a  style="margin-left:5px;" href="accueil.php">Accueil</a></div>
</body>

</html>
   