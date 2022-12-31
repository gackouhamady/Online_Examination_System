<?php  
  session_start();

include("../inc/dbconnection.php");


if(isset($_POST['send'])){
    $req1=$bdd->prepare("SELECT COUNT(mail) AS nbre_mail FROM admin WHERE mail=?");
    $req1->execute(array($_POST['mail']));
    $result=$req1->fetch();
    if($result['nbre_mail']>0){
        header("Location:form.php?error=email_existe");
    }
    
    else{
        $nom=htmlspecialchars($_POST['nom']);
        $mail=htmlspecialchars($_POST['mail']);
        $password=htmlspecialchars($_POST['password']);
        $req=$bdd->prepare("INSERT INTO admin(nom,mail,password)VALUES(:nom,:mail,:password)");
        $req->execute(array(
            'nom'=>$nom,
            'mail'=> $mail,
            'password'=>$password
        ));
        $req->closeCursor();


        $req2=$bdd->prepare("SELECT * FROM admin WHERE nom=? AND mail=? AND password=? ");
        $req2->execute(array($nom,$mail,$password));
        if($req2->rowCount()>0){
            $_SESSION['idadmin']=$req2->fetch()['idadmin'];
            $_SESSION['nom']=$nom;
            $_SESSION['$mail']=$mail;
            $_SESSION['password']=$password;
            
        }
        header('Location:form.php?info= Enregistrer');
    }
    if(empty($_POST['nom']) or empty($_POST['mail']) or  empty($_POST['password'])){
        header('Location:form.php?error=empty');
     }
     else{
        $req10=$bdd->prepare("SELECT *  FROM admin");
        $req10->execute();
        if($req10->rowCount()>2){
            header("Location:form.php?error=admin_atteinte"); 
        }
     }
   
}

else{
   header('Location:form.php');
}


?>











