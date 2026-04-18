<?php
// Name: Nintsi Chkhaidze
// Date: April 17, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 5 - JavaScript
// Email: nc582@njit.edu
?>
<h2>Enter New Cosmetic Type Information</h2>
<form name="newcosmetictype" action="index.php" method="post">
   <table cellpadding="1" border="0">
       <tr>
           <td>Cosmetic Type ID:</td>
           <td><input type="number" name="cosmetic_type_id" size="4" min="1" max="99" required></td>
       </tr>
       <tr>
           <td>Cosmetic Type Code:</td>
           <td><input type="text" name="cosmetic_type_code" size="20" placeholder="XXX" minlength="2" maxlength="10" required></td>
       </tr>
       <tr>
           <td>Cosmetic Type Name:</td>
           <td><input type="text" name="cosmetic_type_name" size="40" minlength="10" maxlength="100" required></td>
       </tr>
       <tr>
           <td>Cosmetic Type shelf number:</td>
           <td><input type="text" name="cosmetic_shelf_number" size="20" minlength="2" maxlength="50" required></td>
       </tr>
   </table><br>
   <input type="submit" value="Submit New Cosmetic Type">
   <input type="hidden" name="content" value="addcosmetictype">
</form>