<?php
	
	session_start();
	
	$con=mysqli_connect('localhost', 'hyesong', '1234', 'hyesong_db');
	$userid=$_GET['userid'];
	
	$query="select * from sign where id='$userid'";
	$result=mysqli_query($con, $query);
	
	if (mysqli_num_rows($result)==0){
		echo "<font size='3'>사용가능한 아이디입니다</font>";			
		$_SESSION['checked']=true;
		$_SESSION['userid']=$userid;
	}
	else{
		echo "<font size='3'>이미 존재하는 아이디입니다</font>";
	}
?>
<button onclick=window.close()>닫기</button>