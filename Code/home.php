<!DOCTYPE html PUBLIC>
<html>
<head>
<title>EPE Traffic Report</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="form.css" type="text/css" media="screen" />
</head>
<body>
	<!--header part-->
<div id="wrapper">
	<div id="header">
	      <img src='images/ajs.jpg' height="80" align='left'/>
		<h1>EPE Traffic Report</h1>
	</div>
<!-- Including connection part-->
<?php
 include_once 'dbconn.php';
 // Start the session
  session_start(); 
  //check the session
	if($_SESSION['valid'])
	{
?>
<div id="form">
<form class="forms">
<a href="index.php">Go Back</a>
<a href="logout.php" style="float: right;">Logout</a>
<center>
     <h2 align="center">EPE Traffic Count Data</h2>
	    <!--<input type="button" height="60" width="100" value="Vehicle Wise Traffic Count" onClick="location.href='vehicle.php'"/>--> 
	<br/>
	<br/>
	<br/>
    <input type="button" height="60" width="100" value="EPE Location Traffic Report" onClick="location.href='location.php'"/> 
<?php
	}

	else
	{
	header("location:index.php");
	} 

?>
</form>
</table>
</div>
<!--Footer Part-->
<div id="footer">
	<div id="footer-valid">
		<a href=""> AJS Scale International </a>
		</div>
	</div>
</div>
</body>
</html>