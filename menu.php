<!DOCTYPE html>
<html lang="he">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/menu.css" />
    <link rel="stylesheet" href="styles/background_animation.css" />
    <div class="color-palette">
        <div id="navbar-container"></div>

        <title>Gourmet Haven</title>
    </div>
</head>

<body class="color-palette">

    <ul class="stars" id="stars"></ul>
    <div class="bg-img bg-img-1">
        <h1 class="deffect1">Menu</h1>
        <div class="index-div container">
            <span class="box">
                עיינו בתפריטנו המגוון שמתאים לטעמים והעדפות שונות.
                ממנות ראשונות ועד קינוחים, יש לנו משהו לכל אחד. בדקו את
                תפריטנו או בואו לבקר אותנו כדי לחוות את הטעמים בפועל.
            </span>
        </div>
    </div>
    <div class="bg-img bg-img-2">
        <div class="index-div container">
            <span class="box" style="background-color: rgba(24, 41, 49, 0.4);">
                <div class="card">                         
                    <?php
                        include "php/db.php";
                        include "php/menuConfig.php";                        

                        $result_cuisine = getDistinctCuisines($conn);

                        // Check if there are rows returned
                        if ($result_cuisine->num_rows > 0) {
                            // Output data of each row
                            while ($row_cuisine = $result_cuisine->fetch_assoc()) {
                                $cuisine = $row_cuisine["cuisine"];
                                $links = '';
                                if (array_key_exists($cuisine, $cuisine_links_dictionary)) {
                                    $data = $cuisine_links_dictionary[$cuisine];
                                    $links = '
                                        <div class="link-list dropdown">
                                            <span style="padding-top:3%; padding-bottom:3%; z-index:100;">מידע נוסף</span>
                                            <div class="dropdown-content" style="width: 50%;">
                                                <a href="' . $data["link-1"]["url"] . '" target="_blank" rel="noopener noreferrer">' . $data["link-1"]["name"] . '</a>
                                                <a href="' . $data["link-2"]["url"] . '" target="_blank" rel="noopener noreferrer">' . $data["link-2"]["name"] . '</a>
                                                <a href="' . $data["link-3"]["url"] . '" target="_blank" rel="noopener noreferrer">' . $data["link-3"]["name"] . '</a>
                                            </div>
                                        </div>
                                    ';
                                }

                                echo '<div class="card-cell">
                                        <div class="card-cell-title">
                                            <img class="card-icon" src="data:image/jpeg;base64,' . base64_encode($row_cuisine["img"]) . '" />
                                            '. $links .'
                                            <div class="card-title" id="' . $cuisine_dictionary[$cuisine] . '">' . $cuisine . '</div>
                                        </div>
                                        <div class="cell-content">';

                                $result = getAllItemsInCuisine($conn, $row_cuisine["cuisine"]);

                                // Check if there are rows returned
                                if ($result->num_rows > 0) {
                                    // Output data of each row in separate <div>
                                    while ($row = $result->fetch_assoc()) {
                                        $res = '<div class="food">
                                                    <p class="food-title">' . $row["name"] . '</p>
                                                    <img class="food-img" src="data:image/jpeg;base64,' . base64_encode($row["img"]) . '" style="width:20rem; border-radius: 10%;">

                                                    <p class="food-description" style="word-spacing: normal; direction:rtl;">' . $row["description"] . '</p>

                                                    <p class="food-ingredients"> - ' . str_replace(",", " | ", $row["ingredients"]) . ' - </p>
                                                    <div class="food-price-item">
                                                        <p class="food-price">' . $row["price"] . '</p>
                                                        <p style="padding-left: 5px;">₪</p>
                                                    </div>
                                                </div>';
                                        echo $res;
                                    }
                                }
                                echo "</div></div>";
                            }
                        }

                        // Close the connection when done
                        $conn->close();
                    ?>
                </div>
            </span>
        </div>
    </div>

    <footer>
        <div id="footer-container"></div>
    </footer>
</body>

<script src="scripts/pageLoader.js"></script>
<script src="scripts/loadHeaderFooter.js"></script>

</html>