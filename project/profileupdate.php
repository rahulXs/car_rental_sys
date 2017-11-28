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
  <h3 class="w3-center">Update profile info...</h3>
  <div class="w3-content">

    <div class="w3-twothird">
      <form  method="POST" >
        
        Enter cust ID: <input type="text" name="cust_id"/><br>
        Edit Last name: <input type="text" name="last_name"/><br>
        Edit address: <input type="text" name="address"/><br>
        Edit city: <input type="text" name="city"/><br>
        Edit state: <input type="text" name="state"/><br>
        Edit contact no: <input type="text" name="contact_no"/><br>
        Edit password: <input type="text" name="password"/><br>
        <input type="submit" name="submit1" value="Update">
        <?php 
              include 'setup.php';
              $cust_id=$_POST["cust_id"];
              $last_name=$_POST["last_name"];
              $address=$_POST["address"];
              $city=$_POST["city"];
              $state=$_POST["state"];
              $contact_no=$_POST["contact_no"];
              $password=$_POST["password"];
              
              $qry = "UPDATE customer SET last_name=$last_name, address=$address, city=$city, state=$state, contact_no=$contact_no, password=$password WHERE cust_id='$cust_id'"; 
              $result=mysqli_query($conn, $qry);
              if($result){
          
                echo "Profile updated successfully. ";
            } else {
                echo "please enter details and click submit.<br>";
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }

              mysqli_close($conn);
              ?>

      </form>
      
    </div>
  </div>
</div>


 
  <div class="w3-black w3-center w3-padding-24">B.Tech Project  &copy2017  DBMS</div>

</div>

</body>
</html>
