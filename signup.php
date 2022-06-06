<?php 
include 'header.php';
?>
<body>
    <section class="header"  style="background-image: linear-gradient(rgba(4,9,30,0.7), rgba(4,9,30,0.7)), url('images/banner.jpeg');">
        <nav>
            <a href="index.php"><img src="images/ourss.png" alt=""></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="admission.php">ADMISSION</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                    <li><a href="login.php">LOG IN</a></li>
                    <li><a href="signup.php">SIGN UP</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>        

<!------signup------------>

        <h1 style="margin-left:10%;font-size:85px; color:#fff; border-bottom:5px solid #f33446;width:400px;"> REGISTER</h1>
        <div class="login-box"style="margin-left:15%;margin-top:40px;">
            <form action="includes/signup.inc.php" method="post">
                <input type="hidden" id="stid" name="stid" value="">
                <?php

                    if (isset($_GET["error"])) {

                        if ($_GET["error"] ==  "emptyinput") {
                            echo"<h3 style='color: red; background-color: #fff;'>Fill in All Fields</h3>";
                        }
                        else if ($_GET["error"] ==  "invaliduid") {
                            echo"<h3 style='color: red; background-color: #fff;'>Choose a proper username.</h3>";
                        }
                        else if ($_GET["error"] ==  "invalidemail") {
                            echo"<h3 style='color: red; background-color: #fff;'>Choose a proper email.</h3>";
                        }
                        else if ($_GET["error"] ==  "passwordsdontmatch") {
                            echo"<h3 style='color: red; background-color: #fff;'>Passwords doesn't match</h3>";
                        }
                        else if ($_GET["error"] ==  "stmtfailed") {
                            echo"<h3 style='color: red; background-color: #fff;'>Somethin went wrong.</h3>";
                        }
                        else if ($_GET["error"] ==  "usernametaken") {
                            echo"<h3 style='color: red; background-color: #fff;'>Username already taken.</h3>";
                        }
                        else if ($_GET["error"] ==  "none") {
                            echo"<h3 style='color: green; background-color: #fff;'>You have signed up.</h3>";
                        }
                    }
                ?>
                <div class="textbox">
                    <i class="fa fa-user"></i>
                    <input type="text" id="username" name="username" placeholder="Username" >
                </div>
                <div class="textbox">
                    <i class="fa fa-calendar"></i>
                    <input type="date" id="in_dob" name="in_dob" placeholder="Date Of Birth">
                </div>
                <div class="textbox">
                    <i class="fa fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="Email Address">
                </div>
                <div class="textbox">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="pwd" id="pwd" placeholder="Password" style="width:70%;">
                    <a href="#" style="color:#fff" id="icon-clickp">
                    <i style="float:right;cursor:pointer;" class="fa fa-eye-slash" id="iconp"></i>
                </div>
                <div class="textbox">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="pwdRepeat" id="pwdRepeat" placeholder="Repeat Password" style="width:70%;">
                    <a href="#" style="color:#fff" id="icon-clickrp">
                    <i style="float:right;cursor:pointer;" class="fa fa-eye-slash" id="iconrp"></i>
                </div>
                <div class="textbox">
                    <img src="captcha.php" style="height: 1.8em;" /><br>
                    <i class="fa fa-recycle"></i>
                    <input type="number" id='captcha' size="10" name='captcha' placeholder="Enter Captcha">
                </div>

                <a href="index.php" class="hero-btn">Cancel </a>
                <input type="submit" id="in_sub" name="in_sub" value="Sign up" class="hero-btn" >
            </form>
        </div>
    </section>


<!------footer------------>
    <script src="script.js"></script>
</body>
</html>