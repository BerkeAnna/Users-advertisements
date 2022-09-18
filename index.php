<?php
include_once('controller/connection.php');

$page = "";
if (isset($_GET['page']))
    $page = $_GET['page'];
//else
// header("Location: index.php");


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
switch($page) {
    case "index": include("index.php"); break;
    case "users": include("controller/users.php"); break;
    case "advertisements": include("controller/advertisements.php"); break;

}

//print_r($_REQUEST);
?>


<nav>
    <ul>
        <ol>
            <div <?php echo $page == "index" ? "kijelolt" : "" ?>">
            <a href="index">INDEX</a>
        </ol>
        <ol>
            <div <?php echo $page == "users" ? "kijelolt" : "" ?>">
            <a href="controller/users">USERS</a>
        </ol>
        <ol>
            <div <?php echo $page == "advertisements" ? "kijelolt" : "" ?>">
            <a href="controller/advertisements">ADVERTISEMENTS</a>
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