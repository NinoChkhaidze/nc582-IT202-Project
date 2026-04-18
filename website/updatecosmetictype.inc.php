<?php
// Name: Nintsi Chkhaidze
// Date: April 17, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 5 - JavaScript
// Email: nc582@njit.edu

require_once("cosmetictype.php");
if (!isset($_POST['cosmetic_type_id']) or (!is_numeric($_POST['cosmetic_type_id']))) {
?>
  <h2>You did not select a valid Cosmetic Type ID value</h2>
  <a href="index.php?content=listcosmetictypes">List Cosmetic Types</a>
<?php
} else {
  $cosmetic_type_id = $_POST['cosmetic_type_id'];
  $type = CosmeticType::findType($cosmetic_type_id);
  if ($type) {
?>
    <h2>Update Cosmetic Type <?php echo $type->cosmetic_type_id; ?></h2><br>
    <form name="cosmetictype" action="index.php" method="post">
      <table>
        <tr>
          <td>Cosmetic Type ID</td>
          <td><?php echo $type->cosmetic_type_id; ?></td>
        </tr>
        <tr>
          <td>Cosmetic Type Code</td>
          <td><input type="text" name="cosmetic_type_code" value="<?php echo $type->cosmetic_type_code; ?>" minlength="2" maxlength="10" required></td>
        </tr>
        <tr>
          <td>Cosmetic Type Name</td>
          <td><input type="text" name="cosmetic_type_name" value="<?php echo $type->cosmetic_type_name; ?>" minlength="3" maxlength="100" required></td>
        </tr>
        <tr>
          <td>Cosmetic Shelf Number</td>
          <td><input type="text" name="cosmetic_shelf_number" value="<?php echo $type->cosmetic_shelf_number; ?>" minlength="1" maxlength="10" required></td>
        </tr>
      </table><br><br>
      <input type="submit" name="answer" value="Update Cosmetic Type">
      <input type="submit" name="answer" value="Cancel">
      <input type="hidden" name="cosmetic_type_id" value="<?php echo $cosmetic_type_id; ?>">
      <input type="hidden" name="content" value="changecosmetictype">
    </form>
    <script language="javascript">
      document.cosmetictype.cosmetic_type_code.focus();
      document.cosmetictype.cosmetic_type_code.select();
    </script>
<?php
  } else {
?>
    <h2>Sorry, Cosmetic Type <?php echo $cosmetic_type_id; ?> not found</h2>
    <a href="index.php?content=listcosmetictypes">List Cosmetic Types</a>
<?php
  }
}
?>
