  <?php
  // Name: Nintsi Chkhaidze
// Date: March 13, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 3, HTML Website Layout
// Email: nc582@njit.edu

   if (isset($_SESSION['login'])) {
   ?>
    <div class="navigation" style="float: left; height: 100%; min-width: 175px; width: auto;">
      <table width="100%" cellpadding="3">
        <?php
         echo "<td><h3>Welcome, {$_SESSION['firstName']} {$_SESSION['lastName']}</h3></td>";
         ?>
        <tr>
          <td><a href="index.php"><strong>Home</strong></a></td>
        </tr>
        <tr>
          <td><strong>Cosmetic Types</strong></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listcosmetictypes">
              <strong>List Cosmetic Types </strong></a></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newcosmetictype">
              <strong>Add New Cosmetic Type</strong></a></td>
        </tr>
        <tr>
          <td><strong>Cosmetics</strong></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listcosmetics">
              <strong>List Cosmetics</strong></a></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newcosmetic">
              <strong>Add New Cosmetic</strong></a></td>
        </tr>
        <tr>
          <td>
            <hr />
          </td>
        </tr>
        <tr>
          <td><a href="index.php?content=logout">
              <strong>Logout</strong></a></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
            <form action="index.php" method="post">
              <label>Search for Cosmetic:</label><br>
              <input type="text" name="itemID" size="14" />
              <input type="submit" value="find" />
              <input type="hidden" name="content" value="updatecosmetic" />
            </form>
          </td>
        </tr>
        <tr>
          <td>
            <form action="index.php" method="post">
              <label>Search for Cosmetic Type:</label><br>
              <input type="text" name="cosmetic_type_id" size="14" />
              <input type="submit" value="find" />
              <input type="hidden" name="content" value="displaycosmetictype" />
            </form>
          </td>
        </tr>
      </table>
    </div>
  <?php
   }
   ?>