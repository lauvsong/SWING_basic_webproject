<?php
	session_start();
?>
	<head>
		<title>swing web study</title>
		<link rel="stylesheet" href="top.css">
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
		</div></div><br>
<?php
	$con=mysqli_connect("localhost", "hyesong", "1234", "hyesong_db") or die(mysqli_error());
	$idx=$_GET['idx'];
	$query="select * from memo where num=$idx";
	$result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	
	
	if ($_SESSION[id]!= $row[id]){
		echo "<script>alert('권한이 없습니다');history.back()</script>";
		exit;
	}

	echo "<form method='post' action='edit_check.php?idx=$row[num]'>
	<font size='5'>글 수정</font>
	<table border='1'>
		<tr>
			<td>글쓴이</td><td>$row[name]</td>
		</tr>
		<tr>
			<td>제목</td><td><input type='text' name='title' size='50' value=$row[title]></td>
		</tr>
		<tr>
			<td>글</td><td><textarea rows='10' cols='55' name='content'>$row[text]</textarea></td>
		</tr>
			<td><input type='submit' value='수정'>  <input type='reset' value='취소'></td>
		</tr>
	</table></form>";
?>