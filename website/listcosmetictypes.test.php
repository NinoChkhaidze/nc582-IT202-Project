<?php
require_once("cosmetictype.php");
$types = CosmeticType::getTypes();
if ($types) {
  foreach ($types as $type) {
     $name =  $type->cosmetic_type_id . " - " . $type->cosmetic_type_code . ", " . $type->cosmetic_type_name . ", " . $type->cosmetic_shelf_number;
     echo "$name<br>";
  }
} else {
  echo "<h2>No Cosmetic Types found.</h2>";
}
?>