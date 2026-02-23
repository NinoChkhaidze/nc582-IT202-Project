<?php

/*
Name: Nintsi Chkhaidze
Date: February 13, 2026
Course: IT202
Section: 006
Assignment: Phase 1 - Login and Logout
Email: nc582@njit.edu
*/

 function getDB($echo_mode = false) {
   $host = 'localhost';
   $port = 3306;
   $dbname = 'cosmetic';
   $username = 'ts_user';
   $password = 'InventoryHelper';
   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   try {
       $db = new mysqli($host, $username, $password, $dbname, $port);
       error_log("Database connection successful to " . $host);
       if ($echo_mode) echo "Database connection successful to " . $host;
       return $db;
   } catch (mysqli_sql_exception $e) {
       error_log("Database connection failed: " . $e->getMessage());
       if ($echo_mode) echo "Database connection failed: " . $e->getMessage();
   }
 }
/*  getDB(true);*/
?>