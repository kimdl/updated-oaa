<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URS </title>
    <link rel="icon" type="image/png" sizes="32x30" href="./images/urslogo.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<script>

$(document).ready(function() {

  $("#icon-click").click(function() {
  
    var className = $("#icon").attr('class');
    className = className.indexOf('slash') !== -1 ? 'fa fa-eye' : 'fa fa-eye-slash'
  
    $("#icon").attr('class', className);
    var input = $("#u_ps");
  
    if (input.attr("type") == "text") {
      input.attr("type", "password");
    } else {
      input.attr("type", "text");
    }
  });

  $("#icon-clickk").click(function() {
  
    var classNamee = $("#iconn").attr('class');
    classNamee = classNamee.indexOf('slash') !== -1 ? 'fa fa-eye' : 'fa fa-eye-slash'
  
    $("#iconn").attr('class', classNamee);
    var inputt = $("#a_ps");
  
    if (inputt.attr("type") == "text") {
      inputt.attr("type", "password");
    } else {
      inputt.attr("type", "text");
    }
  });

  $("#icon-click").click(function() {
  
    var className = $("#icon").attr('class');
    className = className.indexOf('slash') !== -1 ? 'fa fa-eye' : 'fa fa-eye-slash'

    $("#icon").attr('class', className);
    var input = $("#u_ps");

    if (input.attr("type") == "text") {
      input.attr("type", "password");
    } else {
      input.attr("type", "text");
    }
  });

  $("#icon-clickp").click(function() {

    var className = $("#iconp").attr('class');
    className = className.indexOf('slash') !== -1 ? 'fa fa-eye' : 'fa fa-eye-slash'

    $("#iconp").attr('class', className);
    var input1 = $("#pwd");

    if (input1.attr("type") == "text") {
      input1.attr("type", "password");
    } else {
      input1.attr("type", "text");
    }
  });

  $("#icon-clickrp").click(function() {

    var classNamee = $("#iconrp").attr('class');
    classNamee = classNamee.indexOf('slash') !== -1 ? 'fa fa-eye' : 'fa fa-eye-slash'

    $("#iconrp").attr('class', classNamee);
    var input2 = $("#pwdRepeat");

    if (input2.attr("type") == "text") {
      input2.attr("type", "password");
    } else {
      input2.attr("type", "text");
    }
  });

  });
</script>
