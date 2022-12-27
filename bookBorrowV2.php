<?php
	session_start();
	include("conn.php");
?>

<html>
	<head>
		<title>BookBear Borrow</title>
	</head>
	<style>

	body {
		background: url(./images/berrySit.png) no-repeat center;
        background-size: cover;
        -webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
	}

	.container {
		height: 50%;
        background-color: #773344; /* For browsers that do not support gradients */
        background: linear-gradient(-45deg, #0b0014, #773344, #d44d5c);
	    background-size: 400% 400%;
	    animation: gradient 5s ease infinite;
        border-radius: 25px;
		float: left;
        margin: 130px auto;
		margin-left: 200px;
        padding: 50px;
        width: 20%;
        overflow: auto;
        overflow-y: scroll; /* Add the ability to scroll */
	}

	
    @keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}	

  	/* Hide scrollbar for Chrome, Safari and Opera */
	  .container::-webkit-scrollbar {
    display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .container {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
    }

	.container h2 {
		color: white;
		text-align: justify;
		margin-bottom: 30px;
	}

	.info {
		font-family: arial;
		text-transform: uppercase;
		font-size: 15px;
		font-weight: bold;
		color: white;
	}

	.button {
		font-weight: bold;
 		border: none;
		margin-top: 50px;
		margin-left: 70px;
  		font-size: 12px;
		width: 50%;
  		background-color: #e3b5a4;
  		color: #773344;
  		border-radius: 25px;
  		padding: 5px 10px;
  		letter-spacing: 2px;
		text-transform: uppercase;
	}

	.button:hover {
		background-color: #773344;
  		color: #e3b5a4;
  		transition: .5s ease;
	}

	</style>
	<!-- BODY -->
	<body>
		<?php 
			if(isset($_SESSION["log"]))
			{
				$id = $_GET['id'];
				$sql = "SELECT * FROM books WHERE id = '".$id."'";
				$result = mysqli_query($connection,$sql) or die(mysqli_error($connection));
				$row = mysqli_fetch_array($result);
		?>
		<div class="container">
		<!-- FORM -->
		<form action = "bookBorrowConfig.php" method="post">
		<h2> Confirm your booking. </h2>
			<!-- ID -->
					<div class="info">
						<p> ID of Book Chosen: </p> 
						<input name="id" type="text" size="80" value="<?php echo $id ?>" readonly="readonly" style="color: white; width: 200px; border: none; background: transparent;"/>
					
				<!-- NOTE -->
						<p> Additional Information? </p>
						<input name="note" placeholder="Insert additional information here..." type="text" size="200" value="<?php echo $row["note"] ?>"  style="width: 300px; height: 100px;" />
					</div>
				<!-- BUTTON -->
						<input class="button" type="submit" name="submitEdit" value="Submit" />		
		</form>
		</div>	
		<?php 
			}
			else
				echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.html\"/>";
		?>
	</body>
</html>