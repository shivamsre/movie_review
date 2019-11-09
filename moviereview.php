<?php
include("connection.php");
error_reporting(1);
$uid=$_GET['uid'];
// echo"<p style='color:red;'>$uid</p>";
// $userid = substr($uid, -2);
// $random = rand(1,$length);
// $length = strlen($uid);
// echo"<p style='color:red;'>$length</p>";
// echo"<p style='color:red;'>$userid</p>";
$id=$_GET['mid'];
$query="SELECT * FROM MOVIES WHERE id='$id'";
// echo"<p style='color:red;'>$query</p>";
$data=mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
    <head>
    	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" > -->
    	<meta charset="utf-8">
    	<meta lang="en-US">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">      
    	<title>review</title>
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
      hr{ 
          display: block;
          margin-top: 1em;
          margin-bottom: 0em;
          width: 87%;
          margin-left:0px;
          border-style: inset;
          border-width: 1px;
      }
      .nm{
          font-size: 40px;
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
        max-width:100%; 
      }
      .movie,.coments{
          float: left;
      }
     .movieset{
          margin-top:1%;
          margin-left:100px;
          margin-bottom:1%;
      }
      table{
        width: 100%;
      }
      table,th,td{
        margin: 0;
        padding: 0;
        border: 1px solid black;
        border-collapse: collapse;
      }
      th,td{
        padding: 5px;
      }
      th{
        width: 25%;
      }
      </style>
    </head>
    <body onload="display()">
      	<div class="row">
      		<div class="col-12 header">
      			 <ul>
      			 	  <li class="col-2" style="background-color:red"><a href="signup.php" style="font-size:20px;color: white;text-decoration:none;">
                MOVIE-REVIEW</a></li>
      			    <li class="col-3"><a href="movies.php<?php echo'?uid='.$uid ?>" style="text-decoration: none;">HOME</a></li>
      			    <li class="col-2"><a href="onlinesearch.php<?php echo'?uid='.$uid ?>" style="text-decoration: none;">MOVIES</a></li>
      			    <li class="col-3"><a style="text-decoration: none;">DOWNLOADS</a></li>
      			    <li class="col-2"><a style="text-decoration: none;">SONGS</a></li>
      			 </ul>  
      		   <form class="fm1" method="POST" action="search.php<?php echo'?uid='.$uid ?>">
      		    	<div class="col-6 input-group">
      		    		<div class="len input-group">
      			         <input type="text" placeholder="Search.." name="searchname">
      			         <button type="submit"><i class="fa fa-search" ></i></button>
      		        </div>
                </div>
      		   </form>
             <form class="col-6 fm2" method="POST" action="search.php<?php echo'?uid='.$uid ?>">
               <input type="text" placeholder="Search.." name="searchname">
             </form>  
      		</div>
        </div>
        <div class="row" >
          <div class=" col-12 section">
              <div class="col-8 movie" style="border:1px solid red">
                <div class="movieset">
                  
                   <?php
                      $result=mysqli_fetch_assoc($data);
                      $t=$result['title'];
                      echo"<span class='nm' style='color:blue'>".$t."</span><hr>";
                      $j=$result['moviename'];
                      echo"<video class='my' src='movies/".$j.".mp4' style='width:720px;height:480px' controls='controls'></video>";
                   ?>
                </div>
              </div>

            <form method="POST" id="demo">
                <div class="col-4 coments" style="border:1px solid red">
                  <div class="col-12">
                      <h3><p style="color:blue">Please give us your feedback...</p></h3>                     
                      <tr > 
                        <td ><-----<b style="color:blue">RATINGS</b>-----></td>  
                        <td>
                          <input type="radio" name="rating1" value="LIKE"><span style="color:red"> LIKE</span>
                          <input type="radio" name="rating1" value="DISLIKE"><span style="color:red"> DISLIKE</span>
                        </td>
                      </tr>
                  </div><br>
                  <input type="text" name="coment" id="coment" placeholder="comments..." style="width:100%;color:black;"><br><br>
                  <input type="submit" name="submit" value="submit" style="color:green;border-style: none;">
                  <span style="color:blue"> give us your feedback...</span>
                  <?php
                  if($uid==0)
                  {
                    echo"<script>alert('signin first')</script>";
                  }
                else{
                     if($_POST['submit'])
                     {    


                          // echo "<script>console.log('hello')</script>";
                          $cm=$_POST['coment'];
                          $rt=$_POST['rating1'];             
                          if($cm!=""||$rt!="")
                          { 
                              $sql = "SELECT * FROM USERS WHERE id='$uid'";
                              // echo"<p style='color:red;'>  $sql</p>";

                              $data= mysqli_query($con,$sql) ;
                              $result=mysqli_fetch_assoc($data);
                              $name=$result['username'];
                              // echo"<p style='color:red;'> $name;</p>";
                              $uuid=$result['id'];
                              // echo"<p style='color:red;'> $id</p>";
                              $sql1 = "SELECT * FROM REVIEW WHERE moviename='$j'AND id='$uuid' ";
                              // echo"<p style='color:red;'>  $sql1;</p>";
                              $data1= mysqli_query($con,$sql1) ;
                              $count1=mysqli_num_rows($data1);
                              if($count1>0)
                              {
                                  $query="UPDATE REVIEW SET comments='$cm',rating='$rt' WHERE id='$uuid' AND moviename='$j'";
                                  // echo"<p style='color:red;'>  $query;</p>";
                                  $data=mysqli_query($con,$query);
                                  if($data)
                                  {
                                    // echo"data updated successfully";
                                  }
                                  else
                                  {
                                    // echo"not updated";
                                  }
                              }
                              else
                              {
                                $query="INSERT INTO REVIEW(MOVIENAME,USERNAME,COMMENTS,RATING,ID) VALUES('$j','$name','$cm','$rt','$uuid')";
                                // echo"<p style='color:red;'>  $query;</p>";
                                $data=mysqli_query($con,$query);
                                if($data)
                                {
                                  // echo"data inserted successfully";
                                }
                                else
                                {
                                  // echo"not inserted";
                                }
                              }
                          }
                          else
                          {
                            // echo "there is no comments";
                          }
                     }}
                 ?>
                 <div class="col-12"><br>
                 <input type="text" name="search" class="search" placeholder="enter user id..." style="width:80%;color:black;float: left;">
                 <input type="submit" name="submit1" value="search" style="width:20%;color:black;float: left;">
                 <?php
                 $search=$_POST['search'];
                 // echo $search;
                    if($_POST['submit1'])
                     {
                          echo"<table style='color:white;'>                         
                                     <tr>
                                        <th style='color:blue'>username</th>
                                        <th style='color:blue'>comments</th>
                                        <th style='color:blue'>rating</th><tr>
                                     </tr><br>
                                     </tr><br>";
                        //$search=$_POST['search'];
                        if($search!="")
                          {
                              $sql = "SELECT * FROM REVIEW WHERE id='$search' AND moviename='$j'";
                              //echo $sql;
                              $data= mysqli_query($con,$sql);
                              while($result=mysqli_fetch_assoc($data))
                              {
                                echo"<tr>
                                        <td style='color:red'>".$result['username']."</td>
                                        <td style='color:red'>".$result['comments']."</td>
                                        <td style='color:red'>".$result['rating']."</td>
                                     </tr>"."<br>";
                              }
                              echo "</table>";
                          }
                     }
                     echo"<br><br>
                                    <tr>
                                      <td>
                                        <input type='hidden' name='searchuser' value='$search'>
                                        <input type='submit' name='follow' value='follow' style='width:50%;color:black;float: left;'>
                                        <input type='submit' name='unfollow' value='unfollow' style='width:50%;color:black;float: left;'>                                      
                                      </td>
                                    </tr>";
                     if($_POST['follow'])
                                    {
                                        $search=$_POST['searchuser'];
                                        if($search!='')
                                        {
                                          $query= "SELECT * FROM follow WHERE user='$uid' AND following='$search'";
                                          $data = mysqli_query($con,$query);
                                          $count=mysqli_num_rows($data);
                                          if($count>0)
                                          {
                                              echo"<script>alert('alredy following')</script>";
                                          }
                                          else
                                          {
                                            $query="INSERT INTO FOLLOW(user,following) VALUES('$uid','$search')";
                                            $data=mysqli_query($con,$query);
                                            if($data)
                                            {
                                                 echo"<script>alert('user followed')</script>";
                                            }
                                            else
                                            {
                                                // echo"not inserted";
                                            }
                                          }
                                        }
                                    }
                     if($_POST['unfollow'])
                                    {
                                        $search=$_POST['searchuser'];
                                        if($search!='')
                                        {
                                        $query="DELETE FROM FOLLOW WHERE user='$uid' AND following='$search'";
                                        $data=mysqli_query($con,$query);
                                        if($data)
                                            {
                                                 echo"<script>alert('user unfollowed')</script>";
                                            }
                                        }
                                    }                   
                 ?>
               </div>
               <div id="display"></div>
                              <div id="coments"></div>
            </form>
          </div> <br>
        </div> 
  	    <script>
         function display()
         {
          document.getElementById("display").innerHTML = '<table> <tr> <th style="color:blue">username</th> <th style="color:blue">comments</th> <th style="color:blue">rating</th> </tr><br><?php  
                  $sql='SELECT * FROM follow WHERE user='.$uid.'';
                  $data = mysqli_query($con,$sql);
                  while($result=mysqli_fetch_assoc($data))
                  {
                  $following[]=$result['following'];
                  $n++;
                  } 
                  for($i = 0; $i <= $n; $i++)
                  {
                      $sql1='SELECT * FROM review WHERE id='.$following[$i].' AND moviename='.$j.'';
                      $data1 = mysqli_query($con,$sql1);
                      while($result=mysqli_fetch_assoc($data1))
                      {
                          echo '<tr><td style="color:red">'.$result['username'].'</td><td style="color:red">'.$result['comments'].'</td><td style="color:red">'.$result['rating'].'</td></tr><br>';
                      }
                  }
                  ?></table>';


                  document.getElementById("coments").innerHTML = '<h3 style="color:black;">ALL<span style="color:red;">_</span>comments</h3><table> <tr> <th style="color:blue">username</th> <th style="color:blue">comments</th> <th style="color:blue">rating</th> </tr><?php  
                  $sql='SELECT * FROM review';
                  $data = mysqli_query($con,$sql);
                  while($result=mysqli_fetch_assoc($data))
                  {
                     
                          echo '<tr><td style="color:red">'.$result['username'].'</td><td style="color:red">'.$result['comments'].'</td><td style="color:red">'.$result['rating'].'</td></tr><br>';
                      
                  }
                  ?></table>';
         }
        </script>
  </body>
</html>