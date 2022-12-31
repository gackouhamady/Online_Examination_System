<?php 
session_start();
if(isset($_POST['idquestion'])){
    $_SESSION['idquestion']=$_POST['idquestion'];
    header("Location: modifierQuestion.php");

}
else{
    header("Location: listeQuestion.php");
}
?>