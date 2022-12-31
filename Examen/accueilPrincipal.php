<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Principal du site</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>

html{
    scroll-behavior: smooth;
}
body{
    
    margin: 5px;
    border-radius: 20px;

}
#principal{
    background-image: url(images/accueilPrincipal.png);
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 20px;
}
h1{
    text-align: center;
    font-weight: bold;
    border-radius: 40px;
    text-shadow: 0 -1px 0 #fff, 0 1px 0 #2e2e2e, 0 2px 0 #2c2c2c, 0 3px 0 #2a2a2a, 0 4px 0 #282828, 
    0 5px 0 #262626, 0 6px 0 #242424, 0 7px 0 #222, 0 8px 0 #202020, 0 9px 0 #1e1e1e, 0 10px 0 #1c1c1c,
    0 11px 0 #1a1a1a, 0 12px 0 #181818, 0 13px 0 #161616, 0 14px 0 #141414, 0 15px 0 #121212, 
    0 22px 30px rgba(0,0,0,0.9), 0px 0px 2px #CE5937;
    color: #e0dfdc;
    background: #556677;
}

@keyframes animation {
    5%{
        opacity: 1;
        transform: translateX(-450px);

    }
    10%{
        opacity: 1;
        transform: translateX(450px);

    }
    15%{
        opacity: 1;
        transform: translateX(-450px);

    }
    20%{
        opacity: 1;
        transform: translateX(450px);
    }
    25%{
        opacity: 1;
        transform: translateX(-450px);

    }
    30%{
        opacity: 1;
        transform: translateX(450px);

    }
    35%{
        opacity:1;
        transform: translateX(-450px);

        
    }
    40%{
        opacity: 1;
        transform: translateX(450px);
    }
    45%{
        opacity: 1;
        transform: translateX(-450px);

    }
    50%{
        opacity: 1;
        transform: translateX(450px);

    }
    55%{
        opacity: 1;
        transform: translateX(-450px);

    }
    60%{
        opacity: 1;
        transform: translateX(450px);
    }
    65%{
        opacity: 1;
        transform: translateX(-450px);

    }
    70%{
        opacity: 1;
        transform: translateX(450px);

    }
    75%{
        opacity:1;
        transform: translateX(-450px);

        
    }
    80%{
        opacity: 1;
        transform: translateX(450px);
    }
    85%{
        opacity:1;
        transform: translateX(-450px);

        
    }
    90%{
        opacity: 1;
        transform: translateX(450px);
    }
    95%{
        opacity:1;
        transform: translateX(-450px);

        
    }
    100%{
        opacity: 1;
        transform: translateX(450px);
    }
    
}
h2{
    text-align: center;
    animation: animation ease 120s;
    text-shadow: 0 1px 0 #CCCCCC, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9,
     0 5px 0 #aaa, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3),
     0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);
    color :#fff;
}

ul{
    text-align: center;
    padding: 20px;
}
li{
    color: aliceblue;
    list-style-type: none;
    display: inline;
    padding: 50px;
    margin: auto;
    color: rgb(237, 239, 243);
    font-size: 4em;
    font-weight: bold;
    text-shadow: 5px 5px 5px rgb(199, 186, 186);
    font-style: italic;
}
nav{

    padding: 0;
    margin: 0;
}
#welcome{
    text-align: center;
    font-weight: bold;
    font-style: italic;
}
h6{
    margin-left: 150px;
    margin-bottom: 2px;
    font-size: 1.5em;
    font-weight: bold;
}
#premier{
    margin-top: 80px;
}
.nom{
margin-left: 250px;
}
#dernier{
    margin-bottom: 80px;
} 
a:hover{
    text-decoration:none;
    color : blue;
}
a{
    color: #FFFFFF;
    text-shadow: 0 1px 0 #CCCCCC, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9,
     0 5px 0 #aaa, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3),
     0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);

}
    </style>
</head>
<body>
    <header>
        <h1>
           Online Examination <br> System
        </h1>
    </header>
    <main id="principal">
        <nav>
            <ul>
                <div class="container-fluid">
                    <div class="row">

                    <div class="col-sm-4">
                    <li><a href="sideAdmin/index.php">Admin</a></li>
                  
                   </div>

                   <div class="col-sm-4">
                   <li><a href="sideTeacher/index.php">Teacher</a></li>
                   </div>
                    
                    <div class="col-sm-4">
                    <li><a href="sideUser/index.php">User</a></li>
                    </div>

                    

               
                    </div>
                </div>
            </ul>
        </nav>
        <div class="col-sm-12" id="trait1">

        </div>
        <h2 id="welcome">
            Welcome to Online Exam  !!
        </h2>
        <div class="col-sm-12" id="trait2">

        </div>
        <div>
        <p id="premier">
            <h6>Guided by :</h6>
            <h6 class="nom">Dr Sidibé</h6>
        </p>
        <div class="col-sm-12" id="trait2">

        </div>
        <p id="dernier">
            <h6>Presented by :</h6>
            <h6 class="nom">Hamady Gackou</h6>
            <h6 class="nom">Fatoumata Binta Keita</h6>
        </p>
        </div>


    </main>
    <footer>

    </footer>
</body>
</html>