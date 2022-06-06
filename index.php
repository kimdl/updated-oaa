<?php 
include 'header.php';
require 'includes/dbh.inc.php';
$q2=mysqli_query($conn,"SELECT sched_id, syStart, syEnd FROM t_defaultschlyr WHERE id = '1' ");
$n2=  mysqli_fetch_assoc($q2);
$syId= $n2['sched_id'];
$syS= $n2['syStart'];
$syE= $n2['syEnd'];



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
        <div class="text-box">
            <h4 style="font-weight:300;">Online Admission For</h4>
            <h1>University of Rizal System</h1>
            <i class="fa fa-university"></i>
             Binangonan Campus <br>
             <h3><i>“Nurturing tomorrow’s noblest.”</i></h3>
            <p>
                An organized academic entity composed of separate but interrelated units coordinates and integrates <br> 
                system-wide functions and activities.  It has the prime mandate of providing instruction, research, extension and production to the public.
            </p>
            <a href="about.php" class="hero-btn">Know More... </a>
        </div>
    </section>


<!------Course------------>

    <section class="course">
        <h1>Programs We Offer</h1>
        <p>This includes Business Administration Related and I.T. Related Courses. <br>
            For Undergraduate and Graduate Studies         
        </p>
    
        <div class="row">
            <div class="course-col">

                <h3>College of Business</h3>
                <br> 
                This have Business Administration & Related Courses which are: 
                <p>
                BS in Accountancy <br>
                BS in Business Administration <br>
                BS in Office Administration
                </p>               
            </div>
            <div class="course-col">
                <h3>College of Computer Studies</h3>
                <br> 
                The CSS department is where IT-Related studies are, this includes:
                
                <p><br>
                    BS in Information System <br>
                    BS in Information Technology
                </p>
            </div>
            <div class="course-col">
                <h3>Graduate School</h3>
                <br>
                Graduate Studies
                <p>Doctor in Business Administration <br>
                    Master in Business Administration <br>
                    Master in Management
                </p>
            </div>
        </div>
    </section>
<!------Announcements------------>
    <section class="cta" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(images/ursbstud.jpeg);">
        
    <h2 style="color: #fff;">SCHOOL YEAR: <?php echo $syS ." - " .$syE;?></h2>
    <h1 style="margin-bottom:0px; font-size:60px;">COLLEGE ADMISSION SCHEDULE</h1>
        <div class="testimonials" style="padding-top:20px;">
            <table class="campus" style="color: #fff; padding-top:0px;">
                <tr>
                    <td colspan="4" style=" text-align: center;"><h1 style="margin-bottom:10px;background-color:#f33446;">Registration/Online Filling For Application</h1></td>
                </tr>
                
                <?php
                    $rs1 = mysqli_query($conn,"SELECT * FROM t_filling WHERE sched_id='$syId'");
                    while($ar = mysqli_fetch_array($rs1))
                    {
                        
                        if ($ar[1] != "") {
                            $q3=mysqli_query($conn,"SELECT sched_id, fillingStart, fillingEnd FROM t_filling WHERE sched_id='$syId' ");
                            $n3=  mysqli_fetch_assoc($q3);
                            $adId= $n3['sched_id'];
                            $adS= $n3['fillingStart'];
                            $adE= $n3['fillingEnd'];
                            
                            $adStart = strtotime($adS);
                            $adEnd = strtotime($adE);

                            if ($adS == "") {
                                echo "
                                <tr>
                                <td colspan='4'><h2>No Date Set Yet</h2></td>
                                </tr>";
                            }else{
                                echo "<tr>
                                <td><h2> FROM:</h2></td>
                                <td>
                                    <h2>". date('F jS Y', $adStart) ."</h2>
                                </td>
                                <td><h2> TO: </h2></td>
                                <td>
                                    <h2>". date('F jS Y', $adEnd) ."</h2>
                                </td>
                                </tr>";
                            }
                        }
                        else{
                            echo
                            " <tr>
                            <td colspan='4'><h2>No Date Set Yet</h2></td>
                            </tr>";
                        }
                    } 
                ?>

                <tr>
                    <td colspan="4" style=" text-align: center;"><h1 style="margin-bottom:10px;background-color:#f33446;"> PASSING REQUIREMENTS </h1></td>
                </tr>

                <tr>
                    <td><h2> DAY NUMBER : </h2></td>
                    <td colspan="2"><h2>DATE: </h2></td>
                    <td><h2>APPLICANTS PER DAY :</h2></td>
                </tr>
                
                <?php
                    $rs3 = mysqli_query($conn,"SELECT * FROM t_reqpassing WHERE sched_id='$syId'");
                    while($arr = mysqli_fetch_array($rs3))
                    {
                        $dayDate = strtotime($arr[3]);
                    echo "
                    <tr>
                        
                        <td>". $arr[2] ."</td>
                        <td colspan='2'>". date('F jS Y', $dayDate)."</td>
                        <td>". $arr[4] ."</td>
                        
                    </tr>";} 
                ?>
            </table>
            <table class="campus" style="color: #fff; padding-top:0px;">
                <tr>
                    <td colspan='4' style=" text-align: center;"><h1 style="background-color:#f33446;margin-bottom:10px;">ENTRANCE EXAM DATES: </h1></td>
                </tr>
                <tr>
                    <th><h2>CAMPUS</h2></th>
                    <th><h2>DAY NUMBER</h2></th>
                    <th><h2>DATE</h2></th>
                </tr>
                <?php

                    $rs3 = mysqli_query($conn,"SELECT * FROM t_ursatday WHERE sched_id='$syId'");
                    while($arr = mysqli_fetch_array($rs3))
                    {
                        $dayDateURSAT = strtotime($arr[5]);
                        
                ?>
                <tr>
                    <td><?php echo $arr[3]?></td>
                    <td><?php echo $arr[4]?></td>
                    <td><?php echo date('F jS Y', $dayDateURSAT);?></td>
                </tr>
                
                <?php } ?>
            </table>
            <table class="campus" style="color: #fff; padding-top:0px;">
                <tr>
                    <td colspan='5' style=" text-align: center;"><h1 style="background-color:#f33446;margin-bottom:10px;">ENTRANCE EXAM SCHEDULE: </h1></td>
                </tr>
                <tr>
                    <th><h2>DAY NUMBER</h2></th>
                    <th><h2>COURSE</h2></th>
                    <th><h2>ROOM NO.</h2></th>
                    <th><h2>ROOM NAME</h2></th>
                    <th><h2>TIME</h2></th>
                </tr>
                    <?php
                    $rs4 = mysqli_query($conn,"SELECT * FROM t_ursatroom WHERE sched_id='$syId'");
                    while($ar = mysqli_fetch_array($rs4))
                    {
                    ?>
                <tr>                    
                    <td><?php echo $ar[2]?></td>
                    <td><?php echo $ar[3]?></td>
                    <td><?php echo $ar[4]?></td>
                    <td><?php echo $ar[5]?></td>
                    <td><?php echo $ar[6]?></td>
                </tr>
                <?php  }  ?>

                <?php
                    $rs1 = mysqli_query($conn,"SELECT * FROM t_exam_result WHERE sched_id='$syId'");
                    while($ar = mysqli_fetch_array($rs1))
                    {
                        if ($ar[1] != "") {

                            $q1 = mysqli_query($conn,"SELECT e_result FROM t_exam_result WHERE sched_id='$syId'");
                            $n1 = mysqli_fetch_assoc($q1);
                            $rez = $n1['e_result'];

                            $resultdate = strtotime($rez);

                            if ($rez == "") {
                                echo "
                                <tr>
                                    <td colspan='3' style='text-align: center;'><h1 style='margin-bottom:10px;background-color:#f33446;'> ISSUANCE OF RESULT: </h1></td>
                                    <td colspan='2'>No Date Set Yet</td>
                                    
                                </tr>";
                            }else{
                                echo "<tr>
                                <td colspan='3' style='text-align: center;'><h1 style='margin-bottom:10px;background-color:#f33446;'> ISSUANCE OF RESULT: </h1></td>
                                <td colspan='2'><h1 style='margin-bottom:10px;background-color:#f33446;'>" . date('F jS Y', $resultdate) ."</h1></td>
                                </tr>";
                            }
                        }
                        else{
                            echo
                            "<tr>
                            <td colspan='3' style='text-align: center;'><h1 style='margin-bottom:10px;background-color:#f33446;'> ISSUANCE OF RESULT: </h1></td>
                            <td colspan='2'><h1 style='margin-bottom:10px;background-color:#f33446;'>No Date Set Yet </h1></td>
                            </tr>";
                        }
                    } 
                ?>
                </table>
            <br>
        <a href='listofpassers.php' class='hero-btn'>SEE RESULT</a>";
    
        </div>
    </section>
<!------Campus------------>
    <section class="campus">
        <h1>Other URS Campus</h1>
        <p>The University of Rizal System is a system of colleges located in the Rizal province, Philippines. <br> 
        It operates multiple campuses, with the main campus being in Tanay, Rizal.</p>

        <div class="row">
            <div class="campus-col">
                <img src="images/ursmd.png" alt="">
                <div class="layer">
                    <h3>MORONG</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="images/urstanay.png" alt="">
                <div class="layer">
                    <h3>TANAY</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="images/ursantipsd.png" alt="">
                <div class="layer">
                    <h3>ANTIPOLO</h3>
                </div>
            </div>
        </div>
    </section>

<!------facilities------------>
    <section class="facilities">
        <h1>Our Facilities</h1>
        <p>To better facilitate the learning process, 
        URSB maintains a conducive learning environment by providing 
        educational facilities.
        </p>

        <div class="row">
            <div class="facilities-col">
                <img src="images/ulibrary.png" alt="">
                <h3>URSB Library</h3>
                <p> The library is where students search for further information about research that are done in URS Binangonan. 
                To keep pace with the fast-evolving technology, URSB also strive to update its instructional equipment in all academic classrooms. </p>
            </div>
            <div class="facilities-col">
                <img src="images/avr.png" alt="">
                <h3>Audio Visual Room</h3>
                <p>The avr is where the students of all classes experience learning in an effective way. 
                It can also be used in orientations or programs that needs full attention of the students. </p>
            </div>
            <div class="facilities-col">
                <img src="images/comlab.png" alt="">
                <h3>Computer Laboratories</h3>
                <p>The computer lab serves as the center for teaching programming to whole classes especially in CSS department.
                Classroom proffesors also use the lab with their classes for research, or for creating technology-based projects like photoshop, blender, and etc.
                </p>
            </div>
        </div>
    </section>

<!------cta------------>
    <section class="cta" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(images/ursbstud.jpeg);">
        <h1>Register Now for ADMISSION <br>
        In URS Binangonan.</h1>
        <a href="signup.php"class="hero-btn">REGISTER</a>
        
    </section>

<!------footer------------>
<?php
include 'footer.php'
?>