<?php
session_start();

?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AccueilTeacher</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
body{
    background-color: rgb(204,204,204);
    background-image:url(../images/accueilTeacher.jpeg);
    background-size:cover;
}
h2{
    text-align: right;
    font-style: italic;
    text-shadow: 0 1px 0 #CCCCCC, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9,
     0 5px 0 #aaa, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3),
     0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);
    color :#fff;
}


h1{
    text-align: center;
    font-weight:bold;
    font-size:3em;
    color : white;
}
button{
    background-color: white;
    width: 300px;
    height: 70px;
    padding: 20px;
    margin: 40px;
    border-radius: 50px;
    font-size: 1.5em;
    text-align: center;
    font-weight: bold;
    color: black;
}
a:hover{
    color: blue;
    text-decoration:none;
}
a{
    color :black;
}









    </style>
</head>
<body>
    <header>
    <div>
        <h2>
           <span>Accueil Teacher</span> 
        </h2>
         <h1>
            Online Examination System
       </h1> 
    </div>
    </header>
    <main>
    
    <div class="container-fluid"id="select">
    <?php
             $user="root";
             $mdp="";
             $db="examen";
             $server="localhost";
             $link=mysqli_connect($server,$user,$mdp,$db);
             $idteacher=$_SESSION['idteacher'];
             $req=mysqli_query($link,"SELECT * FROM teacher where idteacher=$idteacher");
            while($res=mysqli_fetch_array($req)){
                ?>

              <div style="font-size:1.5em;font-weight : bold;">Bienvenue <?php echo $res['nom'].' !' ; ?> <br> <span style="color :white;font-style:italic;">Ici, c'est votre espace propre a vous !!</span>   </div>


<?php
            echo "<img src='../upload/".$res['image']."' width='300px' height='150px' ><br>"; 
            }
            if(isset($_GET['error'])){ ?>
                <div style="text-align:center; color:MidnightBlue; font-size:1.5em;"><?php echo 'Vous n\'etes pas pour le moment  
                autorisé à plannifier <span style="color:darkred"; background-color:green;"> ou peut etre que vous avez été 
                bloqué </span> <span style="color:red;">.<br/> Le blocage pour cette fonctionnalité  peut etre du a un 
                comportement de vous !!!</span>';  ?></div>
                
                
                <?php
            }
            
            ?>
        <div class="row">
            <div class="col-sm-8" style="text-align:center;">
              <button><a href="plannifier.php">Planifier Examen</a></button>
            </div>
            <div class="col-sm-4" style="text-align:center;">
              <button><a href="changeProfil.php">Changer profil</a></button>
            </div>
            <div class="col-sm-8" style="text-align:center;">
              <button ><a href="changePasse.php" >Changer mot de passe</a></button>
            </div>
            <div class="col-sm-4" style="text-align:center;">
              <button ><a href="deconnecter.php"> Se deconnecter</a></button>
            </div>
        </div>
    </div>
    </main>
    <footer>

    </footer>
</body>
</html>