<?php
// Name: Nintsi Chkhaidze
// Date: March 13, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 3, HTML Website Layout
// Email: nc582@njit.edu
if (!isset($_POST['itemID']) or (!is_numeric($_POST['itemID']))) {
?>
  <h2>You did not select a valid Cosmetic ID value</h2>
  <a href="index.php?content=listcosmetics">List Cosmetics</a>
<?php
} else {
  $cosmetic_id = $_POST['itemID'];
  $cosmetic = Cosmetic::findCosmetic($cosmetic_id);
  if ($cosmetic) {
?>
    <h2>Update Cosmetic <?php echo $cosmetic->cosmetic_id; ?></h2><br>
    <form name="cosmetics" action="index.php" method="post">
      <table>
        <tr>
          <td>Cosmetic ID</td>
          <td><?php echo $cosmetic->cosmetic_id; ?></td>
        </tr>
        <tr>
          <td>Cosmetic Type:</td>
          <td><select name="cosmetic_type_id">
              <?php
              echo "<option value=\"0\">Select a Cosmetic Type</option>\n";
              $types = CosmeticType::getTypes();
              if ($types)
                foreach ($types as $type) {
                  $cosmetic_type_id = $type->cosmetic_type_id;
                  $selected = $cosmetic_type_id == $cosmetic->cosmetic_type_id ? "selected" : "";
                  echo "<option value=\"$cosmetic_type_id\" $selected>$type->cosmetic_type_id - $type->cosmetic_type_name</option>\n";
                }
              ?></td>
        </tr>
        <tr>
          <td>Cosmetic Code</td>
          <td><input type="text" name="cosmetic_code" value="<?php echo $cosmetic->cosmetic_code; ?>"></td>
        </tr>
        <tr>
          <td>Cosmetic Name</td>
          <td><input type="text" name="cosmetic_name" value="<?php echo $cosmetic->cosmetic_name; ?>"></td>
        </tr>
        <tr>
          <td>Description</td>
          <td><input type="text" name="cosmetic_description" value="<?php echo $cosmetic->cosmetic_description; ?>"></td>
        </tr>
        <tr>
          <td>Shade</td>
          <td><input type="text" name="cosmetic_shade" value="<?php echo $cosmetic->cosmetic_shade; ?>"></td>
        </tr>
        <tr>
          <td>Finish</td>
          <td><input type="text" name="cosmetic_finish" value="<?php echo $cosmetic->cosmetic_finish; ?>"></td>
        </tr>
        <tr>
          <td>Buy Price</td>
          <td><input type="text" name="cosmetic_buy_price" value="<?php echo $cosmetic->cosmetic_buy_price; ?>"></td>
        </tr>
        <tr>
          <td>Sell Price</td>
          <td><input type="text" name="cosmetic_sell_price" value="<?php echo $cosmetic->cosmetic_sell_price; ?>"></td>
        </tr>
      </table><br><br>
      <input type="submit" name="answer" value="Update Cosmetic">
      <input type="submit" name="answer" value="Cancel">
      <input type="hidden" name="cosmetic_id" value="<?php echo $cosmetic_id; ?>">
      <input type="hidden" name="content" value="changecosmetic">
    </form>
<?php
  } else {
?>
    <h2>Sorry, Cosmetic <?php echo $cosmetic_id; ?> not found</h2>
    <a href="index.php?content=listcosmetics">List Cosmetics</a>
<?php
  }
}
?>