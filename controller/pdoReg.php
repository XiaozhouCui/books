<?php
session_start();
require("../model/db.php");
require("../model/dbFunctions.php");

if ($_SESSION['level'] == 'Admin' ) {
  if (!empty([$_POST])) {
    //input sanitation via sanitise() function
    $username = !empty($_POST['username'])? sanitise(($_POST['username'])): null; 
    $mypass = !empty($_POST['password'])? sanitise(($_POST['password'])): null;
    $password = password_hash($mypass, PASSWORD_DEFAULT); //hash the password
    $role = !empty($_POST['role']) ? sanitise(($_POST['role'])): null;
    $name = !empty($_POST['name']) ? sanitise(($_POST['name'])): null;
    $surname = !empty($_POST['surname'])? sanitise(($_POST['surname'])): null;
    $email = !empty($_POST['email']) ? sanitise(($_POST['email'])): null;

    if($_REQUEST['actiontype'] == 'reg') {
      $query = $conn->prepare("SELECT username FROM login WHERE username = :user");
      $query->bindValue(':user', $username);
      $query->execute();
      if ($query->rowCount() < 1) {
        try {
          addUser($username, $password, $role, $name, $surname, $email);
          $_SESSION['message'] = "User added successfully.";
          header('location:../view/pages/adminBookCentral.php');
        }
        catch(PDOException $e) { 
          echo "Account creation problems".$e -> getMessage();
          die();
        }           
      }
      else {
        $_SESSION['message'] = "Username already exists, try another";
        echo "Username already exists, try another";
        echo "<br><a href='../view/pages/adminBookCentral.php?link=addusers'>Go back</a>";
      }
      exit;
    }
  }
} else {
  $_SESSION['message'] = "Registration failed, only administrator can create user accounts";
  echo "Registration failed, only administrator can create user accounts";
  echo "<br><a href='../view/pages/adminBookCentral.php'>Go Back</a>";
}
?>