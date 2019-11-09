<?php
include("connection.php");
error_reporting(1);
$uid=$_GET['uid'];
// echo "<script>console.log($id)</script>";
$query="SELECT * FROM MOVIES";
$data=mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
    <head>
      	<meta charset="utf-8">
      	<meta lang="en-US">
      	<meta name="viewport" content="width=device-width, initial-scale=1.0">      	
      	<title>movies</title>
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
            /*margin-top: -20px;*/
          }
          .aside{
            background-color: white;
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
              margin-top: 0.5em;
              margin-bottom: 0.5em;
              width: 75%;
              margin-left:154px;
              border-style: inset;
              border-width: 1px;
              color:blue;
          }
          .nm{
           	margin-left:47%;
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
             /* position: relative;*/
              margin-left: 152px;
               
          }
          .my{
              margin:5px;
              margin-top:10px; 
              width:120px;
              height:150px
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
                padding-top: 2px;
                color:white;
        }
          </style>
    </head>
    <body>
    	<div class="row">
    		<div class="col-12 header">
    			 <ul>
    			 	  <li class="col-2" style="background-color:red"><a href="signup.php" style="font-size:20px;color: white;">MOVIE-REVIEW</a></li>
    			    <li class="col-3"><a href="movies.php<?php echo'?uid='.$uid ?>" >HOME</a></li>
    			    <li class="col-2"><a href="onlinesearch.php<?php echo'?uid='.$uid ?>" >MOVIES</a></li>
    			    <li class="col-3"><a>DOWNLOADS</a></li>
    			    <li class="col-2"><a>SONGS</a></li>
    			 </ul>  
    		</div>
      </div>
      <div class="row">
    	    <div class="col-12 aside">
    	    	  <img class="mySlides" src="images/a.jpg"  alt="please wait">
    			    <img class="mySlides" src="images/b.jpg"  alt="plase wait">
    			    <img class="mySlides" src="images/c.jpg"  alt="please wait">
    			    <img class="mySlides" src="images/d.jpg"  alt="please wait">
    			    <img class="mySlides" src="images/e.jpg"  alt="please wait">
    	    </div>
      </div> 
      <div class="row">
         <form class="fm1" method="POST" action="search.php<?php echo'?uid='.$uid ?>">
                     <input type="text" placeholder="Search.." name="searchname" style="margin-top:20px;margin-left:155px; ">
                     <button type="submit">search</button>
             </form>
                <h3 class="nm">MOVIES</h3><hr>
            <div class="col-10 image">
              
<!--                 <a href=""><img class="my" src="cover/a.jpg" style="width:120px;height:150px" alt="please wait"></a>
                <div class='mname'><p>qwerty qwert wert</p></div> -->
                <?php
                    $a=157;
                    $b=710;
                    $i=0;
                    while($result=mysqli_fetch_assoc($data))
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
                        $b=879;
                      }
                      if($i>9)
                      {
                        $b=879;
                      } 
                      $j=$result['thumbnail'];
                      $k=$result['title'];
                      echo"<a href='moviereview.php?mid=$result[id]&uid=$_GET[uid]'><img class='my' src='cover/".$j.".jpg' style='' alt='plase wait'></a>";
                      echo"<div class='mname' style='left:".$a."px;top:".$b."px;'>$k</div>";                      
                    }
                ?>              
            </div>
          </div>
      </div><br> 
    	<script>
           var myIndex = 0;
           carousel();
           function carousel() 
           {
           var i;
           var x = document.getElementsByClassName("mySlides");
           for (i = 0; i < x.length; i++) 
           {
              x[i].style.display = "none";  
           }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 3000); // Change image every 3 seconds
           }
      </script>
    </body>
</html>