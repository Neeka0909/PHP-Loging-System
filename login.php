<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Css style file -->
    <link rel="stylesheet" href="src/main.css">

    <title>Pure PHP Loging System</title>

  

</head>
<body>

    <div class="container">
        <!-- Loging Form -->
        <form action="inc/login.inc.php" method="POST" name="login">
            <div class="forminside">
                <h2>Member Login </h2>
                <div class="box "> 
                    <label for="uname">Email </label>
                    <input type="text" id="uname" placeholder="Enter Your Username/Email" name="username"  autofocus required>
                </div>
                <div class="box ">
                    <label for="upwd">Password </label>
                    <input class="pwd" type="password" id="upwd" placeholder="Enter your Password here" name="upwd"  autofocus required>
                </div>
                <?php 
                    if (isset($_SESSION['Uname_incorrect'])) {
                       echo '<p class = "red">Enterd Username was incorrect</p>';
                    }elseif (isset($_SESSION['pwd_incorrect'])) {
                        echo '<p class = "red">Enterd password was incorrect</p>';
                    }
                ?>
                
                <div>
                    <button class="btn_login shadow-drop-2-center" type="submit" value="submit" name="submit">Login</button>
                </div>
                <a href="">Forget Password</a>
                <p>Create an <a href="signup.php">Account ?</a></p>

            </div>
        </form>
    </div>
</body>
</html>