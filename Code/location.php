<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>EPE Location Traffic Report</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="form.css" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header">
	      <img src='images/ajs.jpg' height="80" align='left'/>
		<h1>EPE Traffic Report</h1>
	</div>
<?php
	error_reporting(0);
//include the connection file
  include_once 'dbconn.php'; 
//start the session
    session_start();
  //check the session
  if($_SESSION['valid'])

	{
?>
<div id="form">
<form class="forms">
<a href="home.php">Go Back</a>
<a href="logout.php" style="float: right;">Logout</a>
<center>
     <h2 align="center">EPE Location Traffic Report</h2>
    <?php
	if($_SESSION['user_type']==2) //menus shown as per the usertype
	{
	?>
	<br>
	 <br/>
	<br/>
	<br/>
	<br>
	<input type="button" height="50" width="100" value="Daily Report" onClick="location.href='lday.php'"/> 
  	<br/>
	<br/>
	<br/>
    <input type="button" height="50" width="100" value="Weekly Report" onClick="location.href='lweekly.php'"/> 
    <br/>
	<br/>
	<br/>
    <input type="button" height="50" width="100" value="Monthly Report " onClick="location.href='lmonth.php'"/> 
	<br/>
	<br/>
	<br/>
   <?php
	}

	if($_SESSION['user_type']==1)
	{
	?>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<?php 
	}
	if($_SESSION['user_type']==0)
	{
	?>
	<br/>
	<br/>
	<br/>
<input type="button" height="50" width="100" value="Daily Report" onClick="location.href='lday.php'"/> 
    <br/>
	<br/>
	<br/>
    <input type="button" height="50" width="100" value="Weekly Report" onClick="location.href='lweekly.php'"/> 
	<br/>
	<br/>
	<br/>
    <input type="button" height="50" width="100" value="Monthly Report" onClick="location.href='lmonth.php'"/> 
	<br/>
	<br/>
	<br/>
<?php
	}
	}
	else
	{
		header("location:index.php");
	} 
?>
</form>
</table>
</div>
	<div id="footer">
		<div id="footer-valid">
			<a href=""> AJS Scale International </a>
		</div>
	</div>
</div>
</body>
</html>

