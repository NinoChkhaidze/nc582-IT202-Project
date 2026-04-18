<?php
/*
Name: Nintsi Chkhaidze
Date: April 18, 2026
Course: IT202
Section: 006
Assignment: Phase 5 - JavaScript
Email: nc582@njit.edu
*/

ob_start();
include("cosmetictype.php");
include("cosmetic.php");
$totalCosmeticTypes = CosmeticType::getTotalCosmeticTypes();
$totalCosmetics = Cosmetic::getTotalCosmetics();
$buyPriceTotal = number_format(Cosmetic::getTotalBuyPrice(), 2);
$sellPriceTotal = number_format(Cosmetic::getTotalSellPrice(), 2);
$doc = new DOMDocument("1.0");
$inventoryElement = $doc->createElement("cosmeticinventory");
$inventoryElement = $doc->appendChild($inventoryElement);
$typeCountElement = $doc->createElement("typecount", $totalCosmeticTypes);
$typeCountElement = $inventoryElement->appendChild($typeCountElement);
$itemCountElement = $doc->createElement("itemcount", $totalCosmetics);
$itemCountElement = $inventoryElement->appendChild($itemCountElement);
$buyPriceTotalElement = $doc->createElement("buypricetotal", $buyPriceTotal);
$buyPriceTotalElement = $inventoryElement->appendChild($buyPriceTotalElement);
$sellPriceTotalElement = $doc->createElement("sellpricetotal", $sellPriceTotal);
$sellPriceTotalElement = $inventoryElement->appendChild($sellPriceTotalElement);
$output = $doc->saveXML();
header("Content-type: application/xml");
ob_end_clean();
echo $output;
?>
