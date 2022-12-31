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
            background-color:blue;
        }
        th,td{
            border: 2px solid #000;
            margin: 40px;
            padding: 40px;
            text-align:center;
            
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
        if(isset($_POST['idenrollement'])){
            $id=$_POST['idenrollement'];
           $req=mysqli_query($link,"SELECT * FROM enrollement WHERE idenrollement=$id");
           $res=mysqli_fetch_array($req);?>
           <table>
           <thead>
            <tr>
                <th>Identifiant de l'examen enrollé</th>
                <th>identifiant de l'utilisateur</th>
            </tr>
           </thead>
           <tbody>
            <td><?php echo $res['iduser']; ?></td>
            <td><?php echo $res['idexam']; ?></td>
           </tbody>
           <tfoot>
            <td colspan="2">Détails élémentaires  </td>
           </tfoot>
           </table>
           <?php
        }
        
        ?>
        <div style="text-align:center; font-size : 1.5em; margin-top : 10px"><span>Return To</span><a  href="listeenrollement.php"> Liste Enrollement</a></div>
    </body>