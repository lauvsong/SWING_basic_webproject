<?php
	session_start();
	
	$id=$_POST['id'];
	$pass=$_POST['pass'];
	
	$con=mysqli_connect('localhost', 'hyesong', '1234', 'hyesong_db');
	$query="select id from sign where pass=password('$pass')";
	$result=mysqli_query($con, $query);
	
	if ($result){
		$arr=mysqli_fetch_array($result);
		if ($arr[id]==$id){
			echo "<script>alert('로그인 성공')</script>";
			$_SESSION['id']=$id;
			$_SESSION['pass']=$arr[pass];
			Header("Location: hyesong.html");
			exit;
		}
		else{
			echo "<script>alert('로그인 실패'); history.back()</script>";
		}
	}
	else{
		echo "<script>alert('로그인 실패'); history.back()</script>";
	}
	
	mysqli_close($con);
?>