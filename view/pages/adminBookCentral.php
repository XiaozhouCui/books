<?php
session_start();
if((time() - $_SESSION['time_start_login']) > 600) {
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
  <?php
    if (isset( $_GET['link'] ) ) {
      $action = $_GET['link'];
      if ( $action == 'showbooks' ) {
        include ("showbooks.php");
      }
      if ( $action == 'addbooks' ) {
        include ("addbooks.php");
      }
      if ( $action == 'showusers' ) {
        include ("showusers.php");
      }
      if ( $action == 'addusers' ) {
        include ("registration.php");
      }
    }
  ?>
  </article>
  <div class="contentRight">right </div>
  <footer>
  <p><?php 
  print_r($_SESSION);
  print_r($_GET);
  print_r($_POST);
  ?></p>
  </footer>
</div>
</body>
</html> <?php

}  
else  {
  header("location:../../index.php");  
}
?>