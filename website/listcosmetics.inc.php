<?php
// Name: Nintsi Chkhaidze
// Date: March 13, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 3, HTML Website Layout
// Email: nc582@njit.edu

require_once("cosmetic.php");
$cosmetics = Cosmetic::getCosmetics();
if ($cosmetics) {
?>
    <h2>Select Cosmetic</h2>
    <form name="cosmetics" method="post">
        <select name="cosmetic_id" size="20">
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
    </form>
<?php
} else {
    echo "<h2>No Cosmetics found.</h2>";
}
?>
