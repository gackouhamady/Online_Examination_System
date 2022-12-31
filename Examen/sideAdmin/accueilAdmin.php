<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/accueilAdmin.css">
    <title>AccueilUser</title>
</head>
<style>
  body{
    background-color: rgb(204,204,204);
}
img{
    width: 800px;
    height: 300px;
    float: left;
}
#select{
margin-top: 120px;
}
h2{
    text-align: right;
    font-style: italic;
    margin-bottom: 120px;
}
h1{
    text-align: right;
    font-weight: bold;
}
span{
    background-color: hsl(184, 40%, 72%);
}
button{
    background-color: hsl(184, 40%, 72%);
    width: 350px;
    height: 80px;
    padding: 30px;
    margin: 30px;
    border-radius: 50px;
    font-size: 1.5em;
    font-weight: bold;
}
a:hover{
    text-decoration:none;
}
a{
  color: black;
}
 
</style>

<body>
    <header>
    <div>
    <img src="../images/accueilUser.jpeg" alt="">
        <h2>
           <span>Accueil admin</span> 
        </h2>
         <h1>
            <span>Online Examination System </span>
       </h1> 
    </div>
    </header>
    <main>
    <div class="container-fluid"id="select">
        <div class="row">
            <div class="col-sm-4" >
              <button><a href="user.php">Gerer User</a></button>
            </div>
            <div class="col-sm-4" >
              <button><a href="teacher.php">Gerer Teacher</a></button>
            </div>
            <div class="col-sm-4" >
              <button><a href="changeProfil.php">Changer profil</a></button>
            </div>
            <div class="col-sm-4">
              <button><a href="changePasse.php">Changer mot de passe</a></button>
            </div>
            <div class="col-sm-4" >
              <button><a href="deconnecter.php">Se Deconnecter</a></button>
            </div>
        </div>
    </div>
    </main>
    <footer>

    </footer>
</body>
</html>