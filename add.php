<?php 
   $bdd = new PDO('mysql:host=mysql-julielafitte.alwaysdata.net; dbname=julielafitte_theweeknd; charset=utf8', '209010', 'admin0902', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
   
    session_start();
    if(!isset($_SESSION['utilisateur'])){
        header('location:login.php');
    }

    $date=$_POST['date'];
    $lieux=$_POST['lieux'];
    $heure=$_POST['heure'];
    $salle=$_POST['salle'];

    $req= $bdd -> query ("INSERT INTO tour( date, location, time, place) VALUES ('$date' , '$lieux' , '$heure' , '$salle')");

    header('location:admin.php');

    ?>