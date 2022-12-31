<?php

include("../inc/dbconnection.php");

$res=$bdd->prepare("SELECT * FROM exam WHERE idexam =? ");
$res->execute(array($_SESSION['idexam']));
$minutes = $res->fetch()['duree'];  

$redirection = 'userScore.php'; 



$secondes = mktime(date("H") ,date("i") + $minutes,date("s") ) - time();
  
?>

<html>
<head>
<title>compte a rebour</title>
<script type="text/javascript">
var temps = <?php echo $secondes;?>;
var timer =setInterval('CompteaRebour()',1000);
function CompteaRebour(){

  temps-- ;
  m = parseInt(temps/60);
  s = parseInt(temps%60) ;
  document.getElementById('minutes').innerHTML= (m<10 ? "0"+m : m) + ' m ';
  document.getElementById('secondes').innerHTML= (s<10 ? "0"+s : s) + ' s ';
if (m ==0 && s==0) {
   clearInterval(timer);
   url = "<?php echo $redirection;?>"
   Redirection(url)
}
}
function Redirection(url) {
setTimeout("window.location=url", 500)
}
</script>
</head>

<body onload="timer">
<?php
// la condition est que le nombre de seconde soit etre superieur a 24 heures
if ($secondes <= 30*60) {
?>
<p style="font-weight : bold;position:fixed; color:red; top:180px; right:40px; font-size : 1.5em;"> Il vous reste comme temps <span id="minutes">Il vous reste comme temps </span>
<span id="secondes">Il vous reste comme temps </span>
</p>
<?php
 }
?>
<body>
<html>

