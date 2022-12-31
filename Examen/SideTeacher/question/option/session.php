<?php 
session_start();
if(isset($_POST['idoption'])){
    $_SESSION['idoption']=$_POST['idoption'];
    header("Location: modifierOption.php");

}
else{
    header("Location: listeQuestion.php");
}
?>