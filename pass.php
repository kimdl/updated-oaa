<?php
include 'includes/admin.inc.php';
$con=mysqli_connect("localhost","root","","oas");

$q2=mysqli_query($con,"SELECT sched_id, syStart, syEnd FROM t_defaultschlyr WHERE id = '1' ");
$n2=  mysqli_fetch_assoc($q2);
$syId= $n2['sched_id'];
$syS= $n2['syStart'];
$syE= $n2['syEnd'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>URS | Staff </title>
        <link rel="icon" type="image/png" sizes="32x30" href="./images/urslogo.png">

        <link type="text/css" rel="stylesheet" href="css/style.css"></link>
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
                $('#searchtb1').keyup(function(){
                    searchTable($(this).val());
                });
            });

            function searchTable(inputVal){
                var table = $('#tblData1');
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
             

        <script>
            function printDiv() {
                var divContents = document.getElementById("GFG").innerHTML;
                var a = window.open('', '', 'height=500, width=500');
                a.document.write('<html>');
                a.document.write('<body > <h1>List of Passers <br>');
                a.document.write(divContents);
                a.document.write('</body></html>');
                a.document.close();
                a.print();
            }
        </script>

        <style>
            .app{
            height: 400px;
            overflow-y: scroll;
            }
        </style>
    </head>

<body>   
    <section class="sub-header" style=" background-image: linear-gradient(rgba(4,9,20,0.8), rgba(4,9,20,0.8)),url(images/passed.png);">
        <nav>
            <a href="admin.php">
                <img src="images/urslogo.png" alt="" style="width:60px; margin-top:0px; margin: 10px; float:left;">
                <img src="images/ursgiants.png" alt="" style="width:60px; margin-top:0px; margin: 10px; float:right;">
            </a>
        </nav>
        <h1 style="margin-top: 85px;">List of Passers</h1>
        
        <div class="container">
            <i style="float:right;">Example:
            <img src="images/eg.png" style="float:right;width:270px;height:120px;" alt="">
            </i>
            <ul style="text-align:left;">
                <h4> Instructions in Uploading List:</h4>  
                <li>Make sure file you will upload is in <b>excel format. (.xlsx)</b></li>
                <li>Change the name the sheet into <i>"nameofPassers"</i>.</li>
                <li>Applicants Name should be in a row named <i>"passedName" </i><br> and course in row<i> "Course".</i></li>
            </ul>
        
            <form action="pass.php" method="POST" enctype="multipart/form-data" style="display:flex;gap:1rem;justify-content:center;">
                <input type="file" name="excel" class="hero-btn" style="width:250px;"> <br>
                <input type="submit" name="submitpassed" class="hero-btn" style="width:200px;"value="SUBMIT EXCEL">
                <input type="hidden" id="asd"  name="asd">
            </form>
        </div>
    </section>
    <div class="row">
        <div class="admsn-col">

            <h3>Default School Year: <b><?php echo $syS ." - ". $syE  ?></b></h3>
            <input type="text" id="searchtb1" name="searchtb1" class="form-control" style="width:200px; float:right;" placeholder="Search for...">
            <br><br>
            <div class="app">
                <table class="content-table" id="tblData1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>COURSE</th>
                            <th>APPLICANT ID</th>
                            <th>STATUS</th>
                        <tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            $rs1 = mysqli_query($con,"SELECT * FROM nameOfPassers");
                            while($ar = mysqli_fetch_array($rs1))
                            {
                            echo "
                            <tr>
                                <td>" . $ar[0] . "</td>";

                        
                            echo
                            "<td>" . $ar[1] . "</td>
                                <td>" . $ar[2] . "</td>";

                                if ($ar[1] != "") {

                                    $query=mysqli_query($con ,"SELECT * FROM t_user WHERE fullname='".$ar[1]."'");
                                    $res2=mysqli_fetch_row($query);
        
                                    if($res2){
        
                                        $q1 = mysqli_query($con,"SELECT s_id FROM t_user WHERE fullname='".$ar[1]."'");
                                        $n1 = mysqli_fetch_assoc($q1);
                                        $filler = $n1 ['s_id'];
        
                                        $sql1  = "UPDATE t_status SET
                                        s_stat= 'Passed'
                                        WHERE s_id='".$filler."'";
                                        
                                        mysqli_query($con, $sql1);

                                        $s=mysqli_query($con,"SELECT s_stat FROM t_status WHERE s_id='$filler'");
                                        $ss=  mysqli_fetch_assoc($s);
                                        $status= $ss['s_stat'];
                                

                                        echo "<td>" . $filler . "</td>";
            
                                        echo "<td style='text-align:center;'><a class='adstat' style='background-color:#90EE90;'>" . $status . "</a></td>";                                   

                                    }
                                    else{
                                    echo
                                    "<td></td><td style='text-align:center;'><a class='adstat' style='background-color:#E9967A;'>Not Found</a></td>";
                                    }
                                }
                                else{
                                    echo
                                    "<td><i>Something went wrong.</i></td>";
                                }
                            echo "</tr>";

                            } 
                        ?>
                            
                    </tbody>
                </table>
            </div>      
        </div>

        <div class="admsn-col" id="GFG">
            <h3>Filtered List of Passers</h3>
            <br><br>
            <div class="app">
                <table class="content-table" id="tblData">
                    <thead>
                        <tr>
                            <th>APPLICANT ID</th>
                            <th>NAME</th>
                            <th>COURSE</th>
                        <tr>
                    </thead>
                    <tbody style="text-align:left;">
                        <?php
                            $rs1 = mysqli_query($con,"SELECT * FROM t_status WHERE s_stat='Passed'");
                            while($ar = mysqli_fetch_array($rs1))
                            {
                                if ($ar[0] != "") {

                                    $query=mysqli_query($con ,"SELECT * FROM t_user WHERE s_id='".$ar[0]."'");
                                    $res2=mysqli_fetch_row($query);

                                    if($res2){
                                        $q1 = mysqli_query($con,"SELECT s_lname, s_fname, s_mname, fullname FROM t_user WHERE s_id='".$ar[0]."'");
                                        $n1 = mysqli_fetch_assoc($q1);
                                        $ln = $n1['s_lname'];
                                        $fn = $n1['s_fname'];
                                        $mn = $n1['s_mname'];
                                        $fullnm = $n1['fullname'];

                                        $q2 = mysqli_query($con,"SELECT Course FROM nameofpassers WHERE passedName='".$fullnm."'");
                                        $n2 = mysqli_fetch_assoc($q2);
                                        $s = $n2['Course'];
                                        
                                            echo "
                                            <tr>
                                            <td>" . $ar[0] . "</td>
                                            <td>" .$ln.", ". $fn ." ". $mn ."</td>
                                            <td>" .$s ."</td>
                                            </tr>";
                                    }
                                    else{
                                    echo
                                    "<td colspan='2'><i>Applicant Not Found</i></td></tr>";
                                    }
                                }
                                else{
                                    echo
                                    "<td><i>Something went wrong.</i></td></tr>";
                                }
                            } 
                        ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    <div class="container" style="display:flex;gap:1rem;justify-content:center;">
        <a href="admin.php" class="hero-btn red-btn">BACK</a>
        <input type="button" class="hero-btn red-btn" value="PRINT" onclick="printDiv()"> 
        <input type="button" class="hero-btn red-btn" name="postResult" value="POST">
    </div>

    <div style="width:300px;height:300px; margin:30px;">
        <?php
            if (isset($_REQUEST["submitpassed"])) {
                if(isset($_FILES['excel']['name'])){
                    include "includes/xlsx.php";
                    if($con){
                        $excel=SimpleXLSX::parse($_FILES['excel']['tmp_name']);
                        echo "<pre>";	
                        // print_r($excel->rows(1));
                        // print_r($excel->dimension(2));
                        // print_r($excel->sheetNames());
                        for ($sheet=0; $sheet < sizeof($excel->sheetNames()) ; $sheet++) { 
                            $rowcol=$excel->dimension($sheet);
                            $i=0;
                            
                            if($rowcol[0]!=1 &&$rowcol[1]!=1){
                                foreach ($excel->rows($sheet) as $key => $row) {
                                    //print_r($row);
                                $q="";
                                foreach ($row as $key => $cell) {
                                    //print_r($cell);echo "<br>";
                                    if($i==0){
                                        $q.=$cell. " varchar(50),";
                                    }
                                    else{
                                        $q.="'".$cell. "',";
                                    }
                                }
                                if($i==0){
                                    $query="CREATE table ".$excel->sheetName($sheet)." (".rtrim($q,",").");";
                                }
                                else{
                                    $query="INSERT INTO ".$excel->sheetName($sheet)." values (".rtrim($q,",").");";
                                }
                                echo $query;
                                if(mysqli_query($con,$query)){
                                    echo "true";
                                }
                                echo "<br>";
                                $i++;
                                }
                            }
                        }
                    }
                }
            }
        ?>
    </div>
</body>
</html>

