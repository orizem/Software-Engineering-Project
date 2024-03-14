<?php 
    // Initialize the session
    session_start();
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION["cart"] = array();
    }

    function addToCart($name, $amount, $price) {
        $_SESSION["cart"] = array_merge($_SESSION["cart"], array($name => array("amount" => $amount, "price" => $price)));

        // Remove
        if ($amount === 0) {
            unset($_SESSION["cart"][$name]);
        }
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $amount = intval($_POST["amount"]);
        $name =  $_POST["name"];
        $price = intval($_POST["price"]);
        addToCart($name, $amount, $price);
    }
?>