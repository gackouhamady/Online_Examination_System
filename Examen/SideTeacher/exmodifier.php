<?php 
session_start();
include("../inc/dbconnection.php");
if(isset($_SESSION['idexam'])){
    $idexam=$_SESSION['idexam'];
if(isset($_POST['send'])){
if(empty($_POST['titre']) or empty($_POST['date']) or  empty($_POST['duree']) or empty($_POST['nombrequestion']) or empty($_POST['pointbonnereponse'])){
    header("Location:exmodifier.php?error=empty");
}
else{
        $titre=htmlspecialchars($_POST['titre']);
        $date=htmlspecialchars($_POST['date']);
        $duree=htmlspecialchars($_POST['duree']);
        $nombrequestion=htmlspecialchars($_POST['nombrequestion']);
        $pointbonnereponse=htmlspecialchars($_POST['pointbonnereponse']);
        $pointmauvaisereponse=htmlspecialchars($_POST['pointmauvaisereponse']);
        $req=$bdd->prepare("UPDATE exam  SET titre=?, date=?, duree=?,nombrequestion=?,pointbonnereponse=?,pointmauvaisereponse=? WHERE idexam=$idexam");      
        $req->execute(array( $titre,$date,$duree,$nombrequestion,$pointbonnereponse,$pointmauvaisereponse ));
        $req->closeCursor();
        header('Location:exmodifier.php?info= Enregistrer');
        
}
}

 ?>


    <?php
    if(isset($_GET['info'])){ ?>
        <div style="text-align:center; color :green; font: size 1.5em;"><?php echo "Examen modifié avec succès"; ?> </div>
    <?php }

}
else {
    header("Location:listeExamen.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de l'examen</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
         span{
            position:fixed;
            right:10px;
        }
        a{
            text-decoration:none;
        }
        a:hover{
            text-decoration:none;
        }


    </style>
</head>
<body>
    <h1><span><a href="listeExamen.php">Return</a></span></h1>
    <?php
        $user="root";
        $mdp="";
        $db="examen";
        $server="localhost";
        $link=mysqli_connect($server,$user,$mdp,$db);
        $req=mysqli_query($link,"SELECT *  FROM exam WHERE idexam=$idexam");
        while($res=mysqli_fetch_array($req)){
        ?>

    <div class="container-fluid">
        <div class="row">
            <form class="form" id="form" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" style="margin:auto;" >
                <div class="form-group">
                <input type="hidden" name='send' value="send">
                    <label for="titre">Tapez un nouveau titre de l'examen</label>
                    <input class="form-control" type="text" name="titre" id="titre"  value="<?php echo $res['titre'] ;    ?>">
                </div>
                <div class="form-group">
                    <label for="date">Tapez la date </label>
                    <input class="form-control" type="date" name="date" id="date"  value="<?php echo $res['date'] ;    ?>" >
                </div>
                <div class="form-group">
                    <label for="dure">Sélectionner une nouvelle durée</label>
                    <input class="form-control" type="number" name="duree" id="dure" min="1" max="30"  value="<?php echo $res['duree'] ;    ?>">
                </div>
                <div class="form-group">
                    <label for="nb1">Tapez le nombre de questions</label>
                    <input class="form-control" type="number" style="width: 400px;" name="nombrequestion" id="nb1" min="1" max="30"  value="<?php echo $res['nombrequestion'] ;  ?>" >
                </div>
                <div class="form-group">
                    <label for="n2">Tapez le point pour des bonnes reponses</label>
                    <input class="form-control" type="number" style="width: 400px;" name="pointbonnereponse" id="n2" min="1" value="<?php echo $res['pointbonnereponse'] ;  ?>" >
                </div>
                <div class="form-group">
                    <label for="n3">Tapez le point pour des mauvaises reponses</label>
                    <input class="form-control" type="number"  style="width: 400px;" name="pointmauvaisereponse" id="n3" max="0" value="<?php echo $res['pointmauvaisereponse'] ;  ?>">
                </div>
                <div>
                
                <?php }
    if(isset($_GET['error'])){ ?>
        <div style="text-align:center; color :red; font: size 1.5em;"><?php echo "Un champ vide ou <br/> Examen est déjà enrégistré 1"; ?> </div>
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
    <div style="margin : 10px; font-size : 1.5em;"><a style="margin-left : 5px;" href="listeExamen.php">Liste Examen</a></div>
</body>
</html>