<?php 
    include "db.php";

    // Handle form submission
    function postDelivery($table_or_delivery, $name, $address, $email, $phone, $cart, $numPeople, $location, $notes) {
        global $conn;
        $sql = "";

        if ($table_or_delivery === 'order-delivery') {
            $sql = "INSERT INTO deliveries (name, address, email, phone, cart, notes) VALUES ('$name', '$address', '$email', '$phone', '$cart', '$notes')";
        }
        else {
            $sql = "INSERT INTO reservations (name, address, email, phone, numPeople, location, notes) VALUES ('$name', '$address', '$email', '$phone', '$numPeople', '$location', '$notes')";
        }

        // Check if the query was successful
        if ($conn->query($sql) === false) {
            die("Error executing the query: " . $conn->error);
        }
    }
?>