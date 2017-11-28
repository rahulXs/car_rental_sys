<!DOCTYPE html>
<html>
<title>Admin Panel</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="w3.css">

<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="width:15%" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <h3><b>Admin Panel</b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey">
    <a href="index.php" class="w3-bar-item w3-button">Home</a>
    <a href="adminpage.html" class="w3-bar-item w3-button">Admin Home</a>
    <a href="addcar.php" class="w3-bar-item w3-button">Add Car</a>
    <a href="updatecar.php" class="w3-bar-item w3-button">Update car info</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Reports <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="viewcust.php" class="w3-bar-item w3-button">View All Customers</a>
      <a href="viewcar.php" class="w3-bar-item w3-button">View All Cars</a>
      <a href="booking_details.php" class="w3-bar-item w3-button">View Booking details</a>
      <a href="revcarid.php" class="w3-bar-item w3-button">Revenue details (by Car ID)</a>
      <a href="revcartype.php" class="w3-bar-item w3-button">Revenue details (by Car types)</a>
      <a href="stockdetails.php" class="w3-bar-item w3-button">Stock details</a>
      <a href="custbook.php" class="w3-bar-item w3-button">Customer + rented details</a>
      <a href="custnotbook.php" class="w3-bar-item w3-button">Customer - rented details</a>
      <a href="revdates.php" class="w3-bar-item w3-button">Revenue b/w dates</a>
      <a href="bookdates.php" class="w3-bar-item w3-button">Bookings b/w dates</a>
      <a href="freq.php" class="w3-bar-item w3-button">Frequently booked car</a>
  </div>
</nav>
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container" style="margin-left:16%">
  <h3 class="w3-center">Welcome admin...</h3>
  <div class="w3-content">

    <div class="w3-twothird">

      <h4>List of all those customers who have not booked any Car</h4>
      <?php
      include 'setup.php';
      $sql = "SELECT customer.cust_id, dl_no, first_name, last_name, contact_no FROM `customer` JOIN `booking_details` on  `customer`.`cust_id`<>`booking_details`.`cust_id`";
      $result = mysqli_query($conn, $sql);
      echo "<table class='w3-table w3-bordered'>";  
      echo'<th>Cust ID</th><th>DL NO.</th><th>First name</th><th>Last name</th><th>Contact no</th>'; 
      while($data = mysqli_fetch_array($result))
      {

      echo'<tr>'; 
      echo '<td>'.$data['cust_id'].'</td><td>'.$data['dl_no'].'</td><td>'.$data['first_name'].'</td><td>'.$data['last_name'].'</td><td>'.$data['contact_no'].'</td>'; 
      echo'</tr>'; 
      }

      echo "</table>"; 
      ?>
    </div>
  </div>
</div>


  
 
  <div class="w3-black w3-center w3-padding-24">B.Tech Project  &copy2017  DBMS</div>

</div>
<script>
// Accordion 
function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();


// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>
</body>
</html>
