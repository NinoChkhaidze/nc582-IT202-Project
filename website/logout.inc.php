<?php

/*
Name: Nintsi Chkhaidze
Date: February 13, 2026
Course: IT202
Section: 006
Assignment: Phase 1 - Database and Login
Email: nc582@njit.edu
*/

if (isset($_SESSION['login'])) {
   unset($_SESSION['login']);
}
header("Location: index.php");
?>