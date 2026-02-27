<?php
// Name: Nintsi Chkhaidze
// Date: February 27, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 2 - CRUD Categories and Items
// Email: nc582@njit.edu

error_log('$_POST ' . print_r($_POST, true));
require_once("cosmetic.php");

$cosmetic_id = $_POST['cosmetic_id'];
if ((trim($cosmetic_id) == '') or (!is_numeric($cosmetic_id))) {
 echo "<h2>Sorry, you must enter a valid Cosmetic ID</h2>\n";
} else if (!Cosmetic::findCosmetic($cosmetic_id)) {
 echo "<h2>Sorry, a Cosmetic with ID #$cosmetic_id does not exist</h2>\n";
} else {
 $cosmetic_id = $_POST['cosmetic_id'];
 $type = Cosmetic::findCosmetic($cosmetic_id);
 $result = $type->removeCosmetic();
 if ($result)
   echo "<h2>Cosmetic $cosmetic_id removed</h2>\n";
 else
   echo "<h2>Sorry, problem removing cosmetic $cosmetic_id</h2>\n";
}
?>