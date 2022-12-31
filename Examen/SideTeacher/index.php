<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Systeme de connexion/d'enregistrement</title>
    <style>
        html{
    scroll-behavior: smooth;
}
body{
    margin: 5px;
    border-radius: 40px;
}
a{
    text-align: center;
    font-size: 2em;
    padding: 20px;
    font-weight: bold;
    text-decoration:none;
    color:blue;
}
a:hover{
    color : green;
}
h1{
    text-shadow: 1px -1px 0 #767676, -1px 2px 1px #737272, -2px 4px 1px #767474,
     -3px 6px 1px #787777, -4px 8px 1px #7b7a7a, -5px 10px 1px #7f7d7d, -6px 12px 1px #828181,
      -7px 14px 1px #868585, -8px 16px 1px #8b8a89, -9px 18px 1px #8f8e8d, -10px 20px 1px #949392,
       -11px 22px 1px #999897, -12px 24px 1px #9e9c9c, -13px 26px 1px #a3a1a1, -14px 28px 1px #a8a6a6, 
       -15px 30px 1px #adabab, -16px 32px 1px #b2b1b0, -17px 34px 1px #b7b6b5, -18px 36px 1px #bcbbba, 
       -19px 38px 1px #c1bfbf, -20px 40px 1px #c6c4c4, -21px 42px 1px #cbc9c8, -22px 44px 1px #cfcdcd, 
       -23px 46px 1px #d4d2d1, -24px 48px 1px #d8d6d5, -25px 50px 1px #dbdad9, -26px 52px 1px #dfdddc,
        -27px 54px 1px #e2e0df, -28px 56px 1px #e4e3e2, 0px 0px 2px #CE5937;    

}
header{
    text-align: center;
    background-color: rgba(19, 197, 57, 0.343);
    margin: auto;
    padding: 10px;
    border-radius: 80px;
    font-size: 2em;
    margin-bottom: 20px;

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
    font-size: 2em;
    font-style: italic;
    
}

.id1{
    margin-top: 60px;
    text-align: center;
    padding: 20px;
}
main{
    margin-top: 20px;
    background-color: rgb(218, 201, 205);
    border-radius: 80px;
    box-shadow: 6px 6px 6px 6px rgb(175, 213, 21);

}
#principal{
    text-align: right;
    padding: 10px;
    margin-bottom: 10px;
}
.principal{
    color: rgb(19, 220, 27);
}
span{
    font-size: 1.5em;
    font-weight: bold;
}


    </style>
</head>
<body>
    <header>
        <h1>Online Examination System</h1>
    </header>
    <main>
         <h2>
            welcome for the Teacher side !!
         </h2>
         <div class="col-sm-12">
             <div class="row">
                 <div class="id1"><a href="form.php">S'enregistrer</a></div>
                 <div class="id1"><a href="connecter.php">Se connecter</a></div>
                 <div style="margin-right : 80px;" id="principal"><span>Return To</span><a class="principal" href="../accueilPrincipal.php">Accueil</a></div>
             </div>
         </div>
    </main>
    <footer>

    </footer>
    

</body>
</html>