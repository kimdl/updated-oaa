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
            <h1>About Us</h1>
            <p style="color:#fff;">"Education is the passport to the future, for tomorrow belongs to those who prepare for it today."<br> 
                <i>- Malcom X</i>
            </p>
        
    </section>

<!------about us content------------>
    <section class="about-us">
        <div class="row">
            <div class="about-col">
                <h1>URS Binangonan</h1>
                <p>
                URS Binangonan campus started out as an extension campus of Rizal State College (RSC). 
                The building where it is now situated was initially constructed to house the Vicente Madrigal 
                National High School and was inaugurated on August 26, 1998. 
                
                But through the efforts of Dr. Heracleo Lagrada, president of RSC, and with the aid of Dr. Edith Doblada, 
                DECS Superintendent, RSC requested the Hon. Cong. Gilberto M. Duavit and Hon. Gov. Casimiro Ynares Jr. 
                to allow RSC to occupy the newly constructed building.
                </p>
                <p>
                The first floor of the building was then occupied by the Rizal Science High School while the 
                second and third floor housed the RSC Binangonan Campus. Under the supervision of the College Director,
                 Dr Reenecilla Paz De leon, and Deputy Director Mr. Norven Doblada, RSC Binangonan Campus maintained 
                 three institutes: The Institute of Cooperative, Economics, and Management (ICEM), 
                 Institute of Fisheries and Sciences (IFAS) and the Graduate School. The campus initially catered to 1,116 students and 38 faculty members and started the operation on June 04, 1998.
                </p>
                <a href="adminlogin.php"  class="hero-btn red-btn"> LOG IN AS ADMIN</a>
            </div>
            <div class="about-col">
                <video src="images/ursbvid.mp4"  type="mp4/video" autoplay controls loop>
                    
                </video>
            </div>
        </div>
    </section>

<!------facilities------------>
    <section class="facilities">
        <h1>More Information</h1>
        <div class="row">
            <div class="facilities-col">
                <img src="images/urshymn.png" alt="">
                <h3>University Hymn</h3>
                <p> An alma mater hymn is not just any ordinary “song”,
                    it is the official “anthem” of an educational institution.
                    It is therefore important for a school to have an alma mater hymn,
                    it gives a sense of belonging, comradeship, pride and loyalty to the school.<br>
                    It identifies the school and its students.
                </p>
            </div>
            <div class="facilities-col">
                <img src="images/ursgiants.png" alt="">
                <h3 style="text-align:center;">URS BRANDING SYMBOL</h3>
                
            </div>
            <div class="facilities-col">
                <img src="images/ursorgstruc.png" alt="">
                <h3>Organizational Stuctures</h3>
                <p>
                Structure will give employees more clarity,
                 help manage expectations, enable better decision-making and provide consistency. 
                 Organizational charts also assign responsibility, 
                 organize workflow and make sure important tasks are completed on time.
                </p>
            </div>
        </div>
    </section>


<!------Course------------>

    <section class="course">
        <h1>Core Values</h1>
        <p>
            <b>
              R</b>esponsiveness, 
            <b>
              I</b>ntegrity, 
            <b>
              S</b>ervice, 
            <b>
              E</b>xcellence, & 
            <b>
              S</b>ocial Responsibility.
        </p>
    
        <div class="row">
            <div class="course-col">

                <h3>URS MISSION</h3>
                <p>
                The University of Rizal System is committed to nurture and produce upright and 
                competent graduates and empowered community through relevant and sustainable higher 
                professional and technical instruction, research, extension and production services.

                </p>               
            </div>
            <div class="course-col">
                <h3>URS VISION</h3>
                <p>                
                    The leading University in human resource development, knowledge and technology 
                    generation and environmental stewardship.
                </p>
            </div>
            <div class="course-col">
                <h3>QUALITY POLICY</h3>
                <p>
                    The University of Rizal System commits to deliver excellent products and services to
                    ensure total stakeholders' satisfaction in instruction, research, extension,  
                    production and dynamic administrative support and to continuously improve its 
                    Quality Management System processses to satisfy all applicable requirements. 
                </p>
            </div>
        </div>
    </section>





<!------footer------------>
<?php
include 'footer.php'
?>