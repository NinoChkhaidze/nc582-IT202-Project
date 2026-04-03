<?php
// Name: Nintsi Chkhaidze
// Date: March 13, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 3, HTML Website Layout
// Email: nc582@njit.edu

require_once("cosmetic.php");
if (!isset($_SESSION['login'])) {
  echo "<h2>Sorry, you must be logged in to update a Cosmetic</h2>\n";
} else if ($_POST['answer'] == 'Cancel') {
  echo "<h2>Update Cancelled</h2>\n";
} else {
$cosmetic_id = $_POST['cosmetic_id'];
if ((trim($cosmetic_id) == '') or (!is_numeric($cosmetic_id))) {
  echo "<h2>Sorry, you must enter a valid Cosmetic ID</h2>\n";
} else if (!Cosmetic::findCosmetic($cosmetic_id)) {
  echo "<h2>Sorry, A cosmetic with ID #$cosmetic_id does not exist</h2>\n";
} else {
  $type = Cosmetic::findCosmetic($cosmetic_id);
  $type->cosmetic_id = $_POST['cosmetic_id'];
  $type->cosmetic_type_id = $_POST['cosmetic_type_id'];
  $type->cosmetic_code = htmlspecialchars($_POST['cosmetic_code']);
  $type->cosmetic_name = htmlspecialchars($_POST['cosmetic_name']);
  $type->cosmetic_description = htmlspecialchars($_POST['cosmetic_description']);
  $type->cosmetic_shade = htmlspecialchars($_POST['cosmetic_shade']);
  $type->cosmetic_finish = htmlspecialchars($_POST['cosmetic_finish']);
  $type->cosmetic_sell_price = $_POST['cosmetic_sell_price'];
  $type->cosmetic_buy_price = $_POST['cosmetic_buy_price'];

  $result = $type->updateCosmetic();
  if ($result) {
     echo "<h2>Cosmetic $cosmetic_id updated</h2>\n";
  } else {
     echo "<h2>Problem updating Cosmetic $cosmetic_id</h2>\n";
  }
}
}
?>