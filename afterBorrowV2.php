<?php 
	session_start();
	include("conn.php");
?>

<html>
	<head>
		<title>Thank You!</title>
	</head>
	<!-- STYLE -->
	<style>

		body {
            margin: 0;
            background: url(./images/bearThanksBg.png);
            background-repeat: no-repeat;
            background-attachment: center;
			background-position: center;
            background-size: cover;
        }

		.center {
			display: block;
			position: absolute;
			margin-left: 500px;
			top: 155px;
			width: 26%;
		}
	</style>
	<!-- BODY -->
	<body>
	<!-- THE BEAR AS BUTTON -->
		<img src="./images/bearThanksBear.png" alt="The Bear" usemap="#theBear" class="center">
		<map name="theBear">
			<area shape="poly" coords="105,763,102,639,120,540,
			129,495,107,479,88,429,
			103,387,127,354,156,332,
			185,316,174,305,152,310,
			129,313,102,303,94,285,85,
			267,93,257,97,250,79,203,49,
			205,21,165,24,128,35,117,50,111,
			74,112,85,117,113,80,135,64,177,
			51,216,51,243,53,259,54,277,36,300,
			28,320,31,335,50,342,67,344,91,318,131,
			324,146,327,178,345,178,351,190,421,113,441,
			108,474,146,497,185,346,402,382,578,371,763" alt="bear" href="logoutConfig.php">
		</map>
	</body>
</html>