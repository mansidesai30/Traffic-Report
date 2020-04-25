<html>
<head>
<title>Traffic Report</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="form.css" type="text/css" media="screen" />
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
<!--Creating a function for validations on form-->
<script>  
    function validateform()
	{  
         // Create and display a variable:
    var name=document.myform.users_email.value;  
    var password=document.myform.users_pass.value; 
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
	else
	{
		return true;
	}
   }  
    </script>  
    <!--header part-->
<div id="wrapper">
	<div id="header">
	<img src='images/ajs.jpg' height="80" align='left'/>
		<h1>EPE Traffic Report</h1>
	</div>
	<center>	
	<div id="form">
	<br>
     <h2 align="center">User Login</h2>
	  	<br>
<form id="form" class="forms" name="myform" action="validatelogin.php" onsubmit="return validateform()"  method="post">	<!--Form submission-->
   
        <table height="150" width="150">
            <tr>
                <td><label for="users_email">UserName: </label></td>
                <td><input type="text" name="users_email" id="users_email"></td>
            </tr>
            <tr>
                <td><label for="users_pass">Password: </label></td>
                <td><input name="users_pass" type="password" id="users_pass"></input></td>
            </tr>
            <tr><td></td>
                <td><input type="submit" value="Submit" /> </td><td> 
<a href="register.php"><input type="button" name="button" value="Register"></a> </td></tr>
				            
			 
        </table>
<!--<tr><h4><a href="">Forgot Password </tr>-->
<tr><h4><a href="change.php">Change Password
</tr></h4>

		</form>
		
		</div>

	</center>	
	<div id="footer">
		<div id="footer-valid">
			<a href=""> AJS Scale International </a>
		</div>
	</div>
		
</div>
</body>
</html>