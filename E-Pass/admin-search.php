<?php include "Resource/db.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="title icon" href="images/title-img.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="Resource/CSS/style.css">
    <title>Admin Dashboard</title>
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light">
        <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myNavbar">
            <div class="container-fluid">
                <div class="row">
                    <!-- sidebar -->
                    <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">

                        <a href="#" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border">
                            <h4>E-Pass</h4>
                        </a>
                        <div class="bottom-border pb-3">
                            
                            <a href="#" class="text-white">ADMIN</a>
                        </div>

                        <ul class="navbar-nav flex-column mt-4">
                            <li class="nav-item"><a href="admin.php" class="nav-link text-white p-3 mb-2 current"><i class="fas fa-home text-light fa-lg mr-3"></i>Dashboard</a></li>
                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link" data-toggle="collapse" data-target="#services"><i class="fas fa-user text-light fa-lg mr-3"></i>Applications<i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="services" class="collapse">
                                    <li class="flex-column mt-2 bass">
                                        <a href="admin-interstate.php" class="text-white ml-5">Inter-State</a><br>
                                        <hr>
                                        <a href="admin-interdistrict.php" class="text-white ml-5">Inter-District</a>
                                        <hr>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item"><a href="admin-search.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-search text-light fa-lg mr-3"></i>Search</a></li>

                            <li class="nav-item"><a href="admin-covid.php" class="nav-link text-white p-3 mb-2 sidebar-link" data-toggle="collapse" data-target="#pages"><i class="fas fa-file text-light fa-lg mr-3"></i>Covid-19</a>
                            </li>

                            <li class="nav-item"><a href="admin-contact.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-phone text-light fa-lg mr-3"></i>Contact Us</a></li>

                        </ul>
                    </div>
                    <!-- end of sidebar -->

                    <!-- top-nav -->
                    <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h4 class="text-light text-uppercase mb-0">Search</h4>
                            </div>
                            <div class="col-md-2 ml-auto">
                                <ul class="navbar-nav">
                                    <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fas fa-comments text-muted fa-lg"></i></a></li>
                                    <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fas fa-bell text-muted fa-lg"></i></a></li>
                                    <li class="nav-item ml-md-auto"><a href="#" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-sign-out-alt text-danger fa-lg"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end of top-nav -->
                </div>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->

    <!-- modal -->
    <div class="modal fade" id="sign-out">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Want to leave?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Press logout to leave
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Logout</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end of modal -->
    
    <!-- Search -->
    <section>
        <div class="container-fluid">
           <div class="row justify-content-center mt-5 ml-5">
                <form action="admin-search.php" method="post" enctype="multipart/form-data">
                       <div class="row mt-5 ml-5">
                           <input  type="numbers" name="search" placeholder="AADHAR NUMBER">
                       </div>
                       <div class="text-center mt-3 ml-5">
                           <button type="submit" name="submit" >Search</button>
                       </div>
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
  <div class="row">
  <div class="col-xl-10 col-lg-12 col-md-8 ml-auto">
    <div class="row pt-md-5 mt-md-3 mb-5">
   <table class="table table-bordered table-hover">
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
        echo"<td><img width = '100' src = 'Resource/Images/{$photo}'></td>";
        echo"<td><img width = '100' src = 'Resource/Images/{$medical_certificate}'></td>";
        echo"<td>{$location_from}</td>";
        echo"<td>{$location_to}</td>";
        echo"<td>{$date_from}</td>";
        echo"<td>{$date_to}</td>";
        echo"<td>{$reason}</td>";
        echo"<td>{$status}</td>";
        echo"<td><a href='p.php?accept={$aadhar_number}'>Accept</a></td>";
        echo"<td><a href='p.php?reject={$aadhar_number}'>Reject</a></td>";
      echo"</tr>";
    }
}
?>
       </tbody>
   </table>
   <!---->
   </div>
      </div>
            </div>
   </div>
   </section>
    <!----------->
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>

</html>
