<?php
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
        <title>URS | Passers</title>
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
        <style>
            .app{
            height: 400px;
            overflow-y: scroll;
            }
        </style>
    </head>
    <body>
    <section class="sub-header" style="background-image: linear-gradient(rgba(4,9,30,0.9), rgba(4,9,30,0.9)),url(images/facultymembers.jpg);">
        <nav>
            <a href="index.php"><img src="images/ourss.png" alt="" style="width:23%; margin-top:0px; margin: 10px; float:left;"></a>
            <a href="index.php"><img src="images/ursgiants.png" alt="" style="width:100px; margin-top:0px; margin: 10px; float:right;"></a>
        </nav>
        <br><br><br>
        <h1>Final List of Passers</h1>
        <p style="color:#fff;">The University of Rizal System is pleased to announce that the following applicants have <br><b>passed</b> the <i>University of Rizal System Binangonan Campus <b>Entrance Exam</b></i> <br>
            Academic Year <?php echo $syS ." - ". $syE;?>.
        </p>
        
    </section>

<!------about us content------------>
    <section class="about-us">
        <h1> Congratulations URSBians!</h1>

        <div class="admsn-col" id="GFG">
            <h3>List of Passers <br>
            School Year: <b><?php echo $syS ." - ". $syE  ?></h3>
            
            <input type="text" id="searchtb" name="searchtb" class="form-control" style="width:200px;margin:20px;" placeholder="Search for...">
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

        <a href="index.php" style="float:right; margin-top:30px;" class="hero-btn red-btn">BACK</a><br><br>
    </section>

<!------footer------------>
<?php
include 'footer.php'
?>