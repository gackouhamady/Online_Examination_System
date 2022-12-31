<?php 



session_start();
include("../../inc/dbconnection.php");

if (isset($_SESSION['idexam'])) {
    $idexam=$_SESSION['idexam'];

    if(isset($_POST['send'])){
        $req1=$bdd->prepare("SELECT COUNT(titre) AS nbre_titre FROM question WHERE titre=? AND idexam=?");
        $req1->execute(array($_POST['titre'],$idexam));
        $result=$req1->fetch();
        if($result['nbre_titre']>0){
            header("Location:questionAjouter.php?error=question_existe");
        }
        elseif(empty($_POST['titre']) or empty($_POST['optionreponse'])){
            header('Location:questionAjouter.php?error=empty');
        }
        else{   
            $req3=$bdd->prepare("SELECT * FROM question WHERE idexam=?");
        $req3->execute(array($idexam));
        $req4=$bdd->prepare("SELECT * FROM exam WHERE idexam=?");
                $req4->execute(array($idexam)); 
        if($req3->rowCount()>=$req4->fetch()['nombrequestion']){
            header("Location:questionAjouter.php?error=question_atteinte");
        } else{
                $titre=htmlspecialchars($_POST['titre']);
                $optionreponse=htmlspecialchars($_POST['optionreponse']);
                
//if()
                $req=$bdd->prepare("INSERT INTO question(titre,optionreponse,idexam)VALUES(:titre,:optionreponse,:idexam)");
                $req->execute(array(
                    'titre'=>$titre,
                    'optionreponse'=>$optionreponse,
                    'idexam'=>$idexam));
                    
                $req->closeCursor();
        
        
                $req2=$bdd->prepare("SELECT * FROM question WHERE titre=? AND optionreponse=?");
                $req2->execute(array($titre, $optionreponse));
                if($req2->rowCount()>0)
                {
                    $_SESSION['idquestion']=$req2->fetch()['idquestion'];
                    $_SESSION['titre']=$titre;
                    $_SESSION['optionreponse']=$optionreponse;
                    $_SESSION['idexam']=$idexam;
                }
                header('Location:questionAjouter.php?info= Enregistrer');
            } 
        }
        }
         ?>

    <?php
            if(isset($_GET['info'])){ ?>
                <div style="text-align:center; color :green; font: size 1.5em; font-weight:bold;"><?php echo "Question ajouté avec succès"; ?> </div>
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
    <link rel="stylesheet" href="../../css/bootstrap.css">
</head>
<body>
    <div class="container-fluid" style="margin-top:60px;">
        <div class="row">
            <form class="form" id="form" action=" " method="POST" style="margin:auto;" >
                <div class="form-group">
                <input type="hidden" name='send' value="send">
                    <label for="titre">Tapez le titre de la question</label>
                    <input class="form-control"  style="width:450px;" type="text" name="titre" id="titre" >
                </div>
                <div class="form-group">
                <label for="select"> Selectionner l'option de reponse</label> 
                <select id="select" class="form-control" name="optionreponse" size="1" style="width:100px;" >
                   
                    <option>1</option>
                    <option selected>2</option>
                    <option>3</option>
                    <option>4</option>
                    </select>
                </div>
                <div>
                                            <?php
                                if(isset($_GET['error'])){ 
                                    switch ($_GET['error']) {
                                        case 'question_atteinte':
                                            $req4=$bdd->prepare("SELECT * FROM exam WHERE idexam=?");
                                            $req4->execute(array($_SESSION['idexam']));  # code...
                                            ?>
                                    <div style="text-align:center;font-weight : bold;  color :red; font-size: 1.5em;"><?php echo 'Cet examen ne peut pas avoir plus que '.$req4->fetch()['nombrequestion'].' question !'; ?> </div>
                                <?php 

                                            break;
                                        
                                        
                                        default:
                                            # code...
                                            ?>
                                    <div style="text-align:center; font-weight : bold; color :red; font-size : 1.5em;"><?php echo "Un champ vide ou question dejà ajouté"; ?> </div>
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
    <div style="font-size:1.2em; margin-left: 50px;font-weight:bold;">Return To <a style="margin-left: 10px;" href="question.php"> Accueil Question</a></div>
</body>
</html>