<?php
session_start();

include("../../../inc/dbConnection.php");

if(isset($_POST['idquestion']) or isset($_SESSION['idquestion'])){
  if(isset($_POST['idquestion'])){
    $idquestion=htmlspecialchars($_POST['idquestion']);
    $rqte=$bdd->prepare("SELECT * FROM question WHERE idquestion = ?");
    $rqte->execute(array($idquestion));
      while ($data = $rqte->fetch()){
              $nb_data = count($data);
              for($i = 0; $i < $nb_data; $i++);
              { 

                $_SESSION['idquestion'] = $data['idquestion'];
                $_SESSION['titre']=$data['titre'];
                $_SESSION['optionreponse']=$data['optionreponse'];
                $_SESSION['idexam'] = $data['idexam'];

              }
          

      }
    }
    elseif(isset($_SESSION['idquestion'])){
      $idquestion=$_SESSION['idquestion'];
    $rqte=$bdd->prepare("SELECT * FROM question WHERE idquestion = ?");
    $rqte->execute(array($idquestion));
      while ($data = $rqte->fetch()){
              $nb_data = count($data);
              for($i = 0; $i < $nb_data; $i++);
              { 

                $_SESSION['idquestion'] = $data['idquestion'];
                $_SESSION['titre']=$data['titre'];
                $_SESSION['optionreponse']=$data['optionreponse'];
                $_SESSION['idexam'] = $data['idexam'];

              }
          

      }
    }



    }


else{
  header("Location : listeExamen.php");
}

?>

















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/bootstrap.css">
    <title>accueilOption</title>
</head>
<style>
  body{
    background-image: url("../../../images/accueilOption.jpeg");
    background-size: cover;
}

#select{
margin-top: 100px;
}
h1{
    text-align: center;
    font-weight: bold;
    font-size : 3em;
    color: blue;
}
button{
    background-color: white;
    width: 250px;
    height: 70px;
    padding: 20px;
    margin: 60px;
    border-radius: 10px;
    font-size: 1.5em;
    text-align: center;
    font-weight: bold;
    color: black;
    font-weight: bold;
}
a{
  color : #000;
}
a:hover{
    color: blue;
    text-decoration:none;
}
 
</style>
<body>
    <header>
    <div>
         <h1>
            Online Examination System
       </h1> 
    </div>
    </header>
    <main>
    <div class="container-fluid" id="select">
        <div class="row">
            
            <div class="col-sm-6" style="text-align:center;">
              <button><a href="ajouterOption.php">Ajouter Option</a></button>
            </div>
            <div class="col-sm-6" style="text-align:center;">
              <button><a href="listeOption.php"> Voir Liste Option</a></button>
            </div>
            
            <div class="col-sm-6" style="text-align:center;" >
              <button><a href="../listeQuestion.php"> Retour</a></button>
            </div>
            <div class="col-sm-6" style="text-align:center;">
              <button><a href="quitter.php"> quitter</a></button>
            </div>
        </div>
    </div>
    </main>
    <footer>

    </footer>
</body>
</html>