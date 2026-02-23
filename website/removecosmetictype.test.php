<?php
error_log('$_POST ' . print_r($_POST, true));
require_once("cosmetictype.php");

$cosmetic_type_id = $_POST['cosmetic_type_id'];
if ((trim($cosmetic_type_id) == '') or (!is_numeric($cosmetic_type_id))) {
 echo "<h2>Sorry, you must enter a valid categoryID</h2>\n";
} else if (!CosmeticType::findType($cosmetic_type_id)) {
 echo "<h2>Sorry, A category with ID #$cosmetic_type_id does not exist</h2>\n";
} else {
 $cosmetic_type_id = $_POST['cosmetic_type_id'];
 $type = CosmeticType::findType($cosmetic_type_id);
 $result = $type->removeType();
 if ($result)
   echo "<h2>Cosmetic Type $cosmetic_type_id removed</h2>\n";
 else
   echo "<h2>Sorry, problem removing category $cosmetic_type_id</h2>\n";
}
?>