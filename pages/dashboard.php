<?php

    session_start();

    include_once("../functions/functions.php");
    $dbConnect = dbLink();
    if($dbConnect){
        echo "<!-- Connection established -->";
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    validate($dbConnect, $username, $password)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OZ UFO</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <header>
        <nav>
            <div>
                <a href="../index.php"><img src="../images/OZ_UFO_logo.png" alt="OZ UFO Logo"></a>
                <a href="../index.php">Home</a>
                <a href="./sightings.php">UFO Sightings</a>
            </div>
            <?php
               navigation("dashboard")
            ?>
            
        </nav>
    </header>

    <div class="cta">
        <h1>Dashboard</h1>
    </div>

    <main>
        <?php
            if($_SESSION["validate"] == "validated"){
                echo "<h2>Welcome " .$_SESSION['username']. "</h2><hr><br>
                <a href='./addlocation.php'>Add a New Location</a><br><br><hr><br>
                <h3>Location</h3>";
                displayLocations();
                echo "<br><hr><h2>Sightings</h2>";
                displaySightings();
                echo "<br><hr><h2>All Data</h2>";
                display();

            } else{
                //Get the user to login again
                echo 'Login failed, click Home and try again';
            }
        ?>
        
    </main>
        
    <footer>
        <p>&copy; 2024 OZ UFO</p>
    </footer>
    
</body>

</html>