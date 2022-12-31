<?php
session_start();

include("../inc/dbconnection.php");

if(isset($_POST['idenrollement'])){
    $idenrollement=htmlspecialchars($_POST['idenrollement']);
    $req1=$bdd->prepare("SELECT * FROM enrollement WHERE idenrollement = ?");
    $req1->execute(array($idenrollement));
    While($d=$req1->fetch()){
        $iduser=$d['iduser'];
        $idexam=$d['idexam'];
    }
    $req2=$bdd->prepare("SELECT * FROM user WHERE iduser =?");
    $req2->execute( array( $iduser ) );
    While($d2=$req2->fetch()){
        $nom=$d2['nom'];
    }
    $req3=$bdd->prepare("SELECT * FROM exam WHERE idexam =?");
    $req3->execute( array($idexam) ) ;
    While($d3=$req3->fetch()){
        $titre=$d3['titre'];
        $pt=$d3['nombrequestion']*$d3['pointbonnereponse'];
    }



    $req=$bdd->prepare("SELECT * FROM examuserquestionreponse WHERE iduser=? AND idexam=?");
    $req->execute((array($iduser,$idexam)));
    $a=0;
    while ($data = $req->fetch()){
        $a=$a+$data['point'];
        
    }

if($a>=($pt/2)){
    $admission='Admis';
}
else{
    $admission='Non Admis';
}




} 
else{
    header("Location :listeenrollement.php");
}
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
        <h1>Le Resultat d'enrollement de <?php echo $nom;  ?> <span><a href="listeenrollement.php">Return</a></span></h1>
        <table>
        
            <thead>
            <tr>
                <th>Examen</>
                <th>Nom d'Utilisateur </th>
                <th>Score</th>
                <th>Admission</th>
                
            </tr>
            </thead>
            <tbody>
             
                         <tr>
                              <td><?php echo $titre ; ?></td>
                              <td><?php echo $nom; ?></td>
                              <td><?php echo $a ; ?></td>
                              <td><?php echo $admission; ?></td>
                             
                          </tr>
                          </tbody>
                          
            
             <tfoot>
             
             <tr>
                 <td colspan="4"><?php  echo $nom ;  ?></td>
             </tr>
             </tfoot>
             
             </table>
             
             
             <div style="text-align:center; font-size : 1.5em; margin-top : 10px"><a style="margin-left:5px;" href="listeenrollement.php">Liste Enrollement</a></div>
             
             </body>
             </html>
             




