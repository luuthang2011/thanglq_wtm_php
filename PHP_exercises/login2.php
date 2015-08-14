<form action="login2.php" method="post">
    <label>Username: </label>
    <input type="text" name="user">
    <br>
    <label>PassWord: </label>
    <input type="password" name="pass">
    <br>
    <label>
        <input type="checkbox" name="remember" value="remember">
        Remember me !
    </label>
    <br>
    <input type="submit" name="login" value="sign in">
    <input type="button" onclick="location.href='input.php';" name="sign up" value="sign up">
    <input type="button" onclick="location.href='reset.php';" name="reset" value="reset">
</form>

<?php
    echo '<pre>'.print_r($_POST,true).'</pre>';
    $check = null;
    $log = null;
    if (empty($_POST['user']) || empty($_POST['pass'])) {
        $check = false;
        $log .= " pls enter your username/pass ";
        echo "<p>".$log."</p>";
        exit;
    }
    $user = $_POST['user'];
    $pass = "aj" . $_POST['pass'] . "ja";
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
    if (isset($_POST['login'])) {
        $sql = "SELECT USERNAME, PASSWORD_HASH FROM exerciseusers WHERE USERNAME = '$user' AND PASSWORD_HASH = '$pass'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                session_start();
                $_SESSION['login'] = "a";
                if(isset($_POST['remember'])) {
                    $_SESSION['login'] = "b";
                }
                echo "<p>okee baby</p>";
                header("Location: welcome.php");
            }
        } else {
            echo "<p>con lau moi vao dc nha !!</p>";
        }
    }
    $conn->close();
?>
