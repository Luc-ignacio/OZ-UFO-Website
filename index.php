<?php
    session_start();

    include_once("./functions/functions.php");
    $dbConnect = dbLink();
    if($dbConnect){
        echo "<!-- Connection established -->";
    }

    $logoutStatus = $_GET["logout"];
    if($logoutStatus == "logout"){
        session_unset();
        session_destroy();
        session_regenerate_id();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OZ UFO</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    
    <header>
        <nav>
            <div>
                <a href="index.php"><img src="./images/OZ_UFO_logo.png" alt="OZ UFO Logo"></a>
                <a href="index.php">Home</a>
                <a href="./pages/sightings.php">UFO Sightings</a>
            </div>
            
            <?php
               navigation("index")
            ?>

        </nav>
    </header>

    <div class="cta">
        <h1>Mysteries from Down Under</h1>
    </div>

    <main>
        <h2>What Are UFOs?</h2>
        <p>UFOs, or Unidentified Flying Objects, are any aerial phenomenon that cannot be readily identified or explained. While the term often evokes images of extraterrestrial spacecraft, many UFO sightings can be attributed to natural phenomena, man-made objects, or misidentifications of conventional aircraft.</p>
        
        <h2>History of UFO Sightings in Australia</h2>
        <p>Australia has a rich history of UFO sightings dating back to the early 20th century. One of the earliest recorded sightings occurred in the 1950s when a series of mysterious lights were reported in the skies over rural areas. In the decades that followed, numerous reports have emerged from various regions, capturing the interest of both local and international UFO enthusiasts.</p>

        <p>Australia's UFO sightings continue to intrigue and mystify. Whether you're a seasoned ufologist or a curious newcomer, there's a wealth of information to discover about these unexplained aerial phenomena. Keep exploring, keep questioning, and who knows—maybe you'll be the next to witness something truly extraordinary!</p>

    </main>
        
    <footer>
        <p>&copy; 2024 OZ UFO</p>
    </footer>
    
</body>

</html>