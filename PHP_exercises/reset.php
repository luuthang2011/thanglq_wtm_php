<form action="reset.php" method="post">
    <label>UserName: </label>
    <input type="text" name="user">
    <br>
    <label>Tel: </label>
    <input type="tel" name="tel">
    <br>
    <input type="submit" name="reset" value="reset">
    <input type="button" onclick="location.href='login2.php';" value="login">
</form>

<?php
echo '<pre>'.print_r($_POST,true).'</pre>';
$check = null;
$log = null;
if (empty($_POST['user']) || empty($_POST['tel'])) {
    $check = false;
    $log .= " pls enter your information ";
    echo "<p>".$log."</p>";
    exit;
}
$user = $_POST['user'];
$tel = $_POST['tel'];
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
if (isset($_POST['reset'])) {
    $sql = "SELECT USERNAME, PHONE FROM exerciseusers WHERE USERNAME = '$user' AND PHONE = '$tel'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $newpass = rand(10000,999999);
            $newpasshash = "aj" .$newpass ."ja";
            $sql1 ="UPDATE exerciseusers SET PASSWORD_HASH='$newpasshash' WHERE USERNAME = '$user' ";
            $result1 = $conn->query($sql1);
            echo "<p>okee baby. Your new pass:</p>" . $newpass;
        }
    } else {
        echo "<p>con lau moi vao dc nha !!</p>";
    }
}
$conn->close();
?>
