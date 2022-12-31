<?php
session_start();






?>






<!Doctype html>
<html>
    <head>
        <meta-charset="utf-8">
        <title> </title>
        <style>
        body{
            padding:10px;
            margin: 10px;
            width: 100%;
            font-weight:bold;
        }
        table{
            margin-left : 100px;
            border-collapse:collapse;
            border:2px solid #000;
            box-shadow: 4px 4px 2px;
            margin :auto;

        }
        th{
            color: white;
            background-color:green;
        }
        th,td{
            border: 2px solid #000;
            margin: 20px;
            padding: 20px;
            text-align:center;
            font-size : 1.3em;
            
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
    <?php
                 $user="root";
                 $mdp="";
                 $db="examen";
                 $server="localhost";
                 $link=mysqli_connect($server,$user,$mdp,$db);
                 if(isset($_SESSION['idexam'])){
                    $id=$_SESSION['idexam'];
                 $req=mysqli_query($link,"SELECT * FROM exam  WHERE idexam= $id");
                 while($res=mysqli_fetch_array($req)){
            ?>
        
    <h1 style="text-align:center;">La Correction de l'examen : <?php echo $res['titre']?> <span><a href="exam.php">Return</a></h1>
    <?php

         } ?>



        <table>
        
            <thead>
            <tr>
                <th>Question</th>
                <th>Bonne option</th>
                <th>Votre Option</th>
            </tr>
            </thead>
            <tbody>
             <?php
             include("../inc/dbConnection.php");
            if(isset($_SESSION['idexam']) && isset($_SESSION['iduser'])){
                 $idexam=$_SESSION['idexam'];
                   $iduser=$_SESSION['iduser'];
                 $req=$bdd->prepare("SELECT * FROM question WHERE idexam=?");
                 $req->execute(array($idexam));
                 while ($data = $req->fetch()){
                     $req2=$bdd->prepare("SELECT * FROM examuserquestionreponse WHERE  iduser=? AND idexam=? AND idquestion=?");
                     $req2->execute(array($iduser,$idexam,$data['idquestion']));
                     $n= $req2->rowCount();
                     if($n==0){
                        $useroption ='Vous n\'avez pris aucune option pour cette question';
                     }
                     else {
                        $useroption=$req2->fetch()['useroptionreponse'];
                     }

                    ?>
                         <tr>
                              <td><?php echo $data["titre"]; ?></td>
                              <td><?php echo $data["optionreponse"]; ?></td>
                              <td><?php echo $useroption; ?></td>
                             
                          </tr>
                          </tbody>
                          <?php
                          }
                
                        
             }
             
        
             
             else{
                 header("Location : userScore.php");
               }  
             ?>
            
             <tfoot>
             
             <tr>
                 <td colspan="3">Correction de l'Examen</td>
             </tr>
             </tfoot>
             
             </table>
                   <?php
                   
                   


            } 
            else{
           header("Location:exam.php?error=null");

            }
            ?>
             
             <div style="text-align:center; font-size : 1.5em; margin-top : 10px"><a style="margin-left:5px;" href="exam.php">Accueil</a></div>
             
             </body>
             </html>
             





