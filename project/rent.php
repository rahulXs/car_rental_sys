<!DOCTYPE html>
<html>
<head>
	<title>Rental Page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="w3.css">
</head>
<body>
	<div class="w3-top">
	<div class="w3-bar w3-teal w3-card w3-large">
  		<a href="index.php" class="w3-bar-item w3-button w3-red w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Vehicle Rental System</a>
  		
  		<a href="#" class="w3-bar-item w3-button w3-center w3-grey">Rental Page</a>
	</div>
	</div>

  <div class="w3-container w3-center w3-light-grey " style="padding:40px 0px">
     
    </div>

	<div class="w3-row-padding w3-padding-64 w3-container">
 	 <div class="w3-content">
   		 <div class="w3-twothird">
   		 	<form method="POST">
     		 	<input class="w3-input" type="text" placeholder="Customer ID" required name="cust_id">
     		 	<input class="w3-input w3-section" type="text" placeholder="Car ID" required name="car_id">
     			<input class="w3-input w3-section" type="date" placeholder="From date" required name="from_date">
          <button class="w3-button w3-black w3-section" type="submit" name="submit">SUBMIT</button>
          <?php 
              if(isset($_POST['submit'])){
                include 'setup.php';
              $car_id = $_POST['car_id'];
              $cust_id = $_POST['cust_id'];
              $from_date = $_POST['from_date'];
              
              $qry = "INSERT INTO booking_details(car_id, cust_id, from_date)
              VALUES('$car_id','$cust_id', '$from_date')";
              $result=mysqli_query($conn, $qry);
              if($result){
                $last_id = mysqli_insert_id($conn);
                echo "Booking successfull. Your booking ID is: " . $last_id;
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