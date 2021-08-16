<html>

<body>
<form action="submit.php" method="get">
Username : <input type = "textbox" name = "username"> </br> </br>
Contact No. : <input type = "textbox" name = "mobileno"> </br>
<input type="submit" value="Submit">
</form>
</body>

</html>

<?php 
$host = "localhost";
 $username = "root";
 $password = "";
 $dbname = "test";
 
 $con = mysqli_connect($host,$username,$password,$dbname);
 

$getcount = "select Party_name,vote_count from political_parties";
$result = mysqli_query($con,$getcount);

 
 if (mysqli_num_rows($result) > 0)
 {
	// echo "user exists";
	 
	while($row = mysqli_fetch_assoc($result))
	 
	 {
		 $partyname = $row['Party_name'];
		 $vote_count = $row['vote_count'];
		
		 echo $partyname."= ".$vote_count."<br>";
	 }
 }
?>
