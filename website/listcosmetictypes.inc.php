<?php
// Name: Nintsi Chkhaidze
// Date: March 13, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 3, HTML Website Layout
// Email: nc582@njit.edu

require_once("cosmetictype.php");
$types = CosmeticType::getTypes();

if ($types) {
?>
 <h2>Select Cosmetic Type </h2>
  <form action="index.php" method="post">
   <select name="cosmeticTypeID" size="20">
       <?php
       $first = true;
       foreach ($types as $type) {
           $cosmeticTypeID = $type->cosmetic_type_id;
           $name = $type->cosmetic_type_id . " - " . $type->cosmetic_type_code . ", " . $type->cosmetic_type_name . ", " . $type->cosmetic_shelf_number;
           if($first) {
                echo "<option value=\"$cosmeticTypeID\" selected>$name</option>\n"; 
                $first = false;
           } else {
                echo "<option value=\"$cosmeticTypeID\">$name</option>\n";
           }
       }
       ?>
   </select>
  </form>
<?php
} else {
  echo "<h2>No Cosmetic Types found.</h2>";
}
?>
