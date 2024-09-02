<?php
    session_start();

    include_once("../functions/functions.php");
    $dbConnect = dbLink();
    if($dbConnect){
        echo "<!-- Connection established -->";
    }


    print_r($_POST);
    $city = $_POST["newcity"];
    $state = $_POST["newstate"];

    addLocation($dbConnect, $city, $state) 

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

<body onload="bounce()">
    <script>
        function bounce(){
            window.location.href= "addlocation.php"
        }
    </script>
</body>

</html>