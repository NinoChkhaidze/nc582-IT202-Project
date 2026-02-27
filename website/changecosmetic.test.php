<?php
// Name: Nintsi Chkhaidze
// Date: February 27, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 2 - CRUD Categories and Items
// Email: nc582@njit.edu

require_once("cosmetic.php");
$cosmetic_id = $_POST['cosmetic_id'];
if ((trim($cosmetic_id) == '') or (!is_numeric($cosmetic_id))) {
  echo "<h2>Sorry, you must enter a valid category ID</h2>\n";
} else if (!Cosmetic::findCosmetic($cosmetic_id)) {
  echo "<h2>Sorry, A cosmetic with ID #$cosmetic_id does not exist</h2>\n";
} else {
  $type = Cosmetic::findCosmetic($cosmetic_id);
  $type->cosmetic_id = $_POST['cosmetic_id'];
  $type->cosmetic_type_id = $_POST['cosmetic_type_id'];
  $type->cosmetic_code = $_POST['cosmetic_code'];
  $type->cosmetic_name = $_POST['cosmetic_name'];
  $type->cosmetic_description = $_POST['cosmetic_description'];
  $type->cosmetic_shade = $_POST['cosmetic_shade'];
  $type->cosmetic_finish = $_POST['cosmetic_finish'];
  $type->cosmetic_sell_price = $_POST['cosmetic_sell_price'];
  $type->cosmetic_buy_price = $_POST['cosmetic_buy_price'];

  $result = $type->updateCosmetic();
  if ($result) {
     echo "<h2>Cosmetic $cosmetic_id updated</h2>\n";
  } else {
     echo "<h2>Problem updating Cosmetic $cosmetic_id</h2>\n";
  }
}
?>