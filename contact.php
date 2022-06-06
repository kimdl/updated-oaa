<?php 
    include 'header.php';
?>
<body>
    <section class="sub-header" style=" background-image: linear-gradient(rgba(4,9,30,0.7), rgba(4,9,30,0.7)),url(images/facultymembers.jpg);">
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
        <h1>Contact Us</h1>
    </section>

<!------contact us------------>
    <section class="location">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3863.0271801059894!2d121.18538161415096!3d14.48312878382915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c150025ab495%3A0xe591418d5ad5374f!2sUniversity%20of%20Rizal%20System%2C%20Binangonan%20Campus%20(URSB)!5e0!3m2!1sen!2sph!4v1618249241312!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </section>
    <section class="contact-us">
        <div class="row">
            <div class="contact-col">
                <div>
                    <i class="fa fa-home"></i>
                    <span>
                        <h5>Manila E Rd, Binangonan Rizal</h5>
                        <p>1940 Rizal, Philippines</p>
                    </span>
                </div>
                <div>
                    <i class="fa fa-phone"></i>
                    <span>
                        <h5>(02) 8652 1018</h5>
                        <p>Monday to Friday, 6:00 AM to 5:30 PM</p>
                    </span>
                </div>
                <div>
                    <i class="fa fa-envelope-o"></i>
                    <span>
                        <h5>studentadmission.binangonan@urs.edu.ph</h5>
                        <p>Email us your query.</p>
                    </span>
                </div>
            </div>
            <div class="contact-col">
                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] ==  "none") {
                            echo"<script>alert('Message Sent')</script>";
                        }
                        else if ($_GET["error"] ==  "wrong") {
                            echo"<script>alert('Something went wrong.')</script>";
                        }
                    }
                ?><br>
                <form action="includes/form-handler.php" method="POST">
                    <input type="text" name="name" placeholder="Enter Your Name" required>
                    <input type="email"name="email"  placeholder="Enter Email Address" required>
                    <input type="text"name="subject"  placeholder="Enter your Subject" required>
                    <textarea name=""name="message"  id="" rows="5" required placeholder="Enter Message"></textarea>
                    <button type="submit" class="hero-btn red-btn">Send Message</button>
                </form>
            </div>
        </div>
    </section>
<?php
    include 'footer.php';
?>