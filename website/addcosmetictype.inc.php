<?php
require_once("cosmetictype.php");

// Name: Nintsi Chkhaidze
// Date: March 13, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 3, HTML Website Layout
// Email: nc582@njit.edu

$cosmetic_type_id = $_POST['cosmetic_type_id'];
$cosmetic_type_code = $_POST['cosmetic_type_code'];
$cosmetic_type_name = $_POST['cosmetic_type_name'];
$cosmetic_shelf_number = $_POST['cosmetic_shelf_number'];

if (!isset($_SESSION['login'])) {
  echo "<h2>Sorry, you must be logged in to add a Cosmetic Type</h2>\n";
} 
else if ((trim($cosmetic_type_id) == '') or (!is_numeric($cosmetic_type_id))) {
  echo "<h2>Sorry, you must enter a valid Cosmetic Type ID number</h2>\n";
} else if (CosmeticType::findType($cosmetic_type_id)) {
  echo "<h2>Sorry, A Cosmetic Type with the ID #$cosmetic_type_id already exists</h2>\n";
} else {
    $cosmeticType = new CosmeticType(
        $cosmetic_type_id,
        $cosmetic_type_code,
        $cosmetic_type_name,
        $cosmetic_shelf_number
    );
  
    $result = $cosmeticType->saveType();
    if ($result) {
        echo "<h2>New Cosmetic Type #$cosmetic_type_id successfully added</h2>\n";
    } else {
        echo "<h2>Sorry, there was a problem adding that Cosmetic Type</h2>\n";
    }
}
?>