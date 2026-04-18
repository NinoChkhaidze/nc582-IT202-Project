<?php
// Name: Nintsi Chkhaidze
// Date: April 17, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 5 - JavaScript
// Email: nc582@njit.edu
?>
<h2>Enter New Cosmetic Information</h2>
<form name="newcosmetic" action="index.php" method="post">
    <table cellpadding="1" border="0">
        <tr>

            <td>Cosmetic ID:</td>
            <td><input type="number" name="cosmetic_id" size="4" min="1" max="9999" required></td>
        </tr>
        <tr>
            <td>Cosmetic Type:</td>
            <td>
                <select name="cosmetic_type_id" required>
                    <option value="0">Select a Cosmetic Type</option>
                    <?php
                    $types = CosmeticType::getTypes();
                    if ($types)
                        foreach ($types as $type) {
                            $id = $type->cosmetic_type_id;
                            echo "<option value=\"$id\">$type->cosmetic_type_id - $type->cosmetic_type_name</option>\n";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Cosmetic Code:</td>
            <td><input type="text" name="cosmetic_code" size="20" minlength="2" maxlength="10" required></td>
        </tr>
        <tr>
            <td>Cosmetic Name:</td>
            <td><input type="text" name="cosmetic_name" size="40" minlength="10" maxlength="100" required></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><input type="text" name="cosmetic_description" size="60" minlength="100" maxlength="255" required></td>
        </tr>
        <tr>
            <td>Shade:</td>
            <td><input type="text" name="cosmetic_shade" size="20" minlength="2" maxlength="50" required></td>
        </tr>
        <tr>
            <td>Finish:</td>
            <td><input type="text" name="cosmetic_finish" size="20" minlength="2" maxlength="50" required></td>
        </tr>
        <tr>
            <td>Buy Price:</td>
            <td><input type="number" name="cosmetic_buy_price" size="10" step="0.01" min="0.01" max="9999.99" required></td>
        </tr>
        <tr>
            <td>Sell Price:</td>
            <td><input type="number" name="cosmetic_sell_price" size="10" step="0.01" min="0.01" max="9999.99" required></td>
        </tr>
    </table><br>
    <input type="submit" value="Submit New Cosmetic">
    <input type="hidden" name="content" value="addcosmetic">
</form>