<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
    body{
    background-image:url("../images/accueilExamen.jpeg");
    background-size: cover;
    background-repeat: no-repeat;
}
#select{
margin-top: 400px;
}
main{
    margin-top: 150px;
}
h1{
    text-align: center;
    font-weight: bold;
    color: white;
    font-size: 3em;
}
button{
    background-color: hsl(184, 40%, 72%);
    width: 340px;
    height: 80px;
    padding: 10px;
    margin: 40px;
    border-radius: 50px;
    font-size: 1.5em;
    font-weight: bold;
    color: black;

}
button{
    background-color : white;
    color : white;
    }


a{
    font-size: 1.2em;
     color : #000;
}
a:hover{
    color: blue;
    text-decoration:none;
}
 



    </style>
    <title>AccueilExamen</title>
</head>
<body>
    <header>
    <div>
         <h1>
            <span>Online Examination System </span>
       </h1> 
    </div>
    </header>
    <main>
    <div class="container-fluid"id="select" style="margin:auto;">
        <div class="row">
            <div class="col-sm-6" style="text-align:center;">
              <button><a href="listeExamen.php" >Voir Liste Examen</a></button>
            </div>
            <div class="col-sm-6" style="text-align:center;">
              <button><a href="exajouter.php">Ajouter Examen</a></button>
            </div>
            <div class="col-sm-6" style="text-align:center;">
              <button><a href="plannifier.php">Retour</a></button>
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