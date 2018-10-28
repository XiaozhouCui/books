
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
<link href="view/css/resCSS.css" rel="stylesheet">
</head>
<body>
<div class="flex-container">
  <header class="nav">header </header>
  <nav class="nav">
    <div class="menuItem"><a href="#home">HOME</a></div>
    <div class="menuItem">ABOUT US</div>
    <div class="menuItem">PRODUCTS</div>
    <div class="menuItem">CONTACT</div>
  </nav>
  <div class="contentLeft">left </div>
  <article>
    <div class="bigholder">
        <h2>Login Form</h2>
        <form action="controller/pdoLogin.php" method="post">
            <fieldset>
                <legend>Admin Login</legend>
                <label>Username:</label>
                <input type="text" maxlength="50" name="username" required><br><br>
                <label>Password:</label>
                <input type="password" maxlength="50" name="password" required><br><br>
                <input type="submit" value=" Login ">
            </fieldset>
        </form>
    </div>
    <div class="bigholder">
      <h2>Default login: username "admin", password "admin"</h2>
    </div>
  </article>
  <div class="contentRight">right </div>
  <footer>
    <p>footer</p>
  </footer>
</div>
</body>
</html>


