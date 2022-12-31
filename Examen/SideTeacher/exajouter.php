<?php 
session_start();
include("../inc/dbconnection.php");
if (isset($_SESSION['idteacher'])) {
    $idteacher=$_SESSION['idteacher'];

    if(isset($_POST['send'])){
        $req1=$bdd->prepare("SELECT COUNT(titre) AS nbre_titre FROM exam WHERE titre=? AND idteacher=?");
        $req1->execute(array($_POST['titre'],$idteacher));
        $result=$req1->fetch();
        if($result['nbre_titre']>0){
            header("Location:exajouter.php?error=error");
        }
        elseif(empty($_POST['titre']) or empty($_POST['date']) or  empty($_POST['duree']) or empty($_POST['nombrequestion']) or empty($_POST['pointbonnereponse'])){
            header('Location:exajouter.php?error=empty');
        }
        else{
                $titre=htmlspecialchars($_POST['titre']);
                $date=htmlspecialchars($_POST['date']);
                $duree=htmlspecialchars($_POST['duree']);
                $nombrequestion=htmlspecialchars($_POST['nombrequestion']);
                $pointbonnereponse=htmlspecialchars($_POST['pointbonnereponse']);
                $pointmauvaisereponse=htmlspecialchars($_POST['pointmauvaisereponse']);
                $req=$bdd->prepare("INSERT INTO exam(titre,date,duree,nombrequestion,pointbonnereponse,pointmauvaisereponse,idteacher)VALUES(:titre,:date,:duree,:nombrequestion,:pointbonnereponse,:pointmauvaisereponse, :idteacher)");
                $req->execute(array(
                    'titre'=>$titre,
                    'date'=>$date,
                    'duree'=>$duree,
                    'nombrequestion'=>$nombrequestion,
                    'pointbonnereponse'=>$pointbonnereponse,
                    'pointmauvaisereponse'=>$pointmauvaisereponse,
                    'idteacher'=>$idteacher
                ));
                $req->closeCursor();
        
        
                $req2=$bdd->prepare("SELECT * FROM exam WHERE titre=? AND date=? AND duree=? AND nombrequestion=? AND pointbonnereponse=? AND pointmauvaisereponse=?");
                $req2->execute(array($titre, $date, $duree, $nombrequestion, $pointbonnereponse, $pointmauvaisereponse));
                if($req2->rowCount()>0)
                {
                    $_SESSION['idexam']=$req2->fetch()['idexam'];
                    $_SESSION['titre']=$titre;
                    $_SESSION['date']=$date;
                    $_SESSION['duree']=$duree;
                    $_SESSION['nombrequestion']=$nombrequestion;
                    $_SESSION['pointbonnereponse']=$pointbonnereponse;
                    $_SESSION['pointmauvaisereponse']=$pointmauvaisereponse;
                    header('Location:exajouter.php?info= Enregistrer');
                }
                
        }
        }
         ?>
        
        
            <?php
            if(isset($_GET['info'])){ ?>
                <div style="text-align:center; color :green; font: size 1.5em;"><?php echo "Examen ajouté avec succès"; ?> </div>
            <?php }
        
        
            
        

} else{

    header("Location:examen.php");
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
    <h1><span><a href="examen.php">Return</a></span></h1>
    <div class="container-fluid">
        <div class="row">
            <form class="form" id="form" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" style="margin:auto;" >
                <div class="form-group">
                <input type="hidden" name='send' value="send">
                    <label for="titre">Tapez le titre de l'examen</label>
                    <input class="form-control"  style="width:450px;" type="text" name="titre" id="titre" >
                </div>
                <div class="form-group">
                    <label for="date">Tapez la date </label>
                    <input class="form-control" style="width:450px;" type="date" name="date" id="date" >
                </div>
                <div class="form-group">
                    <label for="dure">Tapez la duree</label>
                    <input class="form-control" style="width:450px;" type="number" min="1" max="30" name="duree" id="dure" >
                </div>
                <div class="form-group">
                    <label for="nb1">Tapez le nombre de questions</label>
                    <input class="form-control" style="width:450px;" type="number" max="30" name="nombrequestion" id="nb1" min="1">
                </div>
                <div class="form-group">
                    <label for="n2">Tapez le point pour des bonnes reponses</label>
                    <input class="form-control" style="width:450px;" type="number" name="pointbonnereponse" id="n2" min="1" >
                </div>
                <div class="form-group">
                    <label for="n3">Tapez le point pour des mauvaises reponses</label>
                    <input class="form-control"  style="width:450px;" type="number" name="pointmauvaisereponse" id="n3" max="0" >
                </div>
                <div>
                <?php
    if(isset($_GET['error'])){ ?>
        <div style="text-align:center; color :red; font: size 1.5em;"><?php echo "Saisi incorrect ou examen dejà enrégistré !"; ?> </div>
    <?php }


    ?>
                </div>
                <div class="form-group">
                    <input class="form-control"  style="width:450px; font-weight:bold;"type="submit" value="Ajouter" name="submit" form="form"  >
                    <input type="reset" style="width:450px; background-color : green; color : white;"  value="Actualiser" form="form" class="form-control">
                </div>

            </form>
            
        </div>
    </div>
    <div style="font-size:1.2em; margin-left: 10px;font-weight:bold;"><span>Return To</span><a style="margin-left: 10px;" href="examen.php">Accueil Examen</a></div>
</body>
</html>