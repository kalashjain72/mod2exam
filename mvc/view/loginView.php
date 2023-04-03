<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="../public/css/style/login.css">
</head>

<body>
  <div class="login-box">
    <h1>Login</h1>
    <form action="/index.php?controller=Login&function=validate" method="post">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
      <input type="submit" value="Login">

    </form>
  </div>
</body>

</html>