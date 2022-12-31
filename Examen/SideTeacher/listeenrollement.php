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
            padding:20px;
            margin: 20px;
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
            font-size : 1.5em;
        }
        th,td{
            border: 2px solid #000;
            margin: 20px;
            padding: 20px;
            text-align:center;
            font-size : 1.5em;
            
        }
        input[value="Supprimer"],input[value="Resultat"]{
            color:white;
            background:green;
            margin:5px;
            font-size: 1.5em;

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
        <h1>Liste des enrollements<span><a href="plannifier.php">Return</a></span></h1>
        <table>
            <thead>
            <tr>
                <th>Nom de l'utilisateur</th>
                <th>Titre de l'examen enrollé </th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
             <?php
             $idteacher=$_SESSION['idteacher'];
                 $user="root";
                 $mdp="";
                 $db="examen";
                 $server="localhost";
                 $link=mysqli_connect($server,$user,$mdp,$db);
                 $req=mysqli_query($link,"SELECT * FROM enrollement");
 while($res=mysqli_fetch_array($req)){
                    $idexam=$res['idexam'];
                    $iduser=$res['iduser'];
                    $req1=mysqli_query($link,"SELECT * FROM exam WHERE idexam =$idexam AND idteacher=$idteacher ");
                    while($res1=mysqli_fetch_array($req1)){
                        $titre=$res1['titre'];
                    }
                    $req2=mysqli_query($link,"SELECT * FROM user WHERE iduser=$iduser");
                    while($res2=mysqli_fetch_array($req2)){
                        $nom=$res2['nom'];
                        $iduser=$res2['iduser'];
                    }
                
            

if(isset($titre) && isset($nom)){    ?>
    <tr>
               
               <td><?php echo $nom ?></td>
               <td><?php echo $titre ?></td>
               <td>
               <form action="supenrollement.php" method="POST">
                   <input type="hidden" name="idenrollement" value="<?php echo $res['idenrollement']; ?>"/>
                   <input type="hidden" name="iduser" value="<?php echo $iduser;  ?>"/>
                   <input type="submit" value="Supprimer"/>
               </form>
               <form action="resultatenrollement.php" method="POST">
                   <input type="hidden" name="idenrollement" value="<?php echo $res['idenrollement']; ?>"/>
                   <input type="submit" value="Resultat"/>
               </form>
               </td>


           </tr>
           <?php }                
        
            
             }
             ?>
           </tbody>
    

            <tfoot>

            <tr>
                <td colspan="2">Liste des enrollements</td>
            </tr>
            </tfoot>









        </table>
        <div style="text-align:center; font-size : 1.5em; margin-top : 20px"><a style="margin-left:5px;" href="plannifier.php">Accueil</a></div>

    </body>
</html>