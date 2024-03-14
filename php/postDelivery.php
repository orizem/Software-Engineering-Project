<?php 
    include "db.php";

    // Handle form submission
    function postDelivery($name, $address, $email, $phone, $cart, $notes) {
        global $conn;
        $sql = "INSERT INTO deliveries (name, address, email, phone, cart, notes) VALUES ('$name', '$address', '$email', '$phone', '$cart', '$notes')";

        // Check if the query was successful
        if ($conn->query($sql) === false) {
            die("Error executing the query: " . $conn->error);
        }
    }
?>