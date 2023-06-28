<?php
    session_start();
    // transfer money
    $amount = $_GET['amount'];
    $to = $_GET['to'];

    if(isset($amount) && isset($to)) {
        // get the balance of the user
        $balance = $_SESSION["balance"];
        // check if the user has enough balance
        if ($balance >= $amount) {
            // update the balance of the user
            $_SESSION["balance"] = $balance - $amount;
            // redirect to index page
            header("Location: index.php");
        }
    }
?>