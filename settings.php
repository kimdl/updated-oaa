<?php

error_reporting(0);
session_start();
$con=mysqli_connect("localhost","root","","oas");
 
$adminId = $_SESSION["ad"]; 
    

if (count($_POST) > 0) {
    $result = mysqli_query($con, "SELECT * FROM t_admin WHERE ad_id='" .$adminId. "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["ad_pswd"]) {
        mysqli_query($con, "UPDATE t_admin SET ad_pswd='" . $_POST["newPassword"] . "' WHERE ad_id='" . $adminId . "'");
        $message = "Password Changed";
    } else
        $message = "Current Password is not correct";
}
?>
<html>
<head>
    <title>Settings</title>
    <link rel="stylesheet" type="text/css" href="css/settings.css" />
    <link rel="stylesheet" type="text/css" href="css/astyle.css" />
    <script>
        function validatePassword() {
        var currentPassword,newPassword,confirmPassword,output = true;

        currentPassword = document.frmChange.currentPassword;
        newPassword = document.frmChange.newPassword;
        confirmPassword = document.frmChange.confirmPassword;

        if(!currentPassword.value) {
            currentPassword.focus();
            document.getElementById("currentPassword").innerHTML = "required";
            output = false;
        }
        else if(!newPassword.value) {
            newPassword.focus();
            document.getElementById("newPassword").innerHTML = "required";
            output = false;
        }
        else if(!confirmPassword.value) {
            confirmPassword.focus();
            document.getElementById("confirmPassword").innerHTML = "required";
            output = false;
        }
        if(newPassword.value != confirmPassword.value) {
            newPassword.value="";
            confirmPassword.value="";
            newPassword.focus();
            document.getElementById("confirmPassword").innerHTML = "not same";
            output = false;
        } 	
        return output;
        }
    </script>
</head>
<body class="container" style="background-image: linear-gradient(rgba(4,9,20,0.7), rgba(4,9,20,0.7)), url('images/banner.jpeg');">
    <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
        <div style="width: 500px;">
            <div class="message">
                <?php 
                if(isset($message)) {
                    echo $message; 
                } 
                ?>
            </div>
            <table cellpadding="10" cellspacing="0" width="500" class="tblSaveForm">
                <tr class="tableheader">
                    <td colspan="2">Change Password</td>
                </tr>
                <tr>
                    <td width="40%"><label>Current Password</label></td>
                    <td width="60%"><input type="password"  name="currentPassword" class="txtField" />
                    <span id="currentPassword" class="required"></span>
                </td>
                </tr>
                <tr>
                    <td><label>New Password</label></td>
                    <td><input type="password" name="newPassword" class="txtField" />
                    <span id="newPassword" class="required"></span>
                </td>
                </tr>
                <td><label>Confirm Password</label></td>
                <td>
                    <input type="password" name="confirmPassword" class="txtField" />
                    <span id="confirmPassword"  class="required"></span>
                </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>