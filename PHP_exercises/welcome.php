<form action="welcome.php" method="post">
    <input type="submit" name="logout" value="logout">
</form>

<?php
    session_start();
    //echo $_SESSION['login'];
    if (!isset($_SESSION['login']) || $_SESSION['login'] != "a" && $_SESSION['login'] != "b") {
        echo "<p>Stt: offline -> pls <a href='login2.php'>login!!</a></p>";
    }
    else {
        echo "<p>Stt: online</p>";
        echo "<h1>Welcome !!!!</h1>";
        if ($_SESSION['login'] == "a") {
            $_SESSION['login'] = "c";
        }
    }
    if (isset($_POST['logout'])) {
        header("Location: login2.php");
        $_SESSION['login'] = false;
        exit;
    }
?>
