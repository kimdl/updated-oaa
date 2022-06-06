<?php
  error_reporting(0);
  require 'includes/dbh.inc.php';
  require 'includes/viewform.inc.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Documents</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/astyle.css">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
    </head>
    <body  style="background-image: url('images/bg.png'); background-position: center; background-size: cover;">
        <!------documents------------>
        <form>
            <section class="campus" >
                <?php  
                    $result1 = mysqli_query($conn,"SELECT * FROM t_userdoc where s_id='$getid'");
                    while($row = mysqli_fetch_array($result1))
                    {
                    $picsrc=$picfile_path.$row['s_pic'];
                    $docsrc1=$docfile_path.$row['s_goodMoral'];
                    $docsrc2=$docfile_path.$row['s_birthCert'];
                    
                    $proofsrc1=$prooffile_path.$row['s_f137'];
                    $proofsrc2=$prooffile_path.$row['s_sigpic'];
                    } 
                ?>
                <div class="row"style="height:230px; width:100%; gap:1rem; margin-top:23%;">
                    
                    <div class="campus-col">
                        <?php echo "<a href='$docsrc1.'>
                            <img src='$docsrc1.'>
                            <div class='layer'>
                            <h3>GOOD MORAL</h3>
                            </div>
                        </a>"?>
                    </div>
                    <div class="campus-col">
                        <?php echo "<a href='$docsrc2.'>
                            <img src='$docsrc2.'>
                            <div class='layer'>
                            <h3>BIRTH CERTIFICATE</h3>
                            </div>
                        </a>"?>
                    </div>
                    <div class="campus-col">
                        <?php echo "<a href='$proofsrc1.'>
                            <img src='$proofsrc1.'>
                            <div class='layer'>
                            <h3>FORM 138</h3>
                            </div>
                        </a>"?>
                    </div>
                    <div class="campus-col">
                        <?php echo "<a href='$picsrc.'>
                            <img src='$picsrc.'>
                            <div class='layer'>
                            <h3>Recent 2x2 Image</h3>
                            </div>
                        </a>"?>
                    </div>
                    <div class="campus-col">
                        <?php echo "<a href='$proofsrc2.'>
                            <img src='$proofsrc2.'>
                            <div class='layer'>
                            <h3>SIGNATURE</h3>
                            </div>
                        </a>"?>
                    </div>

                </div>
                <?php echo "<a href='viewform.php?id=".$getid."' style='float:right; margin-bottom:25px;' class='hero-btn red-btn'>BACK</a>" ?>
            
            </section>
        </form>   
    </body>
</html>
