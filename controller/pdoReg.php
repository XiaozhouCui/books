<?php
require("../model/db.php");
require("../model/dbFunctions.php");

if (!empty([$_POST])) {
    //input sanitation via sanitise() function
    $username = !empty($_POST['username'])? sanitise(($_POST['username'])): null; 
    // "?" means if it is true, ":" means else
    $mypass = !empty($_POST['password'])? sanitise(($_POST['password'])): null;
    $password = password_hash($mypass, PASSWORD_DEFAULT); //hash the password
    $role = !empty($_POST['role']) ? sanitise(($_POST['role'])): null;
    $name = !empty($_POST['name']) ? sanitise(($_POST['name'])): null;
    $surname = !empty($_POST['surname'])? sanitise(($_POST['surname'])): null;
    $email = !empty($_POST['email']) ? sanitise(($_POST['email'])): null;

    //echo $surname; //test if it works up to this point

    if($_REQUEST['actiontype'] == 'reg') {
        $query = $conn->prepare("SELECT username FROM login WHERE username = :user");
        $query->bindValue(':user', $username);
        $query->execute();
        if ($query->rowCount() < 1) {
            try {
                addUser($username, $password, $role, $name, $surname, $email);
                header('location:../view/pages/adminBookCentral.php');
            }
            catch(PDOException $e) { 
                echo "Account creation problems".$e -> getMessage();
                die();
            }           
        }
        else {
            echo "Username already exists, try another";
            echo "<br><a href='../view/pages/registration.php'>Login again</a>";
        }
        exit;
    }
}
?>
