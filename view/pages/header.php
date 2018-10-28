<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Control Panel</title>
<link href="../css/resCSS.css" rel="stylesheet">
</head>
<body>
<div class="flex-container">
  <header class="nav">
    <?php echo '<br>Welcome <strong> '.$_SESSION['login'].'!</strong> You have successfully logged in. <a href="../../controller/pdoLogout.php">Logout</a>';?>
  </header>
  <nav class="nav">
    <div class="menuItem"><a href="?link=showbooks">SHOW BOOKS</a></div>
    <div class="menuItem"><a href="?link=addbooks">ADD A BOOK</a></div>
    <div class="menuItem"><a href="?link=addusers">ADD A USER</a></div>
    <div class="menuItem"><a href="?link=showlog">UPDATE HISTORY</a></div>
  </nav>
  <div class="contentLeft">left</div>