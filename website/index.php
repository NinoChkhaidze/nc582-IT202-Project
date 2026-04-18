<?php
session_start();
/*
// Name: Nintsi Chkhaidze
// Date: April 18, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 5 - JavaScript
// Email: nc582@njit.edu
*/
require_once("cosmetictype.php");
require_once("cosmetic.php");
?>

<!DOCTYPE html>
<html>
<head>
   <title>Nintsi's Cosmetic Inventory</title>
   <link rel="icon" type="image/png" href="images/logo.png">
   <link rel="stylesheet" type="text/css" href="cosmetic_styles.css">
   <script src="realtime.js"></script>
</head>
<body>
   <header>
       <?php include("header.inc.php"); ?>
   </header>
   <section style="height: 425px;">
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
   <?php if (isset($_SESSION['login'])) { ?>
   <aside>
       <?php include("aside.inc.php"); ?>
       <script>
           getRealTime();
           setInterval(getRealTime, 5000);
       </script>
   </aside>
   <?php } ?>
   <footer>
       <?php include("footer.inc.php"); ?>
   </footer>
</body>
</html>
