<?php
session_start();
require("../model/db.php");
require("../model/dbFunctions.php");
date_default_timezone_set('Australia/Brisbane');//set time zone to Brisbane

if($_SESSION['level'] == 'Admin') {
  if (!empty([$_POST])) {
    $bookid= !empty($_POST['bookid']) ? sanitise(($_POST['bookid'])): null;
    $actiontype = !empty($_POST['actiontype']) ? sanitise(($_POST['actiontype'])): null;
    $loginid = $_SESSION['loginid']; 
    $date = date('Y-m-d H:i:s');

    if($_POST['actiontype'] == 'delbook') {
      try {
        delBook($bookid, $actiontype, $loginid, $date);
        $_SESSION['message'] = "Book deleted successfully";
        header('location:../view/pages/adminBookCentral.php');
      }
      catch(PDOException $e) { 
        echo "Book deleting problems".$e -> getMessage();
        die();
      }
    } else {
      $_SESSION['message'] = "This is not the correct form for book deleting.";
      header('location:../view/pages/adminBookCentral.php');
    }
  }
} else {
  $_SESSION['message'] = "Deletion failed, only admin user can delete books.";
  header('location:../view/pages/adminBookCentral.php');
}