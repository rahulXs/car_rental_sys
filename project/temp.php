if(isset($_POST['save'])){
             
              $dl_no = $_POST['dl_no'];
              $first_name = $_POST['first_name'];
              $last_name = $_POST['last_name'];
              $dob = $_POST['dob'];
              $address= $_POST['address'];
              $city = $_POST['city'];
              $state = $_POST['state'];
              $contact_no = $_POST['contact_no'];
              $password = $_POST['password'];
              
              
              $qry = "INSERT INTO customer(dl_no,first_name,last_name,dob,address,city,state,contact_no,password)
              VALUES('$dl_no','$first_name','$last_name','$dob','$address','$city','$state','$contact_no','$password')";
              if(mysqli_query($conn, $qry)){
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }

              mysqli_close($conn);
      if(isset($_POST['save'])){
             
              $dl_no = $_POST['dl_no'];
              $first_name = $_POST['first_name'];
              $last_name = $_POST['last_name'];
              $dob = $_POST['dob'];
              $address= $_POST['address'];
              $city = $_POST['city'];
              $state = $_POST['state'];
              $contact_no = $_POST['contact_no'];
              $password = $_POST['password'];
              
              
              $qry = "INSERT INTO customer(dl_no,first_name,last_name,dob,address,city,state,contact_no,password)
              VALUES('$dl_no','$first_name','$last_name','$dob','$address','$city','$state','$contact_no','$password')";
              if(mysqli_query($conn, $qry)){
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }

              mysqli_close($conn);


              FOREIGN KEY (Dno) REFERENCES DRIVER(Dno) ON UPDATE CASCADE,
FOREIGN KEY (Vehicle_id) REFERENCES CAR(Vehicle_id) ON UPDATE CASCADE,
FOREIGN KEY (Cid) REFERENCES CUSTOMER(Cid) ON UPDATE CASCADEFOREIGN KEY (Empid) REFERENCES CUSTOMER_SERVICE(Empid) ON UPDATE CASCADE,
FOREIGN KEY (Cid) REFERENCES CUSTOMER(Cid) ON UPDATE CASCADE,FOREIGN KEY (Dno) REFERENCES DRIVER(Dno) ON UPDATE CASCADE,FOREIGN KEY (Dno) REFERENCES DRIVER(Dno) ON UPDATE CASCADE,FOREIGN KEY (Vehicle_id) REFERENCES CAR(Vehicle_id) ON UPDATE CASCADE,
FOREIGN KEY (Dno) REFERENCES DRIVER(Dno) ON UPDATE CASCADE,FOREIGN KEY (Rid) REFERENCES RENTAL(Rid) ON UPDATE CASCADE,
FOREIGN KEY (Vehicle_id) REFERENCES CAR(Vehicle_id) ON UPDATE CASCADE,
FOREIGN KEY (Dno) REFERENCES DRIVER(Dno) ON UPDATE CASCADE,FOREIGN KEY (Rid) REFERENCES RENTAL(Rid) ON UPDATE CASCADE,
FOREIGN KEY (Vehicle_id) REFERENCES CAR(Vehicle_id) ON UPDATE CASCADE,
FOREIGN KEY (Dno) REFERENCES DRIVER(Dno) ON UPDATE CASCADEFOREIGN KEY (Rid) REFERENCES RENTAL(Rid) ON UPDATE CASCADE,
FOREIGN KEY (Cid) REFERENCES CUSTOMER(Cid) ON UPDATE CASCADEFOREIGN KEY (Owner_id) REFERENCES OWNER(Owner_id) ON UPDATE CASCADE,FOREIGN KEY (Owner_id) REFERENCES OWNER(Owner_id) ON UPDATE CASCADEFOREIGN KEY (Owner_id) REFERENCES OWNER(Owner_id) ON UPDATE CASCADEFOREIGN KEY (Owner_id) REFERENCES OWNER(Owner_id) ON UPDATE CASCADE