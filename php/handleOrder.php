<?php
    include "cart.php";

    // Check if the 'order' parameter is set
    if (isset($_GET['order'])) {
        $order = $_GET['order'];

        // Process the order and prepare the response
        if ($order === 'order-table') {
            echo '
                <tr>
                    <td>כמה תהיו:</td>
                    <td><input type="number" id="numPeople" name="numPeople" value="1" min="1" max="10" required></td>
                    <td></td>
                </tr>
                <tr>
                    <td>איפה תשבו:</td>
                    <td>
                        <select id="location-sit" name="location-sit">
                            <option value="" disabled selected hidden>בחר</option>
                            <option value="בפנים">בפנים</option>
                            <option value="בחוץ">בחוץ</option>
                        </select>
                    </td>
                    <td></td>
                </tr>
            ';

        } elseif ($order === 'order-delivery') {
            getCart();
        } else {
            echo "Invalid selection.";
        }
    }
?>