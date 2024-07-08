<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <script src="https://kit.fontawesome.com/a364e8076a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="AdminEventView.css">
    </link>
    <style>

    </style>

</head>

<body>
    <?php
    //session_start();
    if(isset($_SESSION['sname'])){
        $Staff_Name=$_SESSION['sname'];
    }
    else{
        $Staff_Name='Admin';
    }
    ?>


<h3 class="admin_name"><?php echo $Staff_Name;?></h3>
    <div class="content-container">
        <div class="parent">
            <div class="child-container">
                <input type="checkbox" id="check">
                <label class="button bars" for="check">
                    <i class="fas fa-bars"></i>
                </label>
                <div class="side_bar">
                    <div class="title">
                        <div class="logo">
                            <a href="http://www.kasc.ac.in/" class="logo-at" target="_self">
                                <img src="https://www.naukrimessenger.com/wp-content/uploads/2021/08/kasc.jpg" alt="">
                                <span class="">KASC</span>
                            </a>
                        </div>
                        <label class="button cancel" for="check">
                            <i class="fas fa-times"></i>
                        </label>
                    </div>
                    <ul>
                        <li><a href="login.php" target="_self">
                                <i class="des fa-solid fa-house"></i>
                                <span class="nav-items">HOME</span>
                            </a></li>
                        <li><a href="bookingview.php" target="_self">
                                <i class="des fa-regular fa-calendar-check"></i>
                                <span class="nav-items">BOOKINGS</span>
                            </a></li>
                        <li><a href="complaintview.php" target="_self">
                                <i class="des fa-solid fa-clipboard-question"></i>
                                <span class="nav-items">COMPLAINTS</span>
                            </a></li>
                            <li><a href="verifiedcomplaints.php" target="_self">
                                <i class="des fa-regular fa-square-check"></i>
                                <span class="nav-items">SOLVED COMP</span>
                            </a></li>
                        <li><a href="logout.php" class="logout" target="_self">
                                <i class="des fa-solid fa-arrow-right-from-bracket"></i>
                                <span class="nav-items">LOGOUT</span>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
