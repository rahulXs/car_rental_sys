<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="w3.css">
</head>
<body>
	<div class="w3-top">
	<div class="w3-bar w3-teal w3-card w3-large">
  		<a href="index.php" class="w3-bar-item w3-button w3-red w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Vehicle Rental System</a>
  		
  		<a href="#" class="w3-bar-item w3-button w3-center w3-grey">User Login Page</a>
	</div>
	</div>

	<div class="w3-row-padding w3-padding-64 w3-container">
 	 <div class="w3-content">
   		 <div class="w3-twothird">
   		 	   <form  method="post">
          <input class="w3-input" type="text" placeholder="contact number" required name="contact_no">
          <input class="w3-input w3-section" type="password" placeholder="password" required name="password">
          <button class="w3-button w3-black w3-section" type="login" name="login">login</button>
        </form>

        <?php
        if(isset($_POST['login'])){
          include 'setup.php';
          
          $contact_no = $_POST['contact_no'];
          $password = $_POST['password'];
          
          $sql = "SELECT * FROM customer WHERE contact_no = '$contact_no' AND password = '$password'";
          $result = mysqli_query($conn, $sql);
          $num = mysqli_num_rows($result);
          $rows = mysqli_fetch_assoc($result);
          if($num > 0){
            session_start();
            $_SESSION['contact_no'] = $rows['contact_no'];
            $_SESSION['password'] = $rows['password'];
            $id=$rows['cust_id'];
            echo "<script type = \"text/javascript\">
                  alert(\"Login Successful...\");
                  window.location = (\"profile.php?id=$id\")
                  </script>";
          }     
          else {
            echo "<script type = \"text/javascript\">
                  alert(\"Login Failed. Try Again....\");
                  window.location = (\"userlogin.php\")
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