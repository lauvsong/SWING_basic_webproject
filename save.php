<?php
	session_start();
	$con=mysqli_connect("localhost", "hyesong", "1234", "hyesong_db") or die(mysqli_error());
	
	$idx=$_GET['idx'];
	$name=$_POST['name'];
	$content=$_POST['content'];
	$title=$_POST['title'];
	$pass=$_POST['pass'];
	
	$query="select * from memo";
	$result=mysqli_query($con, $query);
	
	$name=$name.'('.$_SESSION['id'].')';

	if($pass!=NULL){
		$query2="insert into memo(name, title, date, text, id, view, pass) 
		values('$name', '$title', default, '$content', '$_SESSION[id]', 0, password('$pass'))";
		mysqli_query($con, $query2);
	}
	else{
		$query3="insert into memo(name, title, date, text, id, view) 
		values('$name', '$title', default, '$content', '$_SESSION[id]', 0)";
		mysqli_query($con, $query3);
	}
	if(isset($_FILES)){
		$filename=$_FILES['myfile']['name'];
		$uploadfile="upload/".$filename;
		move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadfile);

		$fileq="update memo set file='$filename' where num=$idx";
		mysqli_query($con, $fileq) or die ("Querry error");
	}
	
	Header("Location: board.html?i=0");
?>