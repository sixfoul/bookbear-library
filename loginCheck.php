<?php 
	session_start();
	include("conn.php");
	
	$id = $_POST["SarawakID"];
	$pword = $_POST["Password"];
	
	$query = "SELECT * FROM user WHERE SarawakID = '".$id."' AND Password = '".$pword."'";
	$result = mysqli_query($connection, $query);
	$numRow = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
	if($numRow == 0)
	{
		echo "<script type='text/javascript'>alert('USERNAME and PASSWORD does not exist');</script>";
		echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.html\"/>";
	}
	else
	{
		session_start();
		$_SESSION["userSarawakID"] = $row["SarawakID"];
		$_SESSION["userPassword"] = $row["Password"];
		$_SESSION["log"] = 1;
		header("Location:borrowV2.php");
	}
?>