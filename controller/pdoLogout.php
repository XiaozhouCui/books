<?php
session_start();

if(isset($_SESSION['login']) != true)  {
    //if($_SESSION['login'] = false)  
    header("location:../index.php");  
}  
else  {  
    echo '<br>';
    session_unset(); 
    session_destroy(); 
    echo '<br>';
    echo 'You have successfully logged out <br>';
    echo
    '<script type="text/javascript">',
    'window.location.replace("../index.php");',
    '</script>';
}
?>