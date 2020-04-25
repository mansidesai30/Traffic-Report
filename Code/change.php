<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Traffic Report</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="form.css" type="text/css" media="screen" />
<!-- stylesheet for button-->
<style> 
.block {
    display: block;
    width: 100%;
    border: none;
    background-color: dodgerblue;
    color: white;
    padding: 10px 15px;
    font-size: 16px;
    cursor: pointer;
    text-align: right;
}

.block:hover {
    background-color: #ddd;
    color: black;
}
</style>
</head>
<body>
<!--function for validation on form after submitting-->
<script>  
    function validateform()
	{  
        // Create and display a variable:
    var name=document.myform.users_email.value;  
    var password=document.myform.users_pass.value; 
	var confirm=document.myform.users_pass1.value;
	//validation part
    if (name==null || name=="" )
	{  
      alert("Name can't be blank"); 
      return false;  
    }   
    if (password.length<4 && password == null || password == ""  )
	{  
      alert("Password must be at least 4 characters long.");  
      return false;  
    }  
	if (password==confirm )

	{
		return true;
	}
   }  
    </script> 
    <!--Header--> 
<div id="wrapper"> 
	<div id="header">
	<img src='images/ajs.jpg' height="80" align='left'/> <!-- Logo-->
		<h1>Traffic Report</h1>
	</div>
	<center>
<!--Create Form-->	
	<div id="form"> 
	<br>
     <h2 align="center">Change Password</h2>
	  <a href="index.php"style="float: left;">Go Back</a>
<a href="logout.php" style="float: right;">Logout</a>
	<br>
<form id="form" class="forms" name="myform" action="validatelogin1.php" onsubmit="return validateform()"  method="post">	<!--Form submission part-->
   
        <table height="150" width="150"> <!--Form Input fields-->
            <tr>
			
                <td><label for="users_email">UserName</label></td>
                <td><input type="text" name="users_email" id="users_email"></td>
            </tr>
            <tr>
                <td><label for="users_pass">Password</label></td>
                <td><input name="users_pass" type="password" id="users_pass"></input></td>
            </tr>
<tr>
                <td><label for="pass1">Confirm Password</label></td>
                <td><input name="pass1" type="password" id="pass1"></input></td>
            </tr>
            <tr><td></td>
                <td><input type="submit" value="Submit" />  
        </table>
		</form>
		</div>
	</center>	
    <!--Footer-->
	<div id="footer">
		<div id="footer-valid">
			<a href=""> AJS Scale International </a>
		</div>
	</div>		
</div>
</body>
</html>