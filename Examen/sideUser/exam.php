
<?php
session_start();
$id=$_SESSION['iduser'];
$user="root";
$mdp="";
$db="examen";
$server="localhost";
$link=mysqli_connect($server,$user,$mdp,$db);
$req=mysqli_query($link,"SELECT * FROM user WHERE iduser=$id");
while($res11=mysqli_fetch_array($req)){
  if($res11['autorisation']=='non'){
    header("Location:accueil.php?error=autorisation");
  }
}

 



if(isset($_GET['error'])){
    switch ($_GET['error']) {
        case 'date_limite':
            # code...
            ?>
                <div style="text-align:center; color :red; font-size: 1.5em; font-weight:bold;"><?php echo "La date de l'examen est passée !!"; ?> </div>
            <?php 
            break;
        case 'date_atteinte':
            # code...
            ?>
    <div style="text-align:center; color :red; font-size: 1.5em; font-weight:bold;"><?php echo "La date de l'examen n'est pas arrivée !!"; ?> </div>
<?php                  

            break;
            case 'existe':
                # code...
                 # code...
            ?>
            <div style="text-align:center; color :red; font-size: 1.5em; font-weight:bold;"><?php echo "On ne peut passer un test qu'une seule fois  !!"; ?> </div>
        <?php            
                break;
            case 'null':
                # code...
                ?>
            <div style="text-align:center; color :red; font-size: 1.5em; font-weight:bold;"><?php echo "Désolé, à présent pas de resultat de dernier test pour vous  !!"; ?> </div>
        <?php   
                break;
        default:
            break;
    
}
}
?>



<!Doctype html>
<html>
    <head>
        <meta-charset= "utf-8">
        <title>Liste des Examens</title>
        <style>
        body{
            padding:10px;
            margin: 10px;
            width: 100%;
            font-weight:bold;
        }
        table{
            margin : auto;
            border-collapse:collapse;
            border:2px solid #000;
            box-shadow: 4px 4px 2px;

        }
        th{
            color: white;
            background-color: green;
        }
        th,td{
            border: 2px solid #000;
            margin: 10px;
            padding: 8px;
            height : 55px;
            text-align:center;
            font-size : 1.2em;
            
        }
        button{
            height :50px;
        }
        input[value="Passer le test"]{
            color:white;
            background:Teal;
            margin:0px;
            font-size : 1.2em;
            font-weight : bold;

        }
        span{
            position:fixed;
            right:10px;
        }
        a{
            text-decoration:none;
        }

        .re{
            position:fixed;
            left:10px;
        }


            </style>



    </head>
    <body>
      <!--  <h1><span class="re" > <a href="resultat.php">Votre Dernier Resultat</a></span></h1>  -->
        <h1 style=" text-align:center;">Liste des Examens<span><a href="accueil.php">Return</a></h1>
        <table>
        
            <thead>
            <tr>
                <th>Titre</th>
                <th>Date</th>
                <th>Durée</th>
                <th>Nombre Question</th>
                <th>Point Bonne Reponse</th>
                <th>Point Mauvaise Reponse</th>
                <th>Enseignant Responsable</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
             <?php
                 $user="root";
                 $mdp="";
                 $db="examen";
                 $server="localhost";
                 $link=mysqli_connect($server,$user,$mdp,$db);
                 $req=mysqli_query($link,"SELECT * FROM exam");
                 while($res=mysqli_fetch_array($req)){
                    $idteacher=$res['idteacher'];
                    $req2=mysqli_query($link,"SELECT * FROM teacher WHERE idteacher=$idteacher");
                    while($res2=mysqli_fetch_array($req2)){
                        $nom=$res2['nom'];
                    }
            ?>
        
             <tr>
                 <td><?php echo $res["titre"]; ?></td>
                 <td><?php echo $res["date"]; ?></td>
                 <td><?php echo $res["duree"].' minute(s)'; ?></td>
                 <td><?php echo $res["nombrequestion"]; ?></td>
                 <td><?php echo $res["pointbonnereponse"]; ?></td>
                 <td><?php echo $res["pointmauvaisereponse"]; ?></td>
                 <td style="color:Navy; font-weight:bold;"><?php echo $nom ; ?></td>
                 <td><form action="start.php" method="POST">
                     <input type="hidden" name="idexam" value="<?php echo $res['idexam']; ?>"/>
                     <button><input type="submit" value="Passer le test"/></button>
                 </form>
                 </td>


             </tr>
             </tbody>
             <?php
             }
             ?>
            <tfoot>
            </tfoot>









        </table>
        <div style="text-align:center; font-size : 2em; margin-top : 10px"><a style="margin-left:5px;" href="accueil.php">Accueil </a></div>

    </body>
</html>



