<?php
    session_start();

    if(!isset($_SESSION['loggedIN'])) {
        header('Location: adminLogin.html');
        exit;
    }

    $userName = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../table.css" />
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css"
        integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./Images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./Images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./Images/favicon/favicon-16x16.png">
    <link rel="manifest" href="./Images/favicon/site.webmanifest">
    <title>AngelCare Hospital</title>
</head>

<body>
    <header>
        <a href='./index.html' class='brand'><h2 class="brand">AngelCare</h2></a>
        <nav>
            <ul class="nav_links">
                <li><a href="../index.html">Home</a></li>
                <li><a href="./table2.php">Covid Tests</a></li>
                <li><a href="./table3.php">Covid Vaccination</a></li>
            </ul>
        </nav>
        <a href="./logout.php"><button class="cta">Logout</button></a>
    </header>

    <!-- <div class="ctxt">
        <h3>Welcome to AngelCare Hospital</h3>
        <hr>
        <p>Keeping you to a better life.</p>
    </div> -->

    <div class="data-container">
        <h1>Appointments</h1>
        <table>
            <tr id="table-header">
                <?php
                    if($userName == "admin") {
                        print "<th>No.</th>";
                    }
                ?>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <?php
                    if($userName == "admin") {
                        print "<th>Doctor</th>";
                    }
                ?>
                <th>Time of Booking</th>
            </tr>

            <?php
                $con = mysqli_connect('localhost', 'root', '', 'hospital');
                if($con->connect_error) {
                    die("Connection failed: ". $con->connect_error);
                }

                if($userName == "admin") {
                    $sql = "SELECT * from doctor";
                    $result = $con->query($sql);

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            print "<tr id='sql-row'><td>".$row['pno']."</td><td>".$row['Name']."</td><td>".$row['Age']."</td><td>".$row['Email']."</td><td>".$row['Phone']."</td><td>".$row['Gender']."</td><td>".$row['Doctor']."</td><td>".$row['timestamp']."</td></tr>";
                        }
                        print "</table>";
                    }
                    else {
                        print "No patients for now";
                    }
                }

                else {
                    $sql = "SELECT pno, Name, Age, Email, Phone, Gender, timestamp from doctor where doctor = '$userName'";
                    $result = $con->query($sql);

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            print "</td><td>".$row['Name']."</td><td>".$row['Age']."</td><td>".$row['Email']."</td><td>".$row['Phone']."</td><td>".$row['Gender']."</td><td>".$row['timestamp']."</td></tr>";
                        }
                    }
                    else {
                        print "No patients for now";
                    }
                }
            ?>
        </table>
    </div>

    

    <!-- <div class="foot">
        <footer>
            <div class="footer-container">
                <div class="sec aboutus">
                    <h2>About Us</h2>
                    <p>We take health care personally at AngelCare. Because excellence in health care is about more than
                        just
                        medicine, technology, tests and treatments. It is about really caring for people with dignity
                        and respect.
                        That’s what we do. We are dedicated to providing the best care to meet the needs of people – for
                        our
                        community, for our patients -- for you.</p>
                    <ul class="sci">
                        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                        <li><a href=""><i class="fab fa-instagram"></i></a></li>
                        <li><a href=""><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>

                <div class="sec qlinks">
                    <h2>Quick Links</h2>
                    <ul>
                        <li class=""><a href="./pages/about.html">About</a></li>
                        <li class=""><a href="#">FAQ</a></li>
                        <li class=""><a href="#">Privacy Policy</a></li>
                        <li class=""><a href="#">Help</a></li>
                        <li class=""><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="sec contact">
                    <h2>Contact Info</h2>
                    <ul class="info">
                        <li>
                            <span><i class="fas fa-map-marker-alt"></i></span>
                            <span>
                                #109, M.G. Road<br>
                                Bengaluru, Karnataka<br>
                                India
                            </span>
                        </li>
                        <li>
                            <span><i class="fas fa-phone-alt"></i></span>
                            <p><a href="tel:12345678900">+91 234 567 8900</a></p>
                        </li>
                        <li>
                            <span><i class="fas fa-envelope"></i></span>
                            <p><a href="mailto:support@cilantrohospital.com">support@cilantrohospital.com</a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
        <div class="copyrightText">
            <p>Copyright ©️ 2021 AngelCare Hospitals. All rights reserved.</p>
        </div>
    </div> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>