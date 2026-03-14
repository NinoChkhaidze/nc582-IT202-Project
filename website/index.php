<?php
session_start();
/*
// Name: Nintsi Chkhaidze
// Date: March 13, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 3, HTML Website Layout
// Email: nc582@njit.edu
*/
require_once("cosmetictype.php");
require_once("cosmetic.php");
?>

<!DOCTYPE html>
<html>
<head><title>Cosmetic Inventory Helper</title></head>
<body>
   <header>
       <?php include("header.inc.php"); ?>
   </header>
   <section>
       <nav>
           <?php include("nav.inc.php"); ?>
       </nav>
       <main>
            <h1> Welcome to Cosmetic Inventory! </h1>
           <?php
           if (isset($_REQUEST['content'])) {
               include($_REQUEST['content'] . ".inc.php");
           } else {
               include("main.inc.php");
           }
           ?>
       </main>
   </section>
   <footer>
       <?php include("footer.inc.php"); ?>
   </footer>
</body>
</html>