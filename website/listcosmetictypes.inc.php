<?php
// Name: Nintsi Chkhaidze
// Date: April 17, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 5 - JavaScript
// Email: nc582@njit.edu

require_once("cosmetictype.php");
$types = CosmeticType::getTypes();

if ($types) {
?>
<script language="javascript">
    function listbox_dblclick() {
        document.cosmetictypes.displaycosmetictype.click()
    }
    function button_click(target) {
        var userConfirmed = true;
        if (target == 1) {
            userConfirmed = confirm("Are you sure you want to remove this cosmetic type?");
        }
        if (userConfirmed) {
            if (target == 0) cosmetictypes.action = "index.php?content=displaycosmetictype";
            if (target == 1) cosmetictypes.action = "index.php?content=removecosmetictype";
            if (target == 2) cosmetictypes.action = "index.php?content=updatecosmetictype";
        } else {
            alert("Action canceled.");
        }
    }
</script>
 <h2>Select Cosmetic Type </h2>
  <form name="cosmetictypes" method="post">
   <select ondblclick="listbox_dblclick()" name="cosmetic_type_id" size="20">
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
   <br>
   <input type="submit" onClick="button_click(0)" name="displaycosmetictype" value="View Cosmetic Type">
   <input type="submit" onClick="button_click(1)" name="deletecosmetictype" value="Delete Cosmetic Type">
   <input type="submit" onClick="button_click(2)" name="updatecosmetictype" value="Update Cosmetic Type">
  </form>
<?php
} else {
  echo "<h2>No Cosmetic Types found.</h2>";
}
?>
