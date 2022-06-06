<?php
include 'includes/admsnform.inc.php'
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- displays site properly based on user's device -->

        <title>URS | Applicant</title>
        <link rel="icon" type="image/png" sizes="32x30" href="./images/urslogo.png">
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/astyle.css">
        <script language="javascript" type="text/javascript" src="jquery/jquery-1.10.2.js"></script>    
    </head>

    <body  style="background-image: linear-gradient(rgba(4,9,20,0.7), rgba(4,9,20,0.7)), url('images/banner.jpeg');">
        <nav>
            <a href="#"><img src="images/ourss.png" alt=""></a>
            
            <h3 style="color:#fff">WELCOME, <?php echo $stname; ?>  !</h3>
            
        </nav>


        <div class="container" >
            
            <div class="admsnintro" >
                <h2>Application Form</h2>
                
                <p class="admissionhero__paragraph">
                <b>IMPORTANT NOTES:</b><br>
                Please fill in all fields.<br>
            </div>
        
            <div class="wholeform"> 
                <form class="formAdmsn" action="admsnform.php" method="post">          
                    <div class="form">
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox">
                                <input type="hidden" id="detid" name="detid">
                                    <input type="number" name="slrn" required="true">
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
                                    <input type="text" name="lname" required="true" VT="NM">
                                    <span class="text">Last Name</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="fname" required="true" VT="NM">
                                    <span class="text">First Name</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="mname" required="true" VT="NM">
                                    <span class="text">Middle Name</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox select">
                                    <select type="text" name="gen" required="true">
                                        <option value="" disabled selected hidden></option>
                                        <option value="MALE">MALE</option>
                                        <option value="FEMALE">FEMALE</option>
                                    </select>
                                    <span class="text">Gender</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="relg" required="true" id="formrel">
                                        <option value="" disabled selected hidden></option>
                                        <option value="ROMAN CATHOLIC">ROMAN CATHOLIC</option>
                                        <option value="BORN AGAIN">BORN AGAIN</option>
                                        <option value="IGLESIA NI CRISTO">IGLESIA NI CRISTO</option>
                                        <option value="CHRISTIAN">CHRISTIAN</option>
                                        <option value="OTHER RELIGION">OTHERS</option>
                                    </select>
                                    <span class="text">Religion</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox" disabled>
                                    <input type="text" name="ubday" required="true" value="<?php echo $stDateOfBirth?>">
                                    <span class="text">Date of Birth</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox">
                                    <input type="number" name="uage" required="required">
                                    <span class="text">Age</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="civilStatus" required="true">
                                        <option value="" disabled selected hidden></option>
                                        <option value="SINGLE">SINGLE</option>
                                        <option value="MARRIED">MARRIED</option>
                                        <option value="WIDOWED">WIDOWED</option>
                                        <option value="DIVORCED">DIVORCED</option>
                                    </select>
                                    <span class="text">Civil Status</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="placeOfBirth" required="required">
                                    <span class="text">Place of Birth</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="citizenShip" onchange="yesnoCheck()" required="">
                                        <option value="" disabled selected hidden></option>
                                        <option id="noCheck"value="FILIPINO">FILIPINO</option>
                                        <option id="foreignCheck" value="FOREIGN">FOREIGN</option>
                                        <option id="dualCheck" value="DUAL">DUAL</option>
                                    </select>
                                    <span class="text">Citizenship</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox" id="ifYes" style="display: none;">
                                    <input type="text" id="citizenShipSpecify" name="citizenShipSpecify" >
                                    <span class="text">Please Specify:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form">
                        <h3>Educational Background</h3>
                        <hr>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="hsname" required="required" VT="NM">
                                    <span class="text">High School Name( <i>Please put complete name, not acronym.</i> )</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="hsadd" required="required">
                                    <span class="text">Address</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox select">
                                    <input type="month" name="hsEM" required="required">
                                    <span class="text">Expected Month/Year of Completion</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="track" required="required">
                                        <option value="" disabled selected hidden></option>
                                        <option value="ACADEMIC">ACADEMIC</option>
                                        <option value="TECH VOC">TECH VOC</option>
                                        <option value="SPORTS">SPORTS</option>
                                        <option value="ARTS & DESIGN">ARTS & DESIGN</option>
                                    </select>
                                    <span class="text">Track</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="strand" required="required">
                                        <option value="" disabled selected hidden></option>
                                        <option value="ABM">ABM</option>
                                        <option value="HUMSS">HUMSS</option>
                                        <option value="STEM">STEM</option>
                                        <option value="GAS">GAS</option>
                                        <option value="HOME ECONOMICS">Home Economics</option>
                                        <option value="ICT">ICT</option>
                                        <option value="OTHER STRAND">OTHERS</option>
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
                        
                        <div class="row100">
                            
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="firstURSchoice" id="campusChoice" required="required">
                                        <option value="" disabled selected hidden></option>
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
                                    <select name="ifirstIC" id="courseChoice"  required="required" onchange="courseCheck()">
                                        <option value="" disabled selected hidden></option>
                                    </select>
                                    <span class="text">1st Choice COURSE</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="isecondIC" id="courseChoicee" required="required">
                                        <option value="" disabled selected hidden></option>
                                    </select>
                                    <span class="text">2nd Choice COURSE</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="ifSame" style="display:none;">
                            <p style="color:red;">Same Course, please change the other one.</p>
                        </div>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="secondURSchoice" id="campusChoice1" required="required">
                                        <option value="" disabled selected hidden></option>
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
                                        <option value="" disabled selected hidden></option>
                                    </select>
                                    <span class="text">1st Choice COURSE</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox select">
                                    <select name="iisecondIC" id="courseChoice2" required="required">
                                        <option value="" disabled selected hidden></option>
                                    </select>
                                    <span class="text">2nd Choice COURSE</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox" style="width: 30%">
                                    <input type="text" name="genAverage" required="false">
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
                                    <label class="switch">
                                        <input type="checkbox" id="facChild" name="facultyChild" onchange="childCheck()">
                                        <span class="slider round"></span>
                                    </label>
                                </h3>
                                
                                <hr>
                                <div class="row100" id="ifChild" style="display: none;">
                                    <div class="col">
                                        <div class="inputBox">
                                            <input type="text" id="parentEmpName" name="parentEmpName" >
                                            <span class="text">Parents Name Employed by URS: </span>
                                            <span class="line"></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="inputBox">
                                            <input type="text" id="officeEmp" name="officeEmp" >
                                            <span class="text">College/Office where Employed:  </span>
                                            <span class="line"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row100" id="ifChildd" style="display: none;">
                                    <div class="col">
                                        <div class="inputBox">
                                            <input type="text"  id="parentOfficeDesig" name="parentOfficeDesig" >
                                            <span class="text">Office Designation: </span>
                                            <span class="line"></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="inputBox">
                                            <input type="number"  id="parentTelNo" name="parentTelNo" VT="PH">
                                            <span class="text">Telephone No.</span>
                                            <span class="line"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col" style="width:63%">
                                <h3> Are you self-supporting? 
                                    <label class="switch" >
                                        <input type="checkbox" id="selfSup" name="selfSup" onchange="selfSupCheck()">
                                        <span class="slider round"></span>
                                    </label>
                                </h3>
                                <hr>
                                <div class="row100" id="ifSelfSup" style="display: none;">
                                    <div class="col">
                                        <div class="inputBox select">
                                            <select name="natureOfWork" id="natureOfWork" onchange="othersSupCheck()">
                                                <option value="" disabled selected hidden></option>
                                                <option id="SelfSup" value="FOOD CHAIN CREW">FOOD CHAIN CREW</option>
                                                <option id="SelfSup" value="VENDOR">VENDOR</option>
                                                <option id="SelfSup" value="HOUSEHOLD">HOUSEHOLD</option>
                                                <option id="SelfSup" value="GASOLINE BOY/GIR">GASOLINE BOY/GIRL</option>
                                                <option id="SelfSup" value="MESSENGER">MESSENGER</option>
                                                <option id="SelfSup" value="CONSTRUCTION">CONSTRUCTION</option>
                                                <option id="othersSelfSup" value="OTHER WORK">OTHERS</option>
                                            </select>
                                            <span class="text">Nature of Work: </span>
                                            <span class="line"></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="inputBox" id="othersSpecify" style="display: none;">
                                            <input type="text" name="workSpecify" id="workSpecify">
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
                                    <input type="text" name="houseNum" required="false">
                                    <span class="text">Number:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="houseSt" required="false">
                                    <span class="text">Street:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="subd" required="false">
                                    <span class="text">Subdivision:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="village" required="false">
                                    <span class="text">Village:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="brgy" required="required">
                                    <span class="text">Barangay:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="cityTown" required="required">
                                    <span class="text">City/Town: </span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="province" required="required">
                                    <span class="text">Province: </span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="number" name="postalCode" required="required">
                                    <span class="text">POSTAL/ZIP Code:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="phoneNum" required="required">
                                    <span class="text">Contact Number: </span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="email" name="emailAddress" required="required">
                                    <span class="text">Email Address:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inputBox">
                                    <input type="text" name="fbAccount"  required>
                                    <span class="text">Facebook Account:</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form">
                        <h3>SOCIO ECONOMIC </h3>
                        <hr><br>
                        <div class="row100">
                            <div class="card card1">
                                <h3>Father</h3>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="uffname" required="required"  VT="NM">
                                        <span class="text">First Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ufmname" required="required"  VT="NM">
                                        <span class="text"> Middle Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="uflname" required="required"  VT="NM">
                                        <span class="text">Last Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ufcit" required="required">
                                        <span class="text">Citizenship</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox select">
                                        <select name="ufms" required="true">
                                            <option value="" disabled selected hidden></option>
                                            <option value="SINGLE">SINGLE</option>
                                            <option value="MARRIED">MARRIED</option>
                                            <option value="WIDOWED">WIDOWED</option>
                                            <option value="DIVORCED">DIVORCED</option>
                                        </select>
                                        <span class="text"> Civil Status</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ufhea" required>
                                        <span class="text">Highest Educational Attainment</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ufocc" required>
                                        <span class="text"> Present Occupation</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="number" name="ufinc" required>
                                        <span class="text">Monthly Income ( &#8369; 0.00 )</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card card2">
                                <h3>Mother</h3> 
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="umfname" required VT="NM">
                                        <span class="text">First Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ummname" required VT="NM">
                                        <span class="text"> Middle Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="umlname" required VT="NM">
                                        <span class="text">Last Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="umcit" required>
                                        <span class="text">Citizenship</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox select">
                                        <select name="umms" required="true">
                                            <option value="" disabled selected hidden></option>
                                            <option value="SINGLE">SINGLE</option>
                                            <option value="MARRIED">MARRIED</option>
                                            <option value="WIDOWED">WIDOWED</option>
                                            <option value="DIVORCED">DIVORCED</option>
                                        </select>
                                        <span class="text"> Civil Status</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="umhea" required>
                                        <span class="text">Highest Educational Attainment</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="umocc" required>
                                        <span class="text"> Present Occupation</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="number" name="uminc" required>
                                        <span class="text">Monthly Income ( &#8369; 0.00 )</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card card3">
                                <h3>Legal Guardian</h3> 
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ulgfname" required  VT="NM">
                                        <span class="text">First Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ulgmname" required  VT="NM">
                                        <span class="text"> Middle Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ulglname" required VT="NM">
                                        <span class="text">Last Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ulgcit" required>
                                        <span class="text">Citizenship</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox select">
                                        <select name="ulgms" required="true">
                                            <option value="" disabled selected hidden></option>
                                            <option value="SINGLE">SINGLE</option>
                                            <option value="MARRIED">MARRIED</option>
                                            <option value="WIDOWED">WIDOWED</option>
                                            <option value="DIVORCED">DIVORCED</option>
                                        </select>
                                        <span class="text"> Civil Status</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ulghea" required>
                                        <span class="text">Highest Educational Attainment</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="text" name="ulgocc" required>
                                        <span class="text"> Present Occupation</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="inputBox">
                                        <input type="number" name="ulginc" required>
                                        <span class="text">Monthly Income( &#8369; 0.00 )</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="x">
                        <input type="submit" class="HERO-BTN" name="logout" value="Logout">
                        <input type="submit" class="HERO-BTN" name="frmnext" value="Next">
                    </div>
                </form>
            </div>
        </div>
        
            
    <script src="js/user.js"></script>
    </body>
<html>