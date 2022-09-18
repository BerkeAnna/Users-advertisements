<?php
require_once dirname(__DIR__) . '/controller/connection.php';
require_once dirname(__DIR__) . '/controller/dataController.php';
$page="";
if (isset($_GET['page']))
    $page = $_GET['page'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advertisements</title>
    <link rel="stylesheet" href="../view/style.css">
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

<nav>
    <ul>
        <ol>
            <a href="index">INDEX</a>
        </ol>
        <ol>
            <a href="users">USERS</a>
        </ol>
        <ol>
            <a href="advertisements">ADVERTISEMENTS</a>
        </ol>
    </ul>
</nav>

<main>

    <?php
    $sql_code = "SELECT title, name FROM `users-advertisements`.users left join `users-advertisements`.advertisements on `users-advertisements`.advertisements.userid = `users-advertisements`.users.id";

    $advertisementsSelect = new dataController($sql_code);
    $sql = $advertisementsSelect->sql();
    $conn = $advertisementsSelect->connect();

    $res = mysqli_query($conn, $sql);

    echo '<table border=1>';
    echo '<tr>';
    echo '<th>Title</th>';
    echo '<th>Username</th>';
    echo '</tr>';

    while ($row = mysqli_fetch_assoc($res)) {
        echo '<tr>';
        echo '<td>' . $row["title"] . '</td>';
        echo '<td>' . $row["name"] . '</td>';
        echo '</tr>';


    }
    echo '</table>';
    mysqli_free_result($res);

    mysqli_close($conn);
    ?>

</main>

</body>
</html>