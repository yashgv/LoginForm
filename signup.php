<?php
    $err=false;
    $cred = false;
    $Success=false;
    $reg=false;
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        include "./dbconnectivity.php";
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $gender= $_POST['gender'];
        $age = $_POST['age'];
        $image = $_POST['profile'];
        $sql="SELECT * FROM signup where Email='$email' ";
        $result= mysqli_query($connect,$sql);
        $count = mysqli_num_rows($result);
        if($count>=1){
            $reg=true; 
        }
        if($pass == $cpass && $reg==false){
            $sql = "INSERT INTO signup VALUES('$fname','$lname','$phone','$email','$pass','$gender',$age,'$image')";
            $result= mysqli_query($connect,$sql);
            if(!$result){
                $err=true;
            }else{
                $Success=true;
            }
        }
        else{
            $cred=true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="formWrapper">
        <?php
        if($Success==true){
            echo '
            <div class="success">
                Successfully Registered!
            </div> ';
        }
        if($reg==true){
            echo '
            <div class="registered">
                Already Registered!
            </div> ';
        }
        ?>    
        <h2>Sign Up</h2> 
        <div class="mainWrapper">
            <form class="SignUpForm" action="./signup.php" method="post">
                <div class="profile">
                    <div id="Pimage">
                        <img id="srcImg" alt="">
                        <input id="ImgInput" type="file" accept="image/*" name="profile" onchange="loadFile(event)">
                        <p>Add Profile Image</p>
                    </div>
                </div>
                <div class="input-container">
                    <label>
                        First Name
                    </label>
                    <input placeholder="First Name" type="text" name="fname" required>
                </div>
                <div class="input-container">
                    <label>
                        Last Name
                    </label>
                    <input placeholder="Last Name" type="text" name="lname">
                </div>
                <div class="input-container">
                    <label>
                        Phone Number
                    </label>
                    <input placeholder="Phone Number" type="text" name="phone" maxlength="10" required>
                </div>
                <div class="input-container">
                    <label>
                        Email
                    </label>
                    <input placeholder="Email" type="email" name="email" required>
                </div>
                <div class="input-container">
                    <label>
                        Password
                    </label>
                    <input placeholder="Password" type="password" name="pass" required>
                </div>
                <div class="input-container">
                    <label> 
                        Confirm Password
                    </label>
                    <input placeholder="Confirm Password" type="password" name="cpass" required>
                </div>
                <div class="input-container">
                    <label>
                        Gender
                    </label>
                    <select name="gender">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Other</option>
                    </select>
                </div>
                <div class="input-container">
                    <label>
                        Age
                    </label>
                    <input name="age" type="number" min="10">
                </div>
                <div class="input-container"> 
                    <p> Already have an account? <a href="./login.php">Login</a></p>
                    <button type="submit">Sign Up</button>
                    <?php
                        if($cred==true){
                            echo '
                                <p class="alert">Please fill in correct credentials!</p>
                            ';
                        }
                    ?>
                </div>
            </form>
        </div>
    </div>

    <script>
        var loadFile = function(event) {
            var image = document.getElementById('srcImg');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

</body>
</html>