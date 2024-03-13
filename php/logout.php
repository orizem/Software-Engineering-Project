<?php
    // Initialize the session
    session_start();

    $_SESSION["logged"] = false;
    $_SESSION["email"] = null; 
    $_SESSION["fname"] = null; 
    $_SESSION["lname"] = null; 
    $_SESSION["phone"] = null; 

    header("Location: ../index.html", true, 301);
    exit();
?>
