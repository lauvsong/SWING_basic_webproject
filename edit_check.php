
<?php
	$con=mysqli_connect("localhost", "hyesong", "1234", "hyesong_db") or die(mysqli_error());
	$idx=$_GET['idx'];
	$title=$_POST['title'];
	$content=$_POST['content'];
	
	$query1="update memo set title='$title' where num=$idx";
	$query2="update memo set text='$content' where num=$idx";
	
	mysqli_query($con, $query1) or die("Title die");
	mysqli_query($con, $query2) or die("Content die");
	
	Header("Location: board.html?i=0");
?>