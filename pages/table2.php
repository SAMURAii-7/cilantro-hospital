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
    <link rel="stylesheet" href="/Project2/style.css">
    <link rel="stylesheet" href="/Project2/table.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css"
        integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/Project2/Images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/Project2/Images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/Project2/Images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/Project2/Images/favicon/site.webmanifest">
    <title>AngelCare Hospital</title>
</head>

<body>
    <header>
        <a href='/Project2/index.html' class='brand'><h2 class="brand">AngelCare</h2></a>
        <nav>
            <ul class="nav_links">
                <li><a href="/Project2/index.html">Home</a></li>
                <li><a href="/Project2/pages/display.php">Appointments</a></li>
                <li><a href="/Project2/pages/table3.php">Covid Vaccination</a></li>
            </ul>
        </nav>
        <a href="/Project2/pages/logout.php"><button class="cta">Logout</button></a>
    </header>

    <!-- <div class="ctxt">
        <h3>Welcome to Cilantro Hospital</h3>
        <hr>
        <p>Keeping you to a better life.</p>
    </div> -->

    <div class="data-container">
        <h1>Covid Test Bookings</h1>
        <table>
            <tr id="table-header">
                <th>No.</th>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Time of Booking</th>
            </tr>

            <?php
                $con = mysqli_connect('localhost', 'root', '', 'hospital');
                if($con->connect_error) {
                    die("Connection failed: ". $con->connect_error);
                }

                $sql = "SELECT * from covid_test";
                $result = $con->query($sql);

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        print "<tr id='sql-row'><td>".$row['pno']."</td><td>".$row['Name']."</td><td>".$row['Age']."</td><td>".$row['Email']."</td><td>".$row['Phone']."</td><td>".$row['Gender']."</td><td>".$row['timestamp']."</td></tr>";
                    }
                }
                else {
                    print "No patients for now";
                }
            ?>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>

</html>