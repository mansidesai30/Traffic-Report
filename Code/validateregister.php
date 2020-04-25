<?php
include_once 'dbconn.php'; //include the connection file
 
$username = $_POST['name1']; //fetch the data into an array
 
$email = $_POST['name2']; //fetch the data into an array
 
$password = $_POST['pass1']; //fetch the data into an array

 
$password1 = $_POST['pass2'];//fetch the data into an array

 
$usertype = $_POST['user'];//fetch the data into an array

 $selectresult=mysqli_query($con,"SELECT * FROM login where username='$username' AND password='$password'"); //query part

    if(mysqli_num_rows($selectresult)>0)

   {

		echo"Already Exits"; //print purpose

		header("Location: register.php");//redirect to page

   }

   else

   { 

       $Sql_Query = "INSERT INTO login(username,email, password,usertype) values ('$username','$email', '$password','$usertype')";//query part

       if(mysqli_query($con,$Sql_Query))

       {

		echo"Insered";
   
		header("Location: register.php");//redirect to the page

       }

       else

       {
    echo "<script>alert('Registration Successful!');</script>"; //print purpose
		echo"Insered";   
		header("Location: register.php"); //redirect to the page

       }

	}
   mysqli_close($con);//close the connection

?>