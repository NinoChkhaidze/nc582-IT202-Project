<?php

/*
Name: Nintsi Chkhaidze
Date: February 13, 2026
Course: IT202
Section: 006
Assignment: Phase 1 - Database and Login
Email: nc582@njit.edu
*/

 error_log('$_POST ' . print_r($_POST, true));
 require_once('database.php');
 $emailAddress = $_POST['email_address'];
 $password = $_POST['password'];
 $query = "SELECT first_name, last_name, pronouns, phone_number FROM cosmetic_users " .
        "WHERE email_address = ? AND password = SHA2(?,256)";
 $db = getDB();
 $stmt = $db->prepare($query);
 $stmt->bind_param("ss", $emailAddress, $password);
 $stmt->execute();
 $stmt->bind_result($firstName, $lastName, $pronouns, $phoneNumber);
 $fetched = $stmt->fetch();
 $db->close();
 $name = "$firstName $lastName";
 if ($fetched && isset($name)) {
    $_SESSION['login'] = true;
    $_SESSION['emailAddress'] = $emailAddress;
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    $_SESSION['pronouns'] = $pronouns;
    $_SESSION['phoneNumber'] = $phoneNumber;
   header("Location: index.php");
 } else {
   echo "<h2>Sorry, login incorrect for the Cosmetic Inventory Website </h2>\n";
   echo "<a href=\"index.php\">Please try again</a>\n";
 }
?>