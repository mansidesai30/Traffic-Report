<?php	
//check the connection
 include_once 'dbconn.php';
  $response = array(); //for converting php object into json

if($_SERVER['REQUEST_METHOD']=='POST') //contains request method and generate a http post request

{

		$Uname = $_POST['users_email'];//fetch the data into an array

    	$Pass = $_POST['users_pass'];//fetch the data into an array

	if($Uname=="" && $Pass=="")//check the condition

	{

		?>

		<script>

		alert("Please Select Valid Data");

		</script>

		<?php

	}

	if($Uname!="" && $Pass!="")

	{
		$result = mysqli_query($con,"update login set Password='$Pass' where username='$Uname' ");
		//query part
                                if ($con->query($result) === TRUE) //check the condition
                                {
                                    echo "Record updated successfully"; //print purpose
									header("Location: index.php"); //redirect to page


                                } else {
                                 echo "Error updating record: " . $conn->error; 

					echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')</script>";

					header("Location: index.php"); //redirect to the page

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

