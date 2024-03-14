<?php
    // Initialize the session
    session_start();

    // DB data
    $hostname = "sql306.byethost4.com";
    $username = "b4_36113250";
    $password = "6FK4WRGeWLtYc45";
    $database = "b4_36113250_gourmethaven";

    // Create connection
    $conn = new mysqli($hostname, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Set the character set to UTF-8
    $conn->set_charset("utf8");

    // Get distincs cuisines
    function getDistinctCuisines($conn) {
        $sql = "SELECT cuisine, MAX(img) AS img FROM food GROUP BY cuisine";
        $result_cuisine = $conn->query($sql);

        // Check if the query was successful
        if ($result_cuisine === false) {
            die("Error executing the query: " . $conn->error);
        }

        return $result_cuisine;
    }

    // Get food table
    function getAllItemsInCuisine($conn, $cuisine) {
        $sql = "SELECT id, name, description, ingredients, price, img FROM food WHERE cuisine = '" . $cuisine . "';";
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result === false) {
            die("Error executing the query: " . $conn->error);
        }

        return $result;
    }
?>