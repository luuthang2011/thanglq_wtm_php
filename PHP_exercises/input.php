<form method="post" action="input.php">
    <label>Name: </label>
    <input type="text" name="name">
    <br>
    <label>Pass: </label>
    <input type="password" name="pass">
    <br>
    <label>Tel: </label>
    <input type="tel" name="tel">
    <br>
    <input type="submit">
</form>

<?php
    echo '<pre>'.print_r($_POST,true).'</pre>';
    $error = false;
    if (empty($_POST['name']) || empty($_POST['pass']) || empty($_POST['tel'])) {
        $error = true;
    }
    if ($error) {
        echo "error -> pls enter all information";
        exit;
    }
    else {
        $name = $_POST['name'];
        $pass = "aj" . $_POST['pass'] . "ja";  //hash
        $tel = $_POST['tel'];
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "exerciseusers";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $sql = "SELECT USERNAME FROM exerciseusers WHERE USERNAME = '$name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "the username da ton ton tai -> try again! <br>";
        }
    } else {
        $sql = "INSERT INTO exerciseusers (USERNAME, PASSWORD_HASH, PHONE)
        VALUES ('$name', '$pass', '$tel')";
            if ($conn->query($sql) === TRUE) {
                echo "<p>New record created successfully</p>";
                header("Location: login2.php");
            } else {
                echo "<br>Error: " . $sql . "<br>" . $conn->error;
            }
    }

    $conn->close();
?>
