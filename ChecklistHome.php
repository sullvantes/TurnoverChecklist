<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Production Support Checklist Home </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>



<body>


<?php
include("header.html");
//include("makeconnection.php");
//include("insertworklogform.php");
//include("viewworklog.php");
//include("SearchWL_return.php");

//$conn->close();
?>

</body>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  var today = new Date();
  var date_to_print= today.toLocaleDateString();
  var time_to_print= today.toLocaleTimeString();
  $("#date").html(date_to_print)
  $("#time").html(time_to_print)
  
});

$(function() {
    $('.nav li').hover(function () {
            $('ul', this).slideDown(100);
         }, function () {
            $('ul', this).slideUp(100);   
        });
});

</script>

</html> 




