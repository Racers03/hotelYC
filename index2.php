<?php
session_start();
//elak bypass
include ("keselamatan.php");
//sambung ke pangkalan data
require ('config.php');
//sambung ke fail header
require ('header.php');
?>

<html> 
<body> 
<FIELDSET> 
<?php include ("menu.php"); ?>
</FIELDSET>
</body><br><br>
<?php require('footer.php'); ?>
</html>