<?php include "Resource/db.php"; ?>

<?php 
    if(isset($_POST['submit'])) {
        $first = $_POST['first'];
        $last = $_POST['last'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $message = $_POST['message'];
        
        $query = "insert into contactus (first,last,email,number,message) values ('{$first}','{$last}','{$email}',{$number},'{$message}')";
        $insert_post = mysqli_query($connection,$query);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | E-Pass Portal</title>
    <link rel="stylesheet" type="text/css" href="Resource/CSS/ContactUsCss.css">
</head>
<body>
<header>
        
    </header>
    <section>
        <div class="container">
            
                
            <div class="contactinfo">
                
                <div>
                    <h2>Contact Info</h2>
                    <ul class="info">
                        <li>
                            <span>
                                <ion-icon name="location-outline"></ion-icon>
                            </span>
                            <span>
                                2912 7 RCR<br>
                                New Delhi, India<br>
                                444444
                            </span>
                        </li>
                        <li>
                            <span><ion-icon name="mail-outline"></ion-icon></span>
                            <span>lorem@ipsum.com</span>
                        </li>
                        <li>
                            <span><ion-icon name="call-outline"></ion-icon></span>
                            <span>310-386-355</span>
                        </li>
                    </ul>
                </div>
                <ul class="sci">
                    <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
                </ul>
                
                <div class="row">
                  <div class="nav">
                     <ul>
                       <li><a href="landingpage.php">Home</a></li>
                       <li><a href="apply.php">Apply</a></li>
                       <li><a href="Status.php">Status</a></li>
                     </ul>
                  </div> 
                </div>

            </div>
            <form action="" method="post">
            <div class="contactForm">
                <h2>Send a message</h2>
                <div class="formBox">
                   
                    <div class="inputBox w50">
                        <input type="text" name="first" required>
                        <span>First Name</span>
                    </div>
                    <div class="inputBox w50">
                        <input type="text" name="last" required>
                        <span>Last Name</span>
                    </div>
                    <div class="inputBox w50">
                        <input type="email" name="email" required>
                        <span>Email Address</span>
                    </div>
                    <div class="inputBox w50">
                        <input type="text" name="number" required>
                        <span>Mobile Number</span>
                    </div>
                    <div class="inputBox w100">
                        <textarea name="message" required></textarea>
                        <span>Write your message...</span>
                    </div>
                    <div class="inputBox w100">
                        <input class="submit-btn" type="submit" value="send" name="submit">
                    </div>
                    
                </div>
            </div>
            </form>
        </div>
    </section>
</body>

<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

</html>
