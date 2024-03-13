<?php 
    // Initialize the session
    session_start();
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION["cart"] = array();
    }

    function addToCart($name, $amount) {
        echo $name." => ".$amount;
        // Check if the item already exists in the cart
        if (isset($_SESSION["cart"][$name])) {
            // If it exists, update the quantity
            $_SESSION["cart"][$name] += $amount;
        } else {
            // If it doesn't exist, add the new item
            $_SESSION["cart"] = array_merge($_SESSION["cart"], array($name => $amount));
        }

        // Remove
        if ($amount == 0) {
            unset($_SESSION["cart"][$name]);
        }
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $amount = intval($_POST["amount"]);
        $name = str_replace(' ', '-', $_POST["name"]);
        addToCart($name, $amount);
    }
?>