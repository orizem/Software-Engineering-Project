<?php
    include "db.php";

    // Initialize the session
    session_start();

    // Already logged in
    if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true){
        header("Location: ../index.html", true, 301);
        exit();
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Password is correct, so start a new session
            session_start();
                            
            // Store data in session variables
            $_SESSION["logged"] = true;
            $_SESSION["email"] = $email; 
            $_SESSION["fname"] = $row["fname"]; 
            $_SESSION["lname"] = $row["lname"]; 
            $_SESSION["phone"] = $row["phone"]; 
            $_SESSION["address"] = $row["address"]; 
            
            header("Location: ../index.html", true, 301);
            exit();
        }
        
        header("Location: ../login.html", true, 301);
        exit();
    }

    // Close the database connection
    $conn->close();
?>
