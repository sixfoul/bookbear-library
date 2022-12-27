<?php 
	session_start();
	include("conn.php");
?>

<html>
	<head>
		<title>Borrow Today.</title>
		<!-- STYLE -->
		<style>

		body {
        background: url(./images/borrow_BGv2.png) no-repeat center;
        background-size: cover;
        -webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
        height: 1000px;
        overflow-y: hidden;
    }

	.container {
        height: 200px;
        background-color: #773344; /* For browsers that do not support gradients */
        background: linear-gradient(-45deg, #773344, #d44d5c, #e3b5a4);
	      background-size: 400% 400%;
	      animation: gradient 5s ease infinite;
        border-radius: 25px;
        margin: 50px auto;
        padding: 50px;
        width: 70%;
        height: 50%;
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

	.container .sidetext {
        background: -webkit-linear-gradient(#B0C4DE, #FFD700, #ADFF2F, #FFA07A);
        cursor: default;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        writing-mode: vertical-rl;
        text-orientation: mixed;
        text-align: justify;
        position: fixed;
        font-family: arial;
        text-transform: uppercase;
        letter-spacing: 10px;
        margin-top: -35px;
        margin-left: -2.5%;
        margin-bottom: 30px;
    }


    .container .second-sidetext {
        background: -webkit-linear-gradient(#B0C4DE, #FFD700, #ADFF2F, #FFA07A);
        cursor: default;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        writing-mode: vertical-rl;
        text-orientation: mixed;
        text-align: justify;
        position: fixed;
        font-family: arial;
        text-transform: uppercase;
        letter-spacing: 7px;
        margin-top: -25px;
        margin-left: 69%;
        margin-bottom: 30px;
    }

  .container .second-sidetext:hover {
    background: -webkit-linear-gradient(#B0C4DE, #FFD700, #ADFF2F, #FFA07A);
    cursor: default;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    transition: .5s ease;
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

.search-bar {
  position: fixed;
  top: 15px;
  margin-right: 10%;
  border-radius: 25px;
}

.search-bar .the-bar {  
  padding: 1px 20px;
  border-radius: 25px;
  border: none;
}

.search-bar .button {
  font-weight: bold;
  border: none;
  font-size: 10px;
  background-color: #773344;
  color: #e3b5a4;
  border-radius: 25px;
  padding: 5px 10px;
  letter-spacing: 2px;
}

.search-bar .button:hover {
  background-color: #e3b5a4;
  color: #773344;
  transition: .5s ease;
}

.flip-card {
  background-color: transparent;
  width: 180px;
  height: 270px;
  perspective: 1000px;
  float: left;
  margin: 40px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: left;
  transition: transform 0.6s ease;
  transform-style: preserve-3d;
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  border-radius: 25px;
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
}

.flip-card-back {
  background-image: linear-gradient(#773344, #d44d5c);
  color: #f5e9e2;
  transform: rotateY(180deg);
}

.text {
  margin: 50px 20px 20px 20px;
  letter-spacing: 1px;
  font-family: arial;
  font-size: 10px;
}

.title {
  font-size: 12px;
  font-weight: bold;
  margin-bottom: 10px;
}

.available {
  color: white;
  font-weight: bold;
}

.borrow-button a {
    text-transform: uppercase;
    text-decoration: none;
    font-weight: bold;
    font-size: 9px;
    border-radius: 25px;
    letter-spacing: 1px;
    font-family: arial;
    border: none;
    cursor: pointer;
    color: #f5e9e2;
    background-color: #773344;
    padding: 10px 30px;
    position: absolute;
    bottom: 20px;
    left: 20%;
}

.borrow-button a:hover {
  background: #f5e9e2;
  color: #773344;
  border-color: #773344;
  transition: .5s ease;
}

.back-button a {
    text-decoration: none;
    background-color: #773344;
    color: white;
    padding: 10px 30px;
    position: absolute;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 12px;
    border-radius: 25px;
    letter-spacing: 3px;
    font-family: arial;
    border: none;
    cursor: pointer;
    bottom: 20px;
    right: 12%;

}

.back-button a:hover {
  background: #e3b5a4;
  color: #773344;
  border-color: #773344;
  transition: .5s ease;
}

.back-button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.back-button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.2s;
}

.back-button:hover span {
  padding-right: 25px;
}

.back-button:hover span:after {
  opacity: 1;
  right: 0;
}
	
		</style>
	</head>
	
	
	<!-- BODY -->
	<body>
		<?php 
			if(isset($_SESSION["log"]))
			{
				$NAME="";
				if(isset($_POST["itemSearch"]))
					{
						$NAME=$_POST["Title"];
					}
				$sql = "SELECT * FROM books WHERE Title LIKE '%".$NAME."%'";
				$result = mysqli_query($connection,$sql) or die (mysqli_error($connection));
		?>
		
		<div class="container">
		<h1 class="sidetext"><i> List of Latest Books </i></h1>
    <h1 class="second-sidetext"><i> Read. Innovate. Excel. </i></h1>
    <div class="search-bar">
    <!-- SEARCH BAR -->
		<form action="borrowV2.php" method="post">
          <input class="the-bar" placeholder="Search book..." name="Title" type="text" size="10" maxlength="100"/>
          <input class="button" name="itemSearch" type="submit" value="SEARCH"/>
    </form>
        </div>
				<?php	
					$x = 1;
					while($row = mysqli_fetch_array($result))
					{
				?>
				<div class="flip-card">
  				<div class="flip-card-inner">
    			<div class="flip-card-front">
          <?php echo "<img src='{$row["Images"]}' width='180px' height='270px'>" ?>
				</div>
				
				<div class="flip-card-back">
          <div class="text">
					<div class="title"> <?php echo $row["Title"] ?> <br> </div>
					Written by <?php echo $row["Author"] ?> <br>
					Published by <?php echo $row["Publisher"] ?> <br><br>
					<div class="available"> Currently <?php echo $row["Availability"] ?> </div> <br>
					<!-- BUTTON -->
            <div class="borrow-button"> <a href = "bookBorrowV2.php?id=<?php echo $row["id"];?>">Borrow</a><br><br> </div>
          </div>
   				</div>
  				</div>
				</div>	
				
				<?php
					$x++;
					}
        ?>
        
        <!-- back button -->
        <div class="back-button"><a href="index.html"><span>RETURN.</span></a>

				</div>
		<!-- REFRESH -->
		<?php 
			}
			else
				echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.html\"/>";
		?>
	
	</body>
</html>