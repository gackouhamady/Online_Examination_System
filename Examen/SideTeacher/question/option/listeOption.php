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
            font-size : 1.5em;
            
        }
        input[value="Details"],input[value="Supprimer"],input[value="Modifier"]{
            color:white;
            background:green;
            margin:5px;
            font-size:1.3em;

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
        <h1 style="text-align:center;">Liste des Options <span><a href="option.php">Return</a></h1>
        <table>
        
            <thead>
            <tr>
            <th>Numéro </th>
                <th>Titre</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
             <?php
             include("../../../inc/dbConnection.php");
             if(isset($_SESSION['idquestion'])){
             $idquestion=$_SESSION['idquestion'];
                 $req=$bdd->prepare("SELECT * FROM option WHERE idquestion=?");
                 $req->execute(array($idquestion));
                 $n=0;
                 while ($data = $req->fetch()){
                     $nb_data = count($data);
                     $n=$n+1;
                     for($i = 0; $i < $nb_data; $i++);
                     { ?>
                         <tr> 
                         <td><?php echo $n  ?></td>
                              <td><?php echo $data["titre"]; ?></td>
                              
                              <td>
                              <form action="supprimerOption.php" method="POST">
                                  <input type="hidden" name="idoption" value="<?php echo $data['idoption']; ?>"/>
                                  <input title="Cette Operation est irréversible" type="submit" value="Supprimer"/>
                              </form>
                              <form action="session.php" method="POST">
                                  <input type="hidden" name="idoption" value="<?php echo $data['idoption']; ?>"/>
                                  <input type="submit" value="Modifier"/>
                              </form>
                              
                              </td>
             
             
                          </tr>
                          </tbody>
                          <?php
                          }
                          
                        
             }
             }
        
             
             else{
                 header("Location : option.php");
               }  
             ?>
            
             <tfoot>
             
             <tr>
                 <td colspan="3" style="font-size:2em;">Liste des Options</td>
             </tr>
             </tfoot>
             
             </table>
             
             
             <div style="text-align:center; font-size : 1.5em; margin-top : 10px"><a style="margin-left:5px;" href="option.php">Accueil Option</a></div>
             
             </body>
             </html>
             










            