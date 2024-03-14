<!DOCTYPE html>
<html lang="he">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/delivery.css" />
    <link rel="stylesheet" href="styles/register.css" />
    <link rel="stylesheet" href="styles/cart.css" />
    <link rel="stylesheet" href="styles/background_animation.css" />
    <div class="color-palette">
        <div id="navbar-container"></div>

        <title>Gourmet Haven</title>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts/delivery.js"></script>
</head>

<body class="color-palette">

    <ul class="stars" id="stars"></ul>
    <div class="bg-img bg-img-1">
        <h1 class="deffect1">הזמנות</h1>
        <div class="index-div container">
        </div>
    </div>
    <div class="bg-img bg-img-2">
        <div class="index-div container">
            <span class="box" style="background-color: rgba(24, 41, 49, 0.4);">
                <form id="registrationForm" onsubmit="return validateForm()" action="php/delivery.php" method="get">
                    <table>
                        <tr>
                            <td>סוג ההזמנה:</td>
                            <td>
                                <select id="order">
                                    <option value="" disabled selected hidden>בחר</option>
                                    <option value="order-table">הזמנת שולחן</option>
                                    <option value="order-delivery">הזמנת משלוח</option>
                                </select>
                            </td>
                        </tr>
                        
                        <?php
                            // Initialize the session
                            session_start();
                            
                            echo '
                                <tr>
                                    <td>שם:</td>
                                    <td><input type="text" id="firstName" name="name" value="' . $_SESSION["fname"] . ' ' . $_SESSION["lname"] . '" oninput="validateForm()" required></td>
                                    <td><span id="firstNameError" class="error"></span></td>
                                </tr>
                                <tr>
                                    <td>טלפון:</td>
                                    <td><input type="tel" id="phoneNumber" name="tel" value="' . $_SESSION["phone"] . '" oninput="validateForm()" required></td>
                                    <td><span id="phoneNumberError" class="error"></span></td>
                                </tr>
                                <tr>
                                    <td>כתובת:</td>
                                    <td><input type="text" id="address" name="address" value="' . $_SESSION["address"] . '" required></td>
                                    <td><span id="addressError" class="error"></span></td>
                                </tr>
                                <tr>
                                    <td>מייל:</td>
                                    <td><input type="email" id="email" name="email" value="' . $_SESSION["email"] . '" oninput="validateForm()" required></td>
                                    <td><span id="emailError" class="error"></span></td>
                                </tr>
                            ';
                        ?>
                    </table>
                    <table id="product"></table>
                    <table>
                        <tr>                           
                            <!-- TODO: If delivery was selected: -->
                            <td>מה תרצו להזמין?</td>
                            <td>
                                <div class="link-list dropdown">
                                    <span style="padding-top:3%; padding-bottom:3%;">לעיון בתפריט</span>
                                    <div class="dropdown-content" style="width: 50%;">
                                        <?php 
                                        include "php/menuConfig.php";
                                            foreach ($cuisine_dictionary as $key => $value) {
                                                echo '<a href="/menu.php#' . $value . '">' . $key . '</a>';
                                            }
                                        ?>
                                    </div>
                                </div>

                                <div>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" id="submitButton" value="שלח"></td>
                        </tr>
                    </table>
                </form>
            </span>
        </div>
    </div>

    <footer>
        <div id="footer-container"></div>
    </footer>
</body>

<script src="scripts/pageLoader.js"></script>
<script src="scripts/loadHeaderFooter.js"></script>
<script src="scripts/formValidations.js"></script>

</html>