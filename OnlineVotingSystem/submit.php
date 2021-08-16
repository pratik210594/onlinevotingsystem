
 <?php
 
 session_start();
 
 $host = "localhost";
 $username = "root";
 $password = "";
 $dbname = "test";
 
 $con = mysqli_connect($host,$username,$password,$dbname);
 
 
 if(!$con)
 {
	 echo "Error";
 }
 else
 {	
 /*$_SESSION["con"] = $con;
 echo $con;*/
 $username = $_GET["username"];
 $mobileno = $_GET["mobileno"];
 $_SESSION["username"] = $username;
 $_SESSION["mobileno"] = $mobileno;
 
 
 $checkuserexist = "select * from onlinevoting where mobileno='".$mobileno."'";
 $result = mysqli_query ($con, $checkuserexist); 
 
 if (mysqli_num_rows($result) > 0)
 {
	// echo "user exists";
	 
	 $row = mysqli_fetch_assoc($result);
	 
		$a = $row['Vote'];
		if ($a)
		{
		//echo  $a; 
		echo "ALREADY VOTEd";
		}
		else
		{
?>

<html>
<body>

<form action = "voteparty.php" method="get">
<input type = "radio" id = "BJP" name="party" value="BJP">BJP <br>

<input type = "radio" id = "Congress" name="party" value="Congress">Congress <br>
 
<input type = "radio" id = "Samaajwadi" name="party" value="Samaajwadi">Samaajwadi <br>

<input type = "submit" Value ="VOTE">
</form>
</body>
</html>
<?php	 
		} 
 } 
 else
 {
 mysqli_query($con,"insert into onlinevoting (mobileno,username) values ('".$mobileno."','".$username."')");
 }
 } 
 ?>  
