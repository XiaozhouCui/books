<?php
//session_start();
require("../model/db.php");
require("../model/dbFunctions.php");
date_default_timezone_set('Australia/Brisbane');//set time zone to Brisbane

if (!empty([$_POST])) {
    //input sanitation via sanitise() function
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
    $actiontype = !empty($_POST['actiontpye']) ? sanitise(($_POST['actiontype'])): null;
    $actionby = $_SESSION['login']; //record the account who add this book
    $date = date('Y-m-d H:i:s'); //record current date and time

    //echo $name; //test if it works up to this point

    if($_POST['actiontype'] == 'addbook') {
        $query = $conn->prepare("SELECT * FROM author WHERE name = :name AND surname = :surname");
        $query->bindValue(':name', $name);
        $query->bindValue(':surname', $surname);
        $query->execute();
        if ($query->rowCount() < 1) { //rowCount() < 1 means author does not exist in the database
            try {
                addAuthorBook($name, $surname, $nationality, $yob, $yod, $bt, $ot, $yop, $genre, $sold, $lan, $cip, $actiontype, $actionby, $date);
                $_SESSION['message'] = "Author and Book added successfully";
                header('location:../view/pages/adminBookCentral.php');
            }
            catch(PDOException $e) { 
                echo "Author + Book creation problems".$e -> getMessage();
                die();
            }           
        }
        else { //else means author already exists in the database
            try {
                addBookOnly($bt, $ot, $yop, $genre, $sold, $lan, $cip, $actiontype, $actionby, $date);
                $_SESSION['message'] = "Book added successfully";
                header('location:../view/pages/adminBookCentral.php');
            }
            catch(PDOException $e) { 
                echo "Book creation problems".$e -> getMessage();
                die();
            }  
        }
        exit;
    }
}
?>
