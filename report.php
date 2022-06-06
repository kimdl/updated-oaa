<?php
    include 'includes/homepageuser.inc.php';
    
    $result = mysqli_query($con,"SELECT * FROM t_user WHERE s_id='".$_SESSION["user"]."'");
    while($row = mysqli_fetch_array($result))
        {
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>URS | Applicant</title>
        <link rel="icon" type="image/png" sizes="32x30" href="./images/urslogo.png">
        <link rel="stylesheet" href="css/astyle.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
    </head>

    <body  style="background-image: linear-gradient(rgba(4,9,20,0.7), rgba(4,9,20,0.7)), url('images/banner.jpeg');">
        <?php include 'includes/usersession.inc.php'; ?>
        <form id="admin" action="admin.php" method="post">
            <div class="container" style="margin-top: 0px;">
                <nav>
                    <a href="#"><img src="images/ourss.png" alt=""></a>
                    <h3 style="color:#45f3ff">Welcome, <?php echo $firstname; ?>!</h3>
                    <div class="nav-links">
                        <ul class="nav nav-tabs">
                            <li class=""><a data-toggle="tab" href="#myapp">My Application Form</a></li>
                            <li><a data-toggle="tab" href="#mystat">My Admission Details</a></li>
                            <li style="float:right;"><a  href="includes/logout.inc.php">LOGOUT</a></li>
                        </ul>
                    </div>
                </nav>

                <div class="tab-content">
                    <div id="myapp" class="tab-pane fade in active">
                        <div class="form" style="background-color: #06304d; padding-top:0px;">
                            <table class="table table-bordered" style="font-family: Verdana">
                        
                                <tr>
                                    <td colspan="4" style="width:4%;"><br>
                                        <center>
                                            <img src="images/urslogo.png" width="10%" style="margin-right:250px"><img src="images/ursgiants.png" width="10%"  style="margin-left:100px"> 
                                                <div class="imageintro" style="margin-top: -90px; font-size:25px;">
                                                        UNIVERSITY OF RIZAL SYSTEM
                                                    </font>
                                                    <br>Province of Rizal <br>
                                                    Website: <a href="www.urs.edu.ph">www.urs.edu.ph</a><br><br>
                                                </div>
                                            
                                        </center>

                                        <center>
                                            <h2>
                                            URS APPLICATION FORM FOR <br> COLLEGE ADMISSION<br> 
                                            </h2>
                                            (02) 8899-67-48
                                            _____ Semester, SY <?php echo $sy ?>
                                            <br><br>
                                        </center>
                                    </td>
                                </tr>       
                        
                                <tr>
                                    <td colspan="4" style="text-align:center">APPLICANT INFORMATION</td>
                                </tr>

                                <tr>
                                    <td  rowspan="2"> 1. NAME OF STUDENT APPLICANT: </td> <br>
                                    <td>
                                        <?php echo 'Last Name: <b>'. $row[3]. '   ' ?></b><br>
                                        <?php echo 'First Name:  <b>'. $row[4]. '   ' ?></b><br>
                                        <?php echo 'Middle Name: <b>'. $row[5]. '   ' ?></b>
                                    
                                        
                                    </td>
                                    <td>
                                        Full Name: <br>
                                        <b><?php echo $row[3]. ',  ' . $row[4].'  '. $row[5] ?></b>
                                    </td>
                                    <td rowspan="3">
                                        <center>
                                            <?php
                                                $picfile_path ='studentpic/';
                                                $result1 = mysqli_query($con,"SELECT * FROM t_userdoc where s_id='".$_SESSION['user']."'");
                                            
                                                while($row1 = mysqli_fetch_array($result1)){                  
                                                $picsrc=$picfile_path.$row1['s_pic'];
                                                    echo "<img src='$picsrc.' class='img-thumbnail' width='180px' style='height:180px;'>";
                                                    echo"<div>";
                                                }
                                        
                                                $resdata = mysqli_query($con,"SELECT * FROM t_user_data WHERE s_id='".$_SESSION['user']."'");                              
                                                while($rowdata = mysqli_fetch_array($resdata)){
                                            ?>
                                        </center>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>Username: </td>
                                    <td colspan="3"><b><?php echo $stname;?></b></td>
                                </tr>
                                
                                <tr>
                                    <td> <font style="font-family: Verdana;">2. GENDER: </font></td>
                                    <td> <b><?php echo $row[6] ?></b></td>
                                    <td><?php echo '3. RELIGION: <b>'.  $row[7] ?></b> </td>
                                </tr>

                                <tr>
                                    <td> <font style="font-family: Verdana;">4. DATE OF BIRTH:  </font> </td>
                                    <td> <b><?php echo $rowdata[2] ?> </b></td>
                                    <td> <font style="font-family: Verdana;">AGE:  </font>
                                        <b><?php echo $row[9] ?> </b>
                                    </td>
                                    <td> <font style="font-family: Verdana;">CIVIL STATUS:  </font>
                                        <b><?php echo $row[10] ?> </b>
                                    </td>
                                </tr>
                                
                                <?php
                                    }
                                ?>
                                                
                                <tr>
                                    <td  colspan="2"><font style="font-family: Verdana;">5. PLACE OF BIRTH: </font>
                                    <td  colspan="2"><b><?php echo $row[11] ?></b></td>
                                </tr>
                                
                                <tr>
                                    <td> <font style="font-family: Verdana;">6. CITIZENSHIP </font>
                                    <td><b><?php echo $row[12] ?></td>
                                    <td><font style="font-family: Verdana;"> SPECIFIC CITIZENSHIP<br>(for dual/foreign): </font>
                                    <td><b><?php echo $row[13] ?></b></td>
                                </tr>


                                <tr>
                                    <td colspan="3" style="text-align:center">7. HIGH SCHOOL <br>
                                        (Where you complete/are completing secondary level education.)
                                    </td>
                                    <td rowspan="9">
                                        <center>
                                        <b>INTERVIEW</b> <br>
                                        </center>
                                        <i style="font-size: 15px;">
                                        Visit the office of <br>
                                        Dean for an Interview. <br>
                                        Do not submit the form 
                                        if not undergone process.</i>
                                        <br><br> <b>College of:</b> <br>
                                        <input type="text" style="text-align: center;padding:5px; width:95%;" value="<?php echo $intcourse ?>" placeholder="No Interview" disabled>    
                                        <b><i>Interview Rating:</i></b>
                                        <center>
                                            <input type="text" style="text-align: center;padding:5px; width:180px;" value="<?php echo $intrating ?>" placeholder="No Interview Rating" disabled>
                                        </center>
                                        <br><br>
                                        <input type="text" style="width:100%; border:none; border-bottom:1px solid #000;" disabled>
                                        <center>
                                        <i>Name of Interviewer <br> Over Signature</i>
                                        </center>
                                    </td>
                                </tr>

                                <tr>
                                    <td> <font style="font-family: Verdana;">HIGH SCHOOL NAME: <br> (do not abbreviate) </font> </td>
                                    <td> <b><?php echo $row[14]  ?></b> </td>
                                    <td>EXPECTED MONTH/YEAR OF COMPLETION: <b><?php echo $row[16]  ?></b> </td>
                                </tr>
                                
                                <tr>
                                    <td> <font style="font-family: Verdana;">HIGH SCHOOL ADDRESS: </font> </td>
                                    <td> <b><?php echo $row[15]  ?></b> </td>
                                    <td> TRACK: <b><?php echo $row[17]?></b> <br> STRAND: <b><?php echo $row[18]?></b></td>
                                </tr>

                                
                                <tr>
                                    <td colspan="3" style="text-align:center">8. URS CAMPUS APPLIED FOR <br>
                                    (Do not include same campus twice. Choose NONE if you do not have other choices of campus and course.)</td>
                                </tr>

                                <tr>
                                    <td>URS CAMPUS</td>
                                    <td>URS CHOICE</td>
                                    <td>INTENDED COURSE</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">1ST CAMPUS CHOICE : <br> <b><?php echo $row[19] ?></b></td>
                                    <td>1ST COURSE CHOICE : 
                                    <td><b> <?php echo $row[21] ?></b> </td>
                                    
                                </tr>
                                <tr>
                                    <td>2ND COURSE CHOICE :</td>
                                    <td> <b><?php echo $row[22] ?></b></td>
                                </tr>

                                <tr>
                                    <td rowspan="2">2ND CAMPUS CHOICE : <br> <b><?php echo $row[20] ?></b></td>
                                    <td>1ST COURSE CHOICE : </td>
                                    <td><b> <?php echo $row[23] ?></b> </td>
                                </tr>
                                <tr>
                                    <td>2ND COURSE CHOICE :</td>
                                    <td> <b><?php echo $row[24] ?></b></td>
                                </tr>

                                <tr>
                                    <td colspan="2">GENERAL AVERAGE: </td>
                                    <td colspan="2"><?php echo $row[25] ?></td>
                                </tr>   
                            
                                <tr>
                                    <td colspan="4" style="text-align:center"> CONTACT DETAILS / FAMILY BACKGROUND</td>
                                </tr>
                                

                                <tr>
                                    <td colspan="2">9. CHILD OF A URS FACULTY OR EMPLOYEE:</td>
                                    <td colspan="2"><?php echo $row[26] ?></td>
                                </tr>  
                            
                                <tr>
                                    <td><font style="font-family: Verdana;">NAME OF PARENT EMPLOYED BY URS: </font></td>
                                    <td><?php echo $row[27] ?></td>
                                    <td><font style="font-family: Verdana;">OFFICIAL DESIGNATION: </font></td>
                                    <td><?php echo $row[29] ?></td>
                                </tr>  
                                
                                <tr>
                                    <td><font style="font-family: Verdana;">COLLEGE/OFFICE WHERE EMPLOYED:</font></td>
                                    <td><?php echo $row[28] ?></td>
                                    <td><font style="font-family: Verdana;">PARENT TELEPHONE NO:</font></td>
                                    <td colspan="3"><?php echo $row[30] ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td><font style="font-family: Verdana;">10. PERMANENT ADDRESS</font></td>

                                    <td colspan="2">
                                        NUMBER: <b><?php echo $row[34] ?></b><br>
                                        STREET: <b><?php echo $row[35] ?></b><br>
                                        SUBDIVISION: <b><?php echo $row[36] ?></b><br>
                                        VILLAGE: <b><?php echo $row[37] ?></b>
                                        BRGY: <b><?php echo $row[38] ?></b><br>
                                        CITY/TOWN: <b><?php echo $row[39] ?></b><br>
                                        PROVINCE: <b><?php echo $row[40] ?></b><br>
                                        POSTAL CODE: <b><?php echo $row[41] ?></b>
                                    </td>
                                    <td>
                                        MOBILE NUMBER: <b><?php echo $row[42] ?></b><br>
                                        EMAIL ADDRESS: <b><?php echo $row[43] ?></b><br>
                                        FACEBOOK ACCOUNT: <b><?php echo $row[44] ?></b><br>
                                    </td>
                                </tr>
                            
                                <tr>
                                    <td><?php echo '11. SELF SUPPORTING: '. $row[31] ?></td>  
                                    <td><?php echo 'NATURE OF WORK: ' .  $row[32] ?></td>
                                    <td colspan="2"><?php echo 'IF OTHERS: ' .  $row[33] ?></td>
                                </tr>


                                <tr>
                                    <td colspan="4" style="text-align:center">12. SOCIO ECONOMIC</td>
                                </tr>

                                <?php
                                    
                                    $parentdata = mysqli_query($con,"SELECT * FROM t_userparentinfo WHERE s_id='".$_SESSION['user']."'");                              
                                    while($rowpdata = mysqli_fetch_array($parentdata)){
                                        
                                ?>

                                <tr>
                                    <td colspan="4">
                                        <table>
                                                <tr style="color:#fff">
                                                        <th></th>
                                                        <th>NAME</th>
                                                        <th>CITIZENSHIP</th>
                                                        <th>MARITAL STATUS</th>
                                                        <th>EDUCATIONAL ATTAINMENT</th>
                                                        <th>PRESENT OCCUPATION</th>
                                                        <th>MONTHLY INCOME</th>
                                                </tr> 
                                            <tbody>
                                                <tr>
                                                    <td><b><?php echo "FATHER"; ?></b></td>
                                                    <td  style="font-size: 15px;"><?php echo $rowpdata[2]. ' ' . $rowpdata[3] . ' ' . $rowpdata[4] ?></td>
                                                    <td><?php echo $rowpdata[5] ?></td>
                                                    <td><?php echo $rowpdata[6] ?></td>
                                                    <td><?php echo $rowpdata[7] ?></td>
                                                    <td><?php echo $rowpdata[8] ?></td>
                                                    <td><?php echo $rowpdata[9] ?></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td><b><?php echo "MOTHER"; ?></b></td>
                                                    <td style="font-size: 15px;"><?php echo $rowpdata[10] . ' ' . $rowpdata[11] . ' ' . $rowpdata[12] ?></td>
                                                    <td><?php echo $rowpdata[13] ?></td>
                                                    <td><?php echo $rowpdata[14] ?></td>
                                                    <td><?php echo $rowpdata[15] ?></td>
                                                    <td><?php echo $rowpdata[16] ?></td>
                                                    <td><?php echo $rowpdata[17] ?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><b><?php echo "LEGAL GUARDIAN"; ?></b></td>
                                                    <td style="font-size: 15px;"><?php echo $rowpdata[18] . ' ' . $rowpdata[19] . ' ' . $rowpdata[20] ?></td>
                                                    <td><?php echo $rowpdata[21] ?></td>
                                                    <td><?php echo $rowpdata[22] ?></td>
                                                    <td><?php echo $rowpdata[23] ?></td>
                                                    <td><?php echo $rowpdata[24] ?></td>
                                                    <td><?php echo $rowpdata[25] ?></td>
                                                </tr>
                                        
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                <?php } ?>

                                <tr>
                                    <td colspan="3"><br> THIS IS TO CERTIFY THAT ALL INFORMATION GIVEN ABOVE IS TRUE AND CORRECT.</font></td>
                                    
                                    <td>
                                        <center>
                                            <?php            
                                                $picfile_path1 ='studentproof/';
                                                $result2 = mysqli_query($con,"SELECT * FROM t_userdoc where s_id='".$_SESSION['user']."'");
                                                while($row2 = mysqli_fetch_array($result2))
                                            {                  
                                                $picsrc1=$picfile_path1.$row2['s_sigpic'];
                                                echo "<img src='$picsrc1.' class='img-thumbnail' width='180px' style='height:80px;'>";
                                                echo"<div>";
                                            }    
                                            ?>
                                        </center>
                                    </td>
                                </tr>
                                
                                <tr>   
                                    <td colspan="3">Effective Date Nov. 15,2018 </td>
                                    <td>
                                        <center>
                                            <font style="font-family: Verdana;">
                                                Signature
                                            </font>
                                        </center> 
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <?php } ?>
                    </div>
                
                    <div id="mystat" class="tab-pane fade">
                        <div  class="campus" style="padding-top:0px; padding:15px;border-radius:3px; background-color:#fff; opacity: .85;">
                            <h1> Applicant Status: <?php echo $stval ?></h1>
                            <h4 style="color: #000;"> Applicant Interview College: </h4>
                            <input type="text" style="width: auto; border:none; text-align:center;"  placeholder="No Interview Yet" disabled>  
                            <h4 style="color: #000;"> Applicant Interview Rating: </h4>
                            <input type="text" style="width: auto; border:none; text-align:center;" placeholder="No Rating Yet" disabled>  
                            <div class="row" style="height:250px; opacity:1;">
                                <div class="campus-col">
                                    <a href="admsnreport.php">
                                        <img src="images/print.png" alt="">
                                        <div class="layer">
                                            <h3>PRINT APPLICATION</h3>
                                        </div>
                                    </a>
                                </div>
                                <div class="campus-col">
                                    <a href="editform.php">
                                        <img src="images/edit.png" alt="">
                                        <div class="layer">
                                            <h3>EDIT APPLICATION</h3>
                                        </div>
                                    </a>
                                </div>
                                <div class="campus-col">
                                    <a href="schedulecard.php">
                                        <img src="images/view.png" alt="">
                                        <div class="layer">
                                            <h3>VIEW SCHEDULE CARD</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
