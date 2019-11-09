<?php
include("connection.php");
error_reporting(1);
$uid=$_GET['uid'];
$set=$_POST['searchname'];
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
		<meta charset="utf-8">
		<meta lang="en-US">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" > -->
		<title>search</title>
		<style>
			*{
		      box-sizing: border-box;
		     }
			body{
				background-color:white;
				margin: 0;
				padding: 0;
			}
			.col-1{
			    width:8.333333333333333%;
			}
			.col-2{
			    width:16.66666666666667%;
			}
			.col-3{
			    width:25%;
			}
			.col-4{
			    width:33.33333333333333%;
			}
			.col-5{
			    width:41.66666666666667%;
			}
			.col-6{
			    width:50%;
			}
			.col-7{
			    width:58.33333333333333%;
			}
			.col-8{
			    width:66.66666666666666%;
			}
			.col-9{
			    width:75%;
			}
			.col-10{
			    width:83.33333333333333%;
			}
			.col-11{
			    width:91.66666666666666%;
			}
			.col-12{
			    width:100%;
			}
			.header,.aside,.nav,.section,.footer{
			    float:left;
			}
			.header{
			  overflow: hidden;
			  background-color:white;
			  height:60px;

			}
			.aside{
			  background-color:white;
			}
			.section{
				background-color:white;
				color: white;
			}
			ul{
			    list-style:none;
			    margin:0;
			    padding:0;
			}
			li{
			    float:left;
			    height:60px;
			    text-align:center;
			    padding-top:17px;
			}
			.fm1{
				padding-top:15px;
			}
		    hr { 
			    display: block;
                margin-top: 0.5em;
                margin-bottom: 0.5em;
                width: 75%;
                margin-left:154px;
                border-style: inset;
                border-width: 1px;
                color:blue;
		    }
	        .nm{
	        	margin-left:11%;
	        	color:blue;
	        }
	        .fm2{
	            display: none;
	        }
	        .mySlides{
		        width:100%;
		        height:400px;
		    } 
		    .image{
		      margin-left: 152px;
		    }
		    .my{
		      margin:5px;
		      margin-top:10px; 
		    }
		    .mname{
                position: absolute;
                font-size: 13px;
                /*top:665px;*/
                /*left: 0;*/
                width: 120px;
                height: 20px;
                text-align: center;
                /*left:142px;*/
                background: rgba(0,0,0,.49);
                color:white;
                padding-top: 2px;
            }
	    </style>
	</head>
	<body>
		<div class="row">
			<div class="col-12 header">
				 <ul>
				 	<li class="col-2" style="background-color:red"><a href="signup.php" style="font-size:20px;color: white;text-decoration: none;">MOVIE-REVIEW</a></li>
				    <li class="col-3"><a href="movies.php<?php echo'?uid='.$uid ?>" style="text-decoration: none;">HOME</a></li>
				    <li class="col-2"><a href="movies.php<?php echo'?uid='.$uid ?>" style="text-decoration: none;">MOVIES</a></li>
				    <li class="col-3"><a href="#" style="text-decoration: none;">DOWNLOADS</a></li>
				    <li class="col-2"><a href="#" style="text-decoration: none;">SONGS</a></li>
				</ul>   
			</div>
	    </div>
	    <div class="row">
	        <div class=" col-12 section">
	            <h3 class="nm">YOUR SEARCH RESULT...</h3><hr>
	            <form class="fm1" method="POST" action="search.php<?php echo'?uid='.$uid ?>">
				            <input type="text" placeholder="Search.." name="searchname" style="margin-top:20px;margin-left:155px;color:black;">
				            <button type="submit">search</button>
	            <div class="col-10 image">
					<?php
						if($set)
						   {
							    $show="SELECT * FROM `movies` WHERE `title` LIKE '%".$set."%' ";
								$data=mysqli_query($con,$show);
								$total=mysqli_num_rows($data);
								if($total) 
								{
									$a=157;
									$b=325;
									while($result=mysqli_fetch_array($data))
							        {
							          $i++;
				                      if($i==1)
				                      {  
				                         $a=157;
				                      }
				                      else
				                      {
				                         $a=$a+130;
				                      }
				                      if($i==9)
				                      {
				                        $a=157;
				                        $b=495;
				                      }
				                      if($i>9)
				                      {
				                        $b=495;
				                      } 
							            $j=$result['thumbnail'];
							            $k=$result['title'];
							            echo "<a href='moviereview.php?mid=$result[id]?uid=$_GET[uid]'><img class='my' src='cover/".$j.".jpg' style='width:120px;height:150px' alt='plase wait'></a>";
							            echo"<div class='mname' style='left:".$a."px;top:".$b."px;'>$k</div>"; 
								    }
								}
								else
							    {
							        echo "SORRY! nothing found";
							    }
						   }
					?>
	            </div>
	        </div>
	    </div><br> 
	</body>
</html>