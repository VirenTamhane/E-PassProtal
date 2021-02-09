<?php include "Resource/db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Resource/CSS/StatusCss.css">
    <title>Document</title>
</head>
<body>
    <section>
      <div class="row">
          <div class="nav">
                <ul>
                    <li><a href="landingpage.php">Home</a></li>
                    <li><a href="apply.php">Apply</a></li>
                    <li><a href="ContactUs.php">Contact Us</a></li>
                </ul>
            </div>
      </div>
      <br><br>
       
        <div class="Search-bar">
           <form action="Status.php" method="post">
               <label>Enter Your Adhar Number</label> <br> <br>
               <input type="text" name="search" style="width: 200px; height: 30px;" required> <br><br>
               <input type="submit" name="submit" style="width: 100px; height: 30px;">
           </form>
        </div>
        
        <?php 
            if(isset($_POST['submit'])){
            $search_item = $_POST['search'];
            $query = "select * from interstate where aadhar_number = '{$search_item}' union select * from interdistrict where aadhar_number = '{$search_item}'";
            $search_connection = mysqli_query($connection,$query);
            
            while($row = mysqli_fetch_assoc($search_connection)) {
            $first_name = $row['first_name'];
            $middle_name = $row['middle_name'];
            $last_name = $row['last_name'];
            $mobile_number = $row['mobile_number'];
            $pillion = $row['pillion'];
            $emergency_number = $row['eme_number'];
            $aadhar_number = $row['aadhar_number'];
            $email_id = $row['email'];
            $address = $row['address'];
            $gender = $row['gender'];
            $photo = $row['photo'];
            $medical_certificate = $row['medical_cert'];
            $location_from = $row['loc_from'];
            $location_to = $row['loc_to'];
            $date_from = $row['date_from'];
            $date_to = $row['date_to'];
            $reason = $row['reason'];
            $status = $row['status'];
        ?>
        
        <table border="1">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Mobile Number</th>
                    <th>Pillion</th>
                    <th>Emergency Number</th>
                    <th>Aadhar Number</th>
                    <th>Email-ID</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Photo</th>
                    <th>Medical Certificate</th>
                    <th>Location From</th>
                    <th>Location To</th>
                    <th>Date From</th>
                    <th>Date To</th>
                    <th>Reason</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            
        <?php
        echo"<tr>";
        echo"<td>{$first_name}</td>";
        echo"<td>{$middle_name}</td>";
        echo"<td>{$last_name}</td>";
        echo"<td>{$mobile_number}</td>";
        echo"<td>{$pillion}</td>";
        echo"<td>{$emergency_number}</td>";
        echo"<td>{$aadhar_number}</td>";
        echo"<td>{$email_id}</td>";
        echo"<td>{$address}</td>";
        echo"<td>{$gender}</td>";
        echo"<td><img width='100' src='Resource/Images/{$photo}'></td>";
        echo"<td><img width='100' src='Resource/Images/{$medical_certificate}'></td>";
        echo"<td>{$location_from}</td>";
        echo"<td>{$location_to}</td>";
        echo"<td>{$date_from}</td>";
        echo"<td>{$date_to}</td>";
        echo"<td>{$reason}</td>";
        echo"<td>{$status}</td>";
        echo"</tr>";
    }
}
?>
       </tbody>
   </table>
    </section>
</body>
</html>