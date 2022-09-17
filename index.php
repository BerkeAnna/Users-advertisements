<?php
include_once('connection.php');
include_once('addNewUser.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <nav>
        <ul>
            <ol>
                <a href="index.php">INDEX</a>
            </ol>
            <ol>
                <a href="users.php">USERS</a>
            </ol>
            <ol>
                <a href="advertisements.php">ADVERTISEMENTS</a>
            </ol>
        </ul>
    </nav>

    <main>
        <h2>Add your advertisement:</h2>
        <form method="post" action="uploadUser.php">
            <label>Username:</label></br>
            <input type="text" id="username" name="username"></br>
            <label>Advertisement title:</label></br>
            <input type="text" id="title" name="title"></br>
            <button class="button" type="submit"  >New Advertisement</button>
        </form>
    </main>


</body>
</html>