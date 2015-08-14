<?php
    if (!empty($_POST['input']) && $_POST['input'] != "" ) {
        $todo = $_POST['input'];


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "todo";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully";
        $sql = "INSERT INTO todo (todo,checked )
        VALUES ('$todo',1)";
        if ($conn->query($sql) === TRUE) {
            echo "<li>" . '<div class="view">' . '<input class="toggle" type="checkbox">' . "<label>" .
                $todo . "</label>" . '<button class="destroy">' . "</div>" ."</li>";
        } else {
            //echo "<br>Error: " . $sql . "<br>" . $conn->error;
            echo "<p>This todo da ton tai</p>";
        }
    }
?>
