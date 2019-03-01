<head>
		<title>swing web study</title>
		<link rel="stylesheet" href="top.css">
	</head>
	<body style="background-color:#ff4d4d">
	<div class="topnav">
	<font class="a" color="white" size="10"><b>Miraculous</b> Ladybug</font>
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
		</div></div><br>
<?php
	$con=mysqli_connect("localhost", "hyesong", "1234", "hyesong_db") or die(mysqli_error());
	$idx=$_GET['idx'];
	$query="select pass from memo where num=$idx";
	$result=mysqli_query($con, $query);
	$arr=mysqli_fetch_array($result);
	
	if($arr[pass]!=NULL){
		echo "<form method='post' action='check_pass.php?idx=$idx'><center>비밀번호를 입력하세요<br><br><input type='password' size=10 name='pass'>
		<input type='submit' value='ok'></center></fotm>";
	}
	else {
		Header("Location: view.html?idx=$idx");
		exit;
	}
?>