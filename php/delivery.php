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
                                    
                                    $text = array("הזמנה על שם", "נשלחה למערכת.", "ניצור עמך קשר באמצעות");
                                    $values = array(" " . $_GET["name"] . " ", " ", " " . $_GET["email"] . " או " . $_GET["tel"]);
                                    $res = "";
                                    for ($counter = 0; $counter <= 2; $counter++) {
                                        $res = $res . $text[$counter] . $values[$counter];
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
                                    echo 'פרטי ההזמנה:
                                    ' . json_encode($_SESSION["cart"], JSON_UNESCAPED_UNICODE); ?>
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