<?php 
session_start();
include("../../inc/dbconnection.php");
if(isset($_SESSION['idquestion'])){
    $idquestion=$_SESSION['idquestion'];
if(isset($_POST['send'])){
if(empty($_POST['titre']) or empty($_POST['optionreponse'])){
    header("Location:modifierQuestion.php?error=empty");
}
else{
        $titre=htmlspecialchars($_POST['titre']);
        $optionreponse=htmlspecialchars($_POST['optionreponse']);
        $req=$bdd->prepare("UPDATE question  SET titre=?, optionreponse=? WHERE idquestion=$idquestion");      
        $req->execute(array( $titre,$optionreponse ));
        $req->closeCursor();
        header('Location:modifierQuestion.php?info= Enregistrer');
        
}
}

 ?>


    <?php
    if(isset($_GET['info'])){ ?>
        <div style="text-align:center; color :green; font: size 1.5em;"><?php echo "Question modifiée avec succès"; ?> </div>
    <?php }

}
else {
    header("Location:listeQuestion.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de la question</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
</head>
<body>
    <div class="container-fluid" style="margin-top:60px;">
        <div class="row">
            <form class="form" id="form" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" style="margin:auto;" >
                <div class="form-group">
                <input type="hidden" name='send' value="send">
                    <label for="titre">Tapez le titre de la question</label>
                    <input class="form-control" type="text" style="width:400px;" name="titre" id="titre"  placeholder="Tapez un nouveau titre">
                </div>
                <div class="form-group">
                <label for="select"> Selectionner une nouvelle option de reponse</label> 
                <select id="select" class="form-control" name="optionreponse" size="1" style="width:200px;"  placeholder=" Selectionner une nouvelle option de reponse">
                   
                    <option>1</option>
                    <option selected>2</option>
                    <option>3</option>
                    <option>4</option>
                    </select>
                </div>
           
                <div>
                <?php
    if(isset($_GET['error'])){ ?>
        <div style="text-align:center; color :red; font: size 1.5em;"><?php echo "Un champ vide ou <br/> Question est déjà enrégistrée 1"; ?> </div>
    <?php }


    ?>
                </div>
                <div class="form-group">
                    <input class="form-control" type="submit" style="width: 200px; margin : auto; font-weight : bold;" value="Modifier" name="submit" form="form"  >
                    <input type="reset" value="Actualiser" form="form"  style="width: 200px;background-color : green; color : white; margin : auto;" class="form-control">
                </div>

            </form>
            
        </div>
    </div>
    <div style="margin : 10px; font-size : 1.5em;"><span>Return To</span><a style="margin-left : 5px;" href="listeQuestion.php">Liste Question</a></div>
</body>
</html>