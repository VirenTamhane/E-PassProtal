<?php include "Resource/db.php"; ?>

<?php
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $query = "insert into newsletter (email) values ('{$email}')";
    $newsletter_connection = mysqli_query($connection,$query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="landingpage" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Vendor/CSS/normalize.css">
    <link rel="stylesheet" type="text/css" href="Vendor/CSS/grid.css">
    <link rel="stylesheet" type="text/css" href="Resource/CSS/Design.css">
    <link href="https://fonts.googleapis.com/css2?family=Emblema+One&display=swap" rel="stylesheet">
    <!--Chart-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['State', 'Patients'],
            <?php
                $query = "select * from covid19";
                $covid_connection = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($covid_connection)) {
                $state = $row['state'];
                $patient_count = $row['patient_count'];
                echo "[ ' {$row['state']} ' "." , "." {$row['patient_count']} ],";
                }
            ?>
        ]);

        var options = {
          chart: {
            title: 'Covid Status',
            subtitle: 'State, Patient Count',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <!--------->
    <title>E-PASS</title>
</head>

<body>
    <!--Landing Page-->
    <header>
        <div class="row">
            <div class="nav">
                <ul>
                    <li><a href="apply.php">Apply</a></li>
                    <li><a href="Status.php">Status</a></li>
                    <li><a href="ContactUs.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="main-text">
                <h1>E-PASS <br> Portal</h1>
            </div>
        </div>
    </header>

    <section>
        <div class="row">
            <h2>CORONAVIRUS</h2>
            <div class="card col span-1-of-3">
                <div class="front">
                    <img src="Resource/CSS/Images/CARD-1.jpg" alt="Card-1">
                </div>
                <div class="back">
                    <h3>Covid-19 <br> Info</h3>
                    <br>
                    <p>Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus.
                    Coronaviruses are a large family of viruses which may cause illness in animals or humans.  In humans, several coronaviruses are known to cause respiratory infections ranging from</p>
                </div>
            </div>
            <div class="card col span-1-of-3">
                <div class="front">
                    <img src="Resource/CSS/Images/CARD-2.jpg" alt="Card-2">
                </div>
                <div class="back">
                    <h3>Security App</h3>
                    <br>
                    <p>Aarogya Setu is an Indian open-source COVID–19 "contact tracing, syndromic mapping and self-assessment" digital service, primarily a mobile app, developed by the National Informatics Centre under the Ministry of Electronics and Information Technology. The app reached more than 100 million installs in 40 days.</p>
                </div>
            </div>
            <div class="card col span-1-of-3">
                <div class="front">
                    <img src="Resource/CSS/Images/CARD-3.jpg" alt="Card-3">
                </div>
                <div class="back">
                    <h3>Self-Care</h3>
                    <br>
                    <p>
                        Physical distancing, good respiratory hygiene and hand washing are important examples of self-care actions you can take every day to protect against COVID-19, and there are many other areas in which self care can make a difference to your health and well-being during the coronavirus disease pandemic.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="row">
            <h2>Current Status</h2>
            <div id="columnchart_material" style="width: 800px; height: 500px; margin-left: 190px;"></div>
        </div>
    </section>

    <footer>
        <div class="row">

            <div class="terms col span-1-of-3">
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>

            <div class="news-letter col span-1-of-3">
                <ul>
                    <li>
                        <h3>Social Media</h3>
                    </li>
                    <li>&vert;</li>
                    <li>&vert;</li>
                    <li>&vert;</li>
                </ul>
            </div>

            <div class="social-media col span-1-of-3">
                <ul>
                    <li><a href="#"><ion-icon name="logo-facebook"></ion-icon> Facebook</a></li>
                    <li><a href="#"><ion-icon name="logo-twitter"></ion-icon> Twitter</a></li>
                    <li><a href="#"><ion-icon name="call-outline"></ion-icon> Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="last">
            &copy; Copyrights Recieved &vert; &reg; All Rights Recieved
        </div>
    </footer>

</body>

<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

</html>
