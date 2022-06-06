<?php
    include 'includes/admin.inc.php';
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
            function printpage()
            {
            var printButton = document.getElementById("print");
            printButton.style.visibility = 'hidden';
            window.print()
             printButton.style.visibility = 'visible';
             }
        </script>

        <style>

            td .adstat{
                color: #000;
                padding: 0.3rem 1rem; 
                border-radius: 0.2rem;
                text-decoration:none;
            }
        </style>
    </head>

    <body class="container">
        <div class="">
        <img src="images/urslogo.png" alt="" style="width:60px; margin-top:0px; margin: 10px; float:left;">
        <img src="images/ursgiants.png" alt="" style="width:60px; margin-top:0px; margin: 10px; float:right;">
        <h1 style="text-align:center;">Interview List (<?php echo $syS ." - ". $syE ?>) </h1>
        <h3>STATUS: <input type="text" id="searchtb" name="searchtb" style="width:200px; padding:5px; text-align:center;border:none; border-bottom:1px solid #000;" placeholder="All Applicants"></h3>

        <form id="ar" action="ar.php" method="post">
            <table class="content-table" id="tblData">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>COLLEGE</th>
                        <th>GRADE</th>
                        <th>STATUS</th>
                    <tr>
                </thead>
                <tbody style="text-align:left;">
                    <?php
                        $rs1 = mysqli_query($con,"SELECT * FROM t_usermark");
                        while($ar = mysqli_fetch_array($rs1))
                        {

                            $q=mysqli_query($con,"SELECT s_stat FROM t_status where s_id='".$ar[0]."'");
                            $n=  mysqli_fetch_assoc($q);
                            $status= $n['s_stat'];

                        echo "
                        <tr>
                            <td>" . $ar[0] . "</td>
                            <td>" . $ar[1] . "</td>
                            <td>" . $ar[2] . "</td>
                            <td>" . $ar[3] . "</td>
                            ";
                            
                            if ($status == 'Complete' || $status == 'Passed') {
                                echo "<td style='text-align:center;'><a class='adstat' style='background-color:#90EE90;'>" . $status . "</a></td>";
                            }else{
                                echo "<td style='text-align:center;'><a class='adstat' style='background-color:#E9967A;'>" . $status . "</a></td>";
                            }
                            echo"
                        </tr>";

                        } 
                    ?>
                        
                </tbody>
            </table>
            <br><br>
            <input type="button" id="print" style="float:right; margin-bottom:30px;"class="hero-btn red-btn" value="PRINT" onclick="printpage();">
            <a href="admin.php" style="float:left; margin-bottom:30px;" class="hero-btn red-btn">BACK</a>
  
        </form>
        
       </div>
    </body>
</html>