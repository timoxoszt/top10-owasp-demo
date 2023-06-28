<?php
    // connect db
    include_once("db.php");
    // get the data from the form
    $title = $_GET['title'];
    $content = $_GET['content'];
    // insert the data into the database use prepared statement
    $sql = "INSERT INTO posts (title, content) VALUES (?, ?)";
    $stmt = $database->prepare($sql);
    $stmt->bind_param("ss", $title, $content);
    $stmt->execute();
    // redirect to index page
    header("Location: index.php");
?>