<!-- <?php
if($_SERVER['REQUEST_MEHTOD']=='POST'){
  include "./dbconnectivity.php";
  $username = $_POST["username"];
  $username = $_POST["username"];


}
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body>
  <div class="form-container">
    <p class="title">Welcome back</p>
    <form class="form" action="index.php" method="post">
      <input type="email" class="input" placeholder="Email" name="email" required>
      <input type="password" class="input" placeholder="Password" name="password" required>
      <p class="page-link">
        <span class="page-link-label"><a>Forgot Password?</a></span>
      </p>
      <button class="form-btn" type="submit">Log in</button>
    </form>
    <p class="sign-up-label">
      Don't have an account?<span class="sign-up-link"><a>Sign up</a></span>
    </p>
    <div class="buttons-container">
      <div class="apple-login-button">
        <span>Log in with Apple</span>
      </div>
      <div class="google-login-button">
        
        <span>Log in with Google</span>
      </div>
    </div>
  </div>
</body>
</html>