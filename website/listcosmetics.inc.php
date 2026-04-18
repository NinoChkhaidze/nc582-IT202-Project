<?php
// Name: Nintsi Chkhaidze
// Date: April 17, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 5 - JavaScript
// Email: nc582@njit.edu

require_once("cosmetic.php");
$cosmetics = Cosmetic::getCosmetics();
if ($cosmetics) {
?>
    <script language="javascript">
        function listbox_dblclick() {
            document.cosmetics.displaycosmetic.click()
        }
        function button_click(target) {
            var userConfirmed = true;
            if (target == 1) {
                userConfirmed = confirm("Are you sure you want to remove this cosmetic?");
            }
            if (userConfirmed) {
                if (target == 0) cosmetics.action = "index.php?content=displaycosmetic";
                if (target == 1) cosmetics.action = "index.php?content=removecosmetic";
                if (target == 2) cosmetics.action = "index.php?content=updatecosmetic";
            } else {
                alert("Action canceled.");
            }
        }
    </script>
    <h2>Select Cosmetic</h2>
    <form name="cosmetics" method="post">
        <select ondblclick="listbox_dblclick()" name="itemID" size="20">
            <?php
            $first = true;
            foreach ($cosmetics as $cosmetic) {
                $id = $cosmetic->cosmetic_id;
                $option = $cosmetic->cosmetic_id . " - " . $cosmetic->cosmetic_code . " - " . $cosmetic->cosmetic_name . " - " . $cosmetic->cosmetic_shade . " - " . $cosmetic->cosmetic_finish . " - $" . number_format($cosmetic->cosmetic_sell_price, 2) . " - $" . number_format($cosmetic->cosmetic_buy_price, 2);
                if ($first) {
                    echo "<option value=\"$id\" selected>$option</option>\n";
                    $first = false;
                } else {
                    echo "<option value=\"$id\">$option</option>\n";
                }
            }
            ?>
        </select>
        <br>
        <input type="submit" onClick="button_click(0)" name="displaycosmetic" value="View Cosmetic">
        <input type="submit" onClick="button_click(1)" name="deletecosmetic" value="Delete Cosmetic">
        <input type="submit" onClick="button_click(2)" name="updatecosmetic" value="Update Cosmetic">
    </form>
<?php
} else {
    echo "<h2>No Cosmetics found.</h2>";
}
?>
