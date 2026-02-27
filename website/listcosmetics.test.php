<?php
require_once("cosmetic.php");
$types = Cosmetic::getCosmetics();
if ($types) {
  foreach ($types as $type) {
     $name =  $type->cosmetic_id . " - " .  $type->cosmetic_type_id . " - " . $type->cosmetic_code . ", " . $type->cosmetic_name . ", " . $type->cosmetic_description . ", " . $type->cosmetic_shade . ", " . $type->cosmetic_finish . ", " . $type->cosmetic_sell_price . ", " . $type->cosmetic_buy_price;
     echo "$name<br>";
  }
} else {
  echo "<h2>No Cosmetics found.</h2>";
}
?>