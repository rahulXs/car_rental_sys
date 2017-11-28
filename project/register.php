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
  		
  		<a href="#" class="w3-bar-item w3-button w3-center w3-grey">User Registration Page</a>
	</div>
	</div>


	<div class="w3-row-padding w3-padding-64 w3-container">
 	 <div class="w3-content">

   		 <div class="w3-twothird">
   		 	<form  method="POST" >
          

          <input class="w3-input" type="text" placeholder="Driving licence Number" required name="dl_no">
     		 	<input class="w3-input " type="text" placeholder="First Name" required name="first_name">
     		 	<input class="w3-input " type="text" placeholder="Last Name" required name="last_name">
      		<input class="w3-input" type="text" placeholder="Date of Birth(yyyy-mm-dd)" required name="dob">
          <input class="w3-input" type="text" placeholder="Address" required name="address">
          <input class="w3-input" type="text" placeholder="City" required name="city">
          <input class="w3-input " type="text" placeholder="State" required name="state">
      		<input class="w3-input" type="text" placeholder="Contact Number" required name="contact_no">
          <input class="w3-input " type="text" placeholder="Choose Your Password" required name="password">
          <input class="w3-input " type="text" placeholder="Enter email" required name="email_id">
      		<button class="w3-button w3-black w3-section" type="submit" name="submit">SUBMIT</button>
          <?php 
              if(isset($_POST['submit'])){
              include 'setup.php';
              $dl_no = $_POST['dl_no'];
              $first_name = $_POST['first_name'];
              $last_name = $_POST['last_name'];
              $dob = $_POST['dob'];
              $address= $_POST['address'];
              $city = $_POST['city'];
              $state = $_POST['state'];
              $contact_no = $_POST['contact_no'];
              $password = $_POST['password'];
              $email_id = $_POST['email_id'];
              
              
              $qry = "INSERT INTO customer(dl_no,first_name,last_name,dob,address,city,state,contact_no,password,email_id)
              VALUES('$dl_no','$first_name','$last_name','$dob','$address','$city','$state','$contact_no','$password','$email_id')";
              $result=mysqli_query($conn, $qry);
              if($result){
                $last_id = mysqli_insert_id($conn);
                echo "New record created successfully. Your customer ID is: " . $last_id;
            } else {
                echo "please enter details and click submit.<br>";
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }

              mysqli_close($conn);
            }
              ?>

          
    		</form>
        
        
    	 </div>
  	 </div>
	</div>


<footer class="w3-container w3-teal w3-card w3-margin-top">  
  
 <p class="w3-center">B.Tech Project  &copy2017  DBMS</p>
</footer>

    
</body>
</html>

