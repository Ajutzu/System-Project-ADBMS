<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABU'S</title>
    <link rel="stylesheet" href="homeDesign.css">
    <link rel="stylesheet" href="AppointDesign.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <p id="3"></p>
    <nav>
        <ul class="sidebar">
            <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26">
                        <path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
                    </svg></a></li>
            <li><a onclick="scrollToSection('3')">Home</a></li>
            <li><a id="openFormBtn2">Appoint</a></li>
            <li><a onclick="scrollToSection('1')">Gallery</a></li>
            <li><a onclick="scrollToSection('2')">Cancelation</a></li>
        </ul>
        <ul>
            <li><a class="Header-Title"> _ </a></li>
            <li class="hideOnMobile"><a onclick="scrollToSection('3')">Home</a></li>
            <li class="hideOnMobile"><a id="openFormBtn">Appoint</a></li>
            <li class="hideOnMobile"><a onclick="scrollToSection('1')">Gallery</a></li>
            <li class="hideOnMobile"><a onclick="scrollToSection('2')">Cancelation</a></li>
            <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26">
                        <path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z" />
                    </svg></a></li>
        </ul>
    </nav>

    <div class="container">
        <img src="header.jpg" alt="">
        <div class="hero-text">
            <h1>Your perfect family experience</h1>
            <p>Indulge in opulent getaways, meticulously curated for your pleasure. Crafted with elegance, offered with
                excellence. Discover Tranquility's Essence!
            </p>
            <button class="button" onclick="redirectToAppointment()">Appoint</button>
        </div>
    </div>

    <div class="row1">
        <div class="column1">
            <div class="card1">
                <img src="img/1.jpg" alt="Jane" style="width:100%">
                <div class="container1">
                    <h2>Package 1<br></h2>
                    <p class="title1">Night or Day Swimming and Hotel<br></p>
                    <p><b>₱ 7000<br></b></p>

                    <p> Up to 10 Heads more than that additional pay</p>
                    <p> <b> ₱ 200 per head Day<br> ₱ 250 per head Night<br></b></p>
                    <p>Facilities Included<br>
                        ‣ Hotel<br>
                        ‣ Kitchen<br>
                        ‣ Pool<br>
                    </p>
                </div>
                <div style="text-align: center;">
                    <button onclick="scrollToSection('1')" class="button" style="width:100%; margin-left: auto; margin-right: auto;">Proceed</button>
                </div>

            </div>
        </div>

        <div class="column1">
            <div class="card1">
                <img src="img/8.jpg" alt="Mike" style="width:100%">
                <div class="container1">
                    <h2>No Package</h2>
                    <p class="title1">Only Pool</p>
                    <p><b> ₱ 200 per head Day<br> ₱ 250 per head Night<br> ₱ 500 Kubo required </b></p>
                    <p>Pool only Maximum of 10 Hours</p>
                    <p>Facilities Included<br>
                        ‣ Pool<br>
                        ‣ Kitchen<br>
                        ‣ Kubo - Requried<br>
                    </p>
                </div>
                <div style="text-align: center;">
                    <button onclick="scrollToSection('1')" class="button" style="width:100%; margin-left: auto; margin-right: auto;">Proceed</button>
                </div>
            </div>
        </div>

        <div class="column1">
            <div class="card1">
                <img src="img/3.jpg" alt="John" style="width:100%">
                <div class="container1">
                    <h2>Package 2</h2>
                    <p class="title1">Function Hall Event Combo </p>
                    <p><b>₱ 25,000 Whole Day</b></p>
                    <p>2 Function Hall Capacity 200 Heads</p>
                    <p>Facilities Included<br>
                        ‣ Function Hall 1<br>
                        ‣ Function Hall 2<br>
                        ‣ Kitchen<br>
                    </p>
                </div>
                <div style="text-align: center;">
                    <button onclick="scrollToSection('1')" class="button" style="width:100%; margin-left: auto; margin-right: auto;">Proceed</button>
                </div>
            </div>
        </div>

        <div class="column1">
            <div class="card1">
                <img src="img/4.jpg" alt="John" style="width:100%">
                <div class="container1">
                    <h2>Package 3</h2>
                    <p class="title1">Everything for Day</p>
                    <p><b>₱ 40,000 Whole Day</b></p>
                    <p>Resort Capacity for 250 Heads</p>
                    <p>Facilities Included<br>
                        ‣ Hotel<br>
                        ‣ Kitchen<br>
                        ‣ Pool<br>
                        ‣ Function Hall 1<br>
                        ‣ Function Hall 2<br>
                        ‣ Kubo<br>
                    </p>
                </div>
                <div style="text-align: center;">
                    <button onclick="scrollToSection('1')" class="button" style="width:100%; margin-left: auto; margin-right: auto;">Proceed</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container2" id="2">
        <div class="row">


            <div class="column">
                <h1 style="text-align: center;">Your Appointment</h1>
                <div class="border"></div>
                <div class="bgc2">
                    <p style="margin-bottom: 20px; text-align: center; font-weight: 400;">Enter the <b>Name</b> and <b>ID</b> to identify your
                        appointment. Thank you for understanding</p>
                    <form action="homeWebsite.php">

                        <label for="fname">Full Name</label>
                        <input type="text" id="flname" name="fullname2" placeholder="Your name.." class="entry">

                        <label for="fname">Appointment ID</label>
                        <input type="text" id="flname" name="appointment_id" placeholder="Appointment ID.." class="entry">

                        <input type="submit" value="Search">


                        <?php
                        if (isset($_GET['fullname2']) && isset($_GET['appointment_id'])) {
                            $fullname = $_GET['fullname2'];
                            $appointmentId = $_GET['appointment_id'];

                            // Database connection parameters
                            $host = 'localhost';
                            $port = '5432';
                            $dbname = "ABU'S";
                            $user = 'postgres';
                            $password = 'postgres';

                            // Constructing the DSN for PDO
                            $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

                            try {
                                // Creating a PDO instance
                                $pdo = new PDO($dsn);

                                // Setting error mode to exception
                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                // SQL query to fetch appointments based on name and/or appointment ID
                                $sql = "SELECT CustomerInfo.name, VisitInfo.time_in, VisitInfo.time_out, VisitInfo.date
               FROM CustomerInfo
               INNER JOIN VisitInfo ON CustomerInfo.customer_id = VisitInfo.customer_id
               WHERE CustomerInfo.name = :fullname and VisitInfo.visit_id = :appointmentId"; // Filter by name or appointment ID

                                // Preparing the SQL statement
                                $stmt = $pdo->prepare($sql);

                                // Executing the statement with the provided parameters
                                $stmt->execute(['fullname' => $fullname, 'appointmentId' => $appointmentId]);

                                // Fetching appointments
                                $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                // Displaying the results
                                if ($appointments) {
                                    echo "<table>";
                                    echo "<tr><th>Name</th><th>Start Time</th><th>End Time</th><th>Date</th><th>Action</th></tr>";
                                    foreach ($appointments as $appointment) {
                                        echo "<tr>";
                                        echo "<td>" . $appointment['name'] . "</td>";
                                        echo "<td>" . $appointment['time_in'] . "</td>";
                                        echo "<td>" . $appointment['time_out'] . "</td>";
                                        echo "<td>" . $appointment['date'] . "</td>";
                                        echo "<td><a href='homeWebsite.php?fullname2=$fullname&appointment_id=$appointmentId&action=cancel' class = 'button2'>Cancel</a></td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                } else {
                                }

                                // Check if cancellation action is requested
                                if (isset($_GET['action']) && $_GET['action'] == 'cancel') {

                                    $appointmentId = $_GET['appointment_id'];

                                    if (!ctype_digit($appointmentId)) {
                                        throw new Exception("Appointment ID must be numeric");
                                    }

                                    $appointmentId = (int)$appointmentId;

                                    $pdo->beginTransaction();

                                    $stmt = $pdo->prepare("SELECT COUNT(*) FROM VisitInfo WHERE visit_id = :appointmentId");
                                    $stmt->execute(['appointmentId' => $appointmentId]);
                                    $count = $stmt->fetchColumn();

                                    if ($count === 0) {
                                        throw new Exception("Appointment ID does not exist in the database");
                                    }

                                    // Delete from facilities
                                    $stmt = $pdo->prepare("DELETE FROM facilities WHERE visit_id = :appointmentId ");
                                    $stmt->execute(['appointmentId' => $appointmentId]);

                                    // Delete from addons
                                    $stmt = $pdo->prepare("DELETE FROM addons WHERE visit_id = :appointmentId ");
                                    $stmt->execute(['appointmentId' => $appointmentId]);

                                    // Delete from visitinfo
                                    $stmt = $pdo->prepare("DELETE FROM VisitInfo WHERE visit_id = :appointmentId");
                                    $stmt->execute(['appointmentId' => $appointmentId]);

                                    if ($count === 1) {
                                        // If only one appointment found, delete associated customer
                                        $stmt = $pdo->prepare("SELECT customer_id FROM VisitInfo WHERE visit_id = :appointmentId");
                                        $stmt->execute(['appointmentId' => $appointmentId]);
                                        $customerId = $stmt->fetchColumn();

                                        if ($customerId) {
                                            $stmt = $pdo->prepare("DELETE FROM CustomerInfo WHERE customer_id = :customerId");
                                            $stmt->execute(['customerId' => $customerId]);
                                        } else {
                                        }
                                    }

                                    $pdo->commit();

                                    echo "Deletion successful";

                                    ob_clean();

                        ?>
                                    <script>
                                        Swal.fire({
                                            title: "Good job!",
                                            text: "You Appointment Cancel!",
                                            icon: "success"
                                        });
                                    </script>
                        <?php
                                }
                            } catch (PDOException $e) {
                                die("Connection failed: " . $e->getMessage());
                            }
                        }
                        ?>


                    </form>
                </div>
            </div>


            <div class="column">
                <h1 style="text-align: center;">Send Feedback</h1>
                <div class="border"></div>
                <div class="bgc">
                    <form method="post" action="homeWebsite.php">
                        <input type="hidden" name="form_type" value="contact_form"> <!-- Unique identifier -->
                        <label for="fname">Full Name</label>
                        <input type="text" id="flname" name="fullname2" placeholder="Your name.." class="entry">
                        <label for="country">Address</label>
                        <input type="text" id="country" name="province" placeholder="Your Address.." class="entry">
                        <label for="subject">Subject</label>
                        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px" class="entry"></textarea>
                        <input type="submit" value="Submit">
                    </form>

                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_type']) && $_POST['form_type'] === 'contact_form') {
                        $fullname = $_POST["fullname2"];
                        $province = $_POST["province"];
                        $subject = $_POST["subject"];

                        try {
                            $pdo = new PDO("pgsql:host=localhost;dbname=ABU'S", "postgres", "postgres");
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Check if the full name already exists in the database
                            $checkQuery = "SELECT COUNT(*) FROM messages WHERE fullname = ?";
                            $checkStmt = $pdo->prepare($checkQuery);
                            $checkStmt->execute([$fullname]);
                            $count = $checkStmt->fetchColumn();

                            if ($count == 0) {
                                // Full name is not already in use, proceed with insertion
                                $query = "INSERT INTO messages (fullname, province, subject) VALUES (?, ?, ?);";
                                $stmt = $pdo->prepare($query);
                                $stmt->execute([$fullname, $province, $subject]);
                                echo "Record inserted successfully.";
                    ?>
                                <script>
                                    Swal.fire({
                                        position: "top-end",
                                        icon: "success",
                                        title: "Your request has been send",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                </script>
                    <?php
                            } else {
                                // Full name is already in use, do not continue
                                echo "Full name already in use. Record not inserted.";
                            }

                            $pdo = null;
                        } catch (PDOException $e) {
                            die("Query Failed: " . $e->getMessage());
                        }
                    } else {
                        echo "";
                    }
                    ?>



                    </form>
                </div>
            </div>
        </div>
    </div>

    <div>
        <h1 style="text-align: center; margin-top:150px">Sneak peek of ABU's Resort</h1>
        <div class="border"></div>
        <div class="carousel" id="1">
            <ul class="slides">
                <input type="radio" name="radio-buttons" id="img-1" checked />
                <li class="slide-container">
                    <div class="slide-image">
                        <img src="img/1.jpg">
                    </div>
                    <div class="carousel-controls">
                        <label for="img-8" class="prev-slide">
                            <span>&lsaquo;</span>
                        </label>
                        <label for="img-2" class="next-slide">
                            <span>&rsaquo;</span>
                        </label>
                    </div>
                </li>
                <input type="radio" name="radio-buttons" id="img-2" />
                <li class="slide-container">
                    <div class="slide-image">
                        <img src="img/2.jpg">
                    </div>
                    <div class="carousel-controls">
                        <label for="img-1" class="prev-slide">
                            <span>&lsaquo;</span>
                        </label>
                        <label for="img-3" class="next-slide">
                            <span>&rsaquo;</span>
                        </label>
                    </div>
                </li>

                <input type="radio" name="radio-buttons" id="img-3" />
                <li class="slide-container">
                    <div class="slide-image">
                        <img src="img/3.jpg">
                    </div>
                    <div class="carousel-controls">
                        <label for="img-2" class="prev-slide">
                            <span>&lsaquo;</span>
                        </label>
                        <label for="img-4" class="next-slide">
                            <span>&rsaquo;</span>
                        </label>
                    </div>
                </li>

                <input type="radio" name="radio-buttons" id="img-4" />
                <li class="slide-container">
                    <div class="slide-image">
                        <img src="img/4.jpg">
                    </div>
                    <div class="carousel-controls">
                        <label for="img-3" class="prev-slide">
                            <span>&lsaquo;</span>
                        </label>
                        <label for="img-5" class="next-slide">
                            <span>&rsaquo;</span>
                        </label>
                    </div>
                </li>

                <input type="radio" name="radio-buttons" id="img-5" />
                <li class="slide-container">
                    <div class="slide-image">
                        <img src="img/5.jpg">
                    </div>
                    <div class="carousel-controls">
                        <label for="img-4" class="prev-slide">
                            <span>&lsaquo;</span>
                        </label>
                        <label for="img-6" class="next-slide">
                            <span>&rsaquo;</span>
                        </label>
                    </div>
                </li>

                <input type="radio" name="radio-buttons" id="img-6" />
                <li class="slide-container">
                    <div class="slide-image">
                        <img src="img/6.jpg">
                    </div>
                    <div class="carousel-controls">
                        <label for="img-5" class="prev-slide">
                            <span>&lsaquo;</span>
                        </label>
                        <label for="img-7" class="next-slide">
                            <span>&rsaquo;</span>
                        </label>
                    </div>
                </li>

                <input type="radio" name="radio-buttons" id="img-7" />
                <li class="slide-container">
                    <div class="slide-image">
                        <img src="img/7.jpg">
                    </div>
                    <div class="carousel-controls">
                        <label for="img-6" class="prev-slide">
                            <span>&lsaquo;</span>
                        </label>
                        <label for="img-8" class="next-slide">
                            <span>&rsaquo;</span>
                        </label>
                    </div>
                </li>

                <input type="radio" name="radio-buttons" id="img-8" />
                <li class="slide-container">
                    <div class="slide-image">
                        <img src="img/8.jpg">
                    </div>
                    <div class="carousel-controls">
                        <label for="img-7" class="prev-slide">
                            <span>&lsaquo;</span>
                        </label>
                        <label for="img-1" class="next-slide">
                            <span>&rsaquo;</span>
                        </label>
                    </div>
                </li>

                <div class="carousel-dots">
                    <label for="img-1" class="carousel-dot" id="img-dot-1"></label>
                    <label for="img-2" class="carousel-dot" id="img-dot-2"></label>
                    <label for="img-3" class="carousel-dot" id="img-dot-3"></label>
                    <label for="img-4" class="carousel-dot" id="img-dot-4"></label>
                    <label for="img-5" class="carousel-dot" id="img-dot-5"></label>
                    <label for="img-6" class="carousel-dot" id="img-dot-6"></label>
                    <label for="img-7" class="carousel-dot" id="img-dot-7"></label>
                    <label for="img-8" class="carousel-dot" id="img-dot-8"></label>
                </div>
            </ul>
        </div>
    </div>

    <div id="popupForm" class="popup-form">
        <div class="formbold-main-wrapper">
            <div class="formbold-form-wrapper">
                <button id="closeFormBtn" class="close-form-btn">x</button>
                <form action="" method="POST">
                    <input type="hidden" name="form_type" value="appointment_form">

                    <div class="formbold-mb-5">
                        <label for="name" class="formbold-form-label" style="margin-top: 30px"> Full Name </label>
                        <input type="text" name="name" id="name" placeholder="Full Name" class="formbold-form-input" required />
                    </div>

                    <div class="formbold-mb-5">
                        <label for="phone" class="formbold-form-label"> Phone Number </label>
                        <input type="text" name="phone" id="phone" placeholder="Enter your phone number" class="formbold-form-input" required />
                    </div>

                    <div class="formbold-mb-5">
                        <label for="purpose" class="formbold-form-label"> Purpose </label>
                        <input type="text" name="purpose" id="purpose" placeholder="Visiting purpose" class="formbold-form-input" required />
                    </div>


                    <div class="formbold-mb-5">
                        <label for="packages" class="formbold-form-label"> Packages </label>
                        <select id="package" class="formbold-form-input" name="package" style="border-radius: 8px; height: 48px;" required>
                            <option value="package1">Package 1</option>
                            <option value="package2">Package 2</option>
                            <option value="package3">Package 3</option>
                            <option value="no-package">No Package</option>
                        </select>
                    </div>


                    <div class="formbold-mb-5">
                        <label for="ads" class="formbold-form-label"> Ads On </label>
                        <select class="formbold-form-input" id="ads" name="ads" style="border-radius: 8px; height: 48px;" required>
                            <option value="provision">Stove, Grill, Rice Cooker Pack</option>
                            <option value="karaoke">Karaoke Only</option>
                            <option value="none">None</option>
                        </select>
                    </div>


                    <div class="flex flex-wrap formbold--mx-3">
                        <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5">
                                <label for="time_in" class="formbold-form-label"> Time In </label>
                                <input type="time" name="time_in" id="time_in" class="formbold-form-input" required />
                            </div>
                        </div>

                        <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5">
                                <label for="time_out" class="formbold-form-label"> Time Out </label>
                                <input type="time" name="time_out" id="time_out" class="formbold-form-input" required />
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap formbold--mx-3">
                        <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5 w-full">
                                <label for="date" class="formbold-form-label"> Date </label>
                                <input type="date" name="date" id="date" class="formbold-form-input" required />
                            </div>
                        </div>

                        <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5 w-full">
                                <label for="heads" class="formbold-form-label"> Heads </label>
                                <input type="number" name="heads" id="heads" placeholder="Number of persons " class="formbold-form-input" required />
                            </div>
                        </div>
                    </div>

                    <div>
                        <button class="formbold-btn" style="margin-top: 20px">Appoint</button>
                    </div>

                </form>
            </div>
        </div>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['form_type']) && $_POST['form_type'] === 'appointment_form') {

            // Database connection details
            $host = 'localhost';
            $port = '5432';
            $dbname = 'ABU\'S';
            $user = 'postgres';
            $password = 'postgres';

            // PDO data source name
            $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

            // Form data
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $purpose = $_POST['purpose'];
            $package = $_POST['package'];
            $ads = $_POST['ads'];
            $time_in = $_POST['time_in'];
            $time_out = $_POST['time_out'];
            $date = $_POST['date'];
            $heads = $_POST['heads'];

            try {
                // Connect to the database
                $pdo = new PDO($dsn, $user, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->prepare("SELECT time_in, time_out, date FROM visitinfo");
                $stmt->execute();
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


                $slotAvailable = true;
                // Loop through each row
                foreach ($rows as $row) {
                    $rowTimeIn = substr($row['time_in'], 0, 5); // Extract HH:MM from HH:MM:SS
                    $rowTimeOut = substr($row['time_out'], 0, 5); // Extract HH:MM from HH:MM:SS

                    // Compare the values
                    if ($time_in >= $rowTimeIn && $time_out <= $rowTimeOut && $date == $row['date']) {
                        // Display an error message using SweetAlert2
                        $slotAvailable = false;
                        break;
                    } else if ($time_in <= $rowTimeOut && $time_out >= $rowTimeIn && $date == $row['date']) {
                        // Calculate the midpoint of the current time slot
                        $midpoint = ($time_in + $time_out) / 2;

                        // Check if the midpoint falls within any existing booked time slots
                        if ($midpoint >= $rowTimeIn && $midpoint <= $rowTimeOut) {
                            // Display an error message using SweetAlert2
                            $slotAvailable = false;
                            break;
                        }
                    }
                }

                $stmt2 = $pdo->prepare("SELECT time_in, time_out FROM visitinfo WHERE date = :date");
                $stmt2->bindParam(':date', $date);
                $date = $_POST['date']; // Assuming you get the user inputted date from a form
                $stmt2->execute();
                $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                if (!$slotAvailable) {
                    $message = "<strong>Taken time slots for $date:</strong><br><br>";
                    foreach ($rows2 as $row) {
                        $message .= "Time In: " . $row['time_in'] . ", Time Out: " . $row['time_out'] . "<br>";
                    }
                    echo "<script>Swal.fire({html: '$message', icon: 'error'});</script>";
                } else {

                    $visit_id = 0; // Initialize $visit_id outside the loop

                    do {
                        $visit_id = mt_rand(100, 999); // Generate a random 3-digit number
                        $check_query = "SELECT visit_id FROM VisitInfo WHERE visit_id = ?";
                        $stmt = $pdo->prepare($check_query);
                        $stmt->execute([$visit_id]);
                        $existing_id = $stmt->fetchColumn();
                        if ($existing_id === false) {
                            break; // Exit the loop if a unique visit_id is found
                        }
                    } while (true);
                    // Insert customer information

                    // Check if the customer already exists
                    $customer_info_query = "SELECT customer_id FROM CustomerInfo WHERE name = ? AND contact_no = ?";
                    $stmt = $pdo->prepare($customer_info_query);
                    $stmt->execute([$name, $phone]);
                    $customer_id = $stmt->fetchColumn();

                    if (!$customer_id) {
                        // Customer doesn't exist, insert a new record
                        $customer_insert_query = "INSERT INTO CustomerInfo (name, contact_no) VALUES (?, ?)";
                        $stmt = $pdo->prepare($customer_insert_query);
                        $stmt->execute([$name, $phone]);
                        // Get the last inserted customer_id
                        $customer_id = $pdo->lastInsertId();
                    }

                    // At this point, $customer_id will either hold the existing customer_id or the newly inserted one
                    $total_price = 0;

                    switch ($package) {
                        case 'package1':
                            $total_price += 5000;
                            if ($time_in >= '19:00' && $time_out <= '6:00') {
                                for ($i = 0; $i < $heads; $i++) {
                                    $total_price += 250;
                                }
                            } elseif ($time_in >= '06:00' && $time_out <= '19:00') {
                                for ($i = 0; $i < $heads; $i++) {
                                    $total_price += 200;
                                }
                            }
                            break;

                        case 'package2':
                            $total_price += 25000;
                            if ($time_in >= '19:00' && $time_out <= '6:00' && $heads > 200) {
                                $excess_heads = $heads - 200;
                                for ($i = 0; $i < $excess_heads; $i++) {
                                    $total_price += 250;
                                }
                            } elseif ($time_in >= '06:00' && $time_out <= '19:00' && $heads > 200) {
                                $excess_heads = $heads - 200;
                                for ($i = 0; $i < $excess_heads; $i++) {
                                    $total_price += 200;
                                }
                            }
                            break;


                        case 'package3':
                            $total_price += 40000;
                            if ($time_in >= '19:00' && $time_out <= '6:00' && $heads > 250) {
                                $excess_heads = $heads - 250;
                                for ($i = 0; $i < $excess_heads; $i++) {
                                    $total_price += 250;
                                }
                            } elseif ($time_in >= '06:00' && $time_out <= '19:00' && $heads > 250) {
                                $excess_heads = $heads - 250;
                                for ($i = 0; $i < $excess_heads; $i++) {
                                    $total_price += 200;
                                }
                            }
                            break;


                        case 'no-package':
                            $total_price += 500;
                            if ($time_in >= '19:00' && $time_out <= '6:00') {
                                for ($i = 0; $i < $heads; $i++) {
                                    $total_price += 250;
                                }
                            } elseif ($time_in >= '06:00' && $time_out <= '19:00') {
                                for ($i = 0; $i < $heads; $i++) {
                                    $total_price += 200;
                                }
                            }
                            break;

                        default:
                            // Handle invalid package selection
                            break;
                    }

                    // Add additional charges based on ads selection
                    switch ($ads) {
                        case 'provision':
                            $total_price += 250;
                            break;

                        case 'karaoke':
                            $total_price += 400;
                            break;

                        case 'none':
                            // No additional charge
                            break;

                        default:
                            // Handle invalid ads selection
                            break;
                    }


                    $visit_insert_query = "INSERT INTO VisitInfo (visit_id, date, purpose, time_in, time_out, package, head, total_price, customer_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $pdo->prepare($visit_insert_query);
                    $stmt->execute([$visit_id, $date, $purpose, $time_in, $time_out, $package, $heads, $total_price, $customer_id]);

                    // Insert facilities based on the selected package
                    switch ($package) {
                        case 'package1':
                            $facilities = ['Hotel', 'Kitchen', 'Pool'];
                            break;
                        case 'package2':
                            $facilities = ['FH 1', 'FH 2', 'Kitchen'];
                            break;
                        case 'package3':
                            $facilities = ['Hotel', 'Kitchen', 'Pool', 'FH 1', 'FH 2', 'Kubo'];
                            break;
                        case 'no-package':
                            $facilities = ['Kitchen', 'Kubo', 'Pool'];
                            break;
                    }

                    if (isset($facilities)) {
                        foreach ($facilities as $facility) {
                            $facility_insert_query = "INSERT INTO Facilities (visit_id, facility) VALUES (?, ?)";
                            $stmt = $pdo->prepare($facility_insert_query);
                            $stmt->execute([$visit_id, $facility]);
                        }
                    }

                    // Insert addons based on the selected ads
                    switch ($ads) {
                        case 'provision':
                            $addon = ['Stove', 'Grill', 'Rice Cooker'];
                            break;
                        case 'karaoke':
                            $addon = ['karaoke'];
                            break;
                        case 'none':
                            $addon = ['None'];
                            break;
                    }
                    if (isset($addon)) {
                        foreach ($addon as $addon_item) {
                            $addon_insert_query = "INSERT INTO AddOns (visit_id, add_on) VALUES (?, ?)";
                            $stmt = $pdo->prepare($addon_insert_query);
                            $stmt->execute([$visit_id, $addon_item]);
                        }
                    }
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        ?>
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Your visit code is:',
                html: '<?= '<b>' . $visit_id . '</b>. Use this to check your appointment.<br><br>Total Price: <span style="font-size: larger; font-weight: bold;">' . $total_price . '</span>' ?>',
                confirmButtonText: 'OK'
            });
        </script>

    </div>

    <div id="overlay" class="overlay"></div>

    <h1 style="text-align: center; margin-top:50px;">Available Packages</h1>
    <div class="border"></div>

    <footer>
        <div class="footerContainer">
            <div class="socialIcons">
                <a href="https://www.facebook.com/abusresort"><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-google-plus"></i></a>
                <a href=""><i class="fa-brands fa-youtube"></i></a>
            </div>
            <div class="footerNav">
                <ul>
                    <li><a onclick="scrollToSection('3')">Home</a></li>
                    <li><a onclick="scrollToSection('1')">Gallery</a></li>
                    <li><a onclick="scrollToSection('2')">Search</a></li>
                </ul>
            </div>

        </div>
        <div class="footerBottom">
            <p>Copyright &copy;2025; Designed by <span class="designer">AjRickArada</span></p>
        </div>
    </footer>

    <script>
        document.getElementById('openFormBtn').addEventListener('click', function() {
            document.getElementById('popupForm').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        });

        document.getElementById('openFormBtn2').addEventListener('click', function() {
            document.getElementById('popupForm').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        });

        document.getElementById('popupForm').addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
                document.getElementById('overlay').style.display = 'none';
            }
        });

        document.getElementById('closeFormBtn').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default behavior of button (e.g., form submission)
            document.getElementById('popupForm').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        });

        function redirectToAppointment() {
            window.location.href = "appointment.php";
        }

        function showSidebar() {
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'flex'
        }

        function hideSidebar() {
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'none'
        }
        showSlide(slideIndex);

        function scrollToSection(sectionId) {
            var section = document.getElementById(sectionId);
            if (section) {
                section.scrollIntoView({
                    behavior: "smooth"
                });
            }
        }
    </script>
</body>

</html>