<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>EPE Location Traffic Report</title>
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
//start the session
    session_start();
  //check the session
  if($_SESSION['valid'])

	{

?>


<!--header part-->
<div id="wrapper">

	<div id="header">

	  <img src='images/ajs.jpg' height="80" align='left'/>

		<h1>EPE Location  Report</h1>

	</div>
	<div id="menu">

		<ul>
		<li><a href="register.php">Register</a></li>

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

	 <h2 align="center">Monthly Report</h2>

	 <br/>

	 

	 <table>

	

	 </th>

	 

	<th>

	Select Location:

	</th>

	<th>

	<select type="heads" name="heads">

       <option value="" disabled selected>--select--</option>

		<option value="ALL" >ALL</option>

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

	  <br>

	<th>

	Select Date:

	</th>

	<th>

  <input type="date" name="date">
  <input type="submit" name="submit">

  </th>

  </tr>

  </table>

</form>

	
<?php

  if (isset($_POST['submit'])) 

  {

	$name =  $_POST['date'];//storing the selected date in an array

	$name1 = $_POST['heads'];// storing the selected location in an array

	$heads = $name1;
//echo $name;
$dt=date("d-m-Y", strtotime($name));//storingg date from selection and storing it in array
echo $dt; //to print the date
echo '&nbsp;&nbsp;&nbsp;';//for giving spaces in between
echo $name1;// print the selected location
//storing all locations in an array    
	$loc = array("Kundli", "Baghapat","Duhai","Dasana","Bil Akbarpur","Sirsa","Maujpur","Palwal");     
	$end=date("Y-m-t", strtotime($name)); // to get end date in an array
	$start=date("Y-m-01", strtotime($name)); //to get start date in an array
   $month = date('m', strtotime($name)); // to get month details in an array

 $year = date('Y');  //storing year details into an array

  echo "<table  border='1' id='testTable' class='record'>";

		 echo "<tr align='center'>";

 echo "    <th>LOCATION_NAME</th>  <th>Description</th> <th>LMV</th>  <th>LCV</th>   <th>BUS/TRUCK</th>  <th>HMV</th>  <th>MAV</th>  <th>OSV</th>  <th>TOTAL</th>" ;

	     echo " </tr> ";

 for($m=1;$m<=cal_days_in_month(CAL_GREGORIAN, $month, $year);$m++) // calculate month no from an array

   {

   if($m <10){ $mon="0".$m; } 

    else { $mon = $m;} 

    $mon_days[] = $year.'-'.$month.'-'.$mon; //display of month days as per selected month

    $mon_days1[] = $mon.'-'.$month.'-'.$year;//display of month days as per selected month



   }

 if($name=="" )

	{

		?>

		<script>

		alert("Please Select Valid Data");

		</script>

		<?php

	}

   

  $cnt = count($mon_days); //display the count of  days in month
echo '&nbsp;&nbsp;&nbsp;'; //spaces in between
//echo $cnt1;

//echo $cnt;

 $cnt1 = count($loc);  //display count of no. of locations

//echo $mon_days1[$cnt1];

 	   if(strcasecmp($heads, 'ALL') == 0)

    {

		 //echo $cnt1;

		 for($j=0;$j<$cnt1;$j++)

  {

  for($i=0;$i<$cnt;$i++)

  {


//query part
	$res=mysqli_query($con,"select LOC_NAME ,DESCRIPTION, sum(LMV), sum(LCV),sum(BUS), sum(HMV), sum(MAV), sum(OSV) from epe_veh_count where EDATE = '".$mon_days[$i]."' and LOC_NAME='".$loc[$j]."' group by DESCRIPTION order by EDATE "); 

	

     if(mysqli_num_rows($res)==0)

		{

		 //echo "no record is available with this details.";

	        }

	 else

	    {
              while($r=mysqli_fetch_row($res))
 
         {
            $sum =  $r[2]+$r[3]+$r[4]+$r[5]+$r[6]+$r[7]; //display total no of counts from all rows

			$sum7 = $sum7+$sum;

			$sum1 = $sum1+$r[2];

			$sum2 = $sum2+$r[3];

			$sum3 = $sum3+$r[4];

			$sum4 = $sum4+$r[5];

			$sum5 = $sum5+$r[6];

			$sum6 = $sum6+$r[7];

			//$sum7 = $sum7+$r[7];

			//$sum8 = $sum8+$r[8];


			$m=$k+$sum;
			$k=$sum;
            if($name >="2018-06-23" && $name <="2018-06-30")
            {
              //echo $k;
            echo "<tr>";

			//echo "<td align='center' width='200'>".$r[10]."</td>";

            // echo "<td align='center'>".$mon_days."</td>";

			//echo "<td align='center' width='200'>".$mon_days1[$i]."</td>";

			echo "<td align='center' width='200'>".$r[0]."</td>";
			echo "<td align='center' width='200'>".$r[1]."</td>";
             //  echo "<td align='center' width='200'>".$r[2]."</td>";

            //echo "<td align='center' width='200'>".$sum1."</td>";

           // echo "<td align='center' width='200'>".$sum2."</td>";

			echo "<td align='center' width='200'>".$sum1."</td>";

			echo "<td align='center' width='200'>".$sum2."</td>";

			echo "<td align='center' width='200'>".$sum3."</td>";

			echo "<td align='center' width='200'>".$sum4."</td>";

			echo "<td align='center' width='200'>".$sum5."</td>";
                         
			echo "<td align='center' width='200'>".$sum6."</td>";
			
			echo "<td align='center' width='200'>".$sum7."</td>";

			//$sum = $r[1]+$r[2]+$r[3]+$r[4]+$r[5]+$r[6]+$r[7];

			//$sum8=$sum8+$sum;

			//$sum1 = $sum1+$r[1];

			//$sum2 = $sum2+$r[2];

			//$sum3 = $sum3+$r[3];

			//$sum4 = $sum4+$r[4];

			//$sum5 = $sum5+$r[5];

			//$sum6 = $sum6+$r[6];

			//$sum7 = $sum7+$r[7];

			//$s=  $s1+$s2+$s3+$s4+$s5+$s6;

            $s1= $sum1+$s1;

            $s2 = $sum2+$s2;

			$s3 = $sum3+$s3;

			$s4 = $sum4+$s4;

			$s5 = $sum5+$s5;

			$s6 = $sum6+$s6;

			$s7 = $sum7+$s7;


		// echo "<td align='center'>".$m."</td>";
            echo "</tr>";      
            }
            if($i==10)
           {

//echo $k;
            echo "<tr>";

			//echo "<td align='center' width='200'>".$r[10]."</td>";

            // echo "<td align='center'>".$mon_days."</td>";

			//echo "<td align='center' width='200'>".$mon_days1[$i]."</td>";

			echo "<td align='center' width='200'>".$r[0]."</td>";
			echo "<td align='center' width='200'>".$r[1]."</td>";
             //  echo "<td align='center' width='200'>".$r[2]."</td>";

            //echo "<td align='center' width='200'>".$sum1."</td>";

           // echo "<td align='center' width='200'>".$sum2."</td>";

			echo "<td align='center' width='200'>".$sum1."</td>";

			echo "<td align='center' width='200'>".$sum2."</td>";

			echo "<td align='center' width='200'>".$sum3."</td>";

			echo "<td align='center' width='200'>".$sum4."</td>";

			echo "<td align='center' width='200'>".$sum5."</td>";
                         
			echo "<td align='center' width='200'>".$sum6."</td>";
			
			echo "<td align='center' width='200'>".$sum7."</td>";

			//$sum = $r[1]+$r[2]+$r[3]+$r[4]+$r[5]+$r[6]+$r[7];

			//$sum8=$sum8+$sum;

			//$sum1 = $sum1+$r[1];

			//$sum2 = $sum2+$r[2];

			//$sum3 = $sum3+$r[3];

			//$sum4 = $sum4+$r[4];

			//$sum5 = $sum5+$r[5];

			//$sum6 = $sum6+$r[6];

			//$sum7 = $sum7+$r[7];

			//$s=  $s1+$s2+$s3+$s4+$s5+$s6;

            $s1= $sum1+$s1;

            $s2 = $sum2+$s2;

			$s3 = $sum3+$s3;

			$s4 = $sum4+$s4;

			$s5 = $sum5+$s5;

			$s6 = $sum6+$s6;

			$s7 = $sum7+$s7;


		// echo "<td align='center'>".$m."</td>";

            echo "</tr>";

         }

		}

  }

	}

   }

echo "<tr>";

	        //echo "<td align='center' width='200'>Total</td>";

			 echo "<td align='center' width='200'>$heads</td>";
                 echo "<td align='center' width='200'></td>";
                 //echo "<td align='center' width='200'></td>";


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


	   for($i=0;$i<$cnt;$i++)

  {

if($i==0 || $i==30){

echo $mon_days[$i]; //print  no of months 
echo '&nbsp;';

 if($i==0)
{
        echo "To";
          echo '&nbsp;';

}


} 
	$res=mysqli_query($con,"select LOC_NAME, DESCRIPTION, sum(LMV), sum(LCV),sum(BUS), sum(HMV), sum(MAV), sum(OSV) from epe_veh_count where LOC_NAME='".$heads."' and EDATE = '".$mon_days[$i]."' group by DESCRIPTION order by EDATE "); //query part

	

     if(mysqli_num_rows($res)==0)

		{

		 //echo "no record is available with this details.";

	    }

	 else

	    {

		

         while($r=mysqli_fetch_row($res))

         {

            echo "<tr>";

			//echo "<td align='center' width='200'>".$r[10]."</td>";

            // echo "<td align='center'>".$mon_days."</td>";

			echo "<td align='center' width='200'>".$heads."</td>";

			// echo "<td align='center' width='200'>".$r[0]."</td>";

            echo "<td align='center' width='200'>".$r[1]."</td>";

            echo "<td align='center' width='200'>".$r[2]."</td>";

			echo "<td align='center' width='200'>".$r[3]."</td>";

			echo "<td align='center' width='200'>".$r[4]."</td>";

			echo "<td align='center' width='200'>".$r[5]."</td>";

			echo "<td align='center' width='200'>".$r[6]."</td>";

			echo "<td align='center' width='200'>".$r[7]."</td>";
		

			$sum = $r[1]+$r[2]+$r[3]+$r[4]+$r[5]+$r[6]+$r[7]; //sum of all the rows as total

			$sum8=$sum8+$sum;

			$sum1 = $sum1+$r[1];

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
echo "<tr>";

	        //echo "<td align='center' width='200'>Total</td>";

			echo "<td align='center' width='200'>".$heads."</td>"; //display name of location

            echo "<td align='center' width='200'>".$sum1."</td>"; //display sum as per the data

            echo "<td align='center' width='200'>".$sum2."</td>";

            echo "<td align='center' width='200'>".$sum3."</td>";

			echo "<td align='center' width='200'>".$sum4."</td>";

			echo "<td align='center' width='200'>".$sum5."</td>";

			echo "<td align='center' width='200'>".$sum6."</td>";

			echo "<td align='center' width='200'>".$sum7."</td>";

			echo "<td align='center' width='200'>".$sum8."</td>";
		
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
<!--footer-->
	<div id="footer">

		<div id="footer-valid">

			<a href=""> AJS Scale International </a>

		</div>

	</div>

</div>

</body>

</html>







