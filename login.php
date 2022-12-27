<!DOCTYPE html>
<?php
	session_start();
	include("conn.php");
?>
<html>
    <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Login to Proceed </title>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: url(./images/login.png);
            background-repeat: no-repeat;
            background-attachment: center;
			background-position: center;
            background-size: cover;
        }

        #frm {
            font-family: arial;
            font-size: 14px;
            border: solid black 5px;
            width: 20%;
            border-radius: 20px;
            margin: 280px auto;
            background: #f2aec7;
            padding: 100px 80px;
			filter: drop-shadow(8px 8px 10px black);
			
        }

        #frm h2 {
            margin-left: 10px;
            margin-bottom: -10px;
        }
		

        .button {
			float: center;
			padding: 15px 32px;
			margin: 10px 70px;
			font-family: Georgia, 'Times New Roman', Times, serif;
			font-weight: 700;
			font-style: bold;
			letter-spacing: 4px;
			color: #f5e9e2;
			background-color: #773344;
			border: solid black 3px;
			border-radius: 25px;
        }
		.button:hover {
			border: solid black 3px;
			background-color: #ffcfe0;
			color: #773344;
			/* Start the shake animation and make the animation last for 0.5 seconds */
			animation: shake 2.0s;

			/* When the animation is finished, start again */
			animation-iteration-count: infinite;
		}
		
		@keyframes shake {
			0% { transform: translate(1px, 1px) rotate(0deg); }
			10% { transform: translate(-1px, -2px) rotate(-1deg); }
			20% { transform: translate(-3px, 0px) rotate(1deg); }
			30% { transform: translate(3px, 2px) rotate(0deg); }
			40% { transform: translate(1px, -1px) rotate(1deg); }
			50% { transform: translate(-1px, 2px) rotate(-1deg); }
			60% { transform: translate(-3px, 1px) rotate(0deg); }
			70% { transform: translate(3px, 1px) rotate(-1deg); }
			80% { transform: translate(-1px, -1px) rotate(1deg); }
			90% { transform: translate(1px, 2px) rotate(0deg); }
			100% { transform: translate(1px, -2px) rotate(-1deg); }
}

		a:link, a:visited {
			background-color: #f5515e;
			color: white;
			margin: 10px 85px;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			border: solid black 3px;
		}

		a:hover, a:active {
			background-color: red;
			border: solid black 3px;
		}
		
		h2 { 
			display: block;
			font-size: 1.5em;
			margin-top: -1.6em;
			margin-bottom: 0.83em;
			margin-left: 0;
			margin-right: 0;
			font-weight: bold;
		}		
		
		select {
			width: 100%;
			height: 50px;
			font-size: 100%;
			font-weight: bold;
			cursor: pointer;
			border-radius: 0;
			background-color: #d1527e;
			border: none;
			border-bottom: 2px solid #7d193c;
			color: white;
			padding: 10px;
			padding-right: 38px;
			appearance: none;
			-webkit-appearance: none;
			-moz-appearance: none;
			/* Adding transition effect */
			transition: color 0.3s ease, background-color 0.3s ease, border-bottom-color 0.3s ease;
		}
		
		.select-icon {
			position: absolute;
			top: 246px;
			right: 85px;
			width: 30px;
			height: 36px;
			pointer-events: none;
			border: 2px solid #962d22;
			padding-left: 5px;
			transition: background-color 0.3s ease, border-color 0.3s ease;
		}
		
		.select-icon svg.icon {
			transition: fill 0.3s ease;
			fill: white;
		}

		select:hover,
		select:focus {
			color: #660628;
			background-color: white;
			border-bottom-color: #94596e;
		}
		
		select:hover ~ .select-icon,
			select:focus ~ .select-icon {
			background-color: white;
			border-color: #DCDCDC;
		}
		select:hover ~ .select-icon svg.icon,
		select:focus ~ .select-icon svg.icon {
		fill: #c0392b;
		}
		
        
     </style>
    </head>
	
<body>     
    <div id="frm">
        <h2 style="text-align:center"> Please log in to proceed. </h2>
        <p style="margin-left: 10px;"> Enter your details to continue. </p>
        <form action="loginCheck.php" method="POST">
		<!-- SARAWAKID -->
            <p>
                <label><b>&nbsp;&nbsp;Sarawak ID: </b>	&nbsp;	&nbsp;</label>
                <input type="text" id="SarawakID" name="SarawakID"/>
            </p>
		<!-- PASSWORD -->
            <p> 
                <label><b>&nbsp; Password: </b>		&nbsp; &nbsp;	&nbsp; </label>
                <input type="password" id="Password" name="Password" />
            </p>
		<!-- CHOOSE PUSTAKA  -->
			<tr>
				 <label><b>&nbsp; Pustaka: </b>		&nbsp; &nbsp;	&nbsp; </label>
				<td>
					<select name = "pustaka_Ref">
						<?php 
							$sql = "SELECT * FROM pustaka";
							$query = mysqli_query($connection,$sql);
							while($row = mysqli_fetch_array($query))
							{
						?>
							<option value="<?php echo $row["pustakaCode"];?>"><?php echo $row["pustakaName"];?>
						<?php	
							}
						?>
					</select>
					<!-- ICON FOR THE SELECT -->
					<div class="select-icon">
						<svg focusable="false" viewBox="0 0 104 128" width="25" height="35" class="icon">
						<path d="m2e1 95a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm0-3e1a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm0-3e1a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm14 55h68v1e1h-68zm0-3e1h68v1e1h-68zm0-3e1h68v1e1h-68z"></path>
						</svg>
					</div>
				</td>
			</tr>
            <p>
                <input type="submit" class="button" value="Login"> 

            </p>
			<!-- BACK to INDEX -->
			<a href="index.html"> Back </a>
        </form>
    </div>

</body>
</html>