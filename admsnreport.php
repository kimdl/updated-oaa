<?php
    include 'includes/homepageuser.inc.php';
    
    $result = mysqli_query($con,"SELECT * FROM t_user WHERE s_id='".$id."'");
    while($row = mysqli_fetch_array($result))
        {
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>URS | Applicant</title>
        <link rel="icon" type="image/png" sizes="32x30" href="./images/urslogo.png">
        
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript">
            function printpage()
            {
                var printButton = document.getElementById("print");
                printButton.style.visibility = 'hidden';
                window.print()
                printButton.style.visibility = 'visible';
            }
        </script>
    </head>
    <body>
        <div class="container" style="margin-bottom:20px;">
            
            <table class="table table-bordered" >
                <tr>
                    <td colspan="2" style="width:3%;"><br>
                        <center>
                            <img src="images/urslogo.png" width="10%" style="margin-right:100px"><img src="images/ursgiants.png" width="10%"  style="margin-left:100px"> 
                                <div class="imageintro" style="margin-top: 5px;">
                                <h4 style="font-weight:600;"> UNIVERSITY OF RIZAL SYSTEM </h4>
                                Province of Rizal <br>
                                Website: <a href="www.urs.edu.ph">www.urs.edu.ph</a>
                                </div>
                            
                            <h3  style="font-weight:600;">
                            URS APPLICATION FORM <br> FOR COLLEGE ADMISSION<br> 
                            </h3>
                            (02) 8899-67-48 <br>
                            1st Semester, SY <?php echo $syS ." - " .$syE;?>
                            <br>
                            <div style="text-align:left; margin: 10px;">
                                <b> TO THE STUDENT AND PARENTS:</b><br>
                                Carefully read the instructions before filling out the application form. 
                                Print nearly all information required. Only accomplished application forms, 
                                (URS College Admission Form) will be processed.
                            </div>
                        </center>
                    </td>
                    <td colspan="2"  width="4%" style="font-size:10px">
                        <table class="table table-bordered">
                        <tr>
                            <td  colspan="3" >
                                To be filled out only by the Admission Officer or Authorized Personnel to receive or 
                                process application. <br>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">APPLICANT NUMBER: </td>
                            <td><b><?php echo $id ?></b></td>
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
                                3 <input type="checkbox" id="vehicle3" name="vehicle3">
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
                            <td>
                                1 <input type="checkbox" id="vehicle1" name="vehicle1" >
                                3 Photos (2x2)<br>
                                2 <input type="checkbox" id="vehicle2" name="vehicle2" >
                                Form 137<br>
                                3 <input type="checkbox" id="vehicle3" name="vehicle3" >
                                CEDP Certificate
                            </td>
                            <td>
                                4 <input type="checkbox" id="vehicle1" name="vehicle1" >
                                PEPT<br>
                                5 <input type="checkbox" id="vehicle2" name="vehicle2" >
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
                                10 <input type="checkbox" id="vehicle3" name="vehicle3" >
                                Passport
                            </td>
                        </tr>
                        <tr>
                            <td>L.R.N. :</td>
                            <td><b><?php echo $row[2]?></b></td>
                            <td>Received by: <b><?php echo $adnamee; ?></td>
                        </tr>
                        </table>   
                    </td>
                </tr>       
                    
                <tr>
                    <td colspan="4" style="text-align:center">APPLICANT INFORMATION</td>
                </tr>

                <tr>
                    <td  rowspan="3"> 1. NAME OF STUDENT APPLICANT: </td> <br>
                    <td colspan="2">
                        <?php echo 'Last Name: <b>'. $row[3]. '   ' ?></b>
                        <?php echo 'First Name:  <b>'. $row[4]. '   ' ?></b>
                        <?php echo 'Middle Name: <b>'. $row[5]. '   ' ?></b>
                    </td>
                    <td rowspan="4">
                        <center>
                            <?php
                                $picfile_path ='studentpic/';
                                $result1 = mysqli_query($con,"SELECT * FROM t_userdoc where s_id='".$id."'");
                            
                                while($row1 = mysqli_fetch_array($result1)){                  
                                $picsrc=$picfile_path.$row1['s_pic'];
                                    echo "<img src='$picsrc.' class='img-thumbnail' width='180px' style='height:180px;'>";
                                    echo"<div>";
                                }
                        
                                $resdata = mysqli_query($con,"SELECT * FROM t_user_data WHERE s_id='".$id."'");                              
                                while($rowdata = mysqli_fetch_array($resdata)){
                            ?>
                        </center>
                    </td>
                <tr>
                    <td>Full Name: </td> 
                    <td><b><?php echo $row[3]. ',  ' . $row[4].'  '. $row[5] ?></b></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><b><?php echo $stname;?></b></td>
                    
                </tr>
                
                <tr>
                    <td>2. GENDER: </td>
                    <td> <b><?php echo $row[6] ?></b></td>
                    <td><?php echo '3. RELIGION: <b>'.  $row[7] ?></b> </td>
                </tr>

                <tr>
                    <td>4. DATE OF BIRTH:</td>
                    <td> <b><?php echo $rowdata[2] ?> </b></td>
                    <td>AGE: <b><?php echo $row[9] ?> </b></td>
                    <td>CIVIL STATUS:<b><?php echo $row[10] ?> </b></td>
                </tr>
                
                <?php
                    }
                ?>
                                
                <tr>
                    <td  colspan="2">5. PLACE OF BIRTH: 
                    <td  colspan="2"><b><?php echo $row[11] ?></b></td>
                </tr>
                
                <tr>
                    <td>6. CITIZENSHIP </td>
                    <td><b><?php echo $row[12] ?></td>
                    <td>SPECIFIC CITIZENSHIP: </td>
                    <td><b><?php echo $row[13] ?></b></td>
                </tr>


                <tr>
                    <td colspan="3" style="text-align:center">7. HIGH SCHOOL <br>
                        (Where you complete/are completing secondary level education.)
                    </td>
                    <td rowspan="5">
                        <center>
                        <b>INTERVIEW</b> <br>
                        </center>
                        <i style="font-size: 15px;">
                        Visit the office of <br>
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
                </tr>
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
                    <td colspan="3">9. CHILD OF A URS FACULTY OR EMPLOYEE:</td>
                    <td><?php echo $row[26] ?></td>
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

                    <td>
                        NO.: <b><?php echo $row[34] ?></b><br>
                        ST: <b><?php echo $row[35] ?></b><br>
                        SUBD: <b><?php echo $row[36] ?></b><br>
                        VILLAGE: <b><?php echo $row[37] ?></b>
                    </td>
                    <td>
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
                    $parentdata = mysqli_query($con,"SELECT * FROM t_userparentinfo WHERE s_id='$id'");                              
                    while($rowpdata = mysqli_fetch_array($parentdata)){
                ?>
                <tr>
                    <td colspan="4">
                        <table class="table">
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
                                Signature
                        </center> 
                    </td>
                </tr>
            </table>

            <input type="submit" id="print" class="hero-btn red-btn" value="PRINT" onclick="printpage();"> 
            <a href="includes/logout.inc.php" style="float:right" class="hero-btn red-btn">LOGOUT</a><br>
        </div>
            
        <?php } ?>
    </body>
</html>


                     