<?php
session_start();
include("../inc/dbconnection.php");
if(isset($_POST['idteacher'])){
    $idteacher=htmlspecialchars($_POST['idteacher']);
    $autorisation=htmlspecialchars($_POST['autorisation']);
    $req=$bdd->prepare("UPDATE teacher  SET autorisation=? WHERE idteacher=?");
    $req->execute(array( $autorisation,$idteacher));
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
            margin: auto;
            border-collapse:collapse;
            border:5px solid #000;
            box-shadow: 4px 4px 2px;

        }
        th{
            color: white;
            background-color:darkgreen;
        }
        th,td{
            border: 2px solid #000;
            margin: 20px;
            padding: 20px;
            text-align:center;
            font-size:1.3em;
            
        }
        input[value="Details"]{
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
        <h1 style="text-align:center;">Liste des enseignants <span><a href="accueilAdmin.php">Return</a></span></h1>
        
        <table>
            <thead>
            <tr>
                <th>Nom complet</th>
                <th>Adresse email </th>
                <th>Image </th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
             <?php
                 $user="root";
                 $mdp="";
                 $db="examen";
                 $server="localhost";
                 $link=mysqli_connect($server,$user,$mdp,$db);
                 $req=mysqli_query($link,"SELECT * FROM teacher");
                 $a=0;
                while($res=mysqli_fetch_array($req)){
                    $a=$a+1;
                    $aut=$res['autorisation'];

                    if($aut=='oui'){
                        $val='Accès autorisé';
                    }
                    else{
                        $val='Accès non Autorisé';
                    }
            ?>
        
             <tr>
                 <td><?php echo $res["nom"]; ?></td>
                 <td><?php echo $res["mail"]; ?></td>
                 <td><?php  echo "<img src='../upload/".$res['image']."' width='300px' height='150px' ><br>"; ?></td>
                 <td><form action="detailTeacher.php" method="POST">
                     <input type="hidden" name="id" value="<?php echo $res['idteacher']; ?>"/>
                     <input type="submit" value="Details"/>
                 </form>
                 <form action="" method="POST" id="<?php echo 'idform'.$a; ?>"  onsubmit="return sendData(this.id);" >
                     <input type="hidden" name="idteacher" id="<?php echo 'idteacher'.$a; ?>" value="<?php echo $res['idteacher']; ?>"/>
                     <select id="<?php echo 'select'.$a; ?>" style="background-color:green;margin-left:100px;font-weight:bold;color:white; width:50px;"class="form-control" name="autorisation" style="margin-left:100px; width:100px;" size="1" style="width:100px;" >
                
                    <option value="oui">oui</option>
                    <option value="non">non</option>
                    </select>           
                     <input onclick="copierText(this.id)" type="submit" value=" <?php echo $val ?>" id="<?php echo 'sub'.$a?>"  style="color:white;background:green;margin:5px;font-size:1.3em;"   />
                 </form>
                 </td>


             </tr>
             </tbody>
             <?php
             }
             ?>
            <tfoot>

            <tr>
                <td colspan="4" style="font-size : 2em;">Liste des Enseignants</td>
            </tr>
            </tfoot>









        </table>
        <div style="text-align:center; font-size : 1.5em; margin-top : 10px"><a style=" margin-left : 5px" href="accueilAdmin.php">Accueil</a></div>

    </body>
</html>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script type="text/javascript">

       var nb='<?PHP echo $a; ?>';
       
      function sendData(e_id)
      { 
        for (let j = 1; j <= nb; j++) {
           
           if(e_id=="idform"+j){
            var idteacher = document.getElementById("idteacher"+j).value;
            var autorisation = document.getElementById("select"+j).value;
          }
          
       }
       
        $.ajax({
          type: 'post',
          url: 'teacher.php',
          data: {
            idteacher:idteacher,
            autorisation:autorisation
          },
          success: function (response) {
            $('#res').html("");
          }
        });
          
        return false;
      }


      function copierText(id){
        for (let i = 1; i <= nb; i++) {
            if(id=="sub"+i){    
                if(document.getElementById("select"+i).value=="oui"){
                    document.getElementById(id).value= "Accès autorisé";
                }
                if(document.getElementById("select"+i).value=="non"){
                    document.getElementById(id).value= "Accès non autorisé";
                }
           }
        }
     }
      
    </script>


