<?php
session_start();



?>








<!Doctype html>
<html>
    <head>
        <meta-charset="utf-8"/>
        <title>Modification</title>
<style>
 body{
            padding:10px;
            margin: 10px;
            width: 100%;
            font-weight:bold;
        }
        table{
            margin : 100px;
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
            margin: 40px;
            padding: 40px;
            text-align:center;
            
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
        <h1><span><a href="listeExamen.php"> Return</a></span></h1>
        <?php 
         $user="root";
         $mdp="";
         $db="examen";
         $server="localhost";
         $link=mysqli_connect($server,$user,$mdp,$db);
        if(isset($_POST['idexam'])){
            $id=$_POST['idexam'];
           $req=mysqli_query($link,"SELECT * FROM exam WHERE idexam=$id");
           $res=mysqli_fetch_array($req);?>
           <table>
           <thead>
            <tr>
            <th>Titre</th>
                <th>Date</th>
                <th>Durée</th>
                <th>Nombre Question</th>
                <th>Point Bonne Reponse</th>
                <th>Point Mauvaise Reponse</th>
            </tr>
           </thead>
           <tbody>
           <td><?php echo $res["titre"]; ?></td>
                 <td><?php echo $res["date"]; ?></td>
                 <td><?php echo $res["duree"]; ?></td>
                 <td><?php echo $res["nombrequestion"]; ?></td>
                 <td><?php echo $res["pointbonnereponse"]; ?></td>
                 <td><?php echo $res["pointmauvaisereponse"]; ?></td>
           </tbody>
           <tfoot>
            <td colspan="6"> <?php echo $res['titre']; ?> </td>
           </tfoot>
           </table>
           <?php
        }
        
        ?>
        <div style="text-align:center; font-size : 1.5em; margin-top : 10px"><a href="listeExamen.php"> ListeExamen</a></div>
    </body>