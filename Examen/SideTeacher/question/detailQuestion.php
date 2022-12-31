<?php
session_start();



?>








<!Doctype html>
<html>
    <head>
        <meta-charset="utf-8"/>
        <title>Deatails Question</title>
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
        <h1> <span><a href="listeQuestion.php">Return</a></h1>
        <?php 
         $user="root";
         $mdp="";
         $db="examen";
         $server="localhost";
         $link=mysqli_connect($server,$user,$mdp,$db);
        if(isset($_POST['idquestion'])){
            $id=$_POST['idquestion'];
           $req=mysqli_query($link,"SELECT * FROM question WHERE idquestion=$id");
           $res=mysqli_fetch_array($req);?>
           <table>
           <thead>
            <tr>
                <th>Titre de la question</th>
                <th>Option Bonne Reponse </th>
            </tr>
           </thead>
           <tbody>
            <td><?php echo $res['titre']; ?></td>
            <td><?php echo $res['optionreponse']; ?></td>
           </tbody>
           <tfoot>
            <td colspan="2"> <?php echo $res['titre']; ?> </td>
           </tfoot>
           </table>
           <?php
        }
        
        ?>
        <div style="text-align:center; font-size : 1.5em; margin-top : 20px"><a style="margin-left:5px;" href="listeQuestion.php"> Liste Question</a></div>
    </body>