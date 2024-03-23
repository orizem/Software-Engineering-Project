<!DOCTYPE html>
<html lang="he">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="/styles/style.css" />
    <link rel="stylesheet" href="/styles/delivery.css" />
    <link rel="stylesheet" href="/styles/background_animation.css" />
    <div class="color-palette">
        <div id="navbar-container"></div>

        <title>Gourmet Haven</title>
    </div>

    <script>const test = window.prompt( "Please enter your name", "Test" );</script>
</head>

<body class="color-palette">

    <ul class="stars" id="stars"></ul>
    <div class="bg-img bg-img-1">
        <h1 class="deffect1">הזמנה</h1>
        <div class="index-div container"></div>
    </div>
    <div class="bg-img bg-img-2">
        <div class="index-div container">
            <span class="box" style="background-color: rgba(24, 41, 49, 0.4);">
                <table>
                    <tr>
                        <td>
                            <h3>
                                <?php 
                                    session_start();
                                    
                                    $text = array("הזמנה על שם", "לכתובת", "נשלחה למערכת.", "ניצור עמך קשר באמצעות");
                                    $values = array(" " . $_GET["name"] . " ", " " . $_GET["address"] . " ", " ", " " . $_GET["email"] . " או " . $_GET["tel"]);
                                    $res = "";
                                    for ($counter = 0; $counter <= 3; $counter++) {
                                        $res = $res . $text[$counter] . $values[$counter];
                                    }

                                    if (strlen($_GET["notes"]) > 0){
                                        $res = $res . "\nהערותיך נרשמו: " . $_GET["notes"];
                                    }
                                    echo $res;
                                ?>
                            </h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>
                                <?php 
                                    include "postDelivery.php";
                                    
                                    $cart = json_encode($_SESSION["cart"], JSON_UNESCAPED_UNICODE);
                                    echo "פרטי ההזמנה:" . $cart; 
                                    
                                    postDelivery($_GET["order"], $_GET["name"], $_GET["address"], $_GET["email"], $_GET["tel"], $cart, $_GET["numPeople"],  $_GET["location-sit"], $_GET["notes"]);

                                    // Send
                                    $to = "ori.zemach@gmail.com";
                                    $subject = "New Order";
                                    
                                    $message = "Name: " . $_GET["name"] . "<br>Address: " . $_GET["address"] . "<br>Email: " . $_GET["email"] . "<br>Phone: " . $_GET["tel"];
                                    if ($_GET["order"] === "order-delivery") {
                                        $message = $message . "<br>Cart: " . $cart;
                                    }
                                    else {
                                        $message = $message . "<br>Number of people: " . $_GET["numPeople"] . "<br>Location: " . $_GET["location-sit"];
                                    }
                                    $message = $message . "<br>Notes: " . $_GET["notes"];

                                    mail($to, $subject, $message);
                                ?>
                            </h3>
                        </td>
                    </tr>
                </table>
            </span>
        </div>
    </div>

    <footer>
        <div id="footer-container"></div>
    </footer>
</body>

<script src="../scripts/pageLoader.js"></script>
<script src="../scripts/loadHeaderFooter.js"></script>

</html>