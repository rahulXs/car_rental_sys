<!DOCTYPE html>
<html>
<head>
	<title>Main Page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="w3.css"><link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <script type="text/javascript" src="js/main.js"></script>
  <style>
header {
    background-image: url("cara.jpg");
}
</style>
</head>
<body>
	<div class="w3-top">
	<div class="w3-bar w3-teal w3-card w3-large">
  		<a href="#" class="w3-bar-item w3-button w3-red w3-mobile"><i class="w3-margin-right"></i>Car Rental System</a>
  		<a href="carlist.php" class="w3-bar-item w3-button">Cars & Pricing Info</a>
  		<a href="#about" class="w3-bar-item w3-button">About Us</a>
  		<a href="adminlogin.php" class="w3-bar-item w3-button w3-right w3-grey">Admin Login</a>
	</div>
	</div>

<header class="w3-container w3-red w3-center" style="padding:85px 16px">
  <p class="w3-xxlarge">Rent Cars at low Prices</p>
  <p class="w3-medium">If you are a new user, click Register Yourself. Else Please login to visit your profile.</p>
  <a href="register.php" class="w3-button w3-teal w3-padding-large w3-large w3-margin-top w3-hover-red">Register</a>
  <a href="userlogin.php" class="w3-button w3-teal w3-padding-large w3-large w3-margin-top w3-hover-red">User login</a>
</header>


<div class=" w3-light-grey w3-padding-64 w3-container" id="info">
  <div class="w3-content">
   	<div class="w3-twothird">
      <h2>List of Available Car types</h2>
      <?php
			include 'setup.php';
			$sql = "SELECT * FROM car_type WHERE in_stock>0";
			$result = mysqli_query($conn, $sql);
			echo "<table class='w3-table w3-bordered'>";  
			echo'<th>Car Type ID</th><th>Car Type name</th><th>In Stock (Units)</th>'; 
			while($data = mysqli_fetch_array($result))
			{

			echo'<tr>'; 
			echo '<td>'.$data['car_type_id'].'</td><td>'.$data['car_type_name'].'</td><td>'.$data['in_stock'].'</td>'; 
			echo'</tr>'; 
			}

			echo "</table>"; 
			?>
    </div>
  </div>
</div>

<section class="listings" style="padding:40px 16px">
    <div class="wrapper">
      <h2>List of Available cars (click for quick booking.)</h2>
      <ul class="properties_list">
      <?php
            include 'setup.php';
            $sql = "SELECT * FROM car_detail JOIN car_type ON car_detail.car_type_id= car_type.car_type_id and status='Available' limit 6";
            $result = mysqli_query($conn, $sql);
            while($data = mysqli_fetch_array($result)){
      ?>
        <li>
          <a href="rent.php?id=<?php echo $data['car_id'] ?>">
            <img class="thumb" src="cars/<?php echo $data['image'];?>" width="300" height="200">
          </a>
          <span class="price"><?php echo '₹ '.$data['rental_price'];?></span>
          <div class="property_details">
            <h1>
              <a href="rent.php?id=<?php echo $data['car_id'] ?>"><?php echo 'Car Name : '.$data['car_name'];?></a>
            </h1>
            <h2>Car Type: <span class="property_size"><?php echo $data['car_type_name'];?></span></h2>
          </div>
        </li>
      <?php
        }
      ?>
      </ul>
    </div>
  </section>


<div class="w3-container w3-light-grey" style="padding:40px 16px" id="about">
  <h3 class="w3-center">About Us</h3>
  
  <div class="w3-row-padding w3-grayscale " style="margin-left:400px ">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card-2 w3-center " style="padding:30px 16px">
        <div class="w3-container">
          <h3>Rahul Sharma</h3>
          <p class="w3-opacity">CSJMA15001390025</p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom " style="margin-left:40px">
      <div class="w3-card-2 w3-center" style="padding:30px 16px">
        <div class="w3-container">
          <h3>Avinash Tripathi</h3>
          <p class="w3-opacity">CSJMA15001390045</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="w3-teal" style="padding:20px 16px">  
  
 <p class="w3-center">B.Tech Project  &copy2017  DBMS</p>
</div>

</body>
</html>