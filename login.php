<?php
	session_start();
?>
<head>
	<link rel="stylesheet" href="top.css"></style>
</head>
<body style="background-color:#ff4d4d">
	<div class="topnav">
	<font class="a" color="white" size="10"><b>Miraculous</b> Ladybug
		<div class="active"; style="background-color:black"; height="10">	
			<a href="hyesong.html">About</a>
		<?php
			if (!$_SESSION['id']){
				echo "<a href='login.php'>login</a>";
			    echo "<a href='join_mysql.html'>join</a>";
			}
			else
				echo "<a href='logout.php'>logout</a>";
		?>
		<a href="board.html?i=0">board</a>
		</div></div>
<form name='form' method='post' action='check_db.php'>
	<font size='5'>ID : <input type='text' name='id'><br>
	PW : </font><input type='password' name='pass'><br>
	<input type='submit' value='Login'>
	<input type='reset' value='reset'>
</form>
</body>