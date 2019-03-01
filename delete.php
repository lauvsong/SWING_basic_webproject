<?php
	session_start();
	
	$con=mysqli_connect("localhost", "hyesong", "1234", "hyesong_db") or die(mysqli_error());
	$idx=$_GET['idx'];
	$query="select * from memo where num=$idx";
	$result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	
	if ($_SESSION[id]!= $row[id]){
		echo "<script>alert('권한이 없습니다');history.back()</script>";
		exit;
	}
	
	$query="delete from memo where num=$idx";
	
	mysqli_query($con, $query) or die("Delete die");
	
	
	Header("Location: board.html?i=0");
?>