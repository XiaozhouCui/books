
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
<link href="view/css/resCSS.css" rel="stylesheet">
</head>
<body>
<div class="flex-container">
  <header class="header">
    <h1>My Books</h1>
  </header>
  <div class="contentLeft"></div>
  <article>
    <div class="bigholder">
      <h2>Login Form</h2>
      <form action="controller/pdoLogin.php" method="post">
        <fieldset>
          <legend><h3>Admin Login</h3></legend>
          <label>Username:</label>
          <input type="text" name="username" placeholder="admin" required>
          <label>Password:</label>
          <input type="text" name="password" placeholder="admin" required>
          <input type="submit" value=" Login ">
        </fieldset>
      </form>
    </div>
  </article>
  <div class="contentRight"></div>
  <footer>
    <p>Copyright &copy; www.joesdemosite.com 2018</p>
  </footer>
</div>
</body>
</html>


