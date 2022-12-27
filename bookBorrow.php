<?php
	session_start();
	include("conn.php");
?>

<html>
	<head>
		<title>List of Book</title>
	</head>
	<!-- STYLE -->
	<style>
	
	</style>
	<body>
	<h1> test </h1>
		<div>
			<?php 
				if(isset($_SESSION["log"]))
				{
					$sql = "SELECT * FROM editborrow";
					$result = mysqli_query($connection,$sql) or die (mysqli_error($connection));
			?>
		
			<h1 align = "center"><?php echo $row["id"] ?></h1>
		
			<?php
				}
					
			?>
		</div>
	</body>
</html>