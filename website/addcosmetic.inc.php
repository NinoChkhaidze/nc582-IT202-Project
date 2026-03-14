<?php
require_once("cosmetic.php");

// Name: Nintsi Chkhaidze
// Date: March 13, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 3, HTML Website Layout
// Email: nc582@njit.edu

$cosmetic_id = $_POST['cosmetic_id'];
$cosmetic_type_id = $_POST['cosmetic_type_id'];
$cosmetic_code = $_POST['cosmetic_code'];
$cosmetic_name = $_POST['cosmetic_name'];
$cosmetic_description = $_POST['cosmetic_description'];
$cosmetic_shade = $_POST['cosmetic_shade'];
$cosmetic_finish = $_POST['cosmetic_finish'];
$cosmetic_buy_price = $_POST['cosmetic_buy_price'];
$cosmetic_sell_price = $_POST['cosmetic_sell_price'];

if (!isset($_SESSION['login'])) {
  echo "<h2>Sorry, you must be logged in to add a Cosmetic</h2>\n";
} else if ((trim($cosmetic_id) == '') or (!is_numeric($cosmetic_id))) {
  echo "<h2>Sorry, you must enter a valid Cosmetic ID number</h2>\n";
} else if (Cosmetic::findCosmetic($cosmetic_id)) {
  echo "<h2>Sorry, a Cosmetic with the ID #$cosmetic_id already exists</h2>\n";
} else {
    $cosmetic = new Cosmetic(
        $cosmetic_id,
        $cosmetic_type_id,
        $cosmetic_code,
        $cosmetic_name,
        $cosmetic_description,
        $cosmetic_shade,
        $cosmetic_finish,
        $cosmetic_buy_price,
        $cosmetic_sell_price
    );
  
    $result = $cosmetic->saveCosmetic();
    if ($result) {
        echo "<h2>New Cosmetic #$cosmetic_id successfully added</h2>\n";
    } else {
        echo "<h2>Sorry, there was a problem adding that Cosmetic</h2>\n";
    }
}
?>