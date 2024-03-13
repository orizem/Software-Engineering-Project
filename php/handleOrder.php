<?php
    // Check if the 'order' parameter is set
    if (isset($_GET['order'])) {
        $order = $_GET['order'];

        // Process the order and prepare the response
        // This is a simple example. You might want to fetch data from a database or perform other operations.
        if ($order == 'order-table') {
            echo '<tr>';
            echo '    <td>כמה תהיו:</td>';
            echo '    <td><input type="number" id="numPeople" name="numPeople" value="1" required></td>';
            echo '    <td></td>';
            echo '</tr>';
            echo '<tr>';
            echo '    <td>איפה תשבו:</td>';
            echo '    <td>';
            echo '        <select id="location-sit">';
            echo '            <option value="" disabled selected hidden>בחר</option>';
            echo '            <option value="location-sit-in">בפנים</option>';
            echo '            <option value="location-sit-out">בחוץ</option>';
            echo '        </select>';
            echo '    </td>';
            echo '    <td></td>';
            echo '</tr>';

        } elseif ($order == 'order-delivery') {
            echo '<tr>';
            echo '    <td>הערות:</td>';
            echo '    <td><textarea id="notes" cols="30" rows="3" name="notes"></textarea></td>';
            echo '    <td></td>';
            echo '</tr>';
        } else {
            echo "Invalid selection.";
        }
    }
?>