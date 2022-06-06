<?php
error_reporting(0);
session_start();

include 'includes/fileupload.inc.php';   
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Applicant | Documents</title>
        <link rel="icon" type="image/png" sizes="32x30" href="./images/urslogo.png">

        <link type="text/css" rel="stylesheet" href="css/style.css"></link>
            
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <script>
/*         function send(){
            if(document.getElementById('dec').checked){
                window.location='admsnreport.php';
                return false;
            }
            return true;
        } */
        </script>
    </head>

    <body>
        <section class="header"  style="background-image: linear-gradient(rgba(4,9,30,0.7), rgba(4,9,30,0.7)), url('images/banner.jpeg');">
            <nav>
                <a href="index.html"><img src="images/ourss.png" alt=""></a>
            </nav>        
            <form id="docup" enctype="multipart/form-data" name="docup" action="documents.php" method="post">
                <section class="doc-content">
                    <div class="row" style="margin-top:5px;">
                        <div class="doc-left">
                        <h1>Upload Your Documents</h1>
                        <h2>Declaration By The Applicant</h2>
                            <p>
                                I hereby solemnly declare that all the particulars given in this form are true to the best of my knowledge
                                and belief. I shall abide by the rules and regulations laid down by the College from time to time.
                                In case the particulars furnished by me are found false, my admission stands canceled.
                            </p>
                            <h2 style="text-align:center">
                                <input type="checkbox" class="checkbx" value="I Accept" id="dec" name="dec" required>
                                <span class="checkmark" required></span>
                            I ACCEPT
                            </h2>
                        </div>
                        <div class="doc-right">
                            <h3>Requirements</h3>
                            <div>
                                <span>Recent 2X2 ID Picture</span>
                                <span><input type="file" id="fpic" name="fpic" required> </span>
                            </div>
                            <div>
                                <span>Certificate of Good Moral</span>
                                <span><input type="file" id="fgm" name="fgm" required></span>
                            </div>
                            <div>
                                <span>PSA Birth Certificate</span>
                                <span><input type="file" id="fbc" name="fbc" required></span>
                            </div>
                            <div>
                                <span>FORM 138</span>
                                <span><input type="file" id="ff137" name="ff137" required></span>
                            </div>
                            
                            <div>
                                <span>Signature</span>
                                <span><input type="file" id="fsig" name="fsig" required></span>
                            </div>
                            <div>
                                <input type="submit" id="fpicup" name="fpicup" class="hero-btn">
                            </div>
                        </div>
                    </div>
                    
                </section>
            </form>
        </section>
        
        
    </body>
</html>
