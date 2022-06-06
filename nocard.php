<?php
    error_reporting(0);
    $getid= $_GET["id"];
    $con=mysqli_connect("localhost","root","","oas");

    if(!isset($con)){
        die("Database Not Found");
    }

    $q=mysqli_query($con,"SELECT s_name from t_user_data where s_id='".$getid."'");
    $n=  mysqli_fetch_assoc($q);
    $stname= $n['s_name'];

    $q1=mysqli_query($con,"SELECT s_lrn from t_user where s_id='".$getid."'");
    $n1=  mysqli_fetch_assoc($q1);
    $stlrn= $n1['s_lrn'];

    $q2=mysqli_query($con,"SELECT sched_id, syStart, syEnd FROM t_defaultschlyr WHERE id = '1' ");
    $n2=  mysqli_fetch_assoc($q2);
    $syId= $n2['sched_id'];
    $syS= $n2['syStart'];
    $syE= $n2['syEnd'];
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>URS</title>
        <link rel="icon" type="image/png" sizes="32x30" href="./images/urslogo.png">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="css/style.css"></link>
       
        
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
        <form id="admincard" action="adminac.php?id=<?php echo $getid ?>" method="post">
            <div class="container" style="margin-bottom:20px;width:80%;margin-top:20px;">
                <table class="table table-bordered" style="background-color: #fff380;">
                    <tr style="text-align:center">
                        <td><img src="images/urslogo.png" style="width:180px; height:180px;"></td>
                        <td><br>
                            Republic of the Philippines <br>
                            <b>UNIVERSITY OF RIZAL SYSTEM </b> <br>
                            Binangonan Campus <br>
                            <?php echo $syS ." - ". $syE ?>
                            <br><br>
                            <b>SCHEDULE CARD</b>
                        </td>
                        <td>
                            <?php
                                $picfile_path ='studentpic/';
                                $result1 = mysqli_query($con,"SELECT * FROM t_userdoc where s_id='".$getid."'");
                                    
                                while($row1 = mysqli_fetch_array($result1))
                                {                  
                                    $picsrc=$picfile_path.$row1['s_pic'];
                                    
                                    echo "<img src='$picsrc.' class='img-thumbnail' style='width:180px; height:180px;'>";
                                    echo"<div>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr style="text-align:center">
                        <td colspan="3"><b> <?php echo $syId ?></b></td>
                    </tr>
                    <tr>
                        <td><b> Applicant No.</b></td>
                        <td><b><?php echo $getid?></b></td>
                        <td>LRN: <b><?php echo $stlrn ?> </td>
                    </tr>
                    <tr>
                        <td><b> Name </b></td>
                        <?php
                        $q1=mysqli_query($con,"SELECT fullname FROM t_user where s_id='".$getid."'");
                        $n1=  mysqli_fetch_assoc($q1);
                        $sfname= $n1['fullname'];
                        ?>
                        <td><b><?php echo $sfname  ?></b></td>
                        <td>Username : <b><?php echo $stname ?></td>
                    </tr>
                    <tr>
                        <td><b> Campus: </b></td>
                        <td rowspan="3" colspan="2"><h2 style="text-align:center"><b> YOU ARE NOT YET SCHEDULED</b></h2></td>
                    </tr>
                    <tr>
                        <td><b> Date: </b></td>
                    </tr>
                    

                    <tr>
                        <td><b> Time </b></td>
                    </tr>
                </table>
                
                <?php echo "<a href='viewform.php?id=".$getid."'  class='hero-btn red-btn'>BACK</a>" ?>

            </div>
        </form>
    </body>
</html>
