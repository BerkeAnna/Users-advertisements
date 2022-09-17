<?php
include_once('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advertisements</title>
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

    <?php
    $conn=connect();

    $sql="SELECT * FROM `users-advertisements`.advertisements right join `users-advertisements`.users on advertisements.userid = users.id";
        $res = mysqli_query($conn, $sql);

        echo '<table border=1>';
    echo '<tr>';
    echo '<th>Title</th>';
    echo '<th>Username</th>';
    echo '</tr>';

    while ($row = mysqli_fetch_assoc($res) ){
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