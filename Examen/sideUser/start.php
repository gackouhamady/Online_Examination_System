<?php
session_start();
include("../inc/dbconnection.php");
if(isset($_POST['idexam'])){
    $_SESSION['idexam']=$_POST['idexam'];
}
$date=strtotime(date("Y/m/d"));
$res=$bdd->prepare("SELECT * FROM exam WHERE idexam =? ");
$res->execute(array($_SESSION['idexam']));
$d=strtotime($res->fetch()['date']);
if($date > $d){
 header("Location:exam.php?error=date_limite");
}
if($date < $d){
  header("Location:exam.php?error=date_atteinte");
}










?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src=""></script>
    <style>
        h1{
              text-align : center;
              font-size : 4em;
              font-weight :  bold;
              color : black;
        }

        body{
            backgrounD-image: url("../images/startTest.jpeg");
            background-repeat: no-repeat;
            background-size:cover;
        }
a{
    color : black;
    font-weight : bold;

}

button {
    margin-top :20px;
    margin : 100px;
    width : 250px;
    padding : 10px;
    font-size: 1.3em;
    font-weight : bold;
    background-color :white;

   
}
a :hover{
    text-decoration :none;
    color :green;
}





    </style>
</head>
<body>
    <h1>Online Examination System</h1>
    <div class="container-fluid">
        <div class="row" >
            <div class="col-sm-6">
                <button><a href="examination.php" >Start Test</a></button>
            </div>
            <div class="col-sm-6">
              <button><a href="quitter.php">Quitter</a></button>
            </div>
            <div class="col-sm-6">
              <button><a href="exam.php">Retour</a</button>
              </div>
            </div> 
    </div>
     









</body>
</html>