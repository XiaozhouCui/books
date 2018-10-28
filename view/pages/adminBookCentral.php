<?php
session_start();
if((time() - $_SESSION['time_start_login']) > 1200) {
  header("location: ../../controller/pdoLogout.php");
} else {
  $_SESSION['time_start_login'] = time();
} 
require("../../model/db.php");
require("../../model/dbFunctions.php");

if (isset($_SESSION['login']) == true) {

  include ("header.php");
  ?>  
  <article>
    <div class="bigholder">
      <?php 
      if(isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      }
      ?>
      </div>
  <?php
    if (isset( $_GET['link'] ) ) {
      $action = $_GET['link'];
      if ( $action == 'showbooks' ) {
        include ("showbooks.php");
      }
      if ( $action == 'addbooks' ) {
        include ("addBookForm.php");
      }
      if ( $action == 'editbook' ) {
        include ("editBookForm.php");
      }
      if ( $action == 'delbook' ) {
        include ("delBookForm.php");
      }
      if ( $action == 'showusers' ) {
        include ("showusers.php");
      }
      if ( $action == 'addusers' ) {
        include ("registration.php");
      }
      if ( $action == 'showlog' ) {
        include ("booklog.php");
      }
    } else {
      include ("showbooks.php");
    }
  ?>
  </article>
  <?php
  include ("footer.php");
} else  {
  header("location:../../index.php");  
}
?>