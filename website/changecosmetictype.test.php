<?php
require_once("cosmetictype.php");
$cosmetic_type_id = $_POST['cosmetic_type_id'];
if ((trim($cosmetic_type_id) == '') or (!is_numeric($cosmetic_type_id))) {
  echo "<h2>Sorry, you must enter a valid category ID</h2>\n";
} else if (!CosmeticType::findType($cosmetic_type_id)) {
  echo "<h2>Sorry, A type with ID #$cosmetic_type_id does not exist</h2>\n";
} else {
  $type = CosmeticType::findType($cosmetic_type_id);
  $type->cosmetic_type_id = $_POST['cosmetic_type_id'];
  $type->cosmetic_type_code = $_POST['cosmetic_type_code'];
  $type->cosmetic_type_name = $_POST['cosmetic_type_name'];
  $type->cosmetic_shelf_number = $_POST['cosmetic_shelf_number'];
  
  $result = $type->updateType();
  if ($result) {
     echo "<h2>Cosmetic Type $cosmetic_type_id updated</h2>\n";
  } else {
     echo "<h2>Problem updating Cosmetic Type $cosmetic_type_id</h2>\n";
  }
}
?>