
<?php
    session_start();
    error_reporting(0);

    require 'includes/dbh.inc.php';
    require 'includes/viewform.inc.php';

    $result = mysqli_query($conn,"SELECT * FROM t_user WHERE s_id='$getid'");              
    while($row = mysqli_fetch_array($result))
    {
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URS </title>
    <link rel="icon" type="image/png" sizes="32x30" href="./images/urslogo.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>

    <script>
        function toggle(source) {
        checkboxes = document.getElementsByName('doc[]');
            for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
            }
        }
        function toggle2(source) {
        checkboxes = document.getElementsByName('hc[]');
            for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
            }
        }
    </script>
    <?php
        if ($stval == "Passed" || $stval == "Complete") {
            ?>
            <style type="text/css">
                #scheduling{
                    display:none;
                }
            </style>
        <?php
        }
        else if($stval == "Pending"){
            ?>  
                <style type="text/css">
                    #scheduling{
                        display:block;
                    }
                    #verify tr{
                        display:block;
                    }
                    #hc tr{ 
                        display:none;
                    }
                </style>
            <?php
        }
        else if($stval == "Verified"){
            ?>  
                <style type="text/css">
                    #scheduling{
                        display:block;
                    }
                    #verify{
                        display:block;
                    }
                    #hc{
                        display:none;
                    }
                </style>
            <?php
        }
        else{
        ?>  
            <style type="text/css">
                #scheduling{
                    display:block;
                }
            </style>
        <?php
        }
    ?>
</head>
<body style="background-attachment: fixed; background-size: 100%;background-image: linear-gradient(rgba(4,9,5,0.9), rgba(4,9,5,0.9)), url('images/ursbstud.jpeg');">
    <div>
        <nav>
            <a href="admin.php"><img src="images/ourss.png" alt=""></a>
        </nav> 
        <div class="campus">  
            <div class="row" style="margin-top: 0px;">
            <h1 style="color: #fff;"> Applicant Status: <br> <b style="color: green;"><?php echo $stval?></b></h1>
                <div class="row" style="height:175px; margin-top: 0px;">
                    <div class="campus-col">
                        <?php echo "<a href='adminAdmsnReport.php?id=".$getid."'>
                            <img src='images/print.png'>
                            <div class='layer'>
                            <h3>PRINT APPLICATION</h3>
                            </div>
                        </a>"?>
                    </div>
                    <div class="campus-col">
                        <?php echo "<a href='viewdoc.php?id=".$getid."'>
                            <img src='images/view.png'>
                            <div class='layer'>
                            <h3>VIEW DOCUMENTS</h3>
                            </div>
                        </a>"?>
                    </div>
                    <div class="campus-col">
                        <?php 
                        if($stval == 'Pending'){
                        echo "<a href='nocard.php?id=".$getid."'>
                                <img src='images/edit.png'>
                                <div class='layer'>
                                <h3>SCHEDULE CARD</h3>
                                </div>
                            </a>";
                        }
                        else if($stval == 'Verified'){
                        echo "<a href='reqcard.php?id=".$getid."'>
                                <img src='images/edit.png'>
                                <div class='layer'>
                                <h3>SCHEDULE CARD</h3>
                                </div>
                            </a>";
                        }
                        else if($stval == 'Complete'){
                            echo "<a href='examcard.php?id=".$getid."'>
                                    <img src='images/edit.png'>
                                    <div class='layer'>
                                    <h3>SCHEDULE CARD</h3>
                                    </div>
                                </a>";
                            }
                        else if($stval == 'Passed'){
                            echo "<a href='passedslip.php?id=".$getid."'>
                                    <img src='images/edit.png'>
                                    <div class='layer'>
                                    <h3>SCHEDULE CARD</h3>
                                    </div>
                                </a>";
                            }
                        else{
                        echo "<a href='nocard.php?id=".$getid."'>
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
    
    <div id="scheduling">
        <form action='includes/docSubmitted.inc.php?id=<?php echo $getid?>' method='POST'>
            <div class="testimonials" style="padding-top:0px;margin-bottom:20px;">
                <div class="row">
                    <div class="testimonials-col"  style="width:45%;">
                        <table class="table table-bordered" style="text-align:center; ">
                            <tr>
                                <td colspan="4"><h2> SCHEDULE <br>
                                    <h4>SCHOOL YEAR: (<?php echo $syS ." - " .$syE;?>)
                                    </h4></h2>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"><b>ADMISSION FOR THIS SCHOOL YEAR</b></td>
                            </tr>
                            <tr>
                                <?php   
                                    if ( $adStart == '') {
                                        echo "<td colspan='4'>Please schedule the date.</td>";
                                    }else
                                    {
                                        echo "
                                    <td><b> FROM:</b></td>
                                    <td style='width:150px;'>". date('F jS Y', $adStart) ."</td>
                                    <td><b> TO: </b></td>
                                    <td style='width:150px;'>". date('F jS Y', $adEnd) ."</td>" ;
                                    }  
                                ?>
                            </tr>
                            <tr>
                                <td colspan="4"><b> PASSING REQUIREMENTS </b></td>
                            </tr>
                            <tr>
                                <th>Day Num: </th>
                                <th>Date: </th>
                                <th>Limit:</th>
                                <th>Scheduled:</th>
                            </tr>
                            
                            <?php
                                $rs3 = mysqli_query($conn,"SELECT * FROM t_reqpassing WHERE sched_id='$syId'");
                                while($arr = mysqli_fetch_array($rs3))
                                {
                                    $dayDate = strtotime($arr[3]);
                                echo"
                            <tr>
                                
                                <td>". $arr[2] ."</td>
                                <td>". date('F jS Y', $dayDate)."</td>
                                <td>". $arr[4] ."</td>";
                                
                            $countApp = mysqli_query($conn,"SELECT count('1') FROM t_docinitialverify WHERE s_Day = '". $arr[2] ."'");
                            while($count = mysqli_fetch_array($countApp))
                            { echo "<td>". $count[0] ."</td>"; } 
                                
                            echo"</tr>";
                            } 
                            ?>
                            
                            <tr>
                                <td colspan='4'></td>
                            </tr>
                            <tr>
                                <td colspan='4'><b>ENTRANCE EXAM: </b></td>
                            </tr>
                            <tr>
                                <th>Campus:</th>
                                <th>Day Num:</th>
                                <th>Date:</th>
                                <th>Limit/Scheduled</th>
                            </tr>
                            <?php

                                $rs3 = mysqli_query($conn,"SELECT * FROM t_ursatday WHERE sched_id='$syId'");
                                while($arr = mysqli_fetch_array($rs3))
                                {
                                    $dayDateURSAT = strtotime($arr[5]);
                                
                                echo"
                            <tr>
                                <td>". $arr[3]."</td>
                                <td>". $arr[4]."</td>
                                <td>". date('F jS Y', $dayDateURSAT)."</td>
                                <td>". $arr[2]."/";
                        
                                $countApp = mysqli_query($conn,"SELECT count('1') FROM t_dochardcopy WHERE s_eDay = '". $arr[4] ."'");
                                while($hccount = mysqli_fetch_array($countApp))
                                { 
                                    echo $hccount[0] ."</td>"; 
                                } 
                                    

                            echo"</tr>";
                            } 
                            ?>
                            <tr>
                                <th>Course:</th>
                                <th>Room No. & Name:</th>
                                <th>Time:</th>
                                <th>Assigned/Limit:</th>
                            </tr>
                            <?php
                                $rs4 = mysqli_query($conn,"SELECT * FROM t_ursatroom WHERE sched_id='$syId'");
                                while($ar = mysqli_fetch_array($rs4))
                                {
                            echo"
                            <tr>                    
                                <td><b>". $ar[2] ."</b> <br>". $ar[3]."</td>
                                <td>". $ar[4] ." = ".$ar[5]."</td>
                                <td>". $ar[6]."</td>";
                            

                                $countApp = mysqli_query($conn,"SELECT count('1') FROM t_ursatroom WHERE dayNum='".$ar[2]."' AND rRName = '". $ar[5] ."'");
                                while($rcount = mysqli_fetch_array($countApp))
                                { echo "<td>".$rcount[0] ." / "; } 
                                
                                $r=mysqli_query($conn,"SELECT eLimit FROM t_ursatday WHERE eDayNum='".$ar[2]."'");
                                $rm=  mysqli_fetch_assoc($r);
                                $room= $rm['eLimit']; 
                                $countApp = mysqli_query($conn,"SELECT count('1') FROM t_ursatroom WHERE dayNum='".$ar[2]."'");
                                while($rcount = mysqli_fetch_array($countApp))
                                {   $rm = $room/$rcount[0];
                                    echo  $rm."</td>"; 
                                
                                }
                                echo"</tr>";
                            } 
                            ?>
                            <tr>
                                    <td colspan="4"><b>URSAT</b></td>
                            </tr>
                            <tr>
                                <td colspan="2">Issuance of Result</td>
                                <?php 
                                if ( $resultdate == ''){
                                    echo "<td colspan='2'>Issuance not yet scheduled.</td>";
                                }else
                                {
                                    echo "<td colspan='2'>". date('F jS Y', $resultdate)."</td>";
                                }
                                ?> 
                            </tr>
                        </table>
                    </div>

                    <input type="hidden" id="sched" name="sched">

                    <div class="testimonials-col" style="width:55%;">
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="2">APPLICANT NUMBER:</td>
                                <td><b><input type="text" style="text-align:center;background-color:transparent; border:none;" value="<?php echo $getid ?>"></b></td>
                            </tr>

                            <tr>
                                <td colspan="2">APPLICANT STATUS: </td>
                                <td><b><input type="text" style="text-align:center;background-color:transparent; border:none;" value="<?php echo $stval ?>"></b></td>
                            </tr>

                            <tr>
                                <td  colspan="3" >
                                    Please Check which <?php echo"<a href='viewdoc.php?id=".$getid."'> initial documents</a>"?> was submitted by the applicant.
                                </td>
                            </tr>

                            <!-- initial requirements -->
                            <div id="verify">
                            
                            <tr>
                                <td colspan="3"><b> INITIAL REQUIREMENTS SUBMITTED</b> </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    1. <input type="checkbox" id="pic" name="doc[]" value="Photo">
                                    Photo (2x2)<br>
                                    2. <input type="checkbox" id="goodMoral" name="doc[]" value="Good Moral">
                                    Good Moral<br>
                                </td>
                                <td>
                                    3. <input type="checkbox" id="bc" name="doc[]" value="Birth Certificate">
                                    Birth Certificate <br>
                                    4. <input type="checkbox" id="f138" name="doc[]" value="Form 138">
                                    FORM 138<br>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="3" style="text-align:center;"><input type="checkbox" onClick="toggle(this)"><b> Check All </b> </td>
                            </tr>

                            <tr>
                                <td  colspan="3" >
                                    If all inital documents are <b> complete and verified. </b> Schedule passing of hard copy of all the requirements.
                                </td>
                            </tr>

                            <tr>
                                <td>CAMPUS TO PASS REQUIREMENTS:</td>
                                <td  colspan="2">
                                    <select name="reqCampusPassing" id="reqCampusPassing" class="form-control">
                                        <option value="BINANGONAN CAMPUS">BINANGONAN CAMPUS</option>
                                        <option value="ANGONO CAMPUS">ANGONO CAMPUS</option>
                                        <option value="ANTIPOLO CAMPUS">ANTIPOLO CAMPUS</option>
                                        <option value="CAINTA CAMPUS">CAINTA CAMPUS</option>
                                        <option value="CARDONA CAMPUS">CARDONA CAMPUS</option>
                                        <option value="MORONG CAMPUS">MORONG CAMPUS</option>
                                        <option value="PILILLA CAMPUS">PILILLA CAMPUS</option>
                                        <option value="RODRIGUEZ CAMPUS">RODRIGUEZ CAMPUS</option>
                                        <option value="TANAY CAMPUS">TANAY CAMPUS</option>
                                        <option value="TAYTAY CAMPUS">TAYTAY CAMPUS</option>
                                    </select>                        
                                </td>
                            </tr>

                            <tr>
                                <td>DAY ASSIGNED:</td>
                                <td  colspan="2">
                                    <select name="dayAssigned" id="dayAssigned"  class="form-control">
                                        <?php
                                        $rs4 = mysqli_query($conn,"SELECT * FROM t_reqpassing WHERE sched_id='$syId'");
                                        while($arr = mysqli_fetch_array($rs4))
                                        {
                                            echo "<option value=".$arr[2].">".$arr[2]."</option>";            
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="3">
                                    <input type="submit" name="scVerified" style="float:right;" class="hero-btn red-btn" value="Verified"> 
                                    <input type="submit" name="scNotVerified"  id="btn" class="hero-btn red-btn" value="Not Verified"> 
                                </td>
                            </tr>

                            </div>
                            <div id="hc">
                            <!-- checking hard copy --> 
                            <tr>
                                <td  colspan="3" >
                                    Check the box if <b>HARD COPY</b> of document is present.
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    1. <input type="checkbox" id="hcpic" name="hc[]" value="Photo">
                                    3 Photo (2x2)<br>
                                    2. <input type="checkbox" id="hcgoodMoral" name="hc[]" value="GoodMoral">
                                    Good Moral<br>
                                </td>
                                <td>
                                    3. <input type="checkbox" id="hcbc" name="hc[]" value="BirthCertificate">
                                    Birth Certificate <br>
                                    4. <input type="checkbox" id="hcf138" name="hc[]" value="Form138">
                                    FORM 138<br>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="3" style="text-align:center;"><input type="checkbox" onClick="toggle2(this)"><b> Check All </b> </td>
                            </tr>

                            <tr>
                                <td  colspan="3" >
                                    If all documents are complete. Schedule applicant for <b>URSAT</b>.
                                </td>
                            </tr>

                            <tr>
                                <td>URS CAMPUS TESTING CENTER</td>
                                <td  colspan="2">
                                    <select name="campusTestingCenter" id="campusTestingCenter" class="form-control">
                                        <option value="BINANGONAN CAMPUS">BINANGONAN CAMPUS</option>
                                        <option value="ANGONO CAMPUS">ANGONO CAMPUS</option>
                                        <option value="ANTIPOLO CAMPUS">ANTIPOLO CAMPUS</option>
                                        <option value="CAINTA CAMPUS">CAINTA CAMPUS</option>
                                        <option value="CARDONA CAMPUS">CARDONA CAMPUS</option>
                                        <option value="MORONG CAMPUS">MORONG CAMPUS</option>
                                        <option value="PILILLA CAMPUS">PILILLA CAMPUS</option>
                                        <option value="RODRIGUEZ CAMPUS">RODRIGUEZ CAMPUS</option>
                                        <option value="TANAY CAMPUS">TANAY CAMPUS</option>
                                        <option value="TAYTAY CAMPUS">TAYTAY CAMPUS</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>DAY ASSIGNED:</td>
                                <td  colspan="2">
                                    <select name="eDayAssigned" id="eDayAssigned"  class="form-control">
                                        <?php
                                        $rs4 = mysqli_query($conn,"SELECT * FROM t_ursatday WHERE sched_id='$syId'");
                                        while($arr = mysqli_fetch_array($rs4))
                                        {
                                            echo "<option value=".$arr[4].">". $arr[4]."</option>";            
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>ROOM ASSIGNED:</td>
                                <td  colspan="2">
                                    <select name="eRoomAssigned" id="eRoomAssigned"  class="form-control">
                                        <?php
                                        $rs4 = mysqli_query($conn,"SELECT * FROM t_ursatroom WHERE sched_id='$syId'");
                                        while($arr = mysqli_fetch_array($rs4))
                                        {
                                            echo "<option value=".$arr[4].">". $arr[4]."</option>";            
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="3">
                                    <input type="submit" name="hcComplete" style="float:right;" class="hero-btn red-btn" value="Schedule for URSAT"> 
                                    <input type="submit" name="hcIncomplete"  id="btn" class="hero-btn red-btn" value="Incomplete Requirements"> 
                                </td>
                            </tr>
                            </div>
                        </table>
                    </div>
                </div> 
            </div>
        </form>
    </div>

    <div class="adreport" style="margin-top:3%;">
        <table class="table table-bordered"  style="background-color: #fff;">
            <tr>
                <td colspan="2" style="width:3%;"><br>
                    <center>
                        <img src="images/urslogo.png" width="10%" style="margin-right:180px"><img src="images/ursgiants.png" width="10%"  style="margin-left:100px"> 
                            <div class="imageintro" style="margin-top: 5px;">
                            <font style="font-family:Arial Black; font-size:18px;">
                                UNIVERSITY OF RIZAL SYSTEM
                            </font>
                            <br>Province of Rizal <br>
                            Website: <a href="www.urs.edu.ph">www.urs.edu.ph</a><br><br>
                            </div>
                        
                    </center>

                    <center>
                        <font style="font-size:28px;">
                        URS APPLICATION FORM FOR <br> COLLEGE ADMISSION<br> 
                        </font>
                        (02) 8899-67-48
                        1st Semester, SY <?php echo $syS ." - " .$syE;?>
                        <br><br>
                    </center>
                </td>
                <td colspan="2" width="4%" style="font-size:10px">
                    <table class="table table-bordered form" >
                        <tr>
                            <td  colspan="3" >
                                To be filled out only by the Admission Officer or Authorized Personnel to receive or 
                                process application. <br>
                            </td>
                            
                        </tr>

                        <tr>
                            <td colspan="2">APPLICANT NUMBER: </td>
                            <td><b><?php echo $getid ?></b></td>
                        </tr>

                        <tr>
                            <td colspan="3">URS CAMPUS TESTING CENTER</td>
                        </tr>
                        <tr>
                            <td>
                                1 <input type="checkbox" id="vehicle1" name="vehicle1" >
                                Angono<br>
                                2 <input type="checkbox" id="vehicle2" name="vehicle2"  >
                                Antipolo<br>
                                3 <input type="checkbox" id="vehicle3" name="vehicle3" checked>
                                Binangonan
                            </td>
                            <td>
                                4 <input type="checkbox" id="vehicle1" name="vehicle1" >
                                Cainta<br>
                                5 <input type="checkbox" id="vehicle2" name="vehicle2" >
                                Cardona<br>
                                6 <input type="checkbox" id="vehicle3" name="vehicle3" >
                                Morong
                            </td>
                            <td>
                                7 <input type="checkbox" id="vehicle1" name="vehicle1" >
                                Pililla<br>
                                8 <input type="checkbox" id="vehicle2" name="vehicle2" >
                                Rodriguez<br>
                                9 <input type="checkbox" id="vehicle3" name="vehicle3" >
                                Tanay<br>
                                10 <input type="checkbox" id="vehicle3" name="vehicle3" >
                                Taytay
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">DOCUMENTS/REQUIREMENTS SUBMITTED</td>
                        </tr>
                        <tr>
                            <?php 
                                if ($stval == 'Complete') {
                                    echo '<td>
                                        1 <input type="checkbox" id="pic" name="vehicle1" checked>
                                        3 Photos (2x2)<br>
                                        2 <input type="checkbox" id="138" name="vehicle2" checked>
                                        Form 138<br>
                                        3 <input type="checkbox" id="vehicle3" name="vehicle3" >
                                        CEDP Certificate
                                    </td>
                                    <td>
                                        4 <input type="checkbox" id="vehicle1" name="vehicle1" >
                                        PEPT<br>
                                        5 <input type="checkbox" id="gm" name="vehicle2" checked>
                                        Good Moral<br>
                                        6 <input type="checkbox" id="vehicle3" name="vehicle3" >
                                        TOR
                                    </td>
                                    <td>
                                        7 <input type="checkbox" id="vehicle1" name="vehicle1" >
                                        Testing Fee<br>
                                        8 <input type="checkbox" id="vehicle2" name="vehicle2" >
                                        Honorable Dismissal<br>
                                        9 <input type="checkbox" id="vehicle3" name="vehicle3" >
                                        Birth Certificate<br>
                                        10 <input type="checkbox" id="bc" name="vehicle3" checked>
                                        Passport
                                    </td>';
                                }
                                else{
                                echo ' <td>
                                    1 <input type="checkbox" id="pic" name="vehicle1" >
                                    3 Photos (2x2)<br>
                                    2 <input type="checkbox" id="138" name="vehicle2" >
                                    Form 138<br>
                                    3 <input type="checkbox" id="vehicle3" name="vehicle3" >
                                    CEDP Certificate
                                </td>
                                <td>
                                    4 <input type="checkbox" id="vehicle1" name="vehicle1" >
                                    PEPT<br>
                                    5 <input type="checkbox" id="gm" name="vehicle2" >
                                    Good Moral<br>
                                    6 <input type="checkbox" id="vehicle3" name="vehicle3" >
                                    TOR
                                </td>
                                <td>
                                    7 <input type="checkbox" id="vehicle1" name="vehicle1" >
                                    Testing Fee<br>
                                    8 <input type="checkbox" id="vehicle2" name="vehicle2" >
                                    Honorable Dismissal<br>
                                    9 <input type="checkbox" id="vehicle3" name="vehicle3" >
                                    Birth Certificate<br>
                                    10 <input type="checkbox" id="bc" name="vehicle3" >
                                    Passport
                                </td>';
                                }
                            ?>
                        </tr>
                        <tr>
                            <td>L.R.N. :</td>
                            <td colspan="2"><b><?php echo $row[2]?></b></td>
                        </tr>
                        <tr>
                            <td>Initially Verified by: <b><?php echo $verifiedby; ?></b></td>
                            <td colspan="2">Hard Copy Received by: <b><?php echo $updatedby; ?></b></td>
                        </tr>
                    </table>  
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
                            $result1 = mysqli_query($conn,"SELECT * FROM t_userdoc where s_id='".$getid."'");
                        
                            while($row1 = mysqli_fetch_array($result1)){                  
                            $picsrc=$picfile_path.$row1['s_pic'];
                                echo "<img src='$picsrc.' class='img-thumbnail' width='180px' style='height:180px;'>";
                                echo"<div>";
                            }
                    
                            $resdata = mysqli_query($conn,"SELECT * FROM t_user_data WHERE s_id='".$getid."'");                              
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
                <td>2. GENDER:</td>
                <td> <b><?php echo $row[6] ?></b></td>
                <td><?php echo '3. RELIGION: <b>'.  $row[7] ?></b> </td>
            </tr>

            <tr>
                <td>4. DATE OF BIRTH:  </td>
                <td> <b><?php echo $rowdata[2] ?> </b></td>
                <td>AGE: 
                    <b><?php echo $row[9] ?> </b>
                </td>
                <td>CIVIL STATUS: 
                    <b><?php echo $row[10] ?> </b>
                </td>
            </tr>
            
            <?php
                }
            ?>
                            
            <tr>
                <td  colspan="2">5. PLACE OF BIRTH:
                <td  colspan="2"><b><?php echo $row[11] ?></b></td>
            </tr>
            
            <tr>
                <td>6. CITIZENSHIP 
                <td><b><?php echo $row[12] ?></td>
                <td> SPECIFIC CITIZENSHIP<br>(for dual/foreign): 
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
                    
                    <br><br>
                    <?php
                        $picfile_path ='adminsig/';
                        $result1 = mysqli_query($conn,"SELECT * FROM t_admin where ad_name='".$intby."'");
                            
                        while($row1 = mysqli_fetch_array($result1)){                  
                            $picsrc=$picfile_path.$row1['ad_sig'];
                            echo "<img src='$picsrc.' class='img-thumbnail' style='width:200px;'>";
                        }
                    ?>
                    <input type="text" style="text-align: center;width:100%; border:none; border-bottom:1px solid #000;" value="<?php echo $intby?>" placeholder="No Interview Rating" disabled>
                    
                    <i>Name of Interviewer Over Signature</i>
                    </center>
                </td>
            </tr>

            <tr>
                <td>HIGH SCHOOL NAME: <br> (do not abbreviate) </td>
                <td> <b><?php echo $row[14]  ?></b> </td>
                <td>EXPECTED MONTH/YEAR OF COMPLETION: <b><?php echo $row[16]  ?></b> </td>
            </tr>
            
            <tr>
                <td>HIGH SCHOOL ADDRESS:</td>
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
                <td>NAME OF PARENT EMPLOYED BY URS:</td>
                <td><?php echo $row[27] ?></td>
                <td>OFFICIAL DESIGNATION:</td>
                <td><?php echo $row[29] ?></td>
            </tr>  
            
            <tr>
                <td>COLLEGE/OFFICE WHERE EMPLOYED:</td>
                <td><?php echo $row[28] ?></td>
                <td>PARENT TELEPHONE NO:</td>
                <td colspan="3"><?php echo $row[30] ?>
                </td>
            </tr>

            <tr>
                <td>10. PERMANENT ADDRESS</td>

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
                
                $parentdata = mysqli_query($conn,"SELECT * FROM t_userparentinfo WHERE s_id='".$getid."'");                              
                while($rowpdata = mysqli_fetch_array($parentdata)){
                    
            ?>

            <tr>
                <td colspan="4">
                    <table class="table table-bordered">
                            <tr>
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
                                <td><?php echo $rowpdata[2]. ' ' . $rowpdata[3] . ' ' . $rowpdata[4] ?></td>
                                <td><?php echo $rowpdata[5] ?></td>
                                <td><?php echo $rowpdata[6] ?></td>
                                <td><?php echo $rowpdata[7] ?></td>
                                <td><?php echo $rowpdata[8] ?></td>
                                <td><?php echo $rowpdata[9] ?></td>
                                
                            </tr>
                            <tr>
                                <td><b><?php echo "MOTHER"; ?></b></td>
                                <td><?php echo $rowpdata[10] . ' ' . $rowpdata[11] . ' ' . $rowpdata[12] ?></td>
                                <td><?php echo $rowpdata[13] ?></td>
                                <td><?php echo $rowpdata[14] ?></td>
                                <td><?php echo $rowpdata[15] ?></td>
                                <td><?php echo $rowpdata[16] ?></td>
                                <td><?php echo $rowpdata[17] ?></td>
                            </tr>
                            
                            <tr>
                                <td><b><?php echo "LEGAL GUARDIAN"; ?></b></td>
                                <td><?php echo $rowpdata[18] . ' ' . $rowpdata[19] . ' ' . $rowpdata[20] ?></td>
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
                            $result2 = mysqli_query($conn,"SELECT * FROM t_userdoc where s_id='".$getid."'");
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
        <?php
            }
        ?>
    </div>

</body>
<script src="js/admin.js"></script>
</html>
