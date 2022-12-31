<?php
session_start();

include("../../inc/dbConnection.php");

if(isset($_POST['idexam']) or isset($_SESSION['idexam'])){
  if(isset($_POST['idexam'])){
    $idexam=htmlspecialchars($_POST['idexam']);
    $rqte=$bdd->prepare("SELECT * FROM exam WHERE idexam = ?");
    $rqte->execute(array($idexam));
      while ($data = $rqte->fetch()){
              $nb_data = count($data);
              for($i = 0; $i < $nb_data; $i++);
              { 

                $_SESSION['idexam'] = $data['idexam'];
                $_SESSION['titre']=$data['titre'];
                $_SESSION['date']=$data['date'];
                $_SESSION['duree']=$data['duree'];
                $_SESSION['nombrequestion']=$data['nombrequestion'];
                $_SESSION['pointbonnereponse']=$data['pointbonnereponse'];
                $_SESSION['pointmauvaisereponse']=$data['pointmauvaisereponse'];
                $_SESSION['idteacher'] = $data['idteacher'];

              }
          

      }
    }
    elseif(isset($_SESSION['idexam'])){
      $idexam=$_SESSION['idexam'];
    $rqte=$bdd->prepare("SELECT * FROM exam WHERE idexam = ?");
    $rqte->execute(array($idexam));
      while ($data = $rqte->fetch()){
              $nb_data = count($data);
              for($i = 0; $i < $nb_data; $i++);
              { 

                $_SESSION['idexam'] = $data['idexam'];
                $_SESSION['titre']=$data['titre'];
                $_SESSION['date']=$data['date'];
                $_SESSION['duree']=$data['duree'];
                $_SESSION['nombrequestion']=$data['nombrequestion'];
                $_SESSION['pointbonnereponse']=$data['pointbonnereponse'];
                $_SESSION['pointmauvaisereponse']=$data['pointmauvaisereponse'];
                $_SESSION['idteacher'] = $data['idteacher'];

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
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <title>AccueilUser</title>
</head>
<style>
  body{
    background-image: url("../../images/accueilQuestion.jpeg");
    background-size: cover;
}

#select{
margin-top: 100px;
}
h1{
    text-align: center;
    font-weight: bold;
    font-size : 3em;
    color: white;
}
button{
    background-color: white;
    width: 250px;
    height: 70px;
    padding: 15px;
    margin: 80px;
    border-radius: 10px;
    font-size: 1.5em;
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
    <div class="container-fluid"id="select">
        <div class="row">
            <div class="col-sm-6" style="text-align:center;">
              <button><a href="questionAjouter.php">Ajouter question</a></button>
            </div>
            <div class="col-sm-6" style="text-align:center;">
              <button><a href="listeQuestion.php">Voir Liste Question</a></button>
            </div>
            <div class="col-sm-6" style="text-align:center;">
              <button><a href="../listeExamen.php"> Retour</a></button>
            </div>
            <div class="col-sm-6" style="text-align:center;">
              <button><a href="quitter.php">Quitter</a></button>
            </div>
        </div>
    </div>
    </main>
    <footer>

    </footer>
</body>
</html>