<?php
// Name: Nintsi Chkhaidze
// Date: April 17, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 5 - JavaScript
// Email: nc582@njit.edu

require_once("cosmetictype.php");
if (!isset($_SESSION['login'])) {
  echo "<h2>Sorry, you must be logged in to update a Cosmetic Type</h2>\n";
} else if ($_POST['answer'] == 'Cancel') {
  echo "<h2>Update Cancelled</h2>\n";
} else {
  $cosmetic_type_id = $_POST['cosmetic_type_id'];
  if ((trim($cosmetic_type_id) == '') or (!is_numeric($cosmetic_type_id))) {
    echo "<h2>Sorry, you must enter a valid Cosmetic Type ID</h2>\n";
  } else if (!CosmeticType::findType($cosmetic_type_id)) {
    echo "<h2>Sorry, a Cosmetic Type with ID #$cosmetic_type_id does not exist</h2>\n";
  } else {
    $type = CosmeticType::findType($cosmetic_type_id);
    $type->cosmetic_type_id = $_POST['cosmetic_type_id'];
    $type->cosmetic_type_code = htmlspecialchars($_POST['cosmetic_type_code']);
    $type->cosmetic_type_name = htmlspecialchars($_POST['cosmetic_type_name']);
    $type->cosmetic_shelf_number = htmlspecialchars($_POST['cosmetic_shelf_number']);

    $result = $type->updateType();
    if ($result) {
      echo "<h2>Cosmetic Type $cosmetic_type_id updated</h2>\n";
    } else {
      echo "<h2>Problem updating Cosmetic Type $cosmetic_type_id</h2>\n";
    }
  }
}
?>
