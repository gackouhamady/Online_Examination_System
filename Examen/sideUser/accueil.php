<?php
session_start();


?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AccueilUser</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
body{
    background: hsl(184, 40%, 72%);
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
    color : black;
    font-weight : bold;
}
#img{
    float:right;
}
button{
    background-color: ;
    width: 340px;
    height: 70px;
    padding: 10px;
    margin: 20px;
    border-radius: 50px;
    font-size: 1.5em;
    font-weight: bold;
}
a:hover{
    color: blue;
    text-decoration : none;
}
a{
    color : black;
}








    </style>
</head>
<body>
    <header>
    <div>
        <h2>
           <div>Accueil User</div>
        </h2>
         <h1>
            Online Examination System 
       </h1> 
    </div>
    </header>
    <main>
    
    <div class="container-fluid">
    <?php
             $user="root";
             $mdp="";
             $db="examen";
             $server="localhost";
             $link=mysqli_connect($server,$user,$mdp,$db);
             $iduser=$_SESSION['iduser'];
             $req=mysqli_query($link,"SELECT * FROM user where iduser=$iduser");
            while($res=mysqli_fetch_array($req)){
                ?>

              <div style="font-size:1.5em;font-weight : bold;">Bienvenue <?php echo $res['nom'].' !' ; ?> <br> <span style="color :white;font-style:italic;">Ici, c'est votre espace propre a vous !!</span>   </div>

<?php
            echo "<img  src='../upload/".$res['image']."' width='300px' height='120px' ><br>"; 
            }
            if(isset($_GET['error'])){ ?>
                <div style="text-align:center; color:MidnightBlue; font-size:1.5em;"><?php echo 'Vous n\'etes pas pour le moment  
                autorisé à a passer des tests <span style="color:darkred"; background-color:green;"> ou peut etre que vous avez été 
                bloqué </span> <span style="color:red;">.<br/> Le blocage pour cette fonctionnalité  peut etre du a un 
                comportement de vous !!!</span>';  ?></div>
                
                
                <?php
            }
            
?>
        <div class="row">
            <div class="col-sm-6" style="text-align:center;">
              <button><a href="exam.php">Passer test</a></button>
            </div>
            <div class="col-sm-6" style="text-align:center;">
              <button><a href="enroll.php"> Voir Vos Resultats de Tests</a></button>
            </div>
            <div class="col-sm-6" style="text-align:center;">
              <button><a href="changeProfil.php">Changer profil</a></button>
            </div>
            <div class="col-sm-6" style="text-align:center;">
              <button><a href="changePasse.php">Changer mot de passe</a></button>
            </div>
            <div class="col-sm-12" style="text-align:center;">
              <button><a href="deconnecter.php"> Se deconnecter</a></button>
            </div>
        </div>
    </div>
    </main>
    <footer>

    </footer>
</body>
</html>