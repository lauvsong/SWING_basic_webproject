<?php
	session_start();
	
	$id=$_SESSION['id'];
	$con=mysqli_connect("localhost", "hyesong", "1234", "hyesong_db") or die(mysqli_error());
	$comment=$_POST['comment'];
	$idx=$_GET['idx'];
	
	$query="insert into comment values(null, $idx, '$comment', '$id')";
	mysqli_query($con, $query);
	Header("Location: view.html?idx=$idx");
?>