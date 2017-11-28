<?php
			include 'setup.php';
			$sql = "SELECT * FROM car_detail WHERE status = 'Available'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
    			while($row = mysqli_fetch_assoc($result)) {
        			echo "id: " . $row["car_id"]. " - Name: " . $row["reg_id"]. " " . $row["car_name"]. $row["car_type"]. " " . $row["rental_price"].$row["status"]. "<br>";
    			}
			} else {
    			echo "0 results";
			}

			mysqli_close($conn);
			?>
   

      <?php
			include 'setup.php';
			$sql = "SELECT * FROM car_detail WHERE status = 'Available'";
			$result = mysqli_query($conn, $sql);
			echo "<table >
  					<tr>
    				<th >Car ID </th>
    				<th>Reg ID</th>
    				<th >Car Name</th>
    				<th >Car Type</th>
    				<th>Rental Price</th>
    				<th >Status</th>
  					</tr>";
			if (mysqli_num_rows($result) > 0) {
    			while($row = mysqli_fetch_assoc($result)) {
    				echo "<tr>";
  					echo "<td>".$row['car_id']."</td>";
 					 echo "<td>".$row['reg_id']."</td>";
  					echo "<td>".$row['car_name']."</td>";
  					echo "<td>".$row['car_type']."</td>";
  					echo "<td>".$row['rental_price']."</td>";
  					echo "<td>".$row['status']."</td>";
  					echo "</tr>";
  					echo "</table>";
  				} else {
    			echo "0 results";
			}
		?>

    <div class="w3-panel w3-card w3-teal"><p>w3-card</p></div>
      <div class="w3-panel w3-card-2 w3-teal"><p>w3-card-2</p></div>
    <div class="w3-panel w3-card-4 w3-teal"><p>w3-card-4</p></div>
      table

{

border-style:solid;

border-width:2px;

border-color:pink;

}

</style>

</head>

<body bgcolor="#EEFDEF">

<?php

$con = mysql_connect("localhost","root","");

if (!$con)

  {

  die('Could not connect: ' . mysql_error());

  }

 

mysql_select_db("smart", $con);

 

$result = mysql_query("SELECT * FROM Form");

 

echo "<table border='1'>

<tr>

<th>Id</th>

<th>name</th>

<th>Mobile</th>

<th>email</th>

</tr>";

 

while($row = mysql_fetch_array($result))

  {

  echo "<tr>";

  echo "<td>" . $row['Id'] . "</td>";

  echo "<td>" . $row['name'] . "</td>";

  echo "<td>" . $row['Mobile'] . "</td>";

  echo "<td>" . $row['email'] . "</td>";

  echo "</tr>";

  }

echo "</table>";

 

mysql_close($con);

?>



<?php
      include 'setup.php';
      $sql = "SELECT * FROM car_detail WHERE status = 'Available'";
      $result = mysqli_query($conn, $sql);
      ?>
      <div class="w3-panel w3-card-4 w3-teal"><p>Car ID Reg ID....Car name.... Car type....  Rental Price....Status</p></div>
      <div class="w3-panel w3-card-2 w3-teal"><p><?php 
      if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
                echo $row["car_id"]. "...." . $row["reg_id"]. "....  " . $row["car_name"]." .... ". $row["car_type"]. "....  " . $row["rental_price"]."....  ".$row["status"]. "<br>";
          }
      } else {
          echo "0 results";
      }

      mysqli_close($conn);
      ?></p></div>