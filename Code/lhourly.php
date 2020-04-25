<!DOCTYPE html>
<head>
<title>Location Wise Traffic Report</title>
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
		<h1 >Location Wise Traffic Report</h1>
	</div>
	<div id="menu">
		<ul>
		<?php
		if($_SESSION['user_type']=='2')
		{
		?>
		<li><a href="register.php">Register</a></li>
		<li><a href="status.php">Status</a></li>
		<?php
		}

		?>

			<li><a href="lDay.php">Daily Report</a></li>

			<li><a href="lhourly.php">Hourly Report</a></li>

			<li><a href="lweekly.php">Weekly Report</a></li>

			<li><a href="lmonth.php">Monthly Report</a></li>

			<li><a href="lyearly.php">Yearly Report</a></li>

		</ul>

	</div>
<div id="form">

<form class="forms" action="" method="post">

<a href="location.php">Go Back</a>

<a href="logout.php" style="float:right;">Logout</a>

<h2 align="center">Hourly Report</h2>

<center>

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

       <option value="" disabled selected>--select--</option>

		<option value="ALL" >ALL</option>

        <option value="Kundli" >Kundli</option>

		<option value="Baghapat" >Baghapat</option>

		<option value="Duhai" >Duhai</option>

		<option value="Dasna" >Dasna</option>

		<option value="Bil Akbarpur" >Bil Akbarpur</option>

		<option value="Sirsa" >Sirsa</option>

		<option value="Maujpur" >Maujpur</option>

		<option value="Palwal" >Palwal</option>sss

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



<th>&nbsp; &nbsp;  &nbsp;

	<!--<input type="button" id="export-btn" value="Export"></th>-->

</tr>
</form>

<div id="data">

<?php
	if (isset($_POST['submit'])) 

  {

	  $name=$_POST['date']; //storing the selected date in an array

	  $name1=$_POST['heads'];// storing the selected location in an array

       echo $name; //print selected date

  	   echo $name1; //print selected location
 
      $heads = $name1; 
//storing time according to the data in an array
$timesl = array('00 TO 01','01 TO 02','02 TO 03','03 TO 04','04 TO 05','05 TO 06','06 TO 07','07 TO 08','08 TO 09','09 TO 10','10 TO 11','11 TO 12','12 TO 13','13 TO 14','14 TO 15','15 TO 16','16 TO 17','17 TO 18','18 TO 19','19 TO 20','20 TO 21','21 TO 22','22 TO 23','23 TO 24'); 
//storing all locations in an array    
	$loc = array("KPE1","PKX1","KSX2","SPE2","SKDP2","PSKD2","PDX2","DKE2","BMX3","PMX3","MPE3","MKE3","KGX3","PGX3","GPE3","GKE3","KMX4","PMX4","MPE4","MKE4","KGX4","PGX4","GPE4","GKE4","KAX5","PAX5","APE5","AKE5","KGX5","PGX5","GPE5","GKE5","KBX6","BPE6","BKKP6","PBKK6","PKX6","KKE6","KCX7","CPE7","CKAP7","PCKA7","PAX7","AKE7","KPX8","PKE8","AKE7-2");     
//table structure code
		echo "<table  border='1' id='testTable' class='record'>";

		 echo "<tr align='center'>";

		 echo "  <th>DATE</th>   <th>HOUR</th> <th>LOCATION_NAME</th> <th>LMV</th>  <th>LCV</th>   <th>2-AXLE</th>  <th>3-AXLE</th>  <th>4 TO 6 AXLE</th>  <th>7 OR MORE AXLE</th>  <th>HCM-EME</th> <th>TOTAL</th>" ;

	     echo " </tr> ";

$c=count($timesl); //count the time as per database

$c1=count($loc); //count the no. of locations

	if($name=="" )

	{

		?>

		<script>

		alert("Please Select Valid Data");

		</script>

		<?php

	}

	if(strcasecmp($heads, 'ALL') == 0)

	{

	for($j = 0; $j <=$c1 ; $j++) 

	{

	for($i = 0; $i <=$c ; $i++)

	{
		 echo $l;	

		  //echo $c1;

		  echo $t;	

			 $res=mysqli_query($con,"select LOC_NAME,VEH1, VEH2, VEH3, VEH4, VEH5, VEH6, VEH7  from epe_veh_count where LOC_NAME='".$loc[$j]."' and TIME_TYPE = '".$i."' and EDATE = '".$name."'  "); //query part

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

			

            echo "<td align='center'>".$name."</td>";

			 //echo "<td align='center'>".$name1."</td>";

			echo "<td align='center'>".$timesl[$i-1]."</td>";

			//echo "<td align='center'>".$l."</td>";

			echo "<td align='center' width='200'>".$r[0]."</td>";

            echo "<td align='center' width='200'>".$r[1]."</td>";

            echo "<td align='center' width='200'>".$r[2]."</td>";

			echo "<td align='center' width='200'>".$r[3]."</td>";

			echo "<td align='center' width='200'>".$r[4]."</td>";

			echo "<td align='center' width='200'>".$r[5]."</td>";

			echo "<td align='center' width='200'>".$r[6]."</td>";

			echo "<td align='center' width='200'>".$r[7]."</td>";

			$sum =  $r[1]+$r[2]+$r[3]+$r[4]+$r[5]+$r[6]+$r[7];

			$sum8 = $sum8+$sum;

			$sum1 = $sum1+$r[1];

			$sum2 = $sum2+$r[2];

			$sum3 = $sum3+$r[3];

			$sum4 = $sum4+$r[4];

			$sum5 = $sum5+$r[5];

			$sum6 = $sum6+$r[6];

			$sum7 = $sum7+$r[7];

			

            echo "<td align='center'>".$sum."</td>";

			//echo "<td align='center' width='200'>".$r[7]."</td>";

			//$file_path = 'Android/uploads/';

			//$src=$file_path.$r[1]."/".$r[3]."/".$r[8];

			//echo "<td class='noExl'align='center' id='sky' width='20' height='20' ><img width='30' height='20' src=".$src." onclick='PopupPic(this)'></td>";

            echo "</tr>";

         }

		 

		 }



	//}

	}

	}

}

	for($i = 0; $i <=$c ; $i++)

	{



	if($heads != "ALL")

	{

	 
//query part
	 $res=mysqli_query($con,"select LOC_NAME, VEH1, VEH2, VEH3, VEH4, VEH5, VEH6, VEH7 from epe_veh_count where TIME_TYPE = '".$i."' and EDATE = '".$name."' and LOC_NAME ='".$heads."'"); 

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

			

            echo "<td align='center'>".$name."</td>";

			 //echo "<td align='center'>".$name1."</td>";

			echo "<td align='center'>".$timesl[$i-1]."</td>";

			 echo "<td align='center' width='200'>".$r[0]."</td>";

            echo "<td align='center' width='200'>".$r[1]."</td>";

            echo "<td align='center' width='200'>".$r[2]."</td>";

			echo "<td align='center' width='200'>".$r[3]."</td>";

			echo "<td align='center' width='200'>".$r[4]."</td>";

			echo "<td align='center' width='200'>".$r[5]."</td>";

			echo "<td align='center' width='200'>".$r[6]."</td>";

			echo "<td align='center' width='200'>".$r[7]."</td>";

			$sum =  $r[1]+$r[2]+$r[3]+$r[4]+$r[5]+$r[6]+$r[7]; // calculating total as per rows

			$sum8=$sum8+$sum;

			$sum1 = $sum1+$r[1];

			$sum2 = $sum2+$r[2];

			$sum3 = $sum3+$r[3];

			$sum4 = $sum4+$r[4];

			$sum5 = $sum5+$r[5];

			$sum6 = $sum6+$r[6];

			$sum7 = $sum7+$r[7];

			

            echo "<td align='center'>".$sum."</td>"; // displaying of all total count

            echo "</tr>";

         }

		 

		 }

	}

   

		

}

	echo "<tr>";

	         echo "<td align='center' width='200'>Total</td>";

			  echo "<td align='center' width='200'></td>";

			  			  echo "<td align='center' width='200'></td>";

            echo "<td align='center' width='200'>".$sum1."</td>";

            echo "<td align='center' width='200'>".$sum2."</td>";

            echo "<td align='center' width='200'>".$sum3."</td>";

			echo "<td align='center' width='200'>".$sum4."</td>";

			echo "<td align='center' width='200'>".$sum5."</td>";

			echo "<td align='center' width='200'>".$sum6."</td>";

			echo "<td align='center' width='200'>".$sum7."</td>";

			echo "<td align='center' width='200'>".$sum8."</td>";

			

			 echo "</tr>";

   

  }//end of table

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





