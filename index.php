<?php
include_once('controller/connection.php');

$page = "";
if (isset($_GET['page']))
    $page = $_GET['page'];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="view/style.css">
</head>
<body>
<?php
switch ($page) {
    case "index":
        include("index.php");
        break;
    case "users":
        include("view/users.php");
        break;
    case "advertisements":
        include("view/advertisements.php");
        break;

}

?>

<header>
<nav>
    <ul>
        <ol>
            <a href="index">INDEX</a>
        </ol>
        <ol>
            <a href="view/users">USERS</a>
        </ol>
        <ol>
            <a href="view/advertisements">ADVERTISEMENTS</a>
        </ol>
    </ul>
</nav>
</header>
<main>


    <h2>Add your advertisement:</h2>
    <form method="post" action="uploadNewDatas.php">
        <label>Username:</label></br>
        <input type="text" id="username" name="username"></br>
        <label>Advertisement title:</label></br>
        <input type="text" id="title" name="title"></br>
        <button class="button" type="submit">New Advertisement</button>
    </form>
</main>


</body>
</html>