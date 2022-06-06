<?php 

include 'header.php';
$con=mysqli_connect("localhost","root","","oas");

if(!isset($con)){
    die("Database Not Found");
}

if(isset($_REQUEST["u_sub"])){

    $idd = $_POST['u_id'];
    $pwd = $_POST['u_ps'];

    $q=mysqli_query($con,"SELECT s_id FROM t_user_data WHERE s_name='".$idd."'");
    $n=  mysqli_fetch_assoc($q);
    $id= $n['s_id'];

    if($idd !='' && $pwd !=''){
        
        $query=mysqli_query($con ,"SELECT * from t_user_data where s_id='".$id."'  AND s_pwd='".$pwd."'");
        $res=mysqli_fetch_row($query);

        $query1=mysqli_query($con ,"SELECT * from t_user where s_id='".$id."'");
        $res1=mysqli_fetch_row($query1);


        if($res){
            $_SESSION['user']= $id;
            header('location: admsnform.php');

            if($res && $res1){
                $_SESSION['user']= $id;
                header('location: homepageuser.php');
            }
        }
        else {
        header('location: login.php?error=wronglogin');
        }

    }
    else{
        header('location: login.php?error=emptyinput');
        exit();
    }
}

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

<!------login------------>
        <h1 style="margin-left:40%;font-size:85px; color:#fff; border-bottom:5px solid #f33446;width:270px;"> LOGIN</h1>

        <div class="login-box" style="margin-top:75px;">
            <form action="login.php" method="post">
                
                <br>
                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] ==  "emptyinput") {
                            echo"<h3 style='color: red; background-color: #fff;'>Fill in All Fields</h3>";
                        }
                        else if ($_GET["error"] ==  "wronglogin") {
                            echo"<h3 style='color: red; background-color: #fff;'>Incorrect Login.</h3>";
                        }
                    }
                ?>
                <div class="textbox">
                <i class="fa fa-user"></i>
                <input type="text" id="u_id" name="u_id" placeholder="Username">
                </div>

                <div class="textbox">
                    <i class="fa fa-lock"></i>
                    <input type="password" id="u_ps" name="u_ps" placeholder="Password" style="width:70%;">
                    <a href="#" style="color:#fff" id="icon-click">
                    <i style="float:right;cursor:pointer;" class="fa fa-eye-slash" id="icon"></i>
                </div>
    
                <a href="signup.php" class="hero-btn">Sign up</a>
                <input type="submit" class="hero-btn" name="u_sub" value="Log in">
                <a href="adminlogin.php" class="hero-btn" style="width:180px; text-align:center"> Log in for URS employees</a>
            </form>

        </div>
   
    </section>


<!------footer------------>
<script src="js/script.js"></script>
</body>

</html>