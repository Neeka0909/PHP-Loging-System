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

    <!-- Form Validation -->
    <script>
        function pwdcheck(){
            let x = document.getElementById("upwd").value;
            let y = document.getElementById("repwd").value;
            if (x !== y) {
                document.getElementById("msg").innerHTML = "Password dosent match";
                document.getElementById("btn-signup").disabled = true;
                return false;
            }else {
                document.getElementById("msg").innerHTML = "";
                document.getElementById("btn-signup").disabled = false;
            }
        }
        setInterval(pwdcheck,1000);
    </script>
</head>
<body>

    <div class="pos container">
        <!-- Loging Form -->
        <form role="form" action="inc/signup.inc.php" method="POST">
            <div class="forminside">
                <h2>Sign Up </h2>
                <div class="box"> 
                    <label for="emqail">Email </label>
                    <input type="text" id="email" placeholder="Enter Your Username/Email" name="email"  autofocus required>
                </div>
                <div class="box"> 
                    <label for="fname">First Name </label>
                    <input type="text" id="fname" placeholder="Enter Your First Name" name="fname"  autofocus required>
                </div>
                <div class="box"> 
                    <label for="lname">Last Name </label>
                    <input type="text" id="lname" placeholder="Enter Your Last Name" name="lname"  autofocus required>
                </div>
                <div class="box">
                    <label for="upwd">Password </label>
                    <input class="pwd" type="password" id="upwd" placeholder="Enter your Password here" name="upwd"  autofocus required>
                </div>
                <div class="box">
                    <label for="repwd">ReEnter Password </label>
                    <input class="pwd" type="password" id="repwd" placeholder="ReEnter your Password here" name="repwd"  autofocus required>
                </div>
                <p class="red" id="msg"></p>
                <?php 
                if (isset($_SESSION['invalid_signup'])) {
                    echo '<p class="red"> Invalid Signup try. Please try again later.</p>';
                }elseif (isset($_SESSION['invalid_email']) {
                    echo '<p class="red"> Invalid Email.</p>';
                }elseif (isset($_SESSION['usertaken']) {
                    echo '<p class="red"> User Alredy Registered. Please <a href="index.html">Login</p></a>';
                }elseif (isset($_SESSION['error']) {
                    echo '<p class="red">Signup Error. Please try again later.</p>';
                }
                ?>
                <div>
                    <button id="btn-signup" class="btn_login" type="submit" value="submit" name="submit">Sign Up</button>
                </div>
                <p>Alredy have an <a href="index.html">Account ?</a></p>

            </div>
        </form>
    </div>
</body>
</html>