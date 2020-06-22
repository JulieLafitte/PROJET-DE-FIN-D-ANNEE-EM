<?php

    session_start();
    if(!isset($_SESSION['utilisateur'])){
        header('location:login.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Weeknd Admin</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="60x60" href="favicon_package_v0.16/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_package_v0.16/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_package_v0.16/favicon-16x16.png">
    <link rel="manifest" href="favicon_package_v0.16/site.webmanifest">
    <link rel="mask-icon" href="favicon_package_v0.16/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>
<body>
    
    <div class="background">

        <div class="row admin-logo">
           <a href="index.php"><img src="assets/icones/logo-blanc.svg" alt="logo"></a> 
        </div>

        <div class="row admin-title">
            <h1>Dates : </h1>
        </div>

        <div class="row admin-dates">
            
            <div class="col-12 ">
                <div class=" form">
                    <form action="add.php" method="POST">
                        <label for="date">Date:</label>
                        <input type="date" name="date" id="date" required>
                        <label for="lieux"> Lieux:</label>
                        <input type="text" name="lieux" id="lieux" required>
                        <label for="heure">Heure:</label>
                        <input type="text" id="heure" name="heure" required>
                        <label for="salle">Salle:</label>
                        <input type="text" name="salle" id="salle" required>
                        <input type="submit" class="addbutton" value="ajouter">
                    </form>
                </div>
            </div>
            
            <div class="col-12">

            
            <table>
        <?php 
           $bdd = new PDO('mysql:host=mysql-julielafitte.alwaysdata.net; dbname=julielafitte_theweeknd; charset=utf8', '209010', 'admin0902', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

            $tour = $bdd -> query("SELECT * FROM tour ORDER BY date ");
            $x=0;
            foreach($tour as $key => $value){
                $x++;

                if($x<1){
                    echo("Il n'y à pas encore de dates prevue pour le moment");
                }else{
                    echo("<tr><td class=\"date-cell\">".$value['date']."</td><td class=\"date-cell\">".$value['location']."</td><td class=\"date-cell\">".$value['time']."</td><td class=\"date-cell\">".$value['place']."</td><td class=\"date-cells\"><a href=\"delete.php?id=".$value['id']."\">X </a></td></tr>");
                }
            }
              ?>
              </table>                          
              </div>
        </div>
            <div class="logout">
                <a href="logout.php">Se déconnecter</a>
            </div>
    </div>

    <!-- Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</body>
</html>