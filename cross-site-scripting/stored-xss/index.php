<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4rum hehe</title>
</head>
<body>
<?php
    // show all content in db
    include_once("db.php");
    $sql = "SELECT * FROM posts";
    $result = $database->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<h1>" . $row['title'] . "</h1>";
        echo "<p>" . $row['content'] . "</p>";
        echo "<hr>";
    }

?>
    <h1>Post something</h1>
    <form action="4rum.php" method="GET">
        <input type="text" name="title" placeholder="title">
        <input type="text" name="content" placeholder="content">
        <input type="submit" value="submit">
    </form>
</body>
</html>