<?php
session_start();



?>








<!Doctype html>
<html>
    <head>
        <meta-charset="utf-8"/>
        <title>Details</title>
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
    <h1><span><a href="teacher.php">Return</a></h1>
        <?php 
         $user="root";
         $mdp="";
         $db="examen";
         $server="localhost";
         $link=mysqli_connect($server,$user,$mdp,$db);
        if(isset($_POST['id'])){
            $id=$_POST['id'];
           $req=mysqli_query($link,"SELECT * FROM teacher WHERE idteacher=$id");
           $res=mysqli_fetch_array($req);?>
           <table>
           <thead>
            <tr>
                <th>Nom Complet</th>
                <th>Adresse Email</th>
                <th>Image</th>
            </tr>
           </thead>
           <tbody>
            <td><?php echo $res['nom']; ?></td>
            <td><?php echo $res['mail']; ?></td>
            <td><?php echo "<img src='../upload/".$res['image']."' width='300px' height='150px' ><br>"; ?></td>
           </tbody>
           <tfoot>
            <td colspan="4"> <?php echo $res['nom']; ?> </td>
           </tfoot>
           </table>
           <?php
        }
        
        ?>
        <div style="text-align:center; font-size : 1.5em; margin-top : 20px"><a style="margin-left:5px;" href="user.php"> Liste</a></div>
    </body>