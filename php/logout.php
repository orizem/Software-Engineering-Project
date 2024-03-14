<?php
    // Initialize the session
    session_start();

    $_SESSION["logged"] = false;
    $_SESSION["email"] = null; 
    $_SESSION["fname"] = null; 
    $_SESSION["lname"] = null; 
    $_SESSION["phone"] = null; 
    $_SESSION["address"] = null; 
    $_SESSION["cart"] = array();

    header("Location: ../index.html", true, 301);
    exit();
?>
