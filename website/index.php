<?php
session_start();
/*
Name: Nintsi Chkhaidze
Date: February 13, 2026
Course: IT202
Section: 006
Assignment: Phase 1 - Login and Logout
Email: nc582@njit.edu
*/

?>
<!DOCTYPE html>
<html>
<head><title>Cosmetic Inventory Helper</title></head>
<body>
   <section>
       <main>
           <?php
           if (isset($_REQUEST['content'])) {
               include($_REQUEST['content'] . ".inc.php");
           } else {
               include("main.inc.php");
           }
           ?>
       </main>
   </section>
</body>
</html>