<?php
session_start();
if(isset($_GET['error'])){ ?>
    <div style="text-align:center; font-size :1.5em; color :red;"> <?php echo "Suppression d'un Examen ayant des questions est impossible <br/> Veuillez supprimer d'abord les questions !! <br/>"; ?></div>
<?php }
?>






<!Doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> </title>
        <style>
        body{
            padding: 8px;
            margin: 10px;
            width: 100%;
            font-weight:bold;
        }
        table{
            margin: auto;
            border-collapse:collapse;
            border:2px solid #000;
            box-shadow: 4px 4px 2px;

        }
        th{
            color: white;
            background-color:green;
        }
        th,td{
            border: 2px solid #000;
            margin: 10px;
            padding: 10px;
            text-align:center;
            font-size : 1.2em;
            
        }
        input[value="Details"],input[value="Supprimer"],input[value="Modifier"],input[value="Gerer question"]{
            color:white;
            background:green;
            margin:5px;
            font-size :1.3em;

        }

        span{
            position:fixed;
            right:10px;
        }
        a{
            text-decoration:none;
        }






            </style>



    </head>
    <body>
        <h1 style="text-align:center;">Liste de vos Examens ajoutés<span><a href="examen.php">Return</a></h1>
        <table>
        
            <thead>
            <tr>
                <th>Titre</th>
                <th>Date</th>
                <th>Durée</th>
                <th>Nombre Question</th>
                <th>Point Bonne Reponse</th>
                <th>Point Mauvaise Reponse</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
             <?php
                 $user="root";
                 $mdp="";
                 $db="examen";
                 $server="localhost";
                 $idteacher=$_SESSION['idteacher'];
                 $link=mysqli_connect($server,$user,$mdp,$db);
                 $req=mysqli_query($link,"SELECT * FROM exam WHERE idteacher= $idteacher");
                 while($res=mysqli_fetch_array($req)){
            ?>
        
             <tr>
                 <td><?php echo $res["titre"]; ?></td>
                 <td><?php echo $res["date"]; ?></td>
                 <td><?php echo $res["duree"].' minute(s)'; ?></td>
                 <td><?php echo $res["nombrequestion"]; ?></td>
                 <td><?php echo $res["pointbonnereponse"]; ?></td>
                 <td><?php echo $res["pointmauvaisereponse"]; ?></td>
                 <td><form action="deExamen.php" method="POST">
                     <input type="hidden" name="idexam" value="<?php echo $res['idexam']; ?>"/>
                     <input type="submit" value="Details"/>
                 </form>
                 <form action="supExamen.php" method="POST">
                     <input type="hidden" name="idexam" value="<?php echo $res['idexam']; ?>"/>
                     <input title="Cette Operation est irréversible" type="submit" value="Supprimer"/>
                 </form>
                 <form action="session.php" method="POST">
                     <input type="hidden" name="idexam" value="<?php echo $res['idexam']; ?>"/>
                     <input type="submit" value="Modifier"/>
                 </form>
                 <form action="question/question.php" method="POST">
                     <input type="hidden" name="idexam" value="<?php echo $res['idexam']; ?>"/>
                     <input type="submit" value="Gerer question"/>
                 </form>
                 </td>


             </tr>
             </tbody>
             <?php
             }
             ?>
            <tfoot>

            <tr>
                <td colspan="6" style="font-size:2em;">Liste des Examens</td>
            </tr>
            </tfoot>









        </table>
        <div style="text-align:center; font-size : 1.5em; margin-top : 10px"><a style="margin-left:5px;" href="examen.php">Accueil Examen</a></div>

    </body>
</html>