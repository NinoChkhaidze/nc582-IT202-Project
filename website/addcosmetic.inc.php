<?php
require_once("cosmetic.php");

// Name: Nintsi Chkhaidze
// Date: April 17, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 5 - JavaScript
// Email: nc582@njit.edu

$cosmetic_id = filter_input(INPUT_POST, 'cosmetic_id', FILTER_VALIDATE_INT);
$cosmetic_buy_price = filter_input(INPUT_POST, 'cosmetic_buy_price', FILTER_VALIDATE_FLOAT);
$cosmetic_sell_price = filter_input(INPUT_POST, 'cosmetic_sell_price', FILTER_VALIDATE_FLOAT);

if ((trim($cosmetic_id) == '') or (!is_int($cosmetic_id))) {
  echo "<h2>Sorry, you must enter a valid Cosmetic ID number</h2>\n";
} else if (!is_float($cosmetic_buy_price) && !is_int($cosmetic_buy_price)) {
  echo "<h2>Sorry, you must enter a valid Buy Price</h2>\n";
} else if (!is_float($cosmetic_sell_price) && !is_int($cosmetic_sell_price)) {
  echo "<h2>Sorry, you must enter a valid Sell Price</h2>\n";
} else if (!isset($_SESSION['login'])) {
  echo "<h2>Sorry, you must be logged in to add a Cosmetic</h2>\n";
} else if (Cosmetic::findCosmetic($cosmetic_id)) {
  echo "<h2>Sorry, a Cosmetic with the ID #$cosmetic_id already exists</h2>\n";
} else {
    $cosmetic_type_id    = $_POST['cosmetic_type_id'];
    $cosmetic_code       = htmlspecialchars($_POST['cosmetic_code']);
    $cosmetic_name       = htmlspecialchars($_POST['cosmetic_name']);
    $cosmetic_description = htmlspecialchars($_POST['cosmetic_description']);
    $cosmetic_shade      = htmlspecialchars($_POST['cosmetic_shade']);
    $cosmetic_finish     = htmlspecialchars($_POST['cosmetic_finish']);
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