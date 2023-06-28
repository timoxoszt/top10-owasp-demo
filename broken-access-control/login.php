<?php
    session_start();

    $username = $_GET['username'];
    $password = $_GET['password'];

    if (isset($username) && isset($password)) {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username; 
        // Registration successful, redirect to welcome page
        header("Location: index.php");  
    }
?>