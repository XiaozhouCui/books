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
    <div class="menuItem"><a href="#">HOME</a></div>
    <div class="menuItem">ABOUT US</div>
    <div class="menuItem">PRODUCTS</div>
    <div class="menuItem">CONTACT</div>
  </nav>
  <div class="contentLeft">left
    <ul>
      <li><a href="?link=showbooks">Show Books</a></li>
      <li><a href="?link=addbooks">Add Books</a></li>
      <li><a href="?link=showusers">Show Users</a></li>
      <li><a href="?link=addusers">Add Users</a></li>
    </ul>
  </div>