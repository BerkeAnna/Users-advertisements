<?php
require_once dirname(__DIR__) . '/controller/connection.php';
require_once dirname(__DIR__) . '/controller/dataController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <link rel="stylesheet" href="../view/style.css">
</head>
<body>


<nav>
    <ul>
        <ol>
            <a href="../index.php">INDEX</a>
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


    <?php

    $sql_code="SELECT * FROM `users-advertisements`.users";
    $usersCon= new dataController($sql_code);
    $sql=$usersCon->sql();
    $conn=$usersCon->connect();


        $res = mysqli_query($conn, $sql);

        echo '<table border=1>';
        echo '<tr>';
        echo '<th>Username</th>';
        echo '</tr>';

        while ($row = mysqli_fetch_assoc($res) ){
            echo '<tr>';
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