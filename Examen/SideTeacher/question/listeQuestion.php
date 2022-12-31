<?php
session_start();
if(isset($_GET['error'])){ ?>
    <div style="text-align:center; font-size :1.5em; color :red;"> <?php echo "Suppression d'une Question ayant des options est impossible <br/> Veuillez supprimer d'abord les options !! <br/>"; ?></div>
<?php }
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
            margin: 10px;
            padding: 15px;
            text-align:center;
            font-size : 1.3em;
            
        }
        input[value="Details"],input[value="Supprimer"],input[value="Modifier"],input[value="Gerer option"]{
            color:white;
            background:green;
            margin:5px;
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
        <h1 style="text-align:center;">Liste des Questions <span><a href="question.php">Return</a></span></h1>
        <table>
        
            <thead>
            <tr>
                <th>Titre</th>
                <th>Option de Choix</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
             <?php
             include("../../inc/dbConnection.php");
             if(isset($_SESSION['idexam'])){
             $idexam=$_SESSION['idexam'];
                 $req=$bdd->prepare("SELECT * FROM question WHERE idexam=?");
                 $req->execute(array($idexam));
                 while ($data = $req->fetch()){
                     $nb_data = count($data);
                     for($i = 0; $i < $nb_data; $i++);
                     { ?>
                         <tr>
                              <td><?php echo $data["titre"]; ?></td>
                              <td><?php echo $data["optionreponse"]; ?></td>
                              <td><form action="detailQuestion.php" method="POST">
                                  <input type="hidden" name="idquestion" value="<?php echo $data['idquestion']; ?>"/>
                                  <input type="submit" value="Details"/>
                              </form>
                              <form action="supprimerQuestion.php" method="POST">
                                  <input type="hidden" name="idquestion" value="<?php echo $data['idquestion']; ?>"/>
                                  <input title="Cette Operation est irréversible" type="submit" value="Supprimer"/>
                              </form>
                              <form action="session.php" method="POST">
                                  <input type="hidden" name="idquestion" value="<?php echo $data['idquestion']; ?>"/>
                                  <input type="submit" value="Modifier"/>
                              </form>
                              <form action="option/option.php" method="POST">
                                  <input type="hidden" name="idquestion" value="<?php echo $data['idquestion']; ?>"/>
                                  <input type="submit" value="Gerer option"/>
                              </form>
                              </td>
             
             
                          </tr>
                          </tbody>
                          <?php
                          }
                          
                        
             }
             }
        
             
             else{
                 header("Location : question.php");
               }  
             ?>
            
             <tfoot>
             
             <tr>
                 <td colspan="3">Liste des Questions</td>
             </tr>
             </tfoot>
             
             </table>
             
             
             <div style="text-align:center; font-size : 1.5em; margin-top : 10px"><span></span><a style="margin-left:5px;" href="question.php">Accueil Question</a></div>
             
             </body>
             </html>
             










            