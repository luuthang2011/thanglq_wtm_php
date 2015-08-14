<!DOCTYPE html>
<!-- saved from url=(0035)http://todomvc.com/examples/flight/ -->
<html lang="en" data-framework="flight"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Flight • Todo</title>
    <link rel="stylesheet" href="libs/base.css">
    <link rel="stylesheet" href="libs/index.css">
    <style type="text/css"></style></head>
<body class="learn-bar">
<section id="todoapp">
    <header id="header">
        <h1>todos</h1>
        <form action="" id='myform' method="post">
            <input name="input" id="new-todo" placeholder="What needs to be done?" autofocus="">
        </form>
    </header>
    <section id="main">
        <form action="" method="post">
            <ul id="todo-list">
                <?php include 'php/add.php'; ?>
                <li class="<?php include 'php/completed.php'?>">
                    <div class="view">
                        <input class="toggle" name="check" type="checkbox">
                        <label>an choi de</label>
                        <button class="destroy"></button>
                    </div>
                </li>
                <?php include 'php/sql.php'; ?>
            </ul>
        </form>
    </section>
    <footer id="footer"></footer>
</section>

<script src="libs/jquery.js"></script>
<script src="libs/myjs.js"></script>
</body>
</html>
