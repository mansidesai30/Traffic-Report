<?php
//include the connection file
 include_once 'dbconn.php';
  $response = array(); //for converting php object into json

if($_SERVER['REQUEST_METHOD']=='POST') //contains request method and generate a http post request

{
	$Uname = $_POST['users_email']; //collect the data into an array

	$Pass = $_POST['users_pass'];//collect the data into an array

	if($Uname=="" && $Pass=="") //check the condition

	{

		?>

		<script>

		alert("Please Select Valid Data");

		</script>

		<?php

	}

	if($Uname!="" && $Pass!=="")

	{

				$result = mysqli_query($con,"SELECT * FROM login where username='$Uname' AND Password='$Pass'"); //query part

				if($row = mysqli_fetch_array($result))

				{
						//start the session
							session_start();
						// Set session variables
						   $_SESSION['login_user']=$Uname; 
          
					       $_SESSION['user_type']=$row['usertype'];
					       //check the session
					       $_SESSION['valid']=true;
					       //if valid it will redirect to next page
					       header("Location: location.php");
                                     


				}

				else 

				{

					echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')</script>"; //print the alert if found

					header("Location: index.php");// if invalid it will redirect to index page

				}

	}

	else

	{

	    echo "<script type='text/javascript'>alert('Please enter User Name Or Password !')</script>"; 
		header("Location:index.php");

	}

}
echo json_encode($response);//Add the array to an object, and return the object as JSON
//close the connection
mysqli_close($con);
?>

