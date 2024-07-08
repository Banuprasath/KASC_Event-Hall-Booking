<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventmanagement";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function convertTo12HourFormat($inputTime) {
    $dateTime = new DateTime($inputTime);
    $formattedTime = $dateTime->format('h:i A');
    return $formattedTime;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="newland.css" />
    <title>ONLINE HALL BOOKING SYSTEM</title>
</head>
<?php $search = 0; ?>
   
<body>
    <nav>
        <div class="nav__logo">KASC</div>
        <ul class="nav__links">
            <li class="link"><a href="#">Home</a></li>
            <!-- <li class="link"><a href="#">Book</a></li> -->
            <li class="link"><a href="./Admin/login.php">Admin</a></li>
            <li class="link staff"><a href="./staff/newlogin.php">Staff</a></li>




        </ul>
    </nav>

    <header class="section_container header_container">
        <!-- Your existing header content -->
        <div class="header_image_container">
            <div class="header__content">
                <h1>Event Hall Booking</h1>
                <p>Book Events, Rise Queries regarding the issues in the Hall.</p>
            </div>
            <div class="booking__container">
                <form method='post'>
                    <div class="form__group">
                        <div class="input__group">
                            <input type="text" name='ename' />
                            <label>Event Name</label>
                        </div>
                        <p>Where are you going?</p>
                    </div>
                    <div class="form__group">
                        <div class="input__group">
                            <input type="text" name='dep' />
                            <label>Department</label>
                        </div>
                        <p>Add Department</p>
                    </div>
                    <div class="form__group">
                        <div class="input__group">
                            <input type="text" name='hall' />
                            <label>Hall</label>
                        </div>
                        <p>Add Event</p>
                    </div>
                    <!-- <div class="form__group">
                        <div class="input__group">
                            <input type="text" />
                            <label>Date</label>
                        </div>
                        <p>Add Date</p>
                    </div>
                     -->
    <!-- Modified button code -->
    
                 
                <br>
                
                <button type="button" id="search-button" class="btn" onclick="submitForm()"><i class="ri-search-line"></i></button>
                <input type="submit" name="submit" style="display: none;">
                    

                   
                </form>
            </div>
        </div>

    </header>
    <script>
    function submitForm() {
        document.querySelector('input[name="submit"]').click();
    }
</script>
    <section class="section_container popular_container">
        <h2 class="section__header">Upcoming Events</h2>
        <div class="popular__grid">
            <?php
            if (!isset($_POST['submit'])) {
                $sql = "SELECT * FROM booking ORDER BY sdate DESC LIMIT 6";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Your existing code to display events...........................................................
                        // echo '<div class="popular__grid">';
                        // echo '<div class="popular__card">';
                        // echo '<img src="https://w.wallhaven.cc/full/kx/wallhaven-kxj3l1.jpg" alt="popular hotel" />';
                        // echo '<div class="popular__content">';
                        // echo '<div class="popular_card_header">';
                        // echo "<h4>".$row['hall']."</h4>";
                        // $inputTime1 = $row['stime'];
                        // $inputTime2 = $row['etime'];
                        // $stime12 = convertTo12HourFormat($inputTime1);
                        // $etime12= convertTo12HourFormat($inputTime2);
                        // echo "<h4>".$stime12." - ".$etime12."</h4>";
                        // echo '</div>';
                        // echo "<p>".$row['ename']."</p>";
                        // echo '</div>';
                        // echo '</div>';
                        // echo '</div>';
                        $rj='http://www.kasc.ac.in/maths/images/2.jpg';
                            $uv='http://www.kasc.ac.in/placement/images/1.png';
                            $pg='https://kasc.ac.in/cspa/images/2.png';
                            $sj='http://www.kasc.ac.in/placement/images/7.png';
                            $hall =$row['hall'];
                            if ($row['hall']=='UV'){
                                $src=$uv;

                            }
                            if ($row['hall']=='RJ'){
                                $src=$rj;
                                
                            }
                            if ($row['hall']=='PG'){
                                $src=$pg;
                                
                            }if ($row['hall']=='SJ'){
                                $src=$sj;
                                
                            }





                            echo '<div class="popular__grid">';
                            echo '<div class="popular__card">';
                            echo '<img src='.$src.' alt="popular hotel" />';
                            echo '<div class="popular__content">';
                            echo '<div class="popular_card_header">';
                            echo "<h4>" . $hall . "</h4>";
                            //echo "<p>".$row['sdate']."</p>";
                            $inputTime1 = $row['stime'];
                            $inputTime2 = $row['etime'];
                            $stime12 = convertTo12HourFormat($inputTime1);
                            $etime12= convertTo12HourFormat($inputTime2);
                            echo "<h4>" . $stime12 . " - " . $etime12 . "</h4>";
                            echo '</div>';
                            echo "<p><b>Date : </b>".$row['sdate']."</p><br>";
                            echo "<p>" . $row['ename'] . "</p>";
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                    }
                } else {
                    echo "<p>No data found</p>";
                }
            }if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["submit"])) {
                    $ename=$_POST['ename'];
                    $dep=$_POST['dep'];
                    $hall=$_POST['hall'];
                








                    $sql = "SELECT * FROM booking WHERE etype LIKE '%$ename%' AND dep LIKE '%$dep%' AND hall LIKE '%$hall%' ORDER BY sdate DESC LIMIT 6";
                    $result = $conn->query($sql);
    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Your existing code to display events...........................................................
                            // echo '<div class="popular__grid">';
                            // echo '<div class="popular__card">';
                            // echo '<img src="https://w.wallhaven.cc/full/kx/wallhaven-kxj3l1.jpg" alt="popular hotel" />';
                            // echo '<div class="popular__content">';
                            // echo '<div class="popular_card_header">';
                            // echo "<h4>".$row['hall']."</h4>";
                            // $inputTime1 = $row['stime'];
                            // $inputTime2 = $row['etime'];
                            // $stime12 = convertTo12HourFormat($inputTime1);
                            // $etime12= convertTo12HourFormat($inputTime2);
                            // echo "<h4>".$stime12." - ".$etime12."</h4>";
                            // echo '</div>';
                            // echo "<p>".$row['ename']."</p>";
                            // echo '</div>';
                            // echo '</div>';
                            // echo '</div>';
                            $rj='http://www.kasc.ac.in/maths/images/2.jpg';
                            $uv='http://www.kasc.ac.in/placement/images/1.png';
                            $pg='https://kasc.ac.in/cspa/images/2.png';
                            $sj='http://www.kasc.ac.in/placement/images/7.png';
                            $hall =$row['hall'];
                            if ($row['hall']=='UV'){
                                $src=$uv;

                            }
                            if ($row['hall']=='RJ'){
                                $src=$rj;
                                
                            }
                            if ($row['hall']=='PG'){
                                $src=$pg;
                                
                            }if ($row['hall']=='SJ'){
                                $src=$sj;
                                
                            }




                            echo '<div class="popular__grid">';
                            echo '<div class="popular__card">';
                            echo '<img src='.$src.' alt="popular hotel" />';
                            echo '<div class="popular__content">';
                            echo '<div class="popular_card_header">';
                            echo "<h4>" . $hall . "</h4>";
                            //echo "<p>".$row['sdate']."</p>";
                            $inputTime1 = $row['stime'];
                            $inputTime2 = $row['etime'];
                            $stime12 = convertTo12HourFormat($inputTime1);
                            $etime12= convertTo12HourFormat($inputTime2);
                            echo "<h4>" . $stime12 . " - " . $etime12 . "</h4>";
                            echo '</div>';
                            echo "<p><b>Date : </b>".$row['sdate']."</p><br>";
                            echo "<p>" . $row['ename'] . "</p>";
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "<p>No data found</p>";
                    }

















                } else {
                    // Form submitted, but button not clicked
                    // Handle other form data here
                    echo "WORK AGALA DA ";
                }
            }
            ?>
        </div>
    </section>

    <section class="client">
        <!-- Your existing client section -->
        <div class="section_container client_container">
            <h2 class="section__header">What were the Halls</h2>
            <div class="client__grid">
                <div class="client__card">
                    <img src="http://www.kasc.ac.in/maths/images/2.jpg" alt="client" />
                    <h3>Ramanujan Hall</h3>
                    <p>The Hall Incharge is "<b>Samit</b>"</p>
                    <p>It is Located in the Ground-Floor of Science Block under the Maths Department.</p>
                    <p>It occupies a total of <b>100</b> students in this hall.</p>
                </div>
                <div class="client__card">
                    <img src="http://www.kasc.ac.in/placement/images/1.png" alt="client" />
                    <h3>U.V.S Hall</h3>
                    <p>The Hall Incharge is "<b>Jayaram</b>"</p>
                    <p>It is Located under the Department of Computer Applications in BCA Block</p>
                    <p>It occupies a total of <b>400</b> students in this hall.</p>
                </div>
                <div class="client__card">
                    <img src="https://kasc.ac.in/cspa/images/2.png" alt="client" />
                    <h3>P.G.Seminar Hall</h3>
                    <p>The Hall Incharge is "<b>Gowtham</b>"</p>
                    <p>It is Located in the Ground-Floor of P.G Block.</p>
                    <p>It occupies a total of <b>130</b> students in this hall.</p>
                    
                </div>
                <!-- <div class="client__card">
                    <img src="https://w.wallhaven.cc/full/kx/wallhaven-kxj3l1.jpg" alt="client" />
                    <p>
                        I was able to book a room within minutes, and the hotel exceeded
                        my expectations. I appreciate WDMCo's efficiency and reliability.
                    </p>
                </div> -->
            </div>
        </div>

    </section>

    <section class="section__container">
        <!-- Your existing reward section -->
        <div class="reward__container">
            <p>About the Management</p>
            <h4>Established in 1994, KASC is a Private UnAided college. The college is
                affiliated with Bharathiar University and accredited by UGC, AICTE, NAAC.</h4>
            <a href="http://www.kasc.ac.in/" traget="_self" style="color:#fff;"><button class="reward__btn">Visit Now</button></a>
        </div>
    </section>

    <footer class="footer">
        <div class="section_container footer_container">
            <!-- Your existing footer content -->
            <div class="section_container footer_container">
            <div class="footer__col">
                <h3>KASC</h3>
                <p>
                    Kongu Arts and Science College offers 75 courses across 12
                    streams namely Commerce and Banking, IT, Management, Arts, Science.
                </p>
                <p>
                    Kongu Arts and Science College (KASC), Erode
                    offers B.Sc, BBA, BCA, BBA programs in various disciplines.
                </p>
            </div>
            <div class="footer__col">
                <h4>Institution</h4>
                <p>Home</p>
                <p>About Us</p>
                <p>Blog</p>
                <p>Book</p>
                <p>Contact Us</p>
            </div>
            <!--<div class="footer__col">
                <h4>Legal</h4>
                <p>FAQs</p>
                <p>Terms & Conditions</p>
                <p>Privacy Policy</p>
            </div>
            <div class="footer__col">
                <h4>Resources</h4>
                <p>Social Media</p>
                <p>Help Center</p>
                <p>Partnerships</p>
            </div>-->

        </div>
        <div class="footer__bar">
            Copyright © 2023 Web Design Mastery. All rights reserved.
        </div>
    </footer>
</body>

</html>
