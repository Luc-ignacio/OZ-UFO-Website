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
        <h1>Add Location</h1>
    </div>

    <main>
        <?php
            if($_SESSION["validate"] == "validated"){
                //Do something once validate
                echo'
                
                <form class="allform" action="./actionaddlocation.php" method="post">
                    <input type="text" name="newcity" placeholder="Enter City"><br>
                    <input type="text" name="newstate" placeholder="Enter State"><br>
                    <input type="submit" value="Add Location">
                </form>
                ';
            } else{
                //Get the user to login again
                echo 'Click Home and try again';
            }
        ?>
    </main>
        
    <footer>
        <p>&copy; 2024 OZ UFO</p>
    </footer>
    
</body>

</html>