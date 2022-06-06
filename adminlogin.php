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

<!------admin login------------>
<!------login------------>
<h1 style="margin-left:25%;font-size:85px; color:#fff;width:53%;">EMPLOYEE LOGIN</h1>

        <div class="login-box" style="margin-top:75px;">
        
            <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] ==  "empty") {
                        echo"<h3 style='color: red; background-color: #fff;'>Fill in All Fields</h3>";
                    }
                    else if ($_GET["error"] ==  "invalidlogin") {
                        echo"<h3 style='color: red; background-color: #fff;'>Incorrect Login.</h3>";
                    }
                }
            ?>
            <br>
            <form action="includes/adminlogin.inc.php" method="post">
                <input type="hidden" id="txtid"  name="txtid" >
                <div class="textbox">
                <i class="fa fa-user"></i>
                <input type="text"  id="a_id" name="a_id" placeholder="Username">
                </div>

                <div class="textbox">
                    <i class="fa fa-lock"></i>
                    <input type="password" id="a_ps" name="a_ps" placeholder="Password" style="width:70%;">
                    <a href="#" style="color:#fff" id="icon-clickk">
                    <i style="float:right;cursor:pointer;" class="fa fa-eye-slash" id="iconn"></i>
                </div>

                <a href="index.php" class="hero-btn">Cancel</a>
                <input type="submit" id="a_sub" name="a_sub" value="Log in" class="hero-btn">
            </form>
        </div>
   
    </section>


<!------footer------------>
    <script src="script.js"></script>
</body>
</html>