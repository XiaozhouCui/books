
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
  <div class="contentLeft"></div>
  <article>
    <div class="bigholder">
        <h2>Login Form</h2>
        <form action="controller/pdoLogin.php" method="post">
            <fieldset>
                <legend>Admin Login</legend>
                <label>Username:</label>
                <input type="text" name="username" required><br><br>
                <label>Password:</label>
                <input type="text" name="password" required><br><br>
                <input type="submit" value=" Login ">
            </fieldset>
        </form>
    </div>
    <div class="bigholder">
      <h2>Default login: username "admin", password "admin"</h2>
    </div>
  </article>
  <div class="contentRight"></div>
  <footer>
    <p>footer</p>
  </footer>
</div>
</body>
</html>


