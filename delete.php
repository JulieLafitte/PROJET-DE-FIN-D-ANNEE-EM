<?php 
    $bdd = new PDO('mysql:host=mysql-julielafitte.alwaysdata.net; dbname=julielafitte_theweeknd; charset=utf8', '209010', 'admin0902', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    
    session_start();
    if(!isset($_SESSION['utilisateur'])){
        header('location:login.php');
    }

    $id=($_GET['id']);

    $tour = $bdd -> query(" DELETE FROM `tour` WHERE id =$id");
    header('location:admin.php')
?>