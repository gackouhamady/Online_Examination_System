<?php 
session_start();
include("../../../inc/dbconnection.php");

if (isset($_SESSION['idquestion'])) {
    $idquestion=$_SESSION['idquestion'];

    if(isset($_POST['send'])){
        $req1=$bdd->prepare("SELECT COUNT(titre) AS nbre_titre FROM option WHERE titre=? AND idquestion=?");
        $req1->execute(array($_POST['titre'],$idquestion));
        $result=$req1->fetch();
        if($result['nbre_titre']>0){
            header("Location:ajouterOption.php?error=option_existe");
        }
        elseif(empty($_POST['titre'])){
            header('Location:ajouterOption.php?error=empty');
        }
        else{   
            $req3=$bdd->prepare("SELECT * FROM option WHERE idquestion=?");
        $req3->execute(array($idquestion));
        if($req3->rowCount()>=4){
            header("Location:ajouterOption.php?error=option_atteinte");
        } else{
                $titre=htmlspecialchars($_POST['titre']);
                $req=$bdd->prepare("INSERT INTO option(titre,idquestion)VALUES(:titre,:idquestion)");
                $req->execute(array(
                    'titre'=>$titre,
                    'idquestion'=>$idquestion));
                    
                $req->closeCursor();
        
        
                $req2=$bdd->prepare("SELECT * FROM option WHERE titre=?");
                $req2->execute(array($titre));
                if($req2->rowCount()>0)
                {
                    $_SESSION['idoption']=$req2->fetch()['idoption'];
                    $_SESSION['titre']=$titre;
                    $_SESSION['idquestion']=$idquestion;
                }
                header('Location:ajouterOption.php?info= Enregistrer');
            } 
        }
        }
         ?>

    <?php
            if(isset($_GET['info'])){ ?>
                <div style="text-align:center; color :green; font-size : 1.5em; font-weight:bold;"><?php echo "Question ajouté avec succès"; ?> </div>
            <?php }        

} else{

    header("Location:question.php");
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de la question</title>
    <link rel="stylesheet" href="../../../css/bootstrap.css">
</head>
<body>
    <div class="container-fluid" style="margin-top:60px;">
        <div class="row">
            <form class="form" id="form" action=" " method="POST" style="margin:auto;" >
                <div class="form-group">
                <input type="hidden" name='send' value="send">
                    <label for="titre">Tapez le titre de l'option</label>
                    <input class="form-control"  style="width:450px;" type="text" name="titre" id="titre" >
                </div>
                <div>
                                            <?php
                                if(isset($_GET['error'])){ 
                                    switch ($_GET['error']) {
                                        case 'option_atteinte':
                                            # code...
                                            ?>
                                    <div style="text-align:center; color :red; font-size : 1.5em;"><?php echo "Veuillez supprimer afin d'ajouter des nouveaux <br/> Une question ne doit pas avoir plus que 4 options !"; ?> </div>
                                <?php 

                                            break;
                                        
                                        
                                        default:
                                            # code...
                                            ?>
                                    <div style="text-align:center; color :red; font-size: 1.5em;"><?php echo "Un champ vide ou option dejà ajouté"; ?> </div>
                                <?php 
                                break;
                                    }
                                }

                                    ?>
    
                                    
                                
                </div>
                <div class="form-group">
                    <input class="form-control"  style="width:450px; font-weight:bold;"type="submit" value="Ajouter" name="submit" form="form"  >
                    <input type="reset" style="width:450px; background-color : green; color : white;"  value="Actualiser" form="form" class="form-control">
                </div>

            </form>
            
        </div>
    </div>
    <div style="font-size:1.2em; margin-left: 50px;font-weight:bold;">Return To <a style="margin-left: 10px;" href="option.php"> Accueil Option</a></div>
</body>
</html>