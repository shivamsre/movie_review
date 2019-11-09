<?php
include("connection.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>signin</title>
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
				margin: 50px auto;
				text-align: center;
				}
		</style>
	</head>
	<body>
		<div class="bx">
			<form action="" method="POST" id="demo">

				<p style="color: red;">UserName</p>
				<input type="text" name="name" id="name">
				<p style="color: red;">Password</p>
				<input type="password" name="password" placeholder="password"><br><br>
				<input type="submit" name="submit" value="signIn"><br><br>
				<p style="color: red;">don't have an account <a href="signUp.php" style="color: black;">signUp</a></p>
			</form>
		</div>
		<?php
	       if(isset($_POST['submit']))
	       {    
	           	$username=$_POST['name'];
	       		$password=$_POST['password'];
	       		if($username!=""&&$password!="")
	       		{	
	       			$query= "SELECT * FROM users WHERE username='$username'";		       			
                    $data = mysqli_query($con,$query);	                   
                    $result=mysqli_fetch_assoc($data);	                    
                    $count=mysqli_num_rows($data);	                    	                    
                    $i=$result['id'];
                    $j=$result['username'];                     	                    
                    if($count>0)
                    {
                    	 header('location:movies.php?uid='.$i);
                    }
                    else
                    {
                    	echo"there is no user with that username or password!";
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
