<?php
    // Initialize the session
    session_start();

    function getCart() {
        if (!isset($_SESSION['cart'])) {
            echo '<tr><td>העגלה ריקה</td></tr>';
        }
        else {
            $total_price = 0;
            foreach ($_SESSION['cart'] as $name => $product) {
                $product_multiplication += $product["amount"] * $product["price"];
                $total_price += $product_multiplication;
                
                echo '
                <tr>
                    <td>
                        <form action="php/shoppingCart.php" method="POST" style="display:flex;">
                            <input type="text" name="name" value="' . $name . '" readonly />
                            <input type="number" name="amount" value="' . $product["amount"] . '" min="0" max="10" />
                            <input type="text" name="price" value="' . $product_multiplication . '₪" readonly />
                            <input type="submit" name="btn" class="button" value="עדכן עגלה" />
                        </form>
                    </td>
                </tr>';
            }

            echo '
            <tr>
                <td><p>סה"כ:</p></td>
                <td>' . $total_price . '₪</td>
            </tr>';
        }
    }
?>