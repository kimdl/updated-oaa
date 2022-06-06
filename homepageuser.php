<?php
    include 'includes/homepageuser.inc.php';
    include 'includes/usersession.inc.php';
    
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>URS | Applicant</title>
        <link rel="icon" type="image/png" sizes="32x30" href="./images/urslogo.png">
        <link rel="stylesheet" href="css/astyle.css">
        <link rel="stylesheet" href="css/style.css">
        <link type="text/css" rel="stylesheet" href="css/settings.css"></link>
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- for toggle menu -->
        <script>
            function menuToggle(){
                const toggleMenu = document.querySelector('.menu');
                const overlay = document.querySelector('.overlay');

                toggleMenu.classList.toggle('active')
                overlay.classList.toggle('active')
            }
        </script>

        <!-- for changing the password -->
        <script>
            function validatePassword() {
            var currentPassword,newPassword,confirmPassword,output = true;

            currentPassword = document.frmChange.currentPassword;
            newPassword = document.frmChange.newPassword;
            confirmPassword = document.frmChange.confirmPassword;

            if(!currentPassword.value) {
                currentPassword.focus();
                document.getElementById("currentPassword").innerHTML = "*Required";
                output = false;
            }
            else if(!newPassword.value) {
                newPassword.focus();
                document.getElementById("newPassword").innerHTML = "*Required";
                output = false;
            }
            else if(!confirmPassword.value) {
                confirmPassword.focus();
                document.getElementById("confirmPassword").innerHTML = "*Required";
                output = false;
            }
            if(newPassword.value != confirmPassword.value) {
                newPassword.value="";
                confirmPassword.value="";
                newPassword.focus();
                document.getElementById("confirmPassword").innerHTML = "*Passwords doesn't match";
                output = false;
            } 	
            return output;
            }
        </script>

        <style>
            .table{
                color: #fff;
            }
            .close {
                position: absolute;
                right: 5px;
                top: 0;
                color: #000;
                font-size: 35px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: red;
                cursor: pointer;
            }

        </style>
    </head>
    <body  style="background-image: linear-gradient(rgba(4,9,20,0.7), rgba(4,9,20,0.7)), url('images/banner.jpeg');">
        
        <form action="homepageuser.php" method="post">
            <div class="form" style="background: none;">
                <nav>
                
                    <div class="overlay"></div>
                    <a href="#"><img src="images/ourss.png" alt=""></a>
                    <h3 style="color:#45f3ff">Welcome, <?php echo $firstname; ?>!</h3>

                    <div class="action">
                        <div class="profile" onclick="menuToggle();">
                            
                            <?php
                                $picfile_path ='studentpic/';
                                $result1 = mysqli_query($con,"SELECT * FROM t_userdoc where s_id='".$_SESSION['user']."'");
                            
                                while($row1 = mysqli_fetch_array($result1)){                  
                                $picsrc=$picfile_path.$row1['s_pic'];
                                    echo "<img src='$picsrc.' class='img-thumbnail'>";
                                    
                                }
                            ?>
                        </div>
                        <div class="menu">
                            <h3> WELCOME, <?php echo $firstname; ?> ! <br>
                                <span>Applicant</span>
                            </h3>
                            <ul>
                                <li><img src="images/user.png" alt=""><a href="#" onclick="document.getElementById('id06').style.display='block'">My Profile</a></li>
                                <li><img src="images/edit.png" alt=""><a href="#" onclick="document.getElementById('id02').style.display='block'">Edit Profile</a></li>
                                <li><img src="images/inbox.png" alt=""><a href="#" onclick="document.getElementById('id03').style.display='block'">Documents</a></li>
                                <li><img src="images/help.png" alt=""><a href="#" onclick="document.getElementById('id05').style.display='block'">Help</a></li>
                                <li><img src="images/logout.png" alt=""><a href='includes/logout.inc.php'>Logout</a></li>
                            </ul>
                            
                        </div>
                    </div>

                    <div class="nav-links">
                        <ul class="nav nav-tabs">
                            <li class=""><a data-toggle="tab" href="#myapp">My Application Form</a></li>
                            <li><a data-toggle="tab" href="#mystat">My Admission Details</a></li>
                        </ul>
                    </div>
                </nav>
                
                <div id="id01" class="modal">
                    <form class="modal-content animate" action="" method="post">
                    </form>
                </div>
                   
                <div id="id02" class="modal">
                    <form class="modal-content animate" name="frmChange" action="" method="post" onSubmit="return validatePassword()">
                        <div class="imgcontainer">
                            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                            
                            <?php
                                $picfile_path ='studentpic/';
                                $result1 = mysqli_query($con,"SELECT * FROM t_userdoc where s_id='".$id."'");
                            
                                while($row1 = mysqli_fetch_array($result1)){                  
                                $picsrc=$picfile_path.$row1['s_pic'];
                                    echo "<img src='$picsrc.' class='avatar'>";
                                    
                                }
                            ?>
                            <h3 style="color:#000">Edit Profile</h3>
                        </div>
                        <div class="message">
                            <?php 
                            if(isset($message)) {
                                echo "<script>alert('" .$message."');
                                window.location.replace('homepageuser.php');
                                </script>";
                            } 
                            ?>
                        </div>
                        
                        <div class="">
                            Name: 
                            <b style="float:right;"><?php echo $full?></b><br>

                            Applicant ID: 
                            <b style="float:right;"><?php echo $id?></b><br>

                            Student LRN: 
                            <b style="float:right;"><?php echo $slrn?></b><br><br>

                            <label>Username: </label>
                            <input type="text" class="form-control"name="currentuid" value="<?php echo $stname?>">

                            <label>Current Password: </label><span id="currentPassword" class="required"></span>
                            <input type="password" name="currentPassword" class="form-control" placeholder="Current Password">
                            

                            <label>New Password: </label><span id="newPassword" class="required"></span>
                            <input type="password" name="newPassword" class="form-control" placeholder="New Password">
                            

                            <label>Confirm Password: </label>
                            <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password">
                            <span id="confirmPassword" class="required"></span>
                            <br>
                            <input type="submit" name="submitProfile" value="Submit" style="margin-left:35%;">
                        </div>
                    
                    
                    </form>
                </div>

                <div id="id03" class="modal">
                    <form class="modal-content animate" action="" method="post" enctype="multipart/form-data" >
                        <div class="imgcontainer">
                            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
                            <img src="images/urslogo.png" alt="" class="avatar">
                            <h3 style="color:#000">Documents</h3>
                            <br>
                            
                            <?php  
                                $result1 = mysqli_query($con,"SELECT * FROM t_userdoc where s_id='$id'");
                                while($row = mysqli_fetch_array($result1))
                                {
                                $picsrc=$picfile_path.$row['s_pic'];
                                $docsrc1=$docfile_path.$row['s_goodMoral'];
                                $docsrc2=$docfile_path.$row['s_birthCert'];
                                
                                $proofsrc1=$prooffile_path.$row['s_f137'];
                                $proofsrc2=$prooffile_path.$row['s_sigpic'];
                                } 
                            ?>
                            <table class="table" >
                                <thead  style="color:#000">
                                    <tr>
                                        <th colspan="2">Document Submitted</th>
                                        <th>Action</th>
                                    </tr>   
                                </thead>
                                <tbody style="color:#000;">
                                    <tr>
                                        <td>Recent 2x2 Image</td>
                                        <td style="font-size:10px" id="display-image"></td>
                                        <td>
                                            <input type="file" name="fpic" id="fpic" style="display:none;visibility:none;" onchange="getImage(this.value);">
                                            <label for='fpic'><i style='margin-left:5px;' class='fa fa-pencil-square-o'></i></label> </a>
                                            <?php echo " <a href='$picsrc.' style='margin-left:5px;'><i class='fa fa-eye'></i></a>"; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Good Moral</td>
                                        <td style="font-size:10px" id="display-gm"></td>
                                        <td>
                                            <input type="file" name="gm" id="gm" style="display:none;visibility:none;" onchange="getgm(this.value);">
                                            <label for='gm'><i style='margin-left:5px;' class='fa fa-pencil-square-o'></i></label> </a>
                                            <?php echo " <a href='$docsrc1.' style='margin-left:5px;'><i class='fa fa-eye'></i></a>"; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Birth Certificate</td>
                                        <td style="font-size:10px" id="display-bc"></td>
                                        <td>
                                            <input type="file" name="bc" id="bc" style="display:none;visibility:none;" onchange="getbc(this.value);">
                                            <label for='bc'><i style='margin-left:5px;' class='fa fa-pencil-square-o'></i></label> </a>
                                            <?php echo " <a href='$docsrc2.' style='margin-left:5px;'><i class='fa fa-eye'></i></a>"; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Form 138</td>
                                        <td style="font-size:10px" id="display-form"></td>
                                        <td>
                                            <input type="file" name="f137" id="f138" style="display:none;visibility:none;" onchange="getform(this.value);">
                                            <label for='f138'><i style='margin-left:5px;' class='fa fa-pencil-square-o'></i></label> </a>
                                            <?php echo " <a href='$proofsrc1.' style='margin-left:5px;'><i class='fa fa-eye'></i></a>"; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Signature</td>
                                        <td style="font-size:10px" id="display-sign"></td>
                                        <td>
                                            <input type="file" name="sig" id="sign" style="display:none;visibility:none;" onchange="getsign(this.value);">
                                            <label for='sign'><i style='margin-left:5px;' class='fa fa-pencil-square-o'></i></label> </a>
                                            <?php echo " <a href='$proofsrc2.' style='margin-left:5px;'><i class='fa fa-eye'></i></a>"; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="submit" name="updateDocs" value="Update Documents">
                        </div>
                    </form>
                </div>
                    
                <div id="id05" class="modal">
                    <form class="modal-content animate" action="homepageuser.php" method="post">
                        <div class="imgcontainer">
                            <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>
                            <img src="images/urslogo.png" alt="" class="avatar">
                            <h3 style="color:#000">How Can We Help You?</h3>
                        </div>

                        <div class=""><br>
                            <a href="images/status.png">Status Meaning</a><br><br>
                            <a href="#">Rating Meaning</a><br><br>
                        </div>
                    
                    </form>
                </div>
                
                <div id="id06" class="modal">
                    <form class="modal-content animate"  name="" action="" method="post" >
                        <div class="imgcontainer">
                            <span onclick="document.getElementById('id06').style.display='none'" class="close" title="Close Modal">&times;</span>
        
                            <?php
                                $picfile_path ='studentpic/';
                                $result1 = mysqli_query($con,"SELECT * FROM t_userdoc where s_id='".$_SESSION['user']."'");
                            
                                while($row1 = mysqli_fetch_array($result1)){                  
                                $picsrc=$picfile_path.$row1['s_pic'];
                                    echo "<img src='$picsrc.'  class='avatar'>";
                                    
                                }
                            ?>
                            <h3 style="color:#000">Profile</h3>
                        </div>
                        
                        <div class="">
                            Name:
                            <b style="float:right;"><?php echo $full?></b><br><br>
                            Applicant ID: 
                            <b style="float:right;"><?php echo $id?></b><br><br>
                            Student LRN:
                            <b style="float:right;"><?php echo $slrn?></b><br><br>
                            Email: 
                            <b style="float:right;"><?php echo $seml?></b><br><br>
                            <hr>
                            <label>Username: </label>
                            <b style="float:right;"><?php echo $stname?></b><br>
                            <br>
                            <label>Signature: </label>
                            <b style="float:right;">
                                <?php            
                                    $picfile_path1 ='studentproof/';
                                    $result2 = mysqli_query($con,"SELECT * FROM t_userdoc where s_id='".$_SESSION['user']."'");
                                    while($row2 = mysqli_fetch_array($result2))
                                {                  
                                    $picsrc1=$picfile_path1.$row2['s_sigpic'];
                                    echo "<img src='$picsrc1.' class='img-thumbnail' style='width:80px'>";
                                }    
                                ?>
                            </b><br><br><br>

                        </div>
                    </form>
                </div>
                    

                <div class="tab-content">

                    <?php 
                        $result = mysqli_query($con,"SELECT * FROM t_user WHERE s_id='".$id."'");
                        while($row = mysqli_fetch_array($result))
                            {
                    ?>
                    <div id="myapp" class="tab-pane fade in active">
                        <div class="form" style="background-color: #06304d; padding-top:0px;">
                            <table class="table table-bordered">
                        
                                <tr>
                                    <td colspan="4" style="width:4%;"><br>
                                        <center>
                                            <img src="images/urslogo.png" width="10%" style="margin-right:250px">
                                            <img src="images/ursgiants.png" width="10%"  style="margin-left:100px"> 
                                            <div class="imageintro" style="margin-top: -90px; font-size:25px;">
                                                UNIVERSITY OF RIZAL SYSTEM
                                                <br>Province of Rizal <br>
                                                Website: <a href="www.urs.edu.ph">www.urs.edu.ph</a><br><br>
                                            </div>
                                        </center>

                                        <center>
                                            <h2>
                                            URS APPLICATION FORM FOR COLLEGE ADMISSION<br> 
                                            </h2>
                                            (02) 8899-67-48 <br>
                                            1st Semester, SY <?php echo $syS ." - ".$syE ?>
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
                                            ?>
                                        </center>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>Username: </td>
                                    <td><b><?php echo $stname;?></b></td>
                                </tr>
                                
                                <tr>
                                    <td> <font style="font-family: Verdana;">2. GENDER: </font></td>
                                    <td> <b><?php echo $row[6] ?></b></td>
                                    <td><?php echo '3. RELIGION: <b>'.  $row[7] ?></b> </td>
                                </tr>

                                <tr>
                                    <td> <font style="font-family: Verdana;">4. DATE OF BIRTH:  </font> </td>
                                    <td> <b><?php echo $row[8] ?> </b></td>
                                    <td> <font style="font-family: Verdana;">AGE:  </font>
                                        <b><?php echo $row[9] ?> </b>
                                    </td>
                                    <td> <font style="font-family: Verdana;">CIVIL STATUS:  </font>
                                        <b><?php echo $row[10] ?> </b>
                                    </td>
                                </tr>
                                                
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

                                <td colspan="3" style="text-align:center">7. HIGH SCHOOL <br>
                                    (Where you complete/are completing secondary level education.)
                                </td>
                                <td rowspan="5">
                                    <center>
                                    <b>INTERVIEW</b> <br>
                                    </center>
                                    <i style="font-size: 15px;">
                                    Visit the office of the
                                    Dean for an Interview. <br>
                                    Do not submit the form 
                                    if not undergone process.</i>
                                    <br><br>
                                    <b>College of:</b> <br>
                                    <input type="text" style="text-align: center;padding:5px; width:95%;" value="<?php echo $intcourse ?>" placeholder="No Interview" disabled>    
                                    <b><i>Interview Rating:</i></b>
                                    <center>
                                    <input type="text" style="text-align: center;padding:5px; width:180px;" value="<?php echo $intrating ?>" placeholder="No Interview Rating" disabled>
                                    
                                    <br><br>
                                    <?php
                                        $picfile_path ='adminsig/';
                                        $result1 = mysqli_query($con,"SELECT * FROM t_admin where ad_name='".$intby."'");
                                            
                                        while($row1 = mysqli_fetch_array($result1)){                  
                                            $picsrc=$picfile_path.$row1['ad_sig'];
                                            echo "<img src='$picsrc.' class='img-thumbnail' style='width:200px;'>";
                                        }
                                    ?>
                                    <input type="text" style="text-align: center;width:100%; border:none; border-bottom:1px solid #000;" value="<?php echo $intby?>" placeholder="No Interview Rating" disabled>
                                    
                                    <i>Name of Interviewer Over Signature</i>
                                    </center>
                                </td>

                                <tr>
                                    <td>HIGH SCHOOL NAME: <br> (do not abbreviate) </td>
                                    <td> <b><?php echo $row[14]  ?></b> </td>
                                    <td>EXPECTED MONTH/YEAR OF COMPLETION: <b><?php echo $row[16]  ?></b> </td>
                                </tr>
                                
                                <tr>
                                    <td>HIGH SCHOOL ADDRESS: </td>
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
                                    <td colspan="2"><b> <?php echo $row[21] ?></b> </td>
                                    
                                </tr>
                                <tr>
                                    <td>2ND COURSE CHOICE :</td>
                                    <td colspan="2"> <b><?php echo $row[22] ?></b></td>
                                </tr>

                                <tr>
                                    <td rowspan="2">2ND CAMPUS CHOICE : <br> <b><?php echo $row[20] ?></b></td>
                                    <td>1ST COURSE CHOICE : </td>
                                    <td colspan="2"><b> <?php echo $row[23] ?></b> </td>
                                </tr>
                                <tr>
                                    <td>2ND COURSE CHOICE :</td>
                                    <td colspan="2"> <b><?php echo $row[24] ?></b></td>
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
                                        <table class="table table-bordered" style="background:none;">
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
                                                $result2 = mysqli_query($con,"SELECT * FROM t_userdoc where s_id='".$id."'");
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

                    </div>
                
                    <div id="mystat" class="tab-pane fade">
                        <div  class="campus" style="padding-top:0px; padding:15px;border-radius:3px; background-color:#fff; opacity: .85;">
                            <h1> Applicant Status: 
                            <input type="text" style="color:green;width:250px; border:none; padding:10px; line-height:1px;" value="<?php echo $stval?>"disabled></h1>
                            <h4 style="color: #000;"> Your Interview College: </h4>
                            <input type="text" style="width: auto; border:none; text-align:center;"  placeholder="No Interview Yet" value="<?php echo $intcourse ?>"  disabled>  
                            <h4 style="color: #000;"> Your Interview Rating: </h4>
                            <input type="text" style="width: auto; border:none; text-align:center;" placeholder="No Rating Yet" value="<?php echo $intrating ?>" disabled>  
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
                                    <?php 
                                        if($stval == 'Pending'){
                                        echo "<a href='nocard.php?id=".$id."'>
                                                <img src='images/edit.png'>
                                                <div class='layer'>
                                                <h3>SCHEDULE CARD</h3>
                                                </div>
                                            </a>";
                                        }
                                        else if($stval == 'Verified'){
                                        echo "<a href='reqcard.php?id=".$id."'>
                                                <img src='images/edit.png'>
                                                <div class='layer'>
                                                <h3>SCHEDULE CARD</h3>
                                                </div>
                                            </a>";
                                        }
                                        else if($stval == 'Complete'){
                                            echo "<a href='examcard.php?id=".$id."'>
                                                    <img src='images/edit.png'>
                                                    <div class='layer'>
                                                    <h3>SCHEDULE CARD</h3>
                                                    </div>
                                                </a>";
                                            }
                                        else if($stval == 'Passed'){
                                            echo "<a href='passedslip.php?id=".$id."'>
                                                    <img src='images/edit.png'>
                                                    <div class='layer'>
                                                    <h3>SCHEDULE CARD</h3>
                                                    </div>
                                                </a>";
                                            }
                                        else{
                                        echo "<a href='nocard.php?id=".$id."'>
                                                <img src='images/edit.png'>
                                                <div class='layer'>
                                                <h3>SCHEDULE CARD</h3>
                                                </div>
                                            </a>";
                                        }
                                        
                                    ?>
                                </div>
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
        </form>
        
    <?php } ?>
    <script type="text/javascript">
        function getImage(imagename){
            var newimg = imagename.replace(/^.*\\/,"");
            $('#display-image').html(newimg);
        }
        function getgm(imagegm){
            var gm = imagegm.replace(/^.*\\/,"");
            $('#display-gm').html(gm);
        }
        function getbc(imagebc){
            var bc = imagebc.replace(/^.*\\/,"");
            $('#display-bc').html(bc);
        }
        function getform(imageform){
            var form = imageform.replace(/^.*\\/,"");
            $('#display-form').html(form);
        }
        function getsign(imagesign){
            var sign = imagesign.replace(/^.*\\/,"");
            $('#display-sign').html(sign);
        }
    </script>
    </body>
</html>
