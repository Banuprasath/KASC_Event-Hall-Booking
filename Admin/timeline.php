<?php
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Card Project</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Bree+Serif&family=Caveat:wght@400;700&family=Lobster&family=Monoton&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display+SC:ital,wght@0,400;0,700;1,700&family=Playfair+Display:ital,wght@0,400;0,700;1,700&family=Roboto:ital,wght@0,400;0,700;1,400;1,700&family=Source+Sans+Pro:ital,wght@0,400;0,700;1,700&family=Work+Sans:ital,wght@0,400;0,700;1,700&display=swap');
* {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: Poppins;
}
@font-face {
	font-family: Poppins;
	src: url(./fonts/Poppins-Medium.ttf);
}
.main {
	width: 100%;
	height: auto;
	display: grid;
	place-items: center;
	background-color: rgb(245, 245, 245);
	padding: 50px 0;
}
.main .head {
	font-size: 29px;
	color: rgba(91, 14, 216, 0.767);
	position: relative;
	margin-bottom: 100px;
	font-weight: 500;
}
.main .head::after {
	content: " ";
	position: absolute;
	width: 50%;
	height: 3px;
	left: 50%;
	bottom: -5px;
	transform: translateX(-50%);
	background-image: linear-gradient(to right, rgba(91, 14, 216, 0.767), rgba(238, 12, 200, 0.747));
}

/* Container Css Start  */

.container {
	width: 70%;
	height: auto;
	margin: auto 0;
	position: relative;
}
.container ul {
	list-style: none;
}
.container ul::after {
	content: " ";
	position: absolute;
	width: 2px;
	height: 100%;
	left: 50%;
	top: 0;
	transform: translateX(-50%);
	background-image: linear-gradient(to bottom, rgba(91, 14, 216, 0.767), rgba(238, 12, 200, 0.747));
}
.container ul li {
	width: 50%;
	height: auto;
	padding: 15px 20px;
	background-color: #fff;
	border-radius: 8px;
	box-shadow: 1px 1px 15px rgba(0, 0, 0, 0.218);
	position: relative;
	margin-bottom: 30px;
	z-index: 99;
}
.container ul li:nth-child(4) {
	margin-bottom: 0;
}
.container ul li .circle {
	position: absolute;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	background-color: #e100ff7a;
	top: 0;
	display: grid;
	place-items: center;
}
.circle::after{
	content: ' ';
	width: 12px;
	height: 12px;
	background-color: #7f00ff;
	border-radius: 50%;
}
ul li:nth-child(odd) .circle {
	transform: translate(50%, -50%);
	right: -30px;
}
ul li:nth-child(even) .circle {
	transform: translate(-50%, -50%);
	left: -30px;
}
ul li .date {
	position: absolute;
	width: 130px;
	height: 33px;
	background-image: linear-gradient(to right,#7f00ff,#e100ff);
	border-radius: 15px;
	top: -45px;
	display: grid;
	place-items: center;
	color: #fff;
	font-size: 13px;
	box-shadow: 1px 2px 12px rgba(0, 0, 0, 0.318);
}
.container ul li:nth-child(odd) {
	float: left;
	clear: right;
	text-align: right;
	transform: translateX(-30px);
}
ul li:nth-child(odd) .date {
	right: 20px;
}
.container ul li:nth-child(even) {
	float: right;
	clear: left;
	transform: translateX(30px);
}
ul li .heading {
	font-size: 17px;
	color: rgb(91, 14, 216);
}
ul li p {
	font-size: 13px;
	color: #666;
	line-height: 18px;
	margin: 6px 0 4px 0;
}
ul li a {
	font-size: 13px;
	text-decoration: none;
	color: rgb(18, 54, 214);
	transition: all 0.3s ease;
}


@media only screen and (min-width:798px) and (max-width: 1100px) {
	.container{
		width: 80%;
	}
}

@media only screen and (max-width: 798px) {
	.container{
		width: 70%;
		transform: translateX(20px);
	}
	.container ul::after{
		left: -40px;
	}
	.container ul li {
		width: 100%;
		float: none;
		clear: none;
		margin-bottom: 80px;
	}
	.container ul li .circle{
		left: -40px;
		transform: translate(-50%, -50%);
	}
	.container ul li .date{
		left: 20px;
	}
	.container ul li:nth-child(odd) {
		transform: translateX(0px);
		text-align: left;
	}
	.container ul li:nth-child(even) {
		transform: translateX(0px);
	}
}

@media only screen and (max-width: 550px) {
	.container{
		width: 80%;
	}
	.container ul::after{
		left: -20px;
	}
	.container ul li .circle{
		left: -20px;
	}
}
</style>
</head>






    <body>
        <div class="main">
            <h3 class="head">Responsive Timeline</h3>
            <div class="container">
            <ul>




            <?php


$sql="select * from booking order by sdate DESC LIMIT 5 ";
$result=$conn->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){

     echo "<li>";
                    echo "<h3 class='heading'>".$row['ename']."</h3>";    
                     echo "   <p>".$row['about']."</p>";
                     echo "<b><p>Held on: ".$row['hall']." Seminar Hall</p></b>";
                       echo ' <a href="#">Read More ></a>';
                      echo '<span class="date">'.$row['sdate'].'</span>';
                       echo ' <span class="circle"></span>';
                   echo ' </li>';

                        //         echo "<tr>";
                        //         $id= $row['bkid'];
                        //     echo "<td>".$row['etype']."</td>";
                        //     echo "<td>".$row['ename']."</td>";
                        //     echo "<td>".$row['about']."</td>";
                        //     echo "<td>".$row['dep']."</td>";
                        //     echo "<td>".$row['fname']."</td>";
                        //     echo "<td>".$row['hall']."</td>";
                        //     echo "<td>".$row['sdate']."</td>";
                        //     $inputTime1 = $row['stime'];
                        //     $inputTime2 = $row['etime'];
                        //     $stime12 = convertTo12HourFormat($inputTime1);
                        //     $etime12= convertTo12HourFormat($inputTime2);
                        //     echo "<td>".$stime12." - ".$etime12."</td>";
                        //     echo "<td><a href='edit.php?id=$id' class='btn btn-success btn-sm'>Edit</td>";
                        //     echo "<td><a href='delete.php?id=$id' class='btn btn-success btn-sm'>Delete</td>";
                        //   //  echo "<td>".$etime12."</td>";

                        //     echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No data found</td></tr>";
}
?>

















<!--                 
                    <li>
                        <h3 class="heading">FrontEnd Developer</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit excepturi accusamus minus
                        totam </p>
                        <a href="#">Read More ></a>
                        <span class="date">January 2021</span>
                        <span class="circle"></span>
                    </li>
                    <li>
                        <h3 class="heading">BackEnd Developer</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit excepturi accusamus minus
                        totam </p>
                        <a href="#">Read More ></a>
                        <span class="date">February 2021</span>
                        <span class="circle"></span>
                    </li>
                    <li>
                        <h3 class="heading">Full Stack Developer</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit excepturi accusamus minus
                        totam </p>
                        <a href="#">Read More ></a>
                        <span class="date">March 2021</span>
                        <span class="circle"></span>
                    </li>
                    <li>
                        <h3 class="heading">App Developer</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit excepturi accusamus minus
                        totam </p>
                        <a href="#">Read More ></a>
                        <span class="date">April 2021</span>
                        <span class="circle"></span>
                    </li>
                </ul> -->
            </div>
        </div>
    </body>
</html>