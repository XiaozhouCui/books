<?php
session_start();
require("../model/db.php");
require("../model/dbFunctions.php");
date_default_timezone_set('Australia/Brisbane');//set time zone to Brisbane

if (!empty([$_POST])) {
  //input sanitisation via sanitise() function
  $authorid= !empty($_POST['authorid']) ? sanitise(($_POST['authorid'])): null;
  $bookid= !empty($_POST['bookid']) ? sanitise(($_POST['bookid'])): null;
  $name = !empty($_POST['name'])? sanitise(($_POST['name'])): null; 
  $surname = !empty($_POST['surname'])? sanitise(($_POST['surname'])): null;
  $nationality = !empty($_POST['nationality'])? sanitise(($_POST['nationality'])): null;
  $yob = !empty($_POST['yob']) ? sanitise(($_POST['yob'])): null;
  $yod = !empty($_POST['yod']) ? sanitise(($_POST['yod'])): null; 
  $bt = !empty($_POST['bt']) ? sanitise(($_POST['bt'])): null;
  $ot = !empty($_POST['ot']) ? sanitise(($_POST['ot'])): null;
  $yop = !empty($_POST['yop']) ? sanitise(($_POST['yop'])): null;
  $genre = !empty($_POST['genre']) ? sanitise(($_POST['genre'])): null;
  $sold = !empty($_POST['sold']) ? sanitise(($_POST['sold'])): null;
  $lan = !empty($_POST['lan']) ? sanitise(($_POST['lan'])): null;
  $cip = !empty($_POST['cip']) ? sanitise(($_POST['cip'])): null; 
  $actiontype = !empty($_POST['actiontype']) ? sanitise(($_POST['actiontype'])): null;
  $loginid = $_SESSION['loginid']; //record the account who add this book
  $date = date('Y-m-d H:i:s'); //record current date and time

  //print_r($_POST); //test if it works up to this point

  if($_POST['actiontype'] == 'editbook') {
    try {
      editBook($authorid, $name, $surname, $nationality, $yob, $yod, $bookid, $bt, $ot, $yop, $genre, $sold, $lan, $cip, $actiontype, $loginid, $date);
      $_SESSION['message'] = "Book updated successfully";
      header('location:../view/pages/adminBookCentral.php');
    }
    catch(PDOException $e) { 
      echo "Book updating problems".$e -> getMessage();
      die();
    }
  } else {
    $_SESSION['message'] = "This is not the correct form for book editing, please use the right form.";
    header('location:../view/pages/adminBookCentral.php');
  }
}
?>
