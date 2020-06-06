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
.header {
  padding: 20px;
  text-align: center;
  background: #1abc9c;
  color: white;
}

table {
  width: 400px;
  border-collapse: collapse;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

th,td {
  padding: 15px;
  background-color: rgba(255,255,255,0.2);
  color: #fff;
}

th {
  text-align: center; background-color: #5f2c82;
}



tr :hover {
      background-color: #49a09d;
    }
  
  td {
   
    width: 200px;
    text-align: center;
    &:hover {
      &:before {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        top: -9999px;
        bottom: -9999px;
        background-color: #49a09d;
        z-index: -1;
      }
    }
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
<a href='StudentLogout.php'><input type=button value='Logout' class="button" align="right" name=Logout></a>
</div>
 <center><br><br>
    <h1>Welcome </h1>
    
    <p>Your Present Courses</p><br>
    <table>        
      <tr>
      <th>id</th>
      <th>name</th>
      </tr>


<?php 

 
  $mysqli=new mysqli('localhost','root','','dbms_project');    
  session_start();
  $uname=$_SESSION['student'];
  $a="SELECT distinct(name) FROM subjects ";
  $sql=mysqli_query($mysqli,$a);     
  
    while($row = mysqli_fetch_assoc($sql)){
      foreach ($row as $field => $value) 
      { 
        $a="SELECT percentage FROM ".$value." where student='".$uname."'";
        $sql1=mysqli_query($mysqli,$a);
        if ($sql1==TRUE) 
        {
          while($row1 = $sql1->fetch_array())
            {            
            echo"<tr>";
            echo"<td>".$value."</td>";
            echo"<td>".$row1[0]."</td></tr>";
            }
        }
       

      }
      
    }

  $mysqli->close(); 
 
 ?> 
 </table>
</center>

</body></html>

