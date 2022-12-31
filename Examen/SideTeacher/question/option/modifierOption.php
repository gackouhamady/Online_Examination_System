<?php 
session_start();
include("../../../inc/dbconnection.php");
if(isset($_SESSION['idoption'])){
    $idoption=$_SESSION['idoption'];
if(isset($_POST['send'])){
if(empty($_POST['titre'])){
    header("Location:modifierOption.php?error=empty");
}
else{
        $titre=htmlspecialchars($_POST['titre']);
        $req=$bdd->prepare("UPDATE option  SET titre=? WHERE idoption=$idoption");      
        $req->execute(array( $titre ));
        $req->closeCursor();
        header('Location:modifierOption.php?info= modifier');
        
}
}

 ?>


    <?php
    if(isset($_GET['info'])){ ?>
        <div style="text-align:center; color :green; font: size 1.5em;"><?php echo "Option modifiée avec succès"; ?> </div>
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
    <link rel="stylesheet" href="../../../css/bootstrap.css">
</head>
<body>
    <div class="container-fluid" style="margin-top:60px;">
        <div class="row">
            <form class="form" id="form" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" style="margin:auto;" >
                <div class="form-group">
                <input type="hidden" name='send' value="send">
                    <label for="titre">Tapez le titre de l'option</label>
                    <input class="form-control" type="text" style="width:400px;" name="titre" id="titre"  placeholder="Tapez un nouveau titre">
                </div>
                <div>
                <?php
    if(isset($_GET['error'])){ ?>
        <div style="text-align:center; color :red; font: size 1.5em;"><?php echo "Un champ vide ou <br/> Option est déjà enrégistrée 1"; ?> </div>
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
    <div style="margin : 10px; font-size : 1.5em;"><span>Return To</span><a style="margin-left : 5px;" href="listeOption.php">Liste Option</a></div>
</body>
</html>