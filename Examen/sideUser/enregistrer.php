<?php 

session_start();

include("../inc/dbconnection.php");

if(isset($_POST['send']) && isset($_FILES['file'])){
    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];

    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));

    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    $maxSize = 400000;

    if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){

        $uniqueName = uniqid('', true);
        //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
        $file = $uniqueName.".".$extension;
        //$file = 5f586bf96dcd38.73540086.jpg

        move_uploaded_file($tmpName, '../upload/'.$file);

        $req1=$bdd->prepare("SELECT COUNT(mail) AS nbre_mail FROM user WHERE mail=?  ");
        $req1->execute(array($_POST['mail']));
        $result=$req1->fetch();
        
        if($result['nbre_mail']>0){
            header("Location:form.php?error=mail_existe");
        }
        elseif(empty($_POST['nom']) or  empty($_POST['mail']) or empty($_POST['password']) ){
            header("Location:form.php?error=empty");
        }
        else{
            $nom=htmlspecialchars($_POST['nom']);
            $mail=htmlspecialchars($_POST['mail']);
            $password=htmlspecialchars($_POST['password']);
            $req=$bdd->prepare("INSERT INTO user(nom,mail,password,image)VALUES(:nom,:mail,:password,:image)");
            $req->execute(array(
                'nom'=>$nom,
                'mail'=> $mail,
                'password'=>$password,
                'image'=>$file
            ));
            $req->closeCursor();
    
            $req2=$bdd->prepare("SELECT * FROM user WHERE nom=? AND mail=? AND password=? AND image=?");
            $req2->execute(array($nom,$mail,$password,$file));
            if($req2->rowCount()>0){
                $_SESSION['iduser']=$req2->fetch()['iduser'];
                $_SESSION['nom']=$nom;
                $_SESSION['mail']=$mail;
                $_SESSION['password']=$password;
                $_SESSION['image']=$file;   
            }
                
           header('Location:form.php?info= Enregistrer');
        }
    
    
      
    }
    else{
        echo "Une erreur est survenue";
    }
}

else{
    header('Location:form.php');
}


?>






