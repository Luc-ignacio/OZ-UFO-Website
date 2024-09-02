<?php
    function dbLink() {
        $mysqli = new mysqli('localhost','mri','password','ictdbs507_51');
        if ($mysqli -> connect_error) {
            echo 'Failed to connect to MySQL: '.$mysqli -> connect_error;
        }
        return $mysqli;
    }

    function display() {
        $conn = dbLink();
        $sql = $sql = " SELECT * FROM Sightings INNER JOIN Locations ON Sightings.LocationID = Locations.LocationID ORDER BY Sightings.Date";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table class='table' border='0'>";
            echo "<tr><th>Date</th><th>Description</th><th>City</th><th>State</th></tr>";

            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Date"] . "</td>";
                echo "<td>" . $row["Description"] . "</td>";
                echo "<td>" . $row["City"] . "</td>";
                echo "<td>" . $row["State"] . "</td>";
                echo "</tr>";
            }
    
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function displayLocationsOnly() {
        $conn = dbLink();
        $sql = "SELECT * FROM Locations ORDER BY City";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table class='table' border='0'>";
            echo "<tr><th>City</th><th>State</th></tr>";

            while($row = $result->fetch_assoc()) {
                $item_id = $row["LocationID"];
                echo "<tr>";
                echo "<td>" . $row["City"] . "</td>";
                echo "<td>" . $row["State"] . "</td>";
                echo "</tr>";
            }
    
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function displayLocations() {
        $conn = dbLink();
        $sql = "SELECT * FROM Locations ORDER BY City";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table class='table' border='0'>";
            echo "<tr><th>City</th><th>State</th><th>Action</th></tr>";

            while($row = $result->fetch_assoc()) {
                $item_id = $row["LocationID"];
                echo "<tr>";
                echo "<td>" . $row["City"] . "</td>";
                echo "<td>" . $row["State"] . "</td>";
                echo "<td><a href='updatelocation.php?LocationID=".$item_id."'>Update</a><br>
                <a href='removelocation.php?LocationID=".$item_id."'>Remove</a></td>";
                echo "</tr>";
            }
    
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function displaySightings() {
        $conn = dbLink();
        $sql = " SELECT * FROM Sightings ORDER BY Date";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table class='table' border='0'>";
            echo "<tr><th>Date</th><th>Description</th></tr>";

            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Date"] . "</td>";
                echo "<td>" . $row["Description"] . "</td>";
                echo "</tr>";
            }
    
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function addLocation($dbConnect, $city, $state) {
        $sql = "INSERT INTO Locations (City, State) VALUES ('$city', '$state')";
        if (mysqli_query($dbConnect, $sql)) {
            echo "New location added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbConnect);
        }
    }

    function updateLocation($dbConnect, $LocationID, $newcity) {
        $sql = "UPDATE Locations SET City='$newcity' WHERE LocationID='$LocationID'";
        if (mysqli_query($dbConnect, $sql)) {
            echo "Location updated successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbConnect);
        }
    }
    

    function removeLocation($dbConnect, $LocationID) {
        $sql = "DELETE FROM Locations WHERE LocationID='$LocationID'";
        if (mysqli_query($dbConnect, $sql)) {
            echo "Location deleted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbConnect);
        }
    }
    
    function validate($dbConnect, $username, $password) {
        $sql = "SELECT * FROM users";
        $result = mysqli_query($dbConnect,$sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["username"] == $username){
                    if ($row["password"] == $password) {
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['validate'] = 'validated';
                        return true;
                    }
                }
            }
        }
    }


    function navigation($page){
        if($page == "index"){
            if($_SESSION["validate"] == "validated"){
                // logged in index page
                echo '
                <div>
                    <a href="pages/dashboard.php">Dashboard</a>
                    <a href="index.php?logout=logout">Logout</a>
                </div>
                ';
            } else{
                // annonymous access
                echo '
                <form class="login" action="./pages/dashboard.php" method="post">
                    <input type="text" name="username" placeholder="Enter Username">
                    <input type="password" name="password" placeholder="Enter Password">
                    <input type="submit" name="submit" value="Login">
                </form>
                <div><a class="register" href="./pages/register.php">Register</a></div>
                ';
            }
        } else{
            if($page == "dashboard"){
                if($_SESSION["validate"] == "validated"){
                    // logged in dashboard
                    echo '
                        <div>
                            <a href="dashboard.php">Dashboard</a>
                            <a href="../index.php?logout">Logout</a>
                        </div> ';
                } 
            }

            if($page == "sightings"){
                if($_SESSION["validate"] == "validated"){
                    // logged in sightings
                    echo '
                        <div>
                            <a href="dashboard.php">Dashboard</a>
                            <a href="../index.php?logout">Logout</a>
                        </div> ';
                } else {
                    // annonymous access
                    echo '
                        <form class="login" action="./dashboard.php" method="post">
                            <input type="text" name="username" placeholder="Enter Username">
                            <input type="password" name="password" placeholder="Enter Password">
                            <input type="submit" name="submit" value="Login">
                        </form>
                        <div><a class="register" href="register.php">Register</a></div>
                        ';
                }
            }

        }
    }

    function register($dbConnect, $username, $password) {
        $sql = "INSERT INTO users (id, username, password) VALUES (NULL, '$username', '$password')";
        if (mysqli_query($dbConnect, $sql)) {
            echo "User added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbConnect);
        }
    }
    

?>