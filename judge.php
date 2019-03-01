<?php
	session_start();
	
	$id=$_POST['id'];
	$pass=$_POST['pass'];
	$sex=$_POST['gender'];
	$check=$_POST['check'];
	$con=mysqli_connect('localhost', 'hyesong', '1234', 'hyesong_db');
	
	if($id && $pass){
		if($_SESSION['checked']){
			if($_SESSION['userid']==$id){
				echo "<script>alert('회원가입 성공')</script>";
				Header("Location: login.php");				
			}
			else{
				echo "<script>alert('아이디 중복확인을 통과해주세요');history.back()</script>";
				exit;
			}
		}
		else{
			echo "<script>alert('아이디 중복확인을 통과해주세요');history.back()</script>";
			exit;
		}
	}
	else{
		echo "<script>alert('입력 정보가 부족합니다');history.back()</script>";
		exit;
	}
	$data="";
	foreach($check as $value){
		$data=$data." ".$value;
	}
	
	$query="insert into sign values ('$id', password('$pass'), '$sex', '$data')";
	mysqli_query($con, $query);
	
	mysqli_close($con);
	session_destroy();
?>