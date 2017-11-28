<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="w3.css">
</head>
<body>
	<div class="w3-top">
	<div class="w3-bar w3-teal w3-card w3-large">
  		<a href="index.php" class="w3-bar-item w3-button w3-red w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Vehicle Rental System</a>
  		
  		<a href="#" class="w3-bar-item w3-button w3-center w3-grey">Admin login page</a>
	</div>
	</div>
	<div class="w3-row-padding w3-padding-64 w3-container">
 	 <div class="w3-content">
   		 <div class="w3-twothird">
   		 	<form  method="post">
     		 	<input class="w3-input" type="text" placeholder="username" required name="uname">
     		 	<input class="w3-input w3-section" type="password" placeholder="password" required name="pass">
          <button class="w3-button w3-black w3-section" type="login" name="login">login</button>
    		</form>

        <?php
        if(isset($_POST['login'])){
          include 'setup.php';
          
          $uname = $_POST['uname'];
          $pass = $_POST['pass'];
          
          $sql = "SELECT * FROM admin WHERE uname = '$uname' AND pass = '$pass'";
          $result = mysqli_query($conn, $sql);
          $num = mysqli_num_rows($result);
          $rows = mysqli_fetch_assoc($result);
          if($num > 0){
            session_start();
            $_SESSION['uname'] = $rows['uname'];
            $_SESSION['pass'] = $rows['pass'];
            echo "<script type = \"text/javascript\">
                  alert(\"Login Successful...\");
                  window.location = (\"adminpage.html\")
                  </script>";
          }     
          else {
            echo "<script type = \"text/javascript\">
                  alert(\"Login Failed. Try Again....\");
                  window.location = (\"adminlogin.php\")
                  </script>";
          }
        }
      ?>
      
    	 </div>
  	 </div>
	</div>


<footer class="w3-container w3-teal w3-card w3-margin-top">  
  
 <p class="w3-center">B.Tech Project  &copy2017  DBMS</p>
</footer>

    
</body>
</html>