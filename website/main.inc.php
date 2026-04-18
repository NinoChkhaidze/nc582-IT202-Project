<?php
/*
Name: Nintsi Chkhaidze
Date: April 17, 2026
Course: IT202
Section: 006
Assignment: Phase 1 - Login and Logout
Email: nc582@njit.edu
*/

if (!isset($_SESSION['login'])) {
?>
  <h2>Please log in to the Cosmetics Inventory Website </h2><br>
  <form name="login" action="index.php" method="post">
    <label>Email:</label>
    <input type="text" name="email_address" size="20">
    <br>
    <br>
    <label>Password:</label>
    <input type="password" name="password" size="20">
    <br>
    <br>
    <input type="submit" value="Login">
    <input type="hidden" name="content" value="validate">
  </form>
<?php
} else {
   echo "<h2>Welcome to Cosmetics Invetory Website {$_SESSION['firstName']} {$_SESSION['lastName']} ({$_SESSION['pronouns']}) </h2>";
?>
   <br><br>
   <!-- <p>This program tracks category and item inventory</p>
   <p>Please use the links in the navigation window</p>
   <p>Please DO NOT use the browser navigation buttons!</p> -->
   <a href="index.php?content=logout"><strong>Logout</strong></a>
<?php
}
?>