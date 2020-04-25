<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> EPE Location Traffic Report</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen,print" />
<link rel="stylesheet" href="form.css" type="text/css" media="screen,print" />
<link rel="stylesheet" href="poppup.css" type="text/css" media="screen, print" />
<script src="jquery.min.js"></script>
<script src="js//poppup.js"></script>
</head>
<body>

<div id='popup'>

	<div id="close"></div>

	<center>

	<div class="img"></div>

</div>
<?php

  error_reporting(0);
//include the connection file
  include_once 'dbconn.php'; 
//start the seeion
    session_start();
//check the session
  if($_SESSION['valid'])

	{

?>
	<!--Header Part-->
<div id="wrapper">
	<div id="header">
	  <img src='images/ajs.jpg' height="80" align='left'/>
		<h1>EPE Location Report</h1>
	</div>
	<div id="menu">
		<ul>
		<?php

		if($_SESSION['user_type']==2)

		{

		?>

		<li><a href="register.php">Register</a></li>
		

		<?php

		}

		?>

			<li><a href="lday.php">Daily Report</a></li>

			<li><a href="lweekly.php">Weekly Report</a></li>

			<li><a href="lmonth.php">Monthly Report</a></li>

			
		</ul>

	</div>

<div id="form">

<form class="forms" action="" method="post">

<a href="location.php">Go Back</a>

<a href="logout.php" style="float: right;">Logout</a>

<center>

	 <h2 align="center">Weekly Report</h2>

	 <br/>

	 

	 <table>

	

	 </th>

	 

	<th>

	Select Location:

	</th>

	<th>

	<select type="heads" name="heads">

       <option value="" disabled selected>--select--</option>
<option value="ALL" >ALL </option>

		<option value="Kundli " >Kundli </option>
        
		<option value="Baghapat" >Baghapat </option>
		
		<option value="Duhai" >Duhai</option>
		
        <option value="Dasna" >Dasna</option>
		
		<option value="Bil Akbarpur" >Bil Akbarpur</option> 

		<option value="Sirsa" >Sirsa</option>
	
		<option value="Maujpur" >Maujpur</option>
	    
		<option value="Palwal" >Palwal</option>
    </select>

	</th>  

	<th>

	Select Date:

	</th>

	<th>


  <input type="date" name="date" placeholder="dd-mm-yyyy">

  <input type="submit" name="submit">

  </th>

  </tr>

  </table>

</form>

<?php

	if (isset($_POST['submit'])) 

  {

	  $name = $_POST['date'];//fetching the selected date in an array

	  $name1 = $_POST['heads'];//fetching the selected location in an array
$dt=date("d-m-Y", strtotime($name));//fetching date from selection and storing it in array
echo $dt;//to print the date
echo '&nbsp;&nbsp;&nbsp;';//for giving spaces in between

echo $name1;// print the selected location
$date = $name;

$heads = $name1;

$week = date("W", strtotime($name)); //fetching the week details in an array from selected date

//$weekday = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday","Total");
//storing all locations in an array   
$loc = array("Kundli", "Baghapat","Duhai","Dasana","Bil Akbarpur","Sirsa","Maujpur","Palwal");     
 // note: first arg to date() is lower-case L

//echo $week;

//echo $name;
$k=0;

 $year = substr($name,0,4);//fetching year details from selected date into an array
$week_number = $week; //fetching week number from week 

$year = $year; 
//table structure
 echo "<table  border='1' id='testTable' class='record'>";

		 echo "<tr align='center'>";

		 echo "  <th>LOCATION_NAME</th>   <th>Description</th> <th>LMV</th>  <th>LCV</th>   <th>BUS/TRUCK</th>  <th>HMV</th>  <th>MAV</th>  <th>OSV</th>  <th>TOTAL</th>" ;


	     echo " </tr> ";

	  $cnt1 = count($loc);  //display the count of  days in month

		 	if(strcasecmp($heads, 'ALL') == 0)

	{

		 echo $cnt1;

  for($j=0;$j<$cnt1;$j++)

  {
	 

for($day=1; $day<=7; $day++)

{

    $days = date('d-m-Y', strtotime($year."W".$week_number.$day))."\n"; //fetching the no. of days in a week into an array

	$newDate = date("Y-m-d", strtotime($days));

			 $res=mysqli_query($con,"select LOC_NAME ,DESCRIPTION, sum(LMV), sum(LCV),sum(BUS), sum(HMV), sum(MAV), sum(OSV)  from epe_veh_count where LOC_NAME='".$loc[$j]."' and EDATE = '".$newDate."' group by DESCRIPTION order by EDATE "); //query part

			   if(mysqli_num_rows($res)==0)

		{

		 //echo "no record is available with this details.";

	    }

	 else

	    {

		

         while($r=mysqli_fetch_row($res))

         {
               $sum =  $r[2]+$r[3]+$r[4]+$r[5]+$r[6]+$r[7];//display total no of counts in all rows

			//$sum10 = $sum10+$sum;
			$sum8 = $sum8+$sum;

			//$sum1 = $sum1+$r[1];

			$sum2 = $sum2+$r[2];

			$sum3 = $sum3+$r[3];

			$sum4 = $sum4+$r[4];

			$sum5 = $sum5+$r[5];

			$sum6 = $sum6+$r[6];

			$sum7 = $sum7+$r[7];
			
			//$sum8 = $sum8+$r[8];


$m=$k+$sum;
$k=$sum;
            if($day==7)
           {
 //echo $k;
            echo "<tr>";
            

			//echo "<td align='center' width='200'>".$r[10]."</td>";

			 echo "<td align='center'>".$loc[$j]."</td>";

			//echo "<td align='center'>".$days."</td>";

           // echo "<td align='center'>".$name."</td>";

			// echo "<td align='center'>".$name1."</td>";

			//echo "<td align='center'>".$t."</td>";

			//echo "<td align='center'>".$l."</td>";
echo "<td align='center' width='200'>".$r[1]."</td>";

//echo "<td align='center' width='200'>".$r[2]."</td>";

			//echo "<td align='center' width='200'>".$sum1."</td>";

            echo "<td align='center' width='200'>".$sum2."</td>";

            echo "<td align='center' width='200'>".$sum3."</td>";

			echo "<td align='center' width='200'>".$sum4."</td>";

			echo "<td align='center' width='200'>".$sum5."</td>";

			echo "<td align='center' width='200'>".$sum6."</td>";

			echo "<td align='center' width='200'>".$sum7."</td>";

			echo "<td align='center' width='200'>".$sum8."</td>"; 

			//echo "<td align='center' width='200'>".$sum9."</td>";
         
			
			//echo "<td align='center' width='200'>".$sum."</td>";

			//$s=  $s1+$s2+$s3+$s4+$s5+$s6+$s7;

 			//$s0= $sum1+$s1;


            $s1= $sum2+$s1;

             $s2 = $sum3+$s2;

			$s3 = $sum4+$s3;

			$s4 = $sum5+$s4;

			$s5 = $sum6+$s5;

			$s6 = $sum7+$s6;

			$s7 = $sum8+$s7;	
			//$s8 = $sum10+$s8;


			//$sum8 = $sum8+$sum;

			//$sum1 = $sum1+$r[1];

			//$sum2 = $sum2+$r[2];

			//$sum3 = $sum3+$r[3];

			//$sum4 = $sum4+$r[4];

			//$sum5 = $sum5+$r[5];

			//$sum6 = $sum6+$r[6];

			//$sum7 = $sum7+$r[7];

			

           // echo "<td align='center'>".$s."</td>";

			 echo "</tr>";


              }
 
			

         }

		 

		 }





	}

	}
echo "<tr>";


	       echo "<td align='center' width='200'>TOTAL</td>";

			echo "<td align='center' width='200'></td>";

			// echo "<td align='center' width='200'></td>";

            echo "<td align='center' width='200'>".$s1."</td>";

            echo "<td align='center' width='200'>".$s2."</td>";

            echo "<td align='center' width='200'>".$s3."</td>";

			echo "<td align='center' width='200'>".$s4."</td>";

			echo "<td align='center' width='200'>".$s5."</td>";

			echo "<td align='center' width='200'>".$s6."</td>";

			echo "<td align='center' width='200'>".$s7."</td>";

		//echo "<td align='center' width='200'>".$s8."</td>";

		//echo "<td align='center' width='200'>".$s."</td>";

			 echo "</tr>";



 
	}
	 

	if($heads != "ALL")

	{	 

for($day=1; $day<=7; $day++)

{

    $days = date('d-m-Y', strtotime($year."W".$week_number.$day))."\n"; // fetching no.of days in a week

	//echo $days;
$newDate = date("Y-m-d", strtotime($days)); //storing the date into an array from days.
$newDate1 = date("d-m-Y", strtotime($days)); //storing the new date into an array from days.

        if($day==1 || $day==7)
        {
	 echo $newDate1; //print new date after one week is comepleted
         echo '&nbsp;';
          if($day==1 )
{
        echo "To";
          echo '&nbsp;';
   
}


}
	$cnt = count($newDate); //count the no of dates in a week

//echo $cnt($newDate);
//echo $newDate;

 $cnt1 = count($loc);  //count the no of locations

	//echo $cnt;

  for($i=1;$i<=$cnt;$i++)

  {

	//query part
	 $res=mysqli_query($con,"select LOC_NAME,DESCRIPTION, sum(LMV), sum(LCV),sum(BUS), sum(HMV), sum(MAV), sum(OSV)  from epe_veh_count where EDATE  = '".$newDate."' and LOC_NAME = '".$heads."' group by DESCRIPTION order by EDATE "); 

     if(mysqli_num_rows($res)==0)

		{

		// echo "no record is available with this details.";

	    }

	 else

	    {

		

         while($r=mysqli_fetch_row($res))

         {

            echo "<tr>";

			//echo "<td align='center' width='200'>".$r[10]."</td>";

			

         //  echo "<td align='center'>".$weekday[$day-1]."</td>";

			echo "<td align='center'>".$heads."</td>";

			// echo "<td align='center' width='200'>".$r[0]."</td>";

            echo "<td align='center' width='200'>".$r[1]."</td>";

         	echo "<td align='center' width='200'>".$r[2]."</td>";

			echo "<td align='center' width='200'>".$r[3]."</td>";

			echo "<td align='center' width='200'>".$r[4]."</td>";

			echo "<td align='center' width='200'>".$r[5]."</td>";

			echo "<td align='center' width='200'>".$r[6]."</td>";

			echo "<td align='center' width='200'>".$r[7]."</td>";
			
			//echo "<td align='center' width='200'>".$r[8]."</td>";

			//echo "<td align='center' width='200'>".$r[9]."</td>";

			$sum =   $r[1]+$r[2]+$r[3]+$r[4]+$r[5]+$r[6]+$r[7]; //display total no of counts from all rows

			$sum8 =   $sum8+$sum;

			//$sum1 = $sum1+$r[1];

			$sum2 = $sum2+$r[2];

			$sum3 = $sum3+$r[3];

			$sum4 = $sum4+$r[4];

			$sum5 = $sum5+$r[5];

			$sum6 = $sum6+$r[6];

			$sum7 = $sum7+$r[7];
		 
			//$sum8 = $sum8+$r[8];


             echo "<td align='center'>".$sum."</td>";

		
            echo "</tr>";

         }

		 

		 }

}

}

	echo "<tr>";


	       echo "<td align='center' width='200'>TOTAL</td>";

			 //echo "<td align='center' width='200'></td>";

			// echo "<td align='center' width='200'></td>";

            echo "<td align='center' width='200'>".$sum1."</td>";

            echo "<td align='center' width='200'>".$sum2."</td>";

            echo "<td align='center' width='200'>".$sum3."</td>";

			echo "<td align='center' width='200'>".$sum4."</td>";

			echo "<td align='center' width='200'>".$sum5."</td>";

			echo "<td align='center' width='200'>".$sum6."</td>";

			echo "<td align='center' width='200'>".$sum7."</td>";

			echo "<td align='center' width='200'>".$sum8."</td>";
			
			//echo "<td align='center' width='200'>".$sum9."</td>";
			//echo "<td align='center' width='200'>".$s."</td>";

			 echo "</tr>";

   
}
  }

?>

<?php

	}

	else

	{

		header("location:index.php");

	} 

?>

</table>

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

