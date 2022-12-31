<?php 
session_start();
if(isset($_POST['idexam'])){
    $_SESSION['idexam']=$_POST['idexam'];
    header("Location: exmodifier.php");

}
else{
    header("Location: listeExamen.php");
}
?>