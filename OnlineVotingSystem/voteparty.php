<?php
session_start();
$host = "localhost";
 $username = "root";
 $password = "";
 $dbname = "test";
 
 
echo $_GET["party"]."<br>";
 
$party = $_GET["party"];

$con = mysqli_connect($host,$username,$password,$dbname);
//$con = $_SESSION["con"];

$mobileno = $_SESSION["mobileno"];
$voteparty = "UPDATE onlinevoting set Vote = 1, party ='".$party."' where Mobileno ='".$_SESSION["mobileno"]."'";

$votecountrequest = "select vote_count from political_parties where Party_name ='".$party."'";
echo $votecountrequest;

$resultcount = mysqli_query($con,$votecountrequest);

if(mysqli_num_rows($resultcount) > 0)
{
	$row = mysqli_fetch_assoc($resultcount);
	$count = $row["vote_count"];
	echo $count;
}

//echo $voteparty;
$voteupdate = "update political_parties set vote_count =".$count."+1 where Party_name = '".$party."'";
echo "<br>".$voteupdate;

mysqli_query($con,$voteupdate);
$result = mysqli_query($con,$voteparty);


if ($result) {
  //echo "<br> New record updated successfully";
}	

else
	{
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
?>