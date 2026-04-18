<?php
// Name: Nintsi Chkhaidze
// Date: April 17, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 5 - JavaScript
// Email: nc582@njit.edu

if (!isset($_POST['cosmetic_type_id']) || !is_numeric($_POST['cosmetic_type_id'])) {
?>
  <h2>You did not select a valid Cosmetic Type ID to view.</h2>
  <a href="index.php?content=listcosmetictypes">List Cosmetic Types</a>
<?php
} else {
    $cosmetic_type_id = $_POST['cosmetic_type_id'];
    $cosmeticType = CosmeticType::findType($cosmetic_type_id);

    if ($cosmeticType) {
        echo $cosmeticType;
        $cosmetics = Cosmetic::getCosmeticsByType($cosmetic_type_id);
        if ($cosmetics) {
?>
        <br><br>
        <b>Cosmetics:</b><br>
        <table>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Shade</th>
                <th>Finish</th>
                <th>Buy Price</th>
                <th>Sell Price</th>
            </tr>
            <?php
            $cosmeticbuytotal = 0;
            $cosmeticselltotal = 0;
            foreach ($cosmetics as $cosmetic) {
            ?>
                <tr>
                    <td><?php echo $cosmetic->cosmetic_id; ?></td>
                    <td><?php echo $cosmetic->cosmetic_code; ?></td>
                    <td><?php echo $cosmetic->cosmetic_name; ?></td>
                    <td><?php echo $cosmetic->cosmetic_shade; ?></td>
                    <td><?php echo $cosmetic->cosmetic_finish; ?></td>
                    <td><?php echo '$' . number_format($cosmetic->cosmetic_buy_price, 2); ?></td>
                    <td><?php echo '$' . number_format($cosmetic->cosmetic_sell_price, 2); ?></td>
      
                </tr>
            <?php
                $cosmeticbuytotal += $cosmetic->cosmetic_buy_price;
                $cosmeticselltotal += $cosmetic->cosmetic_sell_price;
            }
            ?>
            <tr>
                <td>Total Buy:</td>
                <td><?php echo '$' . number_format($cosmeticbuytotal, 2); ?></td>

                <td>Total Sell:</td>
                <td><?php echo '$' . number_format($cosmeticselltotal, 2); ?></td>
            </tr>
        </table>
<?php
        } else {
            echo "<h2>There are no cosmetics for this type.</h2>\n";
        }
    } else {
        echo "<h2>Sorry, Cosmetic Type #$cosmetic_type_id not found.</h2>\n";
    }
}
?>