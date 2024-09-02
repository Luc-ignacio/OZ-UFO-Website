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
        <h1>Register now and join the UFO seekers club</h1>
    </div>

    <main>
        <form class="allform" action="actionregister.php" method="post">
            <input type="text" name="username" placeholder="Enter Username"><br>
            <input type="password" name="password" placeholder="Enter Password"><br>
            <input type="submit" value="Sign Up">
        </form>
        
    </main>
        
    <footer>
        <p>&copy; 2024 OZ UFO</p>
    </footer>
    
</body>

</html>