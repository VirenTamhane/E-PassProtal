<?php 
include "Resource/db.php";

    if(isset($_POST['submit'])) {
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $mobile_number = $_POST['mobile_number'];
        $pillion = $_POST['pillion'];
        $emergency_number = $_POST['eme_number'];
        $aadhar = $_POST['aadhar'];
        $email_id = $_POST['email-id'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $photo = $_FILES['photo']['name'];
        $photo_temp = $_FILES['photo']['tmp_name'];
        $medical_certificate = $_FILES['medical']['name'];
        $medical_certificate_temp = $_FILES['medical']['tmp_name'];
        $location_from = $_POST['loc_from'];
        $location_to = $_POST['loc_to'];
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];
        $reason = $_POST['reason'];
        $stateanddistrict = $_POST['loc'];
        
        move_uploaded_file($photo_temp ,"Resource/Images/$photo");
        move_uploaded_file($medical_certificate_temp ,"Resource/Images/$medical_certificate");
        
        if($stateanddistrict == "interstate") {
        $query = "insert into interstate (first_name,middle_name,last_name,mobile_number,pillion,eme_number,aadhar_number,email,address,gender,photo,medical_cert,loc_from,loc_to,date_from,date_to,reason) values ('{$first_name}','{$middle_name}','{$last_name}',{$mobile_number},{$pillion},{$emergency_number},{$aadhar},'{$email_id}','{$address}','{$gender}','{$photo}','{$medical_certificate}','{$location_from}','{$location_to}','{$date_from}','{$date_to}','{$reason}')";
        $create_post = mysqli_query($connection,$query);

        }else{
        $query = "insert into interdistrict (first_name,middle_name,last_name,mobile_number,pillion,eme_number,aadhar_number,email,address,gender,photo,medical_cert,loc_from,loc_to,date_from,date_to,reason) values ('{$first_name}','{$middle_name}','{$last_name}',{$mobile_number},{$pillion},{$emergency_number},{$aadhar_number},'{$email_id}','{$address}','{$gender}','{$photo}','{$medical_certificate}','{$location_from}','{$location_to}','{$date_from}','{$date_to}','{$reason}')";
        $create_post = mysqli_query($connection,$query);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>APPLY</title>
    <link rel="stylesheet" type="text/css" href="Resource/CSS/ap.css">
</head>

<body>
    <div class='row'>
        <div class="nav">
            <ul>
                <li><a href="landingpage.php">Home </a></li>
                <li><a href="Status.php">Status</a></li>
                <li><a href="ContactUs.php">Contact Us</a></li>
            </ul>
        </div>
    </div>
    <br><br>
    <header>
        <h2>PERSONAL DETAILS</h2>
    </header>



    <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="n">
                <ul>
           <li><label>FIRST NAME:</label>
                 <br><input type="text" name="first_name" id="first" required pattern="[A-Z a-z]{0,20}" ></li>
           <li><label>MIDDLE NAME:</label>
               <br><input type="text" name="middle_name" id="middle" required pattern="[A-Z a-z]{0,20}"></li>
           <li><label>LAST NAME:</label>
                 <br><input type="text" name="last_name" id="last" required pattern="[A-Z a-z]{0,20}"></li>
       </ul>
            </div>

            <div class="nam">
                <ul>
                    <li><label>MOBILE NUMBER:</label>
                        <br><input type="numbers" name="mobile_number" required pattern="[7-9]{1}[0-9]{8}" maxlength="9" minlength="9">
                    </li>
                    <li><label>NUMBER OF PILLION:</label>
                        <br><input type="number" name="pillion" required>
                    </li>
                    <li><label>EMERGENCY PHNO.:</label>
                        <br><input type="numbers" name="eme_number" required pattern="[7-9]{1}[0-9]{8}" maxlength="9" minlength="9">
                    </li>
                </ul>
            </div>

            <div class="na">
                <ul>
                    <li><label>AADHAR NUMBER*:</label>
                        <br><input type="numbers" name="aadhar" required pattern="[0-9]{9}" maxlength="9" minlength="9">
                    </li>
                    <li><label>EMAIL:</label>
                        <br><input type="email" name="email-id">
                    </li>
                    <br>
                    <li><label>ADDRESS:</label>
                        <br><textarea name="address" required></textarea>
                    </li>

                </ul>
            </div>



            <div class="p">
                <ul>
                    <label>GENDER: </label>
                    <ul>
                        <li><input type="radio" value="male" name="gender">MALE</li>
                        <li><input type="radio" value="female" name="gender">FEMALE</li>
                        <li><input type="radio" value="other" name="gender">OTHER</li>
                    </ul>
                </ul>
            </div>


            <div class="o">
                <ul>
                    <li><label>UPLOAD PHOTO*:</label>
                        <input type="file" name="photo" accept="image/jpeg" required>
                    </li>
                    <li><label>UPLOAD MEDICAL DOCUMENTS*:</label>
                        <input type="file" name="medical" accept="image/jpeg" required>
                </ul>
            </div>


            <h3>DESTINATION</h3>

            <div class="no">

                <div class="qwerty">
                    <h4>LOCATION</h4>

                    <ul>
                        <li><input type="radio" value="interstate" name="loc">INTERSTATE</li>
                        <li><input type="radio" value="interdistrict" name="loc">INTERDISTRICT</li>
                    </ul>

                    <br>
                    <ul>
                        <li><label>FROM:</label>
                            <br><input type="text" name="loc_from" required>
                        </li>
                        <li><label>TO:</label>
                            <br><input type="text" name="loc_to" required>
                        </li>
                    </ul>
                </div>

                <div class="des">
                    <br>
                    <h4>DATE</h4>
                    <br>
                    <ul>
                        <li><label> FROM:</label>
                            <br><input type="date" name="date_from" min="2020-12-15" required>
                        </li>

                        <li><label>TO:</label>
                            <br><input type="date" name="date_to" min="2020-12-15" required>
                        </li>
                    </ul>
                </div>

                <div class="z">
                    <label>REASON FOR TRAVEL:</label>
                    <br><textarea name="reason" required></textarea>
                </div>

            </div>
        </div>



        <br><input class="a" type="submit" name="submit" value="SUBMIT" id="submit">

    </form>
</body>

</html>
