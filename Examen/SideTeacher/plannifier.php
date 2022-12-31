<?php
session_start();
$id=$_SESSION['idteacher'];
$user="root";
$mdp="";
$db="examen";
$server="localhost";
$link=mysqli_connect($server,$user,$mdp,$db);
$req=mysqli_query($link,"SELECT * FROM teacher WHERE idteacher=$id");
while($res=mysqli_fetch_array($req)){
  if($res['autorisation']=='non'){
    header("Location:accueil.php?error=autorisation");
  }
}
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>AccueilPlannification</title>
</head>
<style>
  body{
    background-image: url("../images/plannifier.jpeg");
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
    margin: 40px;
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
              <button><a href="examen.php">Gerer examen</a></button>
            </div>
            <div class="col-sm-6" style="text-align:center;">
              <button><a href="user.php">Gerer Acces User</a></button>
            </div>
            <div class="col-sm-6" style="text-align:center;">
              <button><a href="listeenrollement.php">Gerer Enrollement</a></button>
            </div>
            <div class="col-sm-6" style="text-align:center;">
              <button><a href="accueil.php"> Retour</a></button>
            </div>
            <div class="col-sm-12" style="text-align:center;">
              <button><a href="quitter.php">Quitter</a></button>
            </div>
        </div>
    </div>
    </main>
    <footer>

    </footer>
</body>
</html>