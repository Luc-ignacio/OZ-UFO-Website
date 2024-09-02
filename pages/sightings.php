<?php

    session_start();

    include_once("../functions/functions.php");
    $dbConnect = dbLink();
    if($dbConnect){
        echo "<!-- Connection established -->";
    }

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
               navigation("sightings")
            ?>
        </nav>
    </header>

    <div class="cta">
        <h1>Explore UFO Data</h1>
    </div>

    <main>
        <h2>Join the Investigation</h2>
        <p>The truth is out there, and the more we explore, the closer we get to understanding these mysterious occurrences. Start your search now and delve into the fascinating world of UFOs in Australia.</p>

        <br><hr><h2>Locations</h2>
        <?php
            displayLocationsOnly();
        ?>
        
        <br><hr><h2>Sightings</h2>
        <?php
            displaySightings();
        ?>

        <br><hr><h2>All Data</h2>
        <?php
            display();
        ?>
        
    </main>
        
    <footer>
        <p>&copy; 2024 OZ UFO</p>
    </footer>
    
</body>

</html>