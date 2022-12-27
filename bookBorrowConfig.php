<?php 
	session_start();
	include("conn.php");
	
	$a = $_POST["id"];
	$b = $_POST["note"];
	
	$sql = "UPDATE books SET note = '".$b."' WHERE id = '".$a."'";
	$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
	if($result)
	{
		echo "<script type='text/javascript'>alert('Item has been successfully edited');</script>";
		echo "<meta http-equiv=\"refresh\" content=\"2;URL=afterBorrowV2.php\"/>";
	}
	else
		die(mysqli_error($connection));
?>