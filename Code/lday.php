<!DOCTYPE html>
<head>
<title>EPE Traffic Report</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen, print" />
<link rel="stylesheet" href="form.css" type="text/css" media="screen, print" />
<link rel="stylesheet" href="imgview.css" type="text/css" media="screen" />
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
   include_once 'dbconn.php'; 
  session_start();
  if($_SESSION['valid'])
	{
?>

<div id="wrapper">
	<div id="header">
	  <img src='images/ajs.jpg' height="80" align='left'/>
		<h1 >EPE Location Report</h1>
	</div>
	<div id="menu">
		<ul>
		<?php
		if($_SESSION['user_type']=='2')
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
<a href="logout.php" style="float:right;">Logout</a>
 <h2 align="center">Daily Report</h2>
 <center>
	 </br>
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
<div id="data">
<?php
	if (isset($_POST['submit'])) 

  {
  	//assigning an array to a variable
	$name=$_POST['date']; //storing the selected date in an array
    $name1=$_POST['heads']; // storing the selected location in an array
	$heads = $name1; 	//declaring the array
	//storing all locations in an array    
$loc = array("Kundli", "Baghapat","Duhai","Dasana","Bil Akbarpur","Sirsa","Maujpur","Palwal");
    //echo $name;
	//$end=date("Y-m-t", strtotime($name));
	//$start=date("Y-m-01", strtotime($name));
	//$year = date('Y', strtotime($name));
	//echo $end;
	//echo $start;
$date = $name;
$dt=date("d-m-Y", strtotime($name)); //Collecting date from selection and storing it in array
echo $dt; //to print the date
//echo $date;
echo '&nbsp;&nbsp;&nbsp;'; //for giving spaces in between
//$heads = $name1;
echo $heads; // print the selected location

//$week = date("W", strtotime($name)); 

//$weekday = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday","Total");

 // note: first arg to date() is lower-case L

//echo $week;

//echo $name;

 //$year = substr($name,0,4);

//$week_number = $week;

//$year = $year;


//Table part
 echo "<table  border='1' id='testTable' class='record'>";

		 echo "<tr align='center'>";

		 echo "   <th>DATE</th> <th>LOCATION_NAME</th>  <th>Description</th> <th>LMV</th>  <th>LCV</th>   <th>BUS/TRUCK</th>  <th>HMV</th>  <th>MAV</th>  <th>OSV</th>  <th>TOTAL</th>" ;

	     echo " </tr> ";

//for($day=1; $day<=7; $day++)

{

  //  $days = date('m/d/Y', strtotime($year."W".$week_number.$day))."\n";

	//echo $days;

	//$newDate = date("d-m-Y", strtotime($days));


	//echo $newDate;

	if($name=="" )

	{
		?>
		<script>
		alert("Please Select Valid Data");
		</script>
		<?php

	}

	$cnt = count($date); // count the number of days
 $cnt1 = count($loc);  //count the no of locations
 	   if(strcasecmp($heads, 'ALL') == 0) // comparison part
    {
		 echo $cnt1; //print the  no of locations
		 for($j=0;$j<$cnt1;$j++)
  {
  for($i=0;$i<$cnt;$i++)
  {
	$res=mysqli_query($con,"select LOC_NAME, DESCRIPTION, sum(LMV), sum(LCV),sum(BUS), sum(HMV), sum(MAV), sum(OSV) from epe_veh_count where EDATE = '".$date."' and LOC_NAME='".$loc[$j]."' group by DESCRIPTION order by EDATE "); //query part
     if(mysqli_num_rows($res)==0)
		{
		// echo "no record is available with this details.";
	    }
	 else
	   {
         while($r=mysqli_fetch_row($res))

         {

            echo "<tr>"; //Display all information in table

			//echo "<td align='center' width='200'>".$r[10]."</td>";

            // echo "<td align='center'>".$mon_days."</td>";

			echo "<td align='center' width='200'>".$dt."</td>";

			echo "<td align='center' width='200'>".$r[0]."</td>";

            echo "<td align='center' width='200'>".$r[1]."</td>";

            echo "<td align='center' width='200'>".$r[2]."</td>";

			echo "<td align='center' width='200'>".$r[3]."</td>";

			echo "<td align='center' width='200'>".$r[4]."</td>";

			echo "<td align='center' width='200'>".$r[5]."</td>";

			echo "<td align='center' width='200'>".$r[6]."</td>";

			echo "<td align='center' width='200'>".$r[7]."</td>";
			
			//echo "<td align='center' width='200'>".$r[8]."</td>";


			$sum =  $r[1]+$r[2]+$r[3]+$r[4]+$r[5]+$r[6]+$r[7]; //display total no of counts in all rows

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

			//echo "<td align='center' width='200'>".$r[7]."</td>";

			//$file_path = 'Android/uploads/';

			//$src=$file_path.$r[1]."/".$r[3]."/".$r[8];

			//echo "<td class='noExl'align='center' id='sky' width='20' height='20' ><img width='30' height='20' src=".$src." onclick='PopupPic(this)'></td>";

            echo "</tr>";

         }

		}

  }

	}

	}

  for($i=0;$i<$cnt;$i++)

  {



   if(!strcasecmp($heads, 'ALL') == 0)//comparison part

   {
	 $res=mysqli_query($con,"select LOC_NAME, DESCRIPTION, sum(LMV), sum(LCV),sum(BUS), sum(HMV), sum(MAV), sum(OSV) from epe_veh_count where EDATE = '".$date."' and LOC_NAME = '".$heads."' group by DESCRIPTION order by EDATE"); //query part
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
            echo "<td align='center'>".$dt."</td>";
		 	echo "<td align='center'>".$heads."</td>";
       
			// echo "<td align='center' width='200'>".$r[0]."</td>";

            echo "<td align='center' width='200'>".$r[1]."</td>";

            echo "<td align='center' width='200'>".$r[2]."</td>";

			echo "<td align='center' width='200'>".$r[3]."</td>";

			echo "<td align='center' width='200'>".$r[4]."</td>";

			echo "<td align='center' width='200'>".$r[5]."</td>";

			echo "<td align='center' width='200'>".$r[6]."</td>";

			echo "<td align='center' width='200'>".$r[7]."</td>";
                        
      
			$sum =  $r[1]+$r[2]+$r[3]+$r[4]+$r[5]+$r[6]+$r[7];

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

	echo "<td align='center' width='200'>TOTAL</td>";

	         echo "<td align='center' width='200'></td>";
      
            echo "<td align='center' width='200'>".$sum1."</td>";

            echo "<td align='center' width='200'>".$sum2."</td>";

            echo "<td align='center' width='200'>".$sum3."</td>";

			echo "<td align='center' width='200'>".$sum4."</td>";

			echo "<td align='center' width='200'>".$sum5."</td>";

			echo "<td align='center' width='200'>".$sum6."</td>";

			echo "<td align='center' width='200'>".$sum7."</td>";

			echo "<td align='center' width='200'>".$sum8."</td>";

			//echo "<td align='center' width='200'>".$sum9."</td>";

			 echo "</tr>";
  }
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
</div>
<!--Footer-->
	<div id="footer">
		<div id="footer-valid">
		<a href=""> AJS Scale International </a>
		</div>
	</div>
</div>
</body>
</html>





