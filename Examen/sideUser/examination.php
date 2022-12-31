<?php

session_start();    
include("../inc/dbconnection.php");
$re121=$bdd->prepare('SELECT COUNT(idenrollement) AS nb_id FROM enrollement WHERE iduser=? AND idexam=?');
$re121->execute(array( $_SESSION['iduser'], $_SESSION['idexam'] )); 
$columns = $re121->fetch();
$nb = $columns['nb_id'];

if($nb>=1){
 header("Location:exam.php?error=existe");
 }
 if($nb==0){
  $rea=$bdd->prepare("INSERT INTO enrollement(iduser, idexam) VALUES(?,?)");
  $rea->execute(array($_SESSION['iduser'],$_SESSION['idexam']));
}



$user="root";
$mdp="";
$db="examen";
$server="localhost";
$link=mysqli_connect($server,$user,$mdp,$db);
if(isset($_SESSION['idexam'])){
   $ide=$_SESSION['idexam'];
$req0=mysqli_query($link,"SELECT * FROM exam  WHERE idexam= $ide");
while($res=mysqli_fetch_array($req0)){
?>
<h1 style="text-align:left;"> Examination de : <?php echo $res['titre']?> </h1>
<?php
}
include("compteur.php");
}












if(isset($_POST['optionreponse'])){
    $useroptionreponse=htmlspecialchars($_POST['optionreponse']);
    $iduser=htmlspecialchars($_SESSION['iduser']);
    $idexam=htmlspecialchars($_POST['idexam']);
    $idquestion =htmlspecialchars($_POST['idquestion']);
    

    $rqte1=$bdd->prepare("SELECT * FROM question WHERE idquestion=?");
    $rqte1->execute(array($idquestion));
    $rqte2=$bdd->prepare("SELECT * FROM exam WHERE idexam=?");
    $rqte2->execute(array($idexam));

            if($rqte1->fetch()['optionreponse']==$useroptionreponse){
            $point=$rqte2->fetch()['pointbonnereponse'];
            }
            else{
                $point=$rqte2->fetch()['pointmauvaisereponse'];
            }

            $re12=$bdd->prepare('SELECT COUNT(idexamuserquestionreponse) AS nb_ide FROM examuserquestionreponse WHERE iduser=? AND idexam=? AND idquestion=?');
            $re12->execute(array( $iduser, $idexam,$idquestion )); 
            $columns = $re12->fetch();
            $nb = $columns['nb_ide'];
            
           if($nb==0){

                $rqte=$bdd->prepare("INSERT INTO examuserquestionreponse(useroptionreponse,point,iduser,idexam,idquestion)VALUES(?,?,?,?,?)");
                $rqte->execute(array($useroptionreponse,$point,$iduser,$idexam,$idquestion));  
          }
            

  }
    


    











?>
 <style> 
           body{
                background-image:url(../images/test.jpeg);
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment :fixed;
            }
            h1{
                
                font-weight : bold;
                text-align : center;
                background-attachment :fixed;

            }
            h3{
                
                font-style:italic; 
                margin-left : 50px;
                margin-top : 20px;
            }
</style>
          
          <link rel="stylesheet" href="../css/bootstrap.css">
          <h1 style="font-weight : bold; position:fixed; top:10px; right :10px;">Online Examination System</h1>
          <div style="margin-bottom:0px;">
          <h3 style="font-weight : bold;position:fixed; color:red; top:80px; right:20px;">
                Attention le test a demarré !!
          </h3>

            <h4 style="font-weight : bold;position:fixed; color:MidnightBlue; top: 220px;px; right:20px;"> Si vous Terminez avant l'heure...<br>
                <a href="userScore.php" style="color :FireBrick; text-decoration :none;">cliquez ici pour voir vos resultats</a>
            </h4>
          



          </div>
        
<?php

if(isset($_SESSION['idexam'])){
$idexam=$_SESSION['idexam'];

include("../inc/dbConnection.php");

$req = $bdd->prepare("SELECT * FROM question WHERE idexam=?");
$req->execute(array($idexam));
$a=0;
 $id=-1;
while ($data = $req->fetch()){
    $nb_data = count($data);
    $id=$id+1;
    $a=$a+1;
    $idquestion=$data['idquestion'];
    for($i = 0; $i < $nb_data; $i++);
    { 
        
          ?>    
          
       <div style="margin-left:150px;font-weight:bold; font-size:1.4em; color : darkblue;" >
         <?php  echo  $a.'. '.$data['titre']; ?>
       </div>
<?php
    }
        $req2= $bdd->prepare("SELECT * FROM option WHERE idquestion=?");
        $req2->execute(array($data['idquestion']));
        $b=0;
        while ($data2 = $req2->fetch()){
            $nb_data2 = count($data2);
            $b=$b+1;
            for($i = 0; $i < $nb_data2; $i++);
            { 
                ?>    
                <div style="margin-left:200px;font-weight:bold;font-size:1.2em; color : black;" >
                  <?php  echo $b.'. '.$data2['titre']; ?>
                </div>
         <?php
            } 
            
          }


?>

               
    <form class="form" id="<?php echo 'idform'.$a; ?>"  method="POST" style="font-weight:bold; color : black;" onsubmit="return sendData(this.id);"  >
                <input type="hidden" name="idquestion" id="<?php echo 'idquestion'.$a; ?>" value="<?php echo $idquestion; ?>">
                <input type="hidden" name="idexam"  id="<?php echo 'idexam'.$a; ?>" value="<?php echo $idexam; ?>">
                <div class="form-group">
                <label for="select" style="margin-left:100px;font-size:1.2em; color:darkgreen;font-weight:bold;"> Selectionner l'option de reponse</label> 
                <select id="<?php echo 'select'.$a; ?>" style="background-color:green;margin-left:100px;font-weight:bold;color:white; width:100px;"class="form-control" name="optionreponse" style="margin-left:100px; width:100px;" size="1" style="width:100px;" >
                
                   <?php       
                          for ($j=1; $j <=$b ; $j++) {  ?>
                            <option value="<?php echo $j ?>"> <?php echo $j ?> </option>

                      <?php    }
                             
                 
                   ?>
                    </select>
                </div>
                <div>
                              
                <div class="form-group">
                
                    <input id="<?php echo 'but'.$a; ?>" class="form-control"  onclick="copierText(this.id)"    style=" width:200px; margin-left:100px; font-weight:bold;background-color:blue;color:white;"type="submit" value="Valider la reponse" >
                        
                </div>

            </form>
          
           
<?php


}

}
else{
  header("Location:exam.php");
}




?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">

       var nb='<?PHP echo $a;?>';
      function sendData(e_id)
      { 
    
        for (let j = 1; j <= nb; j++) {
           
           if(e_id=="idform"+j){
            var optionreponse = document.getElementById("select"+j).value;
            var idquestion = document.getElementById("idquestion"+j).value;
            var idexam = document.getElementById("idexam"+j).value;
          }
       }
       
        $.ajax({
          type: 'post',
          url: 'examination.php',
          data: {
            optionreponse:optionreponse,
            idquestion:idquestion,
            idexam:idexam
          },
          success: function (response) {
            $('#res').html("");
          }
        });
          
        return false;
      }
      function copierText(id){
        for (let i = 1; i <= nb; i++) {
           
            if(id=="but"+i){
                document.getElementById(id).value= "Validé";
           }
        }
     }
      

    </script>


        
           






