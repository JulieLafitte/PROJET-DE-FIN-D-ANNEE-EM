<?php 
    $bdd = new PDO('mysql:host=mysql-julielafitte.alwaysdata.net; dbname=julielafitte_theweeknd; charset=utf8', '209010', 'admin0902', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    
    session_start();
    
    if(!isset($_SESSION['utilisateur'])){
        header('location:login.php');
    }

    $login = $bdd -> query("SELECT * FROM user ");

    foreach($login as $key => $value){
        if(($value['id']==$_POST['id'])&&($value['password']==$_POST['mdp'])){
            header('location:admin.php');
            $_SESSION['utilisateur']=$_POST['id'];
        }else{
            header('location:login.php');
        }
    }

   
                                        