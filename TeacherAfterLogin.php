<!DOCTYPE html>
<html>
<head><title>Teacher page</title>
  <style>
    html, body {
    width: 100%;
    height: 100%;
    font-family: "Helvetica Neue", Helvetica, sans-serif;
    color: #444;
     background: linear-gradient(45deg, #49a09d, #5f2c82); 
  }
    
input[type=submit] 
   { background-color: #4CAF50;
   border: none;
   color: white;
   padding: 15px 32px;
   text-align: center;
   text-decoration: bold;
   display: inline-block;
   font-size: 20px;
   margin: 4px 2px;
   cursor: pointer;
   background-color: #f44336;
    border-radius: 8px;
} 
.button {background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: bold;
    display: inline-block;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
    background-color: #f44336;
    border-radius: 8px;
  }
    p{
    	font-size: 34px;
    	color:black;
    	font-weight: bold;
    }
    
    </style>
      </head>
<body>
<div align="right">
<a href='logout.php'><input type=button value='Logout' class="button" align="right" name=Logout></a>
</div>
 <center><br><br>
    <h1>Welcome </h1>
    <form action="attadence.php" method="POST">
    <p>Your Present Courses</p><br>


<?php 

 
  $mysqli=new mysqli('localhost','root','','dbms_project');    
  session_start();
  $uname=$_SESSION['variable'];
  $a="SELECT distinct(name) FROM subjects where Teacher='".$uname."'";
  $sql=mysqli_query($mysqli,$a);     
  
    while($row = mysqli_fetch_assoc($sql)){
      foreach ($row as $field => $value) { 
        echo '<input  class="button" type="submit" name="a" value="'.$value.'" >';
    }
      
    }

  $mysqli->close(); 
 
 ?> 
 
</form></center>





</body></html>

