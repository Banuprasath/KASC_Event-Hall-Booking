<?php
session_start();
if(isset($_SESSION['login'])){
    //$sno=$_SESSION['sno'];
    $sid=$_SESSION['sid'];
}
include 'conn.php';
$sql="select * from staff where sid = '$sid'";
$result=$conn->query($sql);

if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $sid=$row['sid'];
        $sname=$row['sname'];
        $dep=$row['dep'];
        $sno=$row['sno'];
        $smail=$row['smail'];
        $uname=$row['uname'];
        $pass=$row['pass'];



    }}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/a364e8076a.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../kabilan/css/personal.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <script src="../kabilan/js/personal.js"></script>
    <title>STAFF PERSONAL DETAILS</title>
</head>

<body>
    <section>

    </section>
    <div>
        <div class="nav-bars">
            <header class="header">
                <h1><a href="#" class="blog" target="_self">KASC</a></h1>
                <i class="des-menu fa-solid fa-bars" style="color: #fff;" id="menu-icon"></i>
            </header>
            <div class="side-bar">
            <nav>
                <ul>
                    <li><a href="http://www.kasc.ac.in/" class="logo" target="_self">
                            <img src="https://www.naukrimessenger.com/wp-content/uploads/2021/08/kasc.jpg" alt="">
                            <span class=" des nav-items">KASC</span>
                        </a></li>
                    <!-- <li><a href="../fp/landing.php" target="_self">
                            <i class="des fa-solid fa-house" style="color: #fff;"></i>
                            <span class="nav-items">HOME</span>
                        </a></li>  -->
                    <li><a href="spersonal.php" target="_self">
                            <i class="des fa-solid fa-user" style="color: #fff;"></i>
                            <span class="nav-items">PERSONAL</span>
                        </a></li>
                    <li><a href="sadmin.php" target="_self">
                            <i class="des fa-solid fa-chalkboard" style="color: #fff;"></i>
                            <!--fa-beat-fade-->
                            <span class="nav-items">BOOK HALL</span>
                        </a></li>
                    <li><a href="view.php" target="_self">
                            <i class="des fa-regular fa-calendar-check " style="color: #fff;"></i>
                            <!--fa-beat-fade-->
                            <span class="nav-items">MY BOOKINGS</span>
                        </a></li>
                    <li><a href="complaint-form.php" target="_self">
                            <i class="des fa-regular fa-file" style="color: #fff;"></i>
                            <!--fa-beat-fade-->
                            <span class="nav-items">RISE QUERIES</span>
                        </a></li>
                    <li><a href="complaint.php" target="_self">
                            <i class="des fa-solid fa-clipboard-question" style="color: #fff;"></i>
                            <!--fa-beat-fade-->
                            <span class="nav-items">MY QUERIES</span>
                        </a></li>
                    <li><a href="logout.php" class="logout" target="_self">
                            <i class="des fa-solid fa-arrow-right-from-bracket" style="color: #fff;"></i>
                            <!--fa-beat-fade-->
                            <span class="nav-items">LOGOUT</span>
                        </a></li>
                </ul>
            </nav>
        </div>
        </div>



        <div class="personal_info">
            <div>
                <h1 class="personal_heading">Personal Info</h1>
            </div>

            <div class="staff_details">
                <div>
                    <table>
                        <tr class="heading_tr td_cont">
                            <td class="">Basic Info</td>
                            <td>
                                <i class="des fa-regular fa-pen-to-square" style="color: #fff;"
                                onclick="openNewWindow('profile-edit-page.php<?php echo '?id='.$sid;?>');" target="_self"></a></i>
                            </td>
                        </tr>
                         
                        <tr class="td_content">
                            <td>Name</td>
                            <td><?php echo $sname; ?></td>
                        </tr>
                        <!-- <tr class="td_content">
                            <td>BirthDay</td>
                            <td>November 11, 2003</td>
                        </tr> -->
                        <!-- <tr class="td_content">
                            <td>Gender</td>
                            <td>Male</td>
                        </tr> -->
                    </table>
                    <table>
                        <tr class="heading_tr td_cont">
                            <td>Contact Details</td>
                            <td>
                                <i class="des fa-regular fa-pen-to-square" style="color: #fff;"
                                onclick="openNewWindow('profile-edit-page.php<?php echo '?id='.$sid;?>');" target="_self"></a></i>
                            </td>
                        </tr>
                        <tr class="td_content">
                            <td>E-mail</td>
                            <td><?php echo $smail; ?></td>
                        </tr>
                        <!-- <tr class="td_content">
                            <td>Phone</td>
                            <td>+91 73739 40409</td>
                        </tr> -->
                    </table>
                    <table>
                        <tr class="heading_tr td_cont">
                            <td>Login Details</td>
                            <td>
                                <i class="des fa-regular fa-pen-to-square" style="color: #fff;"
                                onclick="openNewWindow('profile-edit-page.php<?php echo '?id='.$sid;?>');" target="_self"></a></i>
                            </td>
                        </tr>
                        <tr class="td_content">
                            <td>Username</td>
                            <td><?php echo $uname; ?></td>
                        </tr>
                        <tr class="td_content">
                            <td>Password</td>
                            <td><?php echo $pass; ?></td>
                        </tr>
                    </table>
                    <table>
                        <tr class="heading_tr td_cont">
                            <td>Addresses</td>
                            <td>
                                <i class="des fa-regular fa-pen-to-square" style="color: #fff;"
                                onclick="openNewWindow('profile-edit-page.php<?php echo '?id='.$sid;?>');" target="_self"></a></i>
                            </td>
                        </tr>
                        <tr class="td_content">
                            <td>Register ID</td>
                            <td><?php echo $sno; ?></td>
                        </tr>
                        <tr class="td_content">
                            <td>Department</td>
                            <td><?php echo $dep; ?></td>
                        </tr>
                    </table>
                </div>

            </div>

        </div>
    </div>
</body>

</html>