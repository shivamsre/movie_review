<?php
include('connection.php');
error_reporting(1);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>signup</title>
		<style>
			body{
				margin-left:0;
				margin-top: 0;
				background-color: white;
				}
			.bx{
				background:blue;
				width: 500px;
				height: 500px;
				/*border: 2px solid green;*/
				margin: 50px auto;
				text-align: center;
				}
		</style>
	</head>
	<body>
			<div class="bx">
				<form action="" method="POST" id="demo">
					<p style="color: red;">UserName</p>
					<input type="text" name="name" id="name"><br><br>
					<p style="color: red;">Password</p>
					<input type="password" name="pass" placeholder="password" id="pass"><br><br>
					<input type="submit" name="submit" value="signUp"><br><br>
				</form>
					<p style="color: red;">already a user <a href="signIn.php" style="color: black;">signIn</a></p>
					<p style="color: green;">First create UserName and Password</p>
					<p style="color: red;">don't want to create account <a href="movies.php" style="color: black;">visit as a guest</a></p>
		    </div>
			<?php
		       if($_POST['submit'])
		       {    
		           	$nm=$_POST['name'];				           	
		       		$pa=$_POST['pass'];				       		
		       		if($nm!=""&&$pa!="")
		       		{	
		       			$sql = "SELECT * FROM users WHERE username='$nm'";
                        $result = mysqli_query($con,$sql);
                        $count=mysqli_num_rows($result);
                        if($count>0)
                        {
                        	die("There is already a user with that UserName!");
                        }
                        else
			       			$query="INSERT INTO users(username,password) VALUES('$nm','$pa')";
			       			$data=mysqli_query($con,$query);
			       			$sql1 = "SELECT * FROM users WHERE username='$nm'";
                        	$data1 = mysqli_query($con,$sql);
			       			$result=mysqli_fetch_assoc($data1);
			       			$i=$result['id'];
			       			if($data)
			       			{
			       				header('location:movies.php?uid='.$i);
			       			}
			       			else
			       			{
			       				echo"not inserted";
			       			}
		       		}
		       		else
		       		{
		       			echo "there must be an empty data field!";
		       		}
		       	}
			?>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script>
					$(document).ready(function(){ 
				    				$("#name").val('enter name...'); 
					});

			</script>
	</body>
</html>