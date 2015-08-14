<form action="login.php" method="post">
    <label>UserName: </label>
    <input type="text" name="user">
    <br>
    <label>PassWord: </label>
    <input type="password" name="pass">
    <br>
    <input type="submit" value="login">
</form>

<?php
    echo '<pre>'.print_r($_POST,true).'</pre>';
    if (!isset($_COOKIE["user"])) {
        echo "cookie not set";
        $check = true;
        $log = null;
        if (empty($_POST['user'])) {
            $check = false;
            $log .= "pls enter your username! ";
        }
        if (empty($_POST['pass'])) {
            $check = false;
            $log .= "pls enter your password! ";
        }
        if (!$check) {
            echo $log;
            exit;
        }
        else {
            setcookie("user", $_POST['user'], time() + 100, "/");
            setcookie("pass", $_POST['pass'], time() + 100, "/");
            echo "seted cook";
        }
    }
    setcookie("user", $_POST['user'], time() + 100, "/");
    setcookie("pass", $_POST['pass'], time() + 100, "/");
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

    $a1 = $_COOKIE["user"];
    $a2 = "aj" . $_COOKIE["pass"] . "ja";
    $sql = "SELECT USERNAME, PASSWORD_HASH FROM exerciseusers WHERE USERNAME = '$a1' AND PASSWORD_HASH = '$a2'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<p>okee baby</p>";
        }
    }
    else {
        echo "<p>con lau moi vao dc nha !!</p>";
    }
?>
