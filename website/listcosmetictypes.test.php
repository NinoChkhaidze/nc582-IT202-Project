<?php
// Name: Nintsi Chkhaidze
// Date: February 27, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 2 - CRUD Categories and Items
// Email: nc582@njit.edu

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