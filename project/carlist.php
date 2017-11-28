<!DOCTYPE html>
<html>
<head>
	<title>Main Page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="w3.css"><link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
	<div class="w3-top">
	<div class="w3-bar w3-teal w3-card w3-large">
  		<a href="index.php" class="w3-bar-item w3-button w3-red w3-mobile"><i class="w3-margin-right"></i>Vehicle Rental System</a>
  		<a href="#" class="w3-bar-item w3-button">Vehicles & Pricing Info</a>
	</div>
	</div>

<header class="w3-container w3-center" style="padding:85px 16px">
  <form  method="POST" >
        Select Car type : <select name = "car_type_name">
                                      <option>Economy</option>
                                      <option>Standard</option>
                                      <option>Premium</option>
                                      <option>SUV</option>
                                    </select><br><br>
        <input type="submit" name="submit1" value="Search">
        <?php 
              include 'setup.php';
              $car_type_name=$_POST["car_type_name"];
              ?>

      </form>
</header>

<section class="listings" style="padding:40px 16px">
    <div class="wrapper">
      <h2>List of Available cars (click for booking.)</h2>
      <ul class="properties_list">
      <?php
            $sql = "SELECT * FROM car_detail JOIN car_type ON car_detail.car_type_id= car_type.car_type_id AND car_type_name='$car_type_name' AND status='Available'";
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
            <h2>Car ID: <span class="property_size"><?php echo $data['car_id'];?></span></h2>
            <h2>Car Type: <span class="property_size"><?php echo $data['car_type_name'];?></span></h2>

          </div>
        </li>
      <?php
        }
      ?>
      </ul>
    </div>
  </section>

<div class="w3-teal" style="padding:20px 16px">  
  
 <p class="w3-center">B.Tech Project  &copy2017  DBMS</p>
</div>

</body>
</html>