<?php
    include 'includes/admin.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>URS | Staff </title>
        <link rel="icon" type="image/png" sizes="32x30" href="./images/urslogo.png">
        <link type="text/css" rel="stylesheet" href="css/astyle.css"></link>
        <link type="text/css" rel="stylesheet" href="css/settings.css"></link>

        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!--autosearch--> 
        <link href="css/css.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="jquery/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="jquery/jquery-ui-1.8.2.custom.min.js"></script> 

        <!-- for search tab -->
        <script>
            $(document).ready(function(){
                $("#search-box").keyup(function(){
                    $.ajax({
                    type: "POST",
                    url: "readID.php",
                    data:'keyword='+$(this).val(),
                    beforeSend: function(){
                        $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                    },
                    success: function(data){
                        $("#suggesstion-box").show();
                        $("#suggesstion-box").html(data);
                        $("#search-box").css("background","#FFF");
                    }
                    });
                });
            });

            function selectid(val){
                $("#search-box").val(val);
                $("#suggesstion-box").hide();
            }
        </script>
            
        <script> 
            $(document).ready(function(){
                $('#searchtb').keyup(function(){
                    searchTable($(this).val());
                });
            });

            function searchTable(inputVal){
                var table = $('#tblData');
                table.find('tr').each(function(index, row){
                    var allCells = $(row).find('td');
                    if(allCells.length > 0){
                        var found = false;
                        allCells.each(function(index, td){
                            var regExp = new RegExp(inputVal, 'i');
                            if(regExp.test($(td).text())){
                                found = true;
                                return false;
                            }
                        });

                        if(found == true)$(row).show();
                            else $(row).hide();
                    }
                });
            }
        </script> 

        <script type="text/javascript"> 

            $(function() {

            $("#searchapp").autocomplete({
            source: "global_search.php",
            minLength: 2,
            select: function(event, ui) {
            var getUrl = ui.item.id;
            if(getUrl != '#') {
                
                var kk = $("#searchapp").val();
                $.ajax({
                    type : "GET",
                cache : false,
                url : "admin.php",
                data : {
                    srchk1 : kk
                },
                success : function(response) {
                // alert(response);
                $("#searchappname").val(response);
                }
            });
                        
            }
            },

            html: true, 
            //    showname showomr submitmarks

            });

            });
        </script>

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
    </head>

    <body class="container" style="background-image: linear-gradient(rgba(4,9,20,0.7), rgba(4,9,20,0.7)), url('images/banner.jpeg');">
        <?php include 'includes/adminsession.inc.php'; ?>
        <br><br>
        <nav>
            <div class="overlay"></div>
            <a href="admin.php"><img src="images/ourss.png" alt="" style="width:200px;"></a>
            
            <div class="action">
                <div class="profile" onclick="menuToggle();">
                    <img src="images/aduser.png" alt="">
                </div>
                <div class="menu">
                    <h3> WELCOME, <?php echo $adname; ?> ! <br>
                        <span>Registrar Officer</span>
                    </h3>
                    <ul>
                        <li><img src="images/user.png" alt=""><a href="#" onclick="document.getElementById('id01').style.display='block'">My Profile</a></li>
                        <li><img src="images/edit.png" alt=""><a href="#" onclick="document.getElementById('id02').style.display='block'">Edit Profile</a></li>
                        <li><img src="images/inbox.png" alt=""><a href="#" onclick="document.getElementById('id03').style.display='block'">Send Message</a></li>
                        <li><img src="images/help.png" alt=""><a href="#" onclick="document.getElementById('id05').style.display='block'">Help</a></li>
                        <li><img src="images/logout.png" alt=""><a href='includes/adlogout.inc.php'>Logout</a></li>
                    </ul>
                    
                </div>
            </div>
                <br><br>
            <br><br>
            <div class="nav-links">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="nav-item active"><a  class="nav-link" data-toggle="tab" href="#viewapp">View Applications 
                    <i style='color: #000;' class='fa fa-users'></i></a></li>
                    <li class="nav-item"><a class="nav-link"  data-toggle="tab" href="#adsched">Schedule 
                    <i style='color: #000;' class='fa fa-calendar'></i></a></li>
                    <li class="nav-item"><a class="nav-link"  data-toggle="tab" href="#adreport">Reports 
                    <i style='color: #000;' class='fa fa-file-text'></i></a></li>

                    <li style="float:right;"><input type="text" id="searchtb" name="searchtb" class="form-control" placeholder="Search Name or Status"></li>
                </ul>
            </div>
        </nav>
    
        <div id="id01" class="modal">
            <form class="modal-content animate" action="admin.php" method="post">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <img src="images/aduser.png" alt="" class="avatar">
                    <h3 style="color:#000">Profile</h3>
                </div>

                <div class="">
                    Name:
                    <b style="float:right;"><?php echo $adname?></b><br><br>
                    Employee Number: 
                    <b style="float:right;"><?php echo $adid?></b><br><br>
                    Userlevel:
                    <b style="float:right;"><?php echo $adul?></b><br><br>
                    Email: 
                    <b style="float:right;"><?php echo $ademl?></b><br><br>
                    <hr>
                    <label>Username: </label>
                    <b style="float:right;"><?php echo $aduid?></b><br>
                    <br>
                    <label>Signature: </label>
                    <b style="float:right;">
                        <?php
                            $picfile_path ='adminsig/';
                            $result1 = mysqli_query($con,"SELECT * FROM t_admin where ad_id='".$adid."'");
                               
                            if ($result1) {
                                $q1=mysqli_query($con,"SELECT ad_sig FROM t_admin where ad_id='".$adid."'");
                                $n1=  mysqli_fetch_assoc($q1);
                                $adminSig= $n1['ad_sig'];
                                if ($adminSig == "") {
                                    echo "None";
                                }else{
                                    while($row1 = mysqli_fetch_array($result1)){                  
                                        $picsrc = $picfile_path.$row1['ad_sig'];
                                        echo "<img src='$picsrc.' class='img-thumbnail' style='width:80px;'>";
                                    }
                                }
                            }
                        ?>
                    </b><br><br><br>

                </div>
            
            </form>
        </div>
        
        <div id="id02" class="modal">
            <form class="modal-content animate" name="frmChange" action="" method="post" onSubmit="return validatePassword()">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                    
                    <img src="images/aduser.png" alt="" class="avatar">
                    <h3 style="color:#000">Edit Profile</h3>
                </div>
                <div class="message">
                    <?php 
                    if(isset($message)) {
                        echo "<script>alert('" .$message."');
                        window.location.replace('admin.php');
                        </script>";
                    } 
                    ?>
                </div>
                <div class="">
                    Name: 
                    <b style="float:right;"><?php echo $adname?></b><br>

                    Employee Number: 
                    <b style="float:right;"><?php echo $adid?></b><br>

                    Userlevel: 
                    <b style="float:right;"><?php echo $adul?></b><br><br>

                    <label>Username: </label>
                    <input type="text" class="form-control" value="<?php echo $aduid?>" disabled>

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
            <form class="modal-content animate" action="admin.php" method="post">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <img src="images/urslogo.png" alt="" class="avatar">
                    <h3 style="color:#000">Send Message to Applicant</h3>
                    <br>
                    <input type="text" class="form-control" name="name" placeholder="Enter Applicant Name" required><br>
                    <input type="email" class="form-control" name="email"  placeholder="Enter Applicant Email Address" required><br>
                    <input type="text" class="form-control" name="subject"  placeholder="Enter your Subject" required><br>
                    <textarea name="" class="form-control" name="message"  id="" rows="5" required placeholder="Enter Message"></textarea>
                    <input type="submit" value="Send Message">

                </div>
            
            </form>
        </div>
            
        <div id="id05" class="modal">
            <form class="modal-content animate" action="admin.php" method="post">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <img src="images/urslogo.png" alt="" class="avatar">
                    <h3 style="color:#000">How Can We Help You?</h3>
                </div>

                <div class=""><br>
                    <a href="images/status.png">Status Meaning</a><br><br>
                    <a href="images/schedprocess.png">Creating a Schedule</a><br><br>
                    <a href="images/schedapp.png">Scheduling an Applicant</a><br><br>
                    <a href="#">Rating an Applicant</a><br><br>
                    <a href="#">Creating A New Officer</a><br><br>
                    <a href="#">Generating Reports</a><br><br>
                </div>
            
            </form>
        </div>
        

        <form id="admin" action="admin.php" method="post" enctype="multipart/form-data" >
            <div class="" style="padding: 0px;">
                
                <div class="tab-content"  style="z-index:1;">
                    <div id="viewapp" class="tab-pane fade in active" style="background-color: #06304d;  padding: 10px; border-radius:3px;">
                        <div class="app">
                        
                            <table class="table" id="tblData" style="color:#fff;margin-bottom:0px;">
                                <thead>
                                    <tr>
                                        <th>APPLICANT ID</th>
                                        <th>NAME</th>
                                        <th>EMAIL ID</th>
                                        <th>SIGNUP DATE</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                    <tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        $rs1 = mysqli_query($con,"SELECT * FROM t_user_data");
                                        while($ar = mysqli_fetch_array($rs1))
                                        {
                                            $q=mysqli_query($con,"SELECT s_stat FROM t_status where s_id='".$ar[0]."'");
                                            $n=  mysqli_fetch_assoc($q);
                                            $status= $n['s_stat'];

                                            if($status == 'Archived'){
                                                echo "<tr style='display:none;'></tr>";
                                            }else{
                                            echo "
                                            <tr>";

                                            $query1=mysqli_query($con ,"SELECT * from t_user where s_id='".$ar[0]."'");
                                            $res1=mysqli_fetch_row($query1);

                                            if($res1){
                                            echo "<td><a href='viewform.php?id=".$ar[0]."'>" . $ar[0] . "</a></td>";
                                            }
                                            else{
                                            echo "<td><a href='filler.php?id=".$ar[0]."'>" . $ar[0] . "</a></td>";
                                            }
                                                                                        
                                            $q1=mysqli_query($con,"SELECT fullname FROM t_user where s_id='".$ar[0]."'");
                                            $n1=  mysqli_fetch_assoc($q1);
                                            $sfname= $n1['fullname'];

                                            echo "

                                            <td style='font-size:14px; width:300px' >" . $sfname ." (".$ar[3].")</td>
                                            <td style='font-size:13px;'>" . $ar[4] . "</td>
                                            <td style='font-size:13px;'>" . $ar[5] . "</td>
                                            <td style='font-size:13px;'>" . $status . "</td>
                                        
                                            <td style='text-align:center;'>
                                                <a href='viewform.php?id=".$ar[0]."'>
                                                    <i style='color: #fff;margin-right:5px;' class='fa fa-eye'> </i>
                                                </a>
                                                <a href='includes/delete.inc.php?id=".$ar[0]."'>
                                                    <i  style='color: #fff;' class='fa fa-trash'></i>
                                                </a>
                                            </td>
                                        </tr>";
                                            }
                                        } 
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                      
                    <div id="adsched" class="tab-pane fade">
                        <div class="row100">
                            <ul class="nav-links nav" style="width:15%; margin-top:15px;">
                                <li class=""><a data-toggle="tab" href="#sched"><h5>Schedule</h5></a></li>
                                <li class="active"><a data-toggle="tab" href="#schedsy"><h5> School Year</h5></a></li>
                                <li><a data-toggle="tab" href="#schedad"><h5>Admission Date </h5></a></li>
                                <li><a data-toggle="tab" href="#schedreq"><h5>Hard Copy Date</h5></a></li>
                                <li><a data-toggle="tab" href="#schedursat"><h5>URSAT</h5></a></li>
                                <li><a data-toggle="tab" href="#schedursatResult"><h5>URSAT Result</h5></a></li>
                            </ul>  

                            <div class="tab-content" style="margin-left:20px;width:100%;">
                                <div id="sched" class="tab-pane fade ">
                                    <div class="" style="background-color: #06304d; width:100%; padding:30px;">
                                        <div class="row100">
                                            <div class="col">
                                                <h2> UNIVERSITY OF RIZAL SYSTEM SCHEDULE </h2>
                                                <h3>SCHOOL YEAR: (  <?php echo $syS ." - ". $syE;?> )
                                                </h3>
                                            </div>
                                            <div class="col" style="width:40%;margin-top:30px;">
                                                <table class="table table-bordered"style="color:#fff;width:30%;">
                                                    <tr>
                                                        <td colspan="6" style="text-align:center;background-color:#f33446"><b> STATUS COUNT</b></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Applied</th>
                                                        <th>Pending</th>
                                                        <th>Verified</th>
                                                        <th>Complete</th>
                                                        <th>All</th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                        <?php
                                                            $countApp = mysqli_query($con,"SELECT count('1') FROM t_status WHERE  s_stat = 'Applied'");
                                                            while($arr = mysqli_fetch_array($countApp))
                                                            {
                                                                echo $arr[0]; } ?>
                                                        </th>
                                                        <th>
                                                        <?php
                                                            $countApp = mysqli_query($con,"SELECT count('1') FROM t_status WHERE  s_stat = 'Pending'");
                                                            while($arr = mysqli_fetch_array($countApp))
                                                            {
                                                                echo $arr[0]; } ?>
                                                        </th>
                                                        <th>
                                                        <?php
                                                            $countApp = mysqli_query($con,"SELECT count('1') FROM t_status WHERE  s_stat = 'Verified'");
                                                            while($arr = mysqli_fetch_array($countApp))
                                                            {
                                                                echo $arr[0]; } ?>
                                                        </th>
                                                        <th>
                                                        <?php
                                                            $countApp = mysqli_query($con,"SELECT count('1') FROM t_status WHERE  s_stat = 'Complete'");
                                                            while($arr = mysqli_fetch_array($countApp))
                                                            {
                                                                echo $arr[0]; } ?>
                                                        </th>
                                                        <th>
                                                        <?php
                                                            $countApp = mysqli_query($con,"SELECT count('1') FROM t_user_data");
                                                            while($arr = mysqli_fetch_array($countApp))
                                                            {
                                                                echo $arr[0]; } ?>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        <table  class="content-table">
                                             
                                            <thead>   
                                                <tr>
                                                    <td colspan='4' style="text-align:center; background-color:#fff;"><h4> ADMISSION FOR THIS SCHOOL YEAR</h4></td>
                                                </tr>
                                            
                                                <tr>
                                                    <th>SCHED CODE</th>
                                                    <th>SCHOOL YEAR</th>
                                                    <th>Admission Start</th>
                                                    <th>Admission End</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            <?php
                                                    $rs3 = mysqli_query($con,"SELECT * FROM t_filling WHERE  sched_id='$syId'");
                                                    while($arr = mysqli_fetch_array($rs3))
                                                    {
                                                        $qq=mysqli_query($con,"SELECT syStart FROM t_schlyr where sched_id='".$arr[1]."'");
                                                        $nn=  mysqli_fetch_assoc($qq);
                                                        $syS= $nn['syStart'];

                                                        $e=mysqli_query($con,"SELECT syEnd FROM t_schlyr where sched_id='".$arr[1]."'");
                                                        $f=  mysqli_fetch_assoc($e);
                                                        $syE= $f['syEnd'];

                                                        $adS = strtotime($arr[2]);
                                                        $adE = strtotime($arr[3]);
                                                    echo"
                                                    <tr>
                                                    <td>".  $arr[1] ."</td>
                                                    <td>". $syS . " - " . $syE ."</td>
                                                    <td>". date('F jS Y', $adS) ."</td>
                                                    <td>". date('F jS Y', $adE) ."</td>
                                                    
                                                </tr>";
                                                } ?>

                                            </tbody>
                                        </table>
                                        <table class="content-table" style="margin-top:15px;">
                                            <thead>
                                                <tr>
                                                    <td colspan="4" style="text-align:center; background-color:#fff;"><h4>PASSING REQUIREMENTS</h4>  </td>
                                                </tr>
                                           
                                                <tr>
                                                    <th>SCHOOL YEAR</th>
                                                    <th>DAY NUMBER : </th>
                                                    <th>DATE: </th>
                                                    <th>NO. OF APPLICANTS PER DAY :</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $rs3 = mysqli_query($con,"SELECT * FROM t_reqpassing where sched_id='$syId'");
                                                while($arr = mysqli_fetch_array($rs3))
                                                {
                                                    
                                                    $qq=mysqli_query($con,"SELECT syStart FROM t_schlyr where sched_id='".$arr[1]."'");
                                                    $nn=  mysqli_fetch_assoc($qq);
                                                    $syS= $nn['syStart'];

                                                    $e=mysqli_query($con,"SELECT syEnd FROM t_schlyr where sched_id='".$arr[1]."'");
                                                    $f=  mysqli_fetch_assoc($e);
                                                    $syE= $f['syEnd'];

                                                    $dayDate = strtotime($arr[3]);
                                                echo"
                                                <tr>
                                                    <td>". $syS . " - " . $syE ."</td>
                                                    <td>". $arr[2] ."</td>
                                                    <td>". date('F jS Y', $dayDate)."</td>
                                                    <td>". $arr[4] ."</td>
                                                    
                                                </tr>";
                                                } ?>
                                            </tbody>
                                        </table>
                                        
                                        <table class="content-table" style="margin-top:15px;">
                                            <thead>
                                                <tr>
                                                    <td colspan='5' style="text-align:center; background-color:#fff;"><h4>URSAT DATES: </h4></td>
                                                </tr>
                                                <tr>
                                                    <th>SCHOOL YEAR</th>
                                                    <th>CAMPUS</th>
                                                    <th>DAY #</th>
                                                    <th>DATE</th>
                                                    <th>LIMIT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $rs3 = mysqli_query($con,"SELECT * FROM t_ursatday where sched_id='$syId'");
                                                while($arr = mysqli_fetch_array($rs3))
                                                {
                                                    $qq=mysqli_query($con,"SELECT syStart FROM t_schlyr where sched_id='".$arr[1]."'");
                                                    $nn=  mysqli_fetch_assoc($qq);
                                                    $syS= $nn['syStart'];

                                                    $e=mysqli_query($con,"SELECT syEnd FROM t_schlyr where sched_id='".$arr[1]."'");
                                                    $f=  mysqli_fetch_assoc($e);
                                                    $syE= $f['syEnd'];

                                                    $dayDateURSAT = strtotime($arr[5]);
                                                echo"
                                                <tr>
                                                    <td>". $syS . " - " . $syE ."</td>
                                                    <td>". $arr[2] ."</td>
                                                    <td>". $arr[3] ."</td>
                                                    <td>". $arr[4] ."</td>
                                                    <td>". date('F jS Y', $dayDateURSAT)."</td>
                                                </tr>"; } ?>
                                            </tbody>
                                        </table>

                                        <table class="content-table" style="margin-top:15px;">
                                         
                                            <thead>
                                                <tr>
                                                    <td colspan='6' style="text-align:center; background-color:#fff;"><h4> ENTRANCE EXAM ROOM SCHEDULE: </h4></td>
                                                </tr>
                                                <tr>
                                                    <th>SCHOOL YEAR</th>
                                                    <th>DAY NUMBER</th>
                                                    <th>COURSE</th>
                                                    <th>ROOM NUMBER:</th>
                                                    <th>ROOM NAME</th>
                                                    <th>TIME</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $rs3 = mysqli_query($con,"SELECT * FROM t_ursatroom where sched_id='$syId'");
                                                while($arr = mysqli_fetch_array($rs3))
                                                {
                                                    
                                                    $qq=mysqli_query($con,"SELECT syStart FROM t_schlyr where sched_id='".$arr[1]."'");
                                                    $nn=  mysqli_fetch_assoc($qq);
                                                    $syS= $nn['syStart'];

                                                    $e=mysqli_query($con,"SELECT syEnd FROM t_schlyr where sched_id='".$arr[1]."'");
                                                    $f=  mysqli_fetch_assoc($e);
                                                    $syE= $f['syEnd'];

                                                echo"
                                                <tr>
                                                    <td>". $syS . " - " . $syE ."</td>
                                                    <td>". $arr[2]."</td>
                                                    <td>". $arr[3] ."</td>
                                                    <td>". $arr[4] ."</td>
                                                    <td>". $arr[5] ."</td>
                                                    <td>". $arr[6] ."</td>
                                                </tr>";
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div id="schedsy" class="tab-pane fade in active">
                                    <div class="form" style="background-color: #06304d; color:#fff;  width:100%;">
                                        <h2>SCHOOL YEAR</h2>
                                        <hr>
                                        <div class="row100">
                                            <div class="col"style="width:50%">
                                                <input type="hidden" id="txtschedid"  name="txtschedid" >
                                                <div class="" style="display: flex; align-items: center; color:red">
                                                    <label style="font-size:20px;">Default School Year: </label>
                                                    
                                                    <?php
                                                        $rs3 = mysqli_query($con,"SELECT * FROM t_defaultschlyr");
                                                        while($arr = mysqli_fetch_array($rs3))
                                                        {
                                                    ?>
                                                        <input type="text" class="form-control" style="width:180px; background:none; font-size:20px; border:none; color:white; margin-left:5px;" placeholder="No SY Set" value="<?php echo $arr[2] ." - ".  $arr[3] ?>" disabled>
                                                    <?php }
                                                    ?>                                            
                                                    
                                                </div>
                                                
                                                <div class="">
                                                    SY CODE: 
                                                    <select name="schlyearcode" id="schlyearcode" class="form-control" style="width:200px; margin:5px;">
                                                    <?php
                                                        $rs3 = mysqli_query($con,"SELECT * FROM t_schlyr");
                                                        while($arr = mysqli_fetch_array($rs3)) {
                                                            echo "<option value='".$arr[0]."'>". $arr[0] . "</option>";
                                                        }
                                                    ?>
                                                    </select>
                                                    
                                                <div style="margin:1rem;">
                                                    <input type="submit" value="Edit" id="edit" name="schededit" style="margin-top: 5px;" onclick="hideBtn()">
                                                    <input type="submit" value="Delete" name="scheddelete" style="margin-top: 5px;">
                                                    <input type="submit" value="Set as SY" name="setSY" style="margin-top: 5px;margin-left: 3rem;">
                                                </div>
                                                </div>
                                                <div class="">
                                                    SCHOOL YEAR: 
                                                    <div style="display: flex; align-items: center;">
                                                        <input type="number" min="1999" name="schlyrstart" placeholder="Start" class="form-control" style="width:100px; margin:5px;" value="<?php echo $ss; ?>">
                                                            - 
                                                        <input type="number" min="2000" name="schlyrend" placeholder="End" class="form-control" style="width:100px; margin:5px;" value="<?php echo $se; ?>">
                                                        <input type="submit" value="Create" name="schedcreate" id="sc" style="margin-top: 5px;margin-left: 1rem;display:block;" >
                                                        <input type="submit" value="Update" name="schedupdate" id="su" style="margin-top: 5px;margin-left: 1rem;display:none;"  >
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="col"style="width:50%;">
                                                <div class="sy">
                                                    <table class="content-table">
                                                        <thead>
                                                            <tr>
                                                                <th>SCHOOL YEAR CODE</th>
                                                                <th>START</th>
                                                                <th>END</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $rs3 = mysqli_query($con,"SELECT * from t_schlyr");
                                                                while($arr = mysqli_fetch_array($rs3))
                                                                {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $arr[0]?></td>
                                                                <td><?php echo $arr[1]?></td>
                                                                <td><?php echo $arr[2]?></td>
                                                            </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>

                                <div id="schedad" class="tab-pane fade">
                                    <div class="form" style="background-color: #06304d; color:#fff;  width:100%;">
                                        <h3>Open Filling of Application Form On:</h3>
                                        <p style="color:red">Approximately 2 months.</p>
                                        <hr>
                                        <div class="row100">
                                            <div class="col" style="width:40%">
                                                
                                                <div class="" style="display: flex; align-items: center; color:red">
                                                    <label style="font-size:18px;">Default SY: </label>
                                                    
                                                    <?php
                                                        $rs3 = mysqli_query($con,"select * from t_defaultschlyr");
                                                        while($arr = mysqli_fetch_array($rs3))
                                                        {
                                                    ?>
                                                        <input type="text" class="form-control" style="width:180px; background:none; font-size:18px; border:none; color:white; margin-left:5px;" placeholder="No SY Set" value="<?php echo $arr[2] ." - ".  $arr[3] ?>" disabled>
                                                    <?php }
                                                    ?>                                            
                                                    
                                                </div>
                                                <div class="">
                                                    ADMISSION CODE:
                                                    <div style="display: flex; align-items: center;">
                                                        <select name="admsncode" id="admsncode"class="form-control" style="width:150px;">
                                                            <?php
                                                                $rs3 = mysqli_query($con,"SELECT * FROM t_filling");
                                                                while($arr = mysqli_fetch_array($rs3)) {
                                                                    echo "<option value='".$arr[0]."'>". $arr[0] . "</option>";
                                                                }
                                                            ?>
                                                        </select>

                                                        <input type="submit" value="Edit" name="schedFillingEdit" class="btn" style="margin: 5px; margin-left:10px;" >
                                                        <input type="submit" value="Delete" name="schedFillingDelete" class="btn" style="margin: 5px;">
                                           
                                                    </div>
                                                </div>
                                                
                                                <div class="row100"style="width:50%">
                                                    <div class="col">
                                                        START: <br>
                                                        <input type="date" name="a_fillingStart" class="form-control">            
                                                    </div>
                                                    <div class="col">
                                                        END: <br>
                                                        <input type="date" name="a_fillingEnd" class="form-control">
                                                    </div>
                                                </div>
                                               

                                                <div class="x">
                                                    <input type="submit" value="Create"  class="btn" name="schedFillingCreate"/>
                                                </div>
                                                
                                                <input type="hidden" id="txtsid"  name="txtsid" >
                                                <input type="hidden" id="txtsid1"  name="txtsid1" >
                                            </div>

                                            <div class="col" style="width:60%">
                                                <div class="sy">
                                                    <table  class="content-table">
                                                        <thead>
                                                            <tr>
                                                                <th>ADMISSION CODE </th>
                                                                <th>SY</th>
                                                                <th>START</th>
                                                                <th>END</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $rs3 = mysqli_query($con,"SELECT * from t_filling");
                                                            while($arr = mysqli_fetch_array($rs3))
                                                            {
                                                                                                                            
                                                                $adStart = strtotime($arr[2]);
                                                                $adEnd = strtotime($arr[3]);

                                                        ?>
                                                        <tr>
                                                            <td><?php echo $arr[0]?></td>
                                                            <td>
                                                                <?php 
                                                                $qq=mysqli_query($con,"SELECT syStart FROM t_schlyr where sched_id='".$arr[1]."'");
                                                                $nn=  mysqli_fetch_assoc($qq);
                                                                $syS= $nn['syStart'];

                                                                $e=mysqli_query($con,"SELECT syEnd FROM t_schlyr where sched_id='".$arr[1]."'");
                                                                $f=  mysqli_fetch_assoc($e);
                                                                $syE= $f['syEnd'];
                                                                
                                                                echo $syS . " - " . $syE ?>
                                                            </td>
                                                            <td><?php echo date ('F jS Y', $adStart); ?></td>
                                                            <td><?php echo date ('F jS Y', $adEnd);?></td>
                                                            
                                                            <?php } ?>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div id="schedreq" class="tab-pane fade">
                                    <div class="form" style="background-color: #06304d; color: #fff;  width:100%;">
                                        <h3>Passing Hard Copy of Requirements:</h3>
                                        <p style="color:red">Estimate will appear if filling is done. </p>
                                        <hr>
                                        
                                        <input type="hidden" id="txtsid"  name="txtsid" >
                                        <input type="hidden" id="txtsid1"  name="txtsid1">
                                        <div class="row100">
                                        
                                            <div class="col" style="width:40%">
                                                <div class="" style="display: flex; align-items: center; color:red">
                                                    <label style="font-size:18px;">Default SY: </label>
                                                    
                                                    <?php
                                                        $rs3 = mysqli_query($con,"select * from t_defaultschlyr");
                                                        while($arr = mysqli_fetch_array($rs3))
                                                        {
                                                    ?>
                                                        <input type="text" class="form-control" style="width:180px; background:none; font-size:18px; border:none; color:white; margin-left:5px;" placeholder="No SY Set" value="<?php echo $arr[2] ." - ".  $arr[3] ?>" disabled>
                                                    <?php }
                                                    ?>                                            
                                                    
                                                </div>
                                                <table class="table table-bordered"style="color:#fff;">
                                                    <tr>
                                                        <td colspan="6" style="text-align:center;background-color:#f33446"><b> STATUS COUNT</b></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Applied</th>
                                                        <th>Pending</th>
                                                        <th>All</th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                        <?php
                                                            $countApp = mysqli_query($con,"SELECT count('1') FROM t_status WHERE  s_stat = 'Applied'");
                                                            while($arr = mysqli_fetch_array($countApp))
                                                            {
                                                                echo $arr[0]; } ?>
                                                        </th>
                                                        <th>
                                                        <?php
                                                            $countApp = mysqli_query($con,"SELECT count('1') FROM t_status WHERE  s_stat = 'Pending'");
                                                            while($arr = mysqli_fetch_array($countApp))
                                                            {
                                                                echo $arr[0]; } ?>
                                                        </th>
                                                        <th>
                                                        <?php
                                                            $countApp = mysqli_query($con,"SELECT count('1') FROM t_user_data");
                                                            while($arr = mysqli_fetch_array($countApp))
                                                            {
                                                                echo $arr[0]; } ?>
                                                        </th>
                                                    </tr>
                                                </table>
                                 
                                                <div class="row100"style="display: flex; align-items: center; margin-top:20px;">
                                                    <select name="reqcode" id="reqcode"class="form-control" style="width:150px;margin-right:20px;">
                                                        <?php
                                                            $rs3 = mysqli_query($con,"SELECT * FROM t_reqpassing");
                                                            while($arr = mysqli_fetch_array($rs3)) {
                                                                echo "<option value='".$arr[0]."'>". $arr[0] . "</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                    <input type="submit" value="Edit" name="schedReqEdit" class="btn" style="margin: 5px;" >
                                                    <input type="submit" value="Delete" name="schedReqDelete" class="btn" style="margin: 5px;">
                                                </div>
                                                <div class="row100"  style="margin-left:-8px;">
                                                    <div  class="col" style="padding:3px;"><br>                                                
                                                        DAY NUMBER:
                                                        <select type="text" name="r_dayNum" style="width:90px;"class="form-control">
                                                                <option value="Day1">Day 1</option>
                                                                <option value="Day2">Day 2</option>
                                                                <option value="Day3">Day 3</option>
                                                                <option value="Day4">Day 4</option>
                                                                <option value="Day5">Day 5</option>
                                                                <option value="Day6">Day 6</option>
                                                                <option value="Day7">Day 7</option>
                                                                <option value="Day8">Day 8</option>
                                                                <option value="Day9">Day 9</option>
                                                        </select>
                                                    </div>
                                                    <div class="col" style="padding:5px;"><br>
                                                        DATE:
                                                        <input type="date" name="r_dDate" style="width:150px;"class="form-control">
                                                    </div>
                                                    <div class="col" style="padding:5px;"><br>
                                                        APP PER DAY:  
                                                        <input type="number" min="0" name="r_appLimit" class="form-control" style="width:90px;" placeholder="200">
                                                    </div>
                                                </div> 
                                                <input type="submit" value="Create"  class="btn" name="schedReqCreate" style="margin-left:35%">
                                               
                                            </div>

                                            <div class="col" style="width: 60%;">
                                                <div class="app">
                                                    <table  class="content-table">
                                                        <thead>   
                                                            <tr>
                                                                <td>Req #</td>
                                                                <td>SY </td>
                                                                <td>Day No.</td>
                                                                <td>Date</td>
                                                                <td># of App</td>
                                                            </tr>
                                                        </thead> 
                                                        <tbody>
                                                            <?php
                                                                $rs3 = mysqli_query($con,"SELECT * from t_reqPassing");
                                                                while($arr = mysqli_fetch_array($rs3))
                                                                {
                                                                    $reqDate = strtotime($arr[3]);
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $arr[0]?></td>
                                                                <td>
                                                                <?php 
                                                                
                                                                $qq=mysqli_query($con,"SELECT syStart FROM t_schlyr where sched_id='".$arr[1]."'");
                                                                $nn=  mysqli_fetch_assoc($qq);
                                                                $syS= $nn['syStart'];

                                                                $e=mysqli_query($con,"SELECT syEnd FROM t_schlyr where sched_id='".$arr[1]."'");
                                                                $f=  mysqli_fetch_assoc($e);
                                                                $syE= $f['syEnd'];
                                                                
                                                                echo $syS . " - " . $syE ?>
                                                        
                                                                </td>
                                                                <td><?php echo $arr[2]?></td>
                                                                <td><?php echo date ('F jS Y', $reqDate);?></td>
                                                                <td><?php echo $arr[4]?></td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div id="schedursat" class="tab-pane fade">

                                    <div class="form" style="background-color: #06304d; color:#fff; margin-left:auto; margin-right:auto; width:100%; ">
                                        <h2>SET ENTRANCE EXAM</h2>
                                        <div class="x" style="display: flex; align-items: center;">
                                            <?php
                                                $rs3 = mysqli_query($con,"select * from t_defaultschlyr");
                                                while($arr = mysqli_fetch_array($rs3))
                                                {
                                            ?>
                                            <p style=" color:white;">SY: (<?php echo $arr[2] ." - ".  $arr[3] ?>)</p>
                                            <?php }
                                            ?>      
                                        
                                        </div>
                                        <hr>

                                        <div id="examDiv">
                                            <div class="row100">
                                                <div class="col x" style="width:35%;margin-top:15px">
                                                    <table class="table table-bordered"style="color:#fff;">
                                                        <tr>
                                                            <td colspan="6" style="text-align:center;background-color:#f33446"><b> STATUS COUNT</b></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Pending</th>
                                                            <th>Verified</th>
                                                            <th>Complete</th>
                                                            <th>Total</th>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                            <?php
                                                                $countApp = mysqli_query($con,"SELECT count('1') FROM t_status WHERE  s_stat = 'Pending'");
                                                                while($arr = mysqli_fetch_array($countApp))
                                                                {
                                                                    echo $arr[0]; } ?>
                                                            </th>
                                                            <th>
                                                            <?php
                                                                $countApp = mysqli_query($con,"SELECT count('1') FROM t_status WHERE  s_stat = 'Verified'");
                                                                while($arr = mysqli_fetch_array($countApp))
                                                                {
                                                                    echo $arr[0]; } ?>
                                                            </th>
                                                            <th>
                                                            <?php
                                                                $countApp = mysqli_query($con,"SELECT count('1') FROM t_status WHERE  s_stat = 'Complete'");
                                                                while($arr = mysqli_fetch_array($countApp))
                                                                {
                                                                    echo $arr[0]; } ?>
                                                            </th>
                                                            <th>
                                                            <?php
                                                                $countApp = mysqli_query($con,"SELECT count('1') FROM t_user_data");
                                                                while($arr = mysqli_fetch_array($countApp))
                                                                {
                                                                    echo $arr[0]; } ?>
                                                            </th>
                                                        </tr>
                                                    </table>
                                                    
                                                    <input type="hidden" id="examDayAssigned"  name="examDayAssigned" >

                                                    DAY NUMBER :
                                                    <select name="ursatDay" id="ursatDay"class="form-control" style="width:200px;margin-left:35px;">
                                                            <option vaue="" disabled selected hidden>Select Code</option><?php
                                                            $rs3 = mysqli_query($con,"SELECT * FROM t_ursatday");
                                                            while($arr = mysqli_fetch_array($rs3)) {
                                                                echo "<option value='".$arr[0]."'>". $arr[0] . "</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                    ROOM NUMBER :
                                                    <select name="ursatRoom" id="ursatRoom"class="form-control" style="width:200px;margin-left:35px;">
                                                            <option vaue="" disabled selected hidden>Select Code</option><?php
                                                            $rs3 = mysqli_query($con,"SELECT * FROM t_ursatroom");
                                                            while($arr = mysqli_fetch_array($rs3)) {
                                                                echo "<option value='".$arr[0]."'>". $arr[0] . "</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                    <input type="submit" value="Edit" name="eeschededit" class="btn" style="width:100px;">
                                                    <input type="submit" value="Delete" name="eescheddelete" class="btn">
                                                    <br>
                                                    <br>
                                                </div> 
                                                <div class="col x" style="width:35%; margin:15px;">
                                                    DAY NUMBER: 
                                                    <select type="text" id="examDayNum"  name="examDayNum" class="form-control">
                                                        <option vaue="" disabled selected hidden>Select Day</option>
                                                        <option value="Day1">Day 1</option>
                                                        <option value="Day2">Day 2</option>
                                                        <option value="Day3">Day 3</option> 
                                                        <option value="Day4">Day 4</option>
                                                        <option value="Day5">Day 5</option>
                                                    <select>
                                                    DATE:
                                                    <input type="date" name="examDate" class="form-control">
                                                    
                                                    NUMBER OF URSAT TAKERS PER DAY:
                                                    <input type="number" min="0" name="examDayLimit" class="form-control" placeholder="100">
                                                    CAMPUS:
                                                    <select type="text" name="examCampus" class="form-control">
                                                        <option value="Binangonan Campus">BINANGONAN CAMPUS</option>
                                                        <option value="Angono Campus">ANGONO CAMPUS</option>
                                                        <option value="Antipolo Campus">ANTIPOLO CAMPUS</option>
                                                        <option value="Cainta Campus">CAINTA CAMPUS</option>
                                                        <option value="Cardona Campus">CARDONA CAMPUS</option>
                                                        <option value="Morong Campus">MORONG CAMPUS</option>
                                                        <option value="Pillilia Campus">PILILLA CAMPUS</option>
                                                        <option value="Rodriguez Campus">RODRIGUEZ CAMPUS</option>
                                                        <option value="Tanay Campus">TANAY CAMPUS</option>
                                                        <option value="Taytay Campus">TAYTAY CAMPUS</option>
                                                    </select>
                                                    <br>
                                                    <input type="submit" value="Create Day" name="examDayCreate" class="btn">                                                    
                                                </div>
                                                <div class="col x"  style="width: 35%;margin:15px;">
                                                    COURSE: 
                                                    <select type="text" id="examCourseRoom" name="examCourseRoom" class="form-control">
                                                        <option value="BSBA">BSBA</option>
                                                        <option value="BSA">BSA</option>
                                                        <option value="BSOA">BSOA</option>
                                                        <option value="BSIS">BSIS</option>
                                                        <option value="BSIT">BSIT</option>
                                                        <option value="ALL">ALL</option>
                                                    </select>
                                                    ROOM NUMER: 
                                                    <select type="text" id="examRoomNum"  name="examRoomNum" class="form-control">
                                                        <option value="Room1">Room 1</option>
                                                        <option value="Room2">Room 2</option>
                                                        <option value="Room3">Room 3</option>
                                                        <option value="Room4">Room 4</option>
                                                        <option value="Room5">Room 5</option>
                                                        <option value="Room6">Room 6</option>
                                                        <option value="Room7">Room 7</option>
                                                        <option value="Room8">Room 8</option>
                                                        <option value="Room9">Room 9</option>
                                                        <option value="Room10">Room 10</option>
                                                    </select>
                                                    Room NAME:
                                                    <input type="text" name="examRoomName" placeholder="e.g. Room 101" class="form-control">

                                                    TIME: 
                                                    <select type="text" id="examRoomTime" name="examRoomTime" class="form-control">
                                                        <option value="" disabled selected hidden>Time</option>
                                                        <option value="7:00AM-8:00AM">7:00 AM - 8:00 AM</option>
                                                        <option value="8:00AM-9:00AM">8:00 AM - 9:00 AM</option>
                                                        <option value="9:00AM-10:00AM ">9:00 AM - 10:00 AM </option>
                                                        <option value="10:00AM-11:00AM">10:00 AM - 11:00 AM</option>
                                                        <option value="11:00AM-12:00PM">11:00 AM - 12:00 PM</option>
                                                        <option value="12:00PM-1:00PM">12:00 PM - 1:00 PM</option>
                                                        <option value="1:00PM-2:00PM">1:00 PM - 2:00 PM</option>
                                                        <option value="2:00PM-3:00PM">2:00 PM - 3:00 PM</option>
                                                        <option value="3:00PM-4:00PM">3:00 PM - 4:00 PM</option>
                                                        <option value="4:00PM-5:00PM">4:00 PM - 5:00 PM </option>
                                                        <option value="5:00PM-6:00PM">5:00 PM - 6:00 PM </option>
                                                    </select>
                                                    <br>
                                                    <input type="submit" value="Create Room" name="examRoomCreate" class="btn">                                                    
                                                </div>
                                                  
                                            </div>
                                            <br>                           
                                            <div class="">
                                                <div class="col">
                                                    <div class="sy">
                                                        <table class="content-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>EXAM DAY CODE</th>
                                                                    <th>SCHOOL YEAR</th>
                                                                    <th>CAMPUS</th>
                                                                    <th>LIMIT</th>
                                                                    <th>DAY #</th>
                                                                    <th>DATE</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    $rs3 = mysqli_query($con,"SELECT * FROM t_ursatday");
                                                                    while($arr = mysqli_fetch_array($rs3))
                                                                    {
                                                                        $dayDateURSAT = strtotime($arr[5]);
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $arr[0]?></td>
                                                                    <td>
                                                                    <?php 
                                                                        $qq=mysqli_query($con,"SELECT syStart FROM t_schlyr where sched_id='".$arr[1]."'");
                                                                        $nn=  mysqli_fetch_assoc($qq);
                                                                        $syS= $nn['syStart'];

                                                                        $e=mysqli_query($con,"SELECT syEnd FROM t_schlyr where sched_id='".$arr[1]."'");
                                                                        $f=  mysqli_fetch_assoc($e);
                                                                        $syE= $f['syEnd'];
                                                                        
                                                                        echo $syS . " - " . $syE 
                                                                    ?>                                                        
                                                                    </td>
                                                                    <td><?php echo $arr[3]?></td>
                                                                    <td><?php echo $arr[2]?></td>
                                                                    <td><?php echo $arr[4]?></td>
                                                                    <td><?php echo date ('F jS Y', $dayDateURSAT);?></td>
                                                                
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col" style="margin-top:30px;">
                                                    <div class="sy">
                                                        <table class="content-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>EXAM ROOM CODE</th>
                                                                    <th>DAY</th>
                                                                    <th>COURSE</th>
                                                                    <th>ROOM #:</th>
                                                                    <th>ROOM NAME</th>
                                                                    <th>TIME</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>                                                 
                                                                <?php
                                                                    $rs3 = mysqli_query($con,"SELECT * FROM t_ursatroom");
                                                                    while($arr = mysqli_fetch_array($rs3))
                                                                    {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $arr[0]?></td>
                                                                    <td><?php echo $arr[2]?></td>
                                                                
                                                                    <td><?php echo $arr[3]?></td>
                                                                    <td><?php echo $arr[4]?></td>
                                                                    <td><?php echo $arr[5]?></td>
                                                                    <td><?php echo $arr[6]?></td>
                                                                </tr>
                                                                <?php } ?>
                                                                        
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="schedursatResult" class="tab-pane fade">
                                    <div class="form" style="background-color: #06304d; color:#fff;  width:100%;">
                                        <h2>URSAT ISSUANCE OF RESULT</h2>
                                        <hr>
                                        <div class="row100">
                                            <div class="col"style="width:50%">
                                                <input type="hidden" id="txtschedid"  name="txtschedid" >
                                                <div class="" style="display: flex; align-items: center; color:red">
                                                    <label style="font-size:20px;">Default School Year: </label>
                                                    
                                                    <?php
                                                        $rs3 = mysqli_query($con,"SELECT * FROM t_defaultschlyr");
                                                        while($arr = mysqli_fetch_array($rs3))
                                                        {
                                                    ?>
                                                        <input type="text" class="form-control" style="width:180px; background:none; font-size:20px; border:none; color:white; margin-left:5px;" placeholder="No SY Set" value="<?php echo $arr[2] ." - ".  $arr[3] ?>" disabled>
                                                    <?php }
                                                    ?>                                            
                                                    
                                                </div>
                                                <div class="">
                                                Result Code:
                                                    <select name="rescode" id="rescode" class="form-control" style="width:200px; margin:5px;">
                                                        <option vaue="" disabled selected hidden>Select Code</option>

                                                        <?php
                                                            $rs3 = mysqli_query($con,"SELECT * FROM t_exam_result");
                                                            while($arr = mysqli_fetch_array($rs3)) {
                                                                echo "<option value='".$arr[0]."'>". $arr[0] . "</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                    
                                                Set Issuance of URSAT Result: 
                                                    <input type="date" name="resdate" placeholder="Result" class="form-control" style="width:200px; margin:5px;" value="">
                                                </div>

                                                <div style="margin-top:20px;">
                                                    <input type="submit" value="Create" name="rescreate" class="btn" style="margin-top: 5px;">
                                                    <input type="submit" value="Edit" name="resedit" class="btn" style="margin-top: 5px;" >
                                                    <input type="submit" value="Delete" name="resdelete" class="btn" style="margin-top: 5px;">
                                                </div>
                                            </div>

                                            <div class="col"style="width:50%">
                                                <div class="sy">
                                                    <table class="content-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Sched Code</th>
                                                                <th>School Year</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $rs3 = mysqli_query($con,"SELECT * from t_exam_result");
                                                                while($arr = mysqli_fetch_array($rs3))
                                                                {
                                                                    $resDate = strtotime($arr[1]);
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $arr[0];?></td>
                                                                <td>
                                                                    <?php 
                                                                    $qq=mysqli_query($con,"SELECT syStart FROM t_schlyr where sched_id='".$arr[0]."'");
                                                                    $nn=  mysqli_fetch_assoc($qq);
                                                                    $syS= $nn['syStart'];

                                                                    $e=mysqli_query($con,"SELECT syEnd FROM t_schlyr where sched_id='".$arr[0]."'");
                                                                    $f=  mysqli_fetch_assoc($e);
                                                                    $syE= $f['syEnd'];
                                                                    
                                                                    echo $syS . " - " . $syE 
                                                                    ?>
                                                                </td>
                                                                <td><b><?php echo date ('F jS Y', $resDate);?></b></td>
                                                            </tr>
                                                            <?php  }  ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="adreport" class="tab-pane fade">
                        <div class="row100">
                            
                            <div class="col" style="width:70%; color: #fff;background-color: #06304d;  box-shadow: -3px 3px 10px #999999; border-radius:0.5rem;">
                                
                                <table class="table">
                                    <tr>
                                        <td colspan='2'><h3>Status</h3></td>
                                    </tr>
                                    <tr>
                                        <td>Status Name</td>
                                        <td>Description</td>
                                        <td>Count</td>
                                    </tr>
                                    <tr style="background-color:#00ace6">
                                        <td style="width:1%">Applied</td>
                                        <td style="width:10%">Applicants who signed up but did not fill up an application form.</td>
                                        <td style="width:1%">
                                        <?php
                                            $countApp = mysqli_query($con,"SELECT count('1') FROM t_status WHERE  s_stat = 'Applied'");
                                            while($arr = mysqli_fetch_array($countApp))
                                            { echo $arr[0]; } 
                                        ?>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#0099cc">
                                        <td>Pending</td>
                                        <td>Applicants who signed up AND filled up an application form and is waiting for verification.</td>
                                        <td> 
                                        <?php
                                            $countApp = mysqli_query($con,"SELECT count('1') FROM t_status WHERE  s_stat = 'Pending'");
                                            while($arr = mysqli_fetch_array($countApp))
                                            { echo $arr[0]; } 
                                        ?>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#0086b3">
                                        <td>Not Verified</td>
                                        <td> Applicants initial documents are not verification.</td>
                                        <td> 
                                        <?php
                                            $countApp = mysqli_query($con,"SELECT count('1') FROM t_status WHERE  s_stat = 'Not Verified'");
                                            while($arr = mysqli_fetch_array($countApp))
                                            { echo $arr[0]; } 
                                        ?>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#007399">
                                        <td>Verified</td>
                                        <td>Applicants initial documents are complete and verified.</td>
                                        <td> 
                                        <?php
                                            $countApp = mysqli_query($con,"SELECT count('1') FROM t_status WHERE  s_stat = 'Verified'");
                                            while($arr = mysqli_fetch_array($countApp))
                                            { echo $arr[0]; } 
                                        ?>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#006080">
                                        <td>Incomplete</td>
                                        <td> Applicants who brought incomplete hard copy of the verified requirements to school.</td>
                                        <td> 
                                        <?php
                                            $countApp = mysqli_query($con,"SELECT count('1') FROM t_status WHERE  s_stat = 'Incomplete'");
                                            while($arr = mysqli_fetch_array($countApp))
                                            { echo $arr[0]; } 
                                        ?>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#004c66">
                                        <td>Complete</td>
                                        <td>Applicants who who brought the verified hard copy of requirements to school complete.</td>
                                        <td> 
                                        <?php
                                            $countApp = mysqli_query($con,"SELECT count('1') FROM t_status WHERE  s_stat = 'Complete'");
                                            while($arr = mysqli_fetch_array($countApp))
                                            { echo $arr[0]; } 
                                        ?>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#00394d">
                                        <td>Archieved</td>
                                        <td>Applicants who were set archieved by the school officer.</td>
                                        <td> 
                                        <?php
                                            $countApp = mysqli_query($con,"SELECT count('1') FROM t_status WHERE  s_stat = 'Archieved'");
                                            while($arr = mysqli_fetch_array($countApp))
                                            { echo $arr[0]; } 
                                        ?>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#002633">
                                        <td>Passed</td>
                                        <td>Applicants who passed the entrance exam in URS.</td>
                                        <td> 
                                        <?php
                                            $countApp = mysqli_query($con,"SELECT count('1') FROM t_status WHERE  s_stat = 'Passed'");
                                            while($arr = mysqli_fetch_array($countApp))
                                            { echo $arr[0]; } 
                                        ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col"style="width:25%;"><br><br>
                                <a href="ar.php" style="margin:15px; width:250px;" class="hero-btn">APPLICANT RECORDS</a><br>
                                <a href="ir.php" style="margin:15px; width:250px;" class="hero-btn">INTERVIEW RECORDS</a><br>
                                <a href="arch.php" style="margin:15px; width:250px;" class="hero-btn">ARCHIEVED</a><br>
                                <a href="pass.php" style="margin:15px; width:250px;" class="hero-btn">PASSED</a>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>    
        </form>
        
    </body>
</html>