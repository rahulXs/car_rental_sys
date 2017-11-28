<?php
            include 'setup.php';
            $sql = "SELECT * FROM customer WHERE cust_id  = '$_GET[id]'";
            $result = mysqli_query($conn, $sql);
            while($data = mysqli_fetch_array($result)){
      ?>

<!DOCTYPE html>
<html>
<title>User profile</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="w3.css">
<body class="w3-content" style="max-width:1200px">

<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="width:15%" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16" >
    <h3><b><?php echo 'Hello '.$data['first_name'];?></b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey">
    <a href="index.php" class="w3-bar-item w3-button">Home</a>
    <a href="profileupdate.php" class="w3-bar-item w3-button">Update Info</a>
    <a href="carlist.php" class="w3-bar-item w3-button">Book a car</a>
    <a href="returncar.php" class="w3-bar-item w3-button">Return car</a>
  </div>
</nav>

  <marquee><h3><?php echo 'Welcome '.$data['first_name'];?></h3><h4>Please select options from left navigation Panel.</h4></marquee>
  <div class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="margin-left:16%">
  <div class="w3-content">

    <div class="w3-twothird">
      <h4>Booking history</h4>
      <?php
      include 'setup.php';
      $sql = "SELECT * FROM booking_details where cust_id='$_GET[id]'";
      $result = mysqli_query($conn, $sql);
      echo "<table class='w3-table w3-bordered'>";  
      echo'<th>Booking ID</th><th>Car ID</th><th>CUST ID</th><th>FROM DATE</th><th>Return DATE</th>'; 
      while($data = mysqli_fetch_array($result))
      {

      echo'<tr>'; 
      echo '<td>'.$data['booking_id'].'</td><td>'.$data['car_id'].'</td><td>'.$data['cust_id'].'</td><td>'.$data['from_date'].'</td><td>'.$data['return_date'].'</td>'; 
      echo'</tr>'; 
      }

      echo "</table>"; 
      ?>
    </div>
  </div>
</div>


 
  <div class="w3-black w3-center w3-padding-24">B.Tech Project  &copy2017  DBMS</div>

</div>

</body>
</html>
<?php
        }
      ?>