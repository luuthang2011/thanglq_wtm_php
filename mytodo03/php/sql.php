<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "todo";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";
    $sql = "SELECT todo FROM todo";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<li>" . '<div class="view">' . '<input class="toggle" type="checkbox">' . "<label>" .
                $row['todo'] . "</label>" . '<button class="destroy">' . "</div>" ."</li>";
            //echo "<p>". $row['todo'] . "</p>";
        }
    }
?>
