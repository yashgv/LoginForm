<?php
    $fail=false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        include "./dbconnectivity.php";
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $sql="SELECT * FROM signup where Pass='$pass' AND (Email='$email' OR Phone='$email')";
        $result= mysqli_query($connect,$sql);
        $count = mysqli_num_rows($result);
        if($count==1){
            session_start();
            $row=mysqli_fetch_row($result);
            $_SESSION['FName']=$row['FName'];
            $_SESSION['LName']=$row['LName'];
            // $_SESSION['image']=$row['image'];
            $_SESSION['loggedin']=true;
            header("location: Home.php");
        }
        else{
            $fail=true;
        }
    }
  ?>
  
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="login.css">
      <title>Login</title>
  </head>
  <body>
    <div class="form-container">
      <p class="title">Welcome back</p>
      <form class="form" action="login.php" method="post">
        <input type="text" class="input" placeholder="Email / Phone" name="email" required>
        <input type="password" class="input" placeholder="Password" name="password" required>
        <?php
            if($fail==true){
                echo '
                    <div class="fail">
                        Invalid credentials!
                    </div>
                ';
            }
        ?>
        <p class="page-link">
          <span class="page-link-label"><a>Forgot Password?</a></span>
        </p>
        <button class="form-btn" type="submit">Log in</button>
      </form>
      <p class="sign-up-label">
        Don't have an account?<span class="sign-up-link"><a href="./signup.php">Sign up</a></span>
      </p>
      <!-- <div class="buttons-container">
        <div class="apple-login-button">
          <span>Log in with Apple</span>
        </div>
        <div class="google-login-button">
          
          <span>Log in with Google</span>
        </div>
      </div> -->
    </div>
  </body>
  </html>