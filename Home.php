<?php
    include "./dbconnectivity.php";
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: login.php");
    }
    // $image=$_SESSION['Data']['image'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['FName'],     $_SESSION['LName'];?></title>
</head>
<body>
    <img src='$image' alt="">
    <p>

        Welcome
        <?php
        echo $_SESSION['FName'];
        echo $_SESSION['LName'];
        // echo $_SESSION['image'];
        
        ?>
    </p>
    
</body>
</html>