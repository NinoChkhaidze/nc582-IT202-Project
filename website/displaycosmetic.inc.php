<?php
// Name: Nintsi Chkhaidze
// Date: April 17, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 5 - JavaScript
// Email: nc582@njit.edu

require_once("cosmetic.php");
if (!isset($_REQUEST['itemID']) or (!is_numeric($_REQUEST['itemID']))) {
?>
  <h2>You did not select a valid Cosmetic ID to view.</h2>
  <a href="index.php?content=listcosmetics">List Cosmetics</a>
<?php
} else {
  $cosmetic_id = $_REQUEST['itemID'];
  $cosmetic = Cosmetic::findCosmetic($cosmetic_id);
  if ($cosmetic) {
?>
    <h2>Cosmetic <?php echo $cosmetic->cosmetic_id; ?></h2>
    <table>
      <tr>
        <td>Cosmetic ID</td>
        <td><?php echo $cosmetic->cosmetic_id; ?></td>
      </tr>
      <tr>
        <td>Cosmetic Type ID</td>
        <td><?php echo $cosmetic->cosmetic_type_id; ?></td>
      </tr>
      <tr>
        <td>Cosmetic Code</td>
        <td><?php echo $cosmetic->cosmetic_code; ?></td>
      </tr>
      <tr>
        <td>Cosmetic Name</td>
        <td><?php echo $cosmetic->cosmetic_name; ?></td>
      </tr>
      <tr>
        <td>Description</td>
        <td><?php echo $cosmetic->cosmetic_description; ?></td>
      </tr>
      <tr>
        <td>Shade</td>
        <td><?php echo $cosmetic->cosmetic_shade; ?></td>
      </tr>
      <tr>
        <td>Finish</td>
        <td><?php echo $cosmetic->cosmetic_finish; ?></td>
      </tr>
      <tr>
        <td>Buy Price</td>
        <td><?php echo '$' . number_format($cosmetic->cosmetic_buy_price, 2); ?></td>
      </tr>
      <tr>
        <td>Sell Price</td>
        <td><?php echo '$' . number_format($cosmetic->cosmetic_sell_price, 2); ?></td>
      </tr>
    </table>
<?php
  } else {
?>
    <h2>Sorry, Cosmetic <?php echo $cosmetic_id; ?> not found</h2>
    <a href="index.php?content=listcosmetics">List Cosmetics</a>
<?php
  }
}
?>
