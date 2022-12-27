<?php
	session_start();
	unset($_SESSION['SarawakID']);
	unset($_SESSION['Password']);
	unset($_SESSION['log']);
	
	session_destroy();
	
	echo "<meta http-equiv=\"refresh\" content=\"2;url=index.html\">";
?>