<?php
    include "db.php";

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $phone = $_POST["phone"];
        $date = $_POST["date"];

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Email already exists
            echo "Email already exists in the database.";
            header("Location: ../register.html", true, 301);
            exit();
        }

        // Insert user data into the database
        $sql = "INSERT INTO users (fname, lname, email, password, phone, birth_day) VALUES ('$fname', '$lname', '$email', '$password', '$phone', '$date')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../index.html", true, 301);
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
?>
