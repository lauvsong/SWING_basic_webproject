<?php
	$con=mysqli_connect("localhost", "hyesong", "1234", "hyesong_db") or die(mysqli_error());
	$idx=$_GET['idx'];
	
	$pass=$_POST['pass'];
	$query="select * from memo where num=$idx and pass=password('$pass')";
	
	$result=mysqli_query($con, $query) or die ("Query error");
	if(mysqli_num_rows($result)){
		Header("Location: view.html?idx=$idx");
		exit;
	}
	else {
		echo "<script>alert('비밀번호가 틀립니다');history.back()</script>";
		exit;
	}
?>