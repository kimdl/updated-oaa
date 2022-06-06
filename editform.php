<?php
include 'includes/editform.inc.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- displays site properly based on user's device -->

        <link rel="icon" type="image/png" sizes="32x30" href="./images/urslogo.png">
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="css/astyle.css">
        
        <script language="javascript" type="text/javascript" src="jquery/jquery-1.10.2.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
    </head>

    <body style="background-image: linear-gradient(rgba(4,9,20,0.7), rgba(4,9,20,0.7)), url('images/banner.jpeg');">
        
        <div class="container" >
            <div class="x" >
                <h1 style="color: #fff">Application Form</h1>
            </div>

            <div class="wholeform"> 
                <form id="edform" action="includes/editform.inc.php" method="post"> 
                    <?php
                        $result = mysqli_query($con,"SELECT * FROM t_user WHERE s_id='".$_SESSION['user']."'");
                        while($row = mysqli_fetch_array($result))
                        {
                    ?>         
                   <div class="form">
                        <div class="row100">
                            <div class="col" readonly>
                                <div class="inputBox">
                                    <input type="text" id="unam" name="unam" value="<?php echo $stname;?>" style="width:300px"> 
                                    <span class="text">Username:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox">
                                <input type="hidden" id="detid" name="detid">
                                    <input type="text" name="slrn" required="true" value="<?php echo $row[2] ?>">
                                    <span class="text">L. R. N.</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <span class="appID">Applicant ID: <?php echo $applicantID ?></span>
                                </div>
                            </div>
                        </div>
                   </div>

                    <div class="form">
                        <h3><br> Personal Information</h3>
                        <hr>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="lname" required="true" VT="NM" value="<?php echo $row[3] ?>">
                                    <span class="text">Last Name</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="fname" required="true" VT="NM" value="<?php echo $row[4] ?>">
                                    <span class="text">First Name</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="mname" required="true" VT="NM" value="<?php echo $row[5] ?>">
                                    <span class="text">Middle Name</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox select">
                                    <select type="text" name="gen" required="true">
                                        <option><?php echo $row[6] ?></option>
                                        <option value="Male">MALE</option>
                                        <option value="Female">FEMALE</option>
                                    </select>
                                    <span class="text">Gender</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="relg" required="true" id="formrel">
                                        <option><?php echo $row[7] ?></option>
                                        <option value="Roman Catholic">ROMAN CATHOLIC</option>
                                        <option value="Born Again">BORN AGAIN</option>
                                        <option value="Iglesia Ni Cristo">IGLESIA NI CRISTO</option>
                                        <option value="Christian">CHRISTIAN</option>
                                        <option value="Other Religion">OTHERS</option>
                                    </select>
                                    <span class="text">Religion</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="ubday" required="true" value="<?php echo $row[8]?>">
                                    <span class="text">Date of Birth</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="uage" required="required" value="<?php echo $row[9]?>">
                                    <span class="text">Age</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="civilStatus" required="true">
                                        <option><?php echo $row[10]?></option>
                                        <option value="Single">SINGLE</option>
                                        <option value="Married">MARRIED</option>
                                        <option value="Widowed">WIDOWED</option>
                                        <option value="Divorced">DIVORCED</option>
                                    </select>
                                    <span class="text">Civil Status</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="placeOfBirth" required="required" value="<?php echo $row[11]?>">
                                    <span class="text">Place of Birth</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="citizenShip" onchange="yesnoCheck()" required="true" >
                                        <option><?php echo $row[12]?></option>
                                        <option id="noCheck"value="Filipino">FILIPINO</option>
                                        <option id="foreignCheck" value="Foreign">FOREIGN</option>
                                        <option id="dualCheck" value="Dual">DUAL</option>
                                    </select>
                                    <span class="text">Citizenship</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox" id="ifYes">
                                    <input type="text" name="citizenShipSpecify" required="required" value="<?php echo $row[13]?>">
                                    <span class="text">Please Specify:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form">
                        <h3>Educational Background </h3>
                        <hr>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="hsname" required="required" value="<?php echo $row[14]?>">
                                    <span class="text">High School Name</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="hsadd" required="required" value="<?php echo $row[15]?>">
                                    <span class="text">Address</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox select">
                                    <input type="month" name="hsEM" required="required" value="<?php echo $row[16]?>">
                                    <span class="text">Month/Year of Completion</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="track" required="required">
                                        <option><?php echo $row[17]?></option>
                                        <option value="Academic">ACADEMIC</option>
                                        <option value="Tech Voc">TECH VOC</option>
                                        <option value="Sports">SPORTS</option>
                                        <option value="Arts and Design">ARTS & DESIGN</option>
                                    </select>
                                    <span class="text">Track</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="strand" required="required">
                                        <option><?php echo $row[18]?></option>
                                        <option value="abm">ABM</option>
                                        <option value="humms">HUMSS</option>
                                        <option value="stem">STEM</option>
                                        <option value="gas">GAS</option>
                                        <option value="he">Home Economics</option>
                                        <option value="ict">ICT</option>
                                        <option value="other">OTHERS</option>
                                    </select>
                                    <span class="text">Strand</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form">
                        <h3>URS Campus Applied For </h3>
                        <hr><br>
                        <div class="row100" onchange="courseCheck()">
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="firstURSchoice" id="campusChoice" required="required">
                                        <option><?php echo $row[19]?></option>
                                        <option value="ANGONO CAMPUS">ANGONO CAMPUS</option>
                                        <option value="ANTIPOLO CAMPUS">ANTIPOLO CAMPUS</option>
                                        <option value="BINANGONAN CAMPUS">BINANGONAN CAMPUS</option>
                                        <option value="CAINTA CAMPUS">CAINTA CAMPUS</option>
                                        <option value="CARDONA CAMPUS">CARDONA CAMPUS</option>
                                        <option value="MORONG CAMPUS">MORONG CAMPUS</option>
                                        <option value="PILILLA CAMPUS">PILILLA CAMPUS</option>
                                        <option value="RODRIGUEZ CAMPUS">RODRIGUEZ CAMPUS</option>
                                        <option value="TANAY CAMPUS">TANAY CAMPUS</option>
                                        <option value="TAYTAY CAMPUS">TAYTAY CAMPUS</option>
                                    </select>
                                    <span class="text">1st Choice CAMPUS</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox select" >
                                    <select name="ifirstIC" id="courseChoice"  required="required">
                                        <option><?php echo $row[21]?></option>
                                    </select>
                                    <span class="text">1st Choice COURSE</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="isecondIC" id="courseChoicee" required="required">
                                        <option><?php echo $row[22]?></option>
                                    </select>
                                    <span class="text">2nd Choice COURSE</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row100" onchange="courseCheck()">
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="secondURSchoice" id="campusChoice1" required="required">
                                        <option><?php echo $row[23]?></option>
                                        <option value="ANGONO CAMPUS">ANGONO CAMPUS</option>
                                        <option value="ANTIPOLO CAMPUS">ANTIPOLO CAMPUS</option>
                                        <option value="BINANGONAN CAMPUS">BINANGONAN CAMPUS</option>
                                        <option value="CAINTA CAMPUS">CAINTA CAMPUS</option>
                                        <option value="CARDONA CAMPUS">CARDONA CAMPUS</option>
                                        <option value="MORONG CAMPUS">MORONG CAMPUS</option>
                                        <option value="PILILLA CAMPUS">PILILLA CAMPUS</option>
                                        <option value="RODRIGUEZ CAMPUS">RODRIGUEZ CAMPUS</option>
                                        <option value="TANAY CAMPUS">TANAY CAMPUS</option>
                                        <option value="TAYTAY CAMPUS">TAYTAY CAMPUS</option>
                                    </select>
                                    <span class="text">2nd Choice CAMPUS</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="iifirstIC" id="courseChoice1" required="required">
                                        <option><?php echo $row[24]?></option>
                                    </select>
                                    <span class="text">1st Choice COURSE</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="iisecondIC" id="courseChoice2" required="required">
                                        <option><?php echo $row[24]?></option>
                                    </select>
                                    <span class="text">2nd Choice COURSE</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox" style="width: 30%">
                                    <input type="text" name="genAverage" required="false" value="<?php echo $row[25]?>">
                                    <span class="text">General Average:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form">
                        <div class="row100 smallerFont">
                            <div class="col">
                                <h3> Are you a child of a faculty/employee? 
                                    <label class="switch" >
                                        <input type="checkbox" id="facChild" name="facultyChild" onchange="childCheck()" value="<?php echo $row[26]?>">
                                        <span class="slider round"></span>
                                    </label>
                                </h3>
                                
                                <hr>
                                <div class="row100" id="ifChild">
                                    <div class="col">
                                        <div class="inputBox">
                                            <input type="text" name="parentEmpName"  value="<?php echo $row[27]?>">
                                            <span class="text" style="font-size:15px">Parent Name Employed by URS: </span>
                                            <span class="line"></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="inputBox">
                                            <input type="text" name="officeEmp"value="<?php echo $row[28]?>">
                                            <span class="text" style="font-size:15px">College/Office where Employed:  </span>
                                            <span class="line"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row100" id="ifChildd">
                                    <div class="col">
                                        <div class="inputBox">
                                            <input type="text" name="parentOfficeDesig" value="<?php echo $row[29]?>">
                                            <span class="text">Office Designation: </span>
                                            <span class="line"></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="inputBox">
                                            <input type="text" name="parentTelNo" value="<?php echo $row[30]?>">
                                            <span class="text">Telephone No.</span>
                                            <span class="line"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col" style="width:63%">
                                <h3> Are you self-supporting? 
                                    <label class="switch" >
                                        <input type="checkbox" id="selfSup" name="selfSup" onchange="selfSupCheck()" value="<?php echo $row[31]?>">
                                        <span class="slider round"></span>
                                    </label>
                                </h3>
                                <hr>
                                <div class="row100" id="ifSelfSup">
                                    <div class="col">
                                        <div class="inputBox select">
                                            <select name="natureOfWork" onchange="othersSupCheck()">
                                                <option><?php echo $row[32]?></option>
                                                <option id="SelfSup" value="Food Chain Crew">FOOD CHAIN CREW</option>
                                                <option id="SelfSup" value="Vendor">VENDOR</option>
                                                <option id="SelfSup" value="Household">HOUSEHOLD</option>
                                                <option id="SelfSup" value="Gasoline Boy/Girl">GASOLINE BOY/GIRL</option>
                                                <option id="SelfSup" value="Messenger">MESSENGER</option>
                                                <option id="SelfSup" value="Construction">CONSTRUCTION</option>
                                                <option id="othersSelfSup" value="Others">OTHERS</option>
                                            </select>
                                            <span class="text">Nature of Work: </span>
                                            <span class="line"></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="inputBox" id="othersSpecify">
                                            <input type="text" name="workSpecify"  value="<?php echo $row[33]?>">
                                            <span class="text">Others, specify: </span>
                                            <span class="line"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="form">
                        <h3>Permanent Address </h3>
                        
                        <hr><br>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="houseNum" required="false"  value="<?php echo $row[34]?>">
                                    <span class="text">Number:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="houseSt" required="false" value="<?php echo $row[35]?>">
                                    <span class="text">Street:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="subd" required="false"  value="<?php echo $row[36]?>">
                                    <span class="text">Subdivision:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="village" required="false" value="<?php echo $row[37]?>">
                                    <span class="text">Village:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="brgy" required="required" value="<?php echo $row[38]?>">
                                    <span class="text">Barangay:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="cityTown" required="required" value="<?php echo $row[39]?>">
                                    <span class="text">City/Town: </span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="province" required="required" value="<?php echo $row[40]?>">
                                    <span class="text">Province: </span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="postalCode" required="required" value="<?php echo $row[41]?>">
                                    <span class="text">POSTAL/ZIP Code:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="phoneNum" required="required" value="<?php echo $row[42]?>">
                                    <span class="text">Contact Number: </span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="emailAddress" required="required" VT="EML"  value="<?php echo $row[43]?>">
                                    <span class="text">Email Address:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="fbAccount"  required="false" value="<?php echo $row[44]?>">
                                    <span class="text">Facebook Account:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>


                    <?php
                        $result1 = mysqli_query($con,"SELECT * FROM t_userparentinfo WHERE s_id='".$_SESSION['user']."'");
                        while($rowdata = mysqli_fetch_array($result1))
                        {
                    ?>
                    <div class="form">
                        <h3>SOCIO ECONOMIC </h3>
                        <hr><br>
                        <div class="row100">
                            <div class="card card1">
                                <h3>Father</h3>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="uffname" required="required"  VT="NM" value="<?php echo $rowdata[2]?>">
                                        <span class="text">First Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ufmname" required="required"  VT="NM" value="<?php echo $rowdata[3]?>">
                                        <span class="text"> Middle Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="uflname" required="required"  VT="NM" value="<?php echo $rowdata[4]?>">
                                        <span class="text">Last Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ufcit" required="required" value="<?php echo $rowdata[5]?>">
                                        <span class="text">Citizenship</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox select">
                                        <select name="ufms" required="true">
                                            <option><?php echo $rowdata[6]?></option>
                                            <option value="Single">SINGLE</option>
                                            <option value="Married">MARRIED</option>
                                            <option value="Widowed">WIDOWED</option>
                                            <option value="Divorced">DIVORCED</option>
                                        </select>
                                        <span class="text"> Civil Status</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ufhea" required="required" value="<?php echo $rowdata[7]?>">
                                        <span class="text" style="font-size:15px;">Highest Educational Attainment</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ufocc" required="required" value="<?php echo $rowdata[8]?>">
                                        <span class="text"> Present Occupation</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ufinc" required="required"  value="&#8369; <?php echo $rowdata[9]?>">
                                        <span class="text">Monthly Income</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card card2">
                                <h3>Mother</h3> 
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="umfname" required="required"  VT="NM" value="<?php echo $rowdata[10]?>">
                                        <span class="text">First Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ummname" required="required"  VT="NM" value="<?php echo $rowdata[11]?>">
                                        <span class="text"> Middle Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="umlname" required="required"  VT="NM" value="<?php echo $rowdata[12]?>">
                                        <span class="text">Last Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="umcit" required="required" value="<?php echo $rowdata[13]?>">
                                        <span class="text">Citizenship</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox select">
                                        <select name="umms" required="true">
                                            <option><?php echo $rowdata[14]?></option>
                                            <option value="Single">SINGLE</option>
                                            <option value="Married">MARRIED</option>
                                            <option value="Widowed">WIDOWED</option>
                                            <option value="Divorced">DIVORCED</option>
                                        </select>
                                        <span class="text"> Civil Status</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="umhea" required="required" value="<?php echo $rowdata[15]?>">
                                        <span class="text" style="font-size:15px;">Highest Educational Attainment</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="umocc" required="required" value="<?php echo $rowdata[16]?>">
                                        <span class="text"> Present Occupation</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="uminc" required="required" value="&#8369; <?php echo $rowdata[17]?>">
                                        <span class="text">Monthly Income</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card card3">
                                <h3>Legal Guardian</h3> 
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ulgfname" required="required"  VT="NM" value="<?php echo $rowdata[18]?>">
                                        <span class="text">First Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ulgmname" required="required"  VT="NM" value="<?php echo $rowdata[19]?>">
                                        <span class="text"> Middle Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ulglname" required="required"  VT="NM" value="<?php echo $rowdata[20]?>">
                                        <span class="text">Last Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ulgcit" required="required" value="<?php echo $rowdata[21]?>">
                                        <span class="text">Citizenship</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox select">
                                        <select name="ulgms" required="true">
                                            <option><?php echo $rowdata[22]?></option>
                                            <option value="Single">SINGLE</option>
                                            <option value="Married">MARRIED</option>
                                            <option value="Widowed">WIDOWED</option>
                                            <option value="Divorced">DIVORCED</option>
                                        </select>
                                        <span class="text"> Civil Status</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ulghea" required="required" value="<?php echo $rowdata[23]?>">
                                        <span class="text" style="font-size:15px;">Highest Educational Attainment</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ulgocc" required="required" value="<?php echo $rowdata[24]?>">
                                        <span class="text"> Present Occupation</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ulginc" required="required" value="&#8369; <?php echo $rowdata[25]?>">
                                        <span class="text">Monthly Income</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    ?>

                    <div class="x">
                        <input  type="submit" id="frmupdate" name="frmupdate" value="UPDATE">
                    </div>

                    
                </form>
            </div>
        </div>
    
        <script src="js/user.js"></script>
    </body>
</html>
