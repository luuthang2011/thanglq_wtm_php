<form method="get" action="form2.php">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name">
        <input type="submit">
    </div>
</form>

<?php
    include_once 'index.php';
    echo '<pre>'.print_r($_GET,true).'</pre>';
    if (empty($_GET['name'])) {
        echo "pls enter your name";
    }
    else {
        countWords2 ($_GET['name']);
    }
?>