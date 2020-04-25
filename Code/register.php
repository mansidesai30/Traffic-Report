<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Traffic Report</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="form.css" type="text/css" media="screen" />
</head>

<body>
<script>  
    function validateform()
	{  
    var name=document.myform.name1.value;  
    var password=document.myform.pass1.value; 
    var pass=document.myform.pass2.value; 
    var us=document.myform.user.value; 	
    
   
    if (name==null || name=="" )
	{  
      alert("Name can't be blank");  
      return false;  
    }
    else if (password==null || password=="" && password.length<4 )
	{  
      alert("Password must be at least 4 characters long.");  
      return false;  
    }  
	else if( pass != password)
	 {
	 alert("Password must be same.");  
      return false;  
     }  
	 else if(us==null || us=="")
	  {
	  alert("Please Select user Type.");  
      return false;  
      }  

    }  
    </script>  
<script>
$(document).ready(function()
{
$("#btn").click(function()
{
alert('Name field is required')
var vname = $("#name1").val();
var vpass1 = $("#pass1").val();
var vpass2 = $("#pass2").val();
var vuser = $("#user").val();
	if(vname=='' && vpass1 =='' && vpass2 =='' && vuser =='')
	{
	alert("Please fill out the form");
	}
	else if(vname=='' && vpass1!=='' && vpass2=='' && vuser!==''){alert('Name field is required')
	}
	else if(vpass1=='' && vname!=='' && vpass2=='' && vuser!==''){alert('Password field is required')
	}
	else if(vpass2=='' && vname!=='' && vpass1=='' && vuser!==''){alert('Confirm Password field is required')
	}
	else if(vuser=='' && vname!=='' && vpass1=='' && vpass2!==''){alert('User Type field is required')
	}
else
{
	$.post("validateregister.php",{name:vname,pass1:vpass1,pass2:vpass2,user=vuser},
	function(response,status)
	{ 
	alert("*----Received Data----*\n\nResponse : " + response+"\n\nStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
	$("#form")[0].reset();
	});
}
});
});
</script>
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
<div id="wrapper">
<!--header part-->
	<div id="header">
	<img src='images/ajs.jpg' height="80" align='left'/>
		<h1>Traffic Report</h1>
	</div>
	<div id="menu">
		<ul>
		<?php
		if($_SESSION['user_type']==2)
		{
		?>
		<li><a href="register.php">Register</a></li>
		<!--<li><a href="status.php">Status</a></li>-->
		<?php
		}
		?>
			
			<li><a href="location.php">Location Master</a></li>
			
		</ul>
	</div>

	
	
	<div id="form">
	<form id="form" class="forms" name="myform" action="validateregister.php" onsubmit="return validateform()"  method="post">	<!--form submission part-->
<a href="index.php">Go Back</a>
<a href="logout.php" style="float: right;">Logout</a>
<h2 align="center">Registration Of Users</h2>    
<br>
<center>
        <table height="150" width="150">
            <tr>
			    <td><label for="name1">UserName</label></td>
                <td><input type="text" name="name1" id="name1"></input></td>
            </tr>
            <tr>
                <td><label for="pass1">Password</label></td>
                <td><input type="password" name="pass1" id="pass1"></input></td>
            </tr>
			<tr>
                <td><label for="users_pass">Confirm Password</label></td>
                <td><input  type="password" name="pass2" id="pass2"></input></td>
            </tr>
			<tr>
			    <td>User Type</td>
                <td><select name="user" >
         <option value="" disabled selected>--select--</option>
		 <option value="2">Super User</option>
		 <option value="1">Administrator</option>
		 <option value="0">User</option>
        
		 </select></td>
            </tr>
			 <tr><td></td>
			  <td><input type="submit" value="Register" id="btn"/></td>
               
            </tr>
        </table>
    </form>
	</div>
	</center>
	<!--footer-->	
	<div id="footer">
		<div id="footer-valid">
			<a href="#"> AJS Scale International</a>
		</div>
	</div>
<?php
	}
	else
	{
		header("location:index.php");
	} 
?>		
</div>
</body>
</html>

