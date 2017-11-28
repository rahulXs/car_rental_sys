<!DOCTYPE html>
<html>
<title>User profile</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="w3.css">
<body class="w3-content" style="max-width:1200px">

<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="width:15%" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <h3><b>Hello User</b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey">
    <a href="index.php" class="w3-bar-item w3-button">Home</a>
    <a href="profileupdate.php" class="w3-bar-item w3-button">Update Info</a>
    <a href="carlist.php" class="w3-bar-item w3-button">Rent a car</a>
    <a href="returncar.php" class="w3-bar-item w3-button">Return car</a>
  </div>
</nav>
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="margin-left:16%">
  <h3 class="w3-center">Return car...</h3>
  <div class="w3-content">

    <div class="w3-twothird">
      <form  method="POST" >
        
        Enter booking ID : <input type="text" name="booking_id"/><br>
        Enter car ID : <input type="text" name="car_id"/><br>
        Enter Return date: <input type="text" name="return_date"/><br>
        
        <input type="submit" name="submit" value="Return Car">
        <?php 
              if(isset($_POST['submit'])){
                include 'setup.php';
              $booking_id = $_POST['booking_id'];
              $car_id = $_POST['car_id'];
              $return_date= $_POST['return_date'];
              $qry = "UPDATE booking_details SET return_date='$return_date' WHERE booking_id='$booking_id'";
              $result=mysqli_query($conn, $qry);
              if($result){
                echo "Return successfull";
            } else {
                echo "please enter details and click submit.<br>";
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }

              }
              ?>

      </form>
      
    </div>
          <?php
          $sql = "SELECT * FROM billing_details where booking_id='$booking_id'";
      $result1 = mysqli_query($conn, $sql);
      echo "<table class='w3-table w3-bordered'>";  
      echo'<th>Bill ID</th><th>Booking ID</th><th>Bill date</th><th>Amount</th><th>Tax Amount</th><th>Total Amount</th>'; 
      while($data = mysqli_fetch_array($result1))
      {

      echo'<tr>'; 
      echo '<td>'.$data['bill_id'].'</td><td>'.$data['booking_id'].'</td><td>'.$data['bill_date'].'</td><td>'.$data['amount'].'</td><td>'.$data['tax_amount'].'</td><td>'.$data['total_amount'].'</td>'; 
      echo'</tr>'; 
      }

      echo "</table>"; ?>
  </div>
</div>


 
  <div class="w3-black w3-center w3-padding-24">B.Tech Project  &copy2017  DBMS</div>

</div>

</body>
</html>
<?php
  $qry1 = "UPDATE car_detail SET status='Available' WHERE car_id='$car_id'";
  mysqli_query($conn, $qry1);
  mysqli_close($conn);
?>
