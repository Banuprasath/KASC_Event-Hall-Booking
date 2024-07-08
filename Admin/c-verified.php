<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Details</title>
    <!-- Add your CSS styles here -->
    <!-- <style>
        /* Your styles for complaint details page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .complaint-details {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            margin-top: 20px;
        }

        h2 {
            color: #333;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }

        p {
            margin-top: 10px;
        }

        .back-button {
            margin-top: 20px;
            text-align: center;
        }

        .back-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-button a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body> -->
<?php



// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "eventmanagement";


// $conn = new mysqli($servername, $username, $password, $dbname);


// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// else{ echo "";}




// if(isset($_GET['id'])){
// $id=$_GET['id'];


// $sql = "SELECT * FROM complaint WHERE id =$id ";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     while($row=$result->fetch_assoc()){

//         $sname= $row['sname'];
//         $capt= $row['capt'];
//         $hall = $row['hall'];
//         $details = $row['details'];
//         $img = $row['img'];

        


//     }}
// }

?>
<!--
<div class="complaint-details">
    <h2>Complaint Details</h2>

    <p><strong>Staff Name:</strong> <?php // echo $sname; ?></p>
    <p><strong>Caption:</strong> <?php // echo $capt; ?></p>
    <p><strong>Hall:</strong> <?php //echo $hall; ?></p>
    <p><strong>Details:</strong> <?php //echo $details; ?></p>

    <img style= "width: 500px; height: 500px;" src='../complaints/<?php// echo $img; ?>' alt='Complaint Image'>

   You can add more details as needed 

</div>

<div class="back-button">
    <a href="complaintview.php">Back to Complaints</a>
</div>

</body>
</html>
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Details</title>
    <!-- Add your CSS styles here -->
    <style>
        /* Your styles for complaint details page */
        /* {
            padding: 0;
            margin: 0;
            font-family: 'Poppins'Sans-Serif;
            text-decoration: none;
        }

        body {
            background: url('https://w.wallhaven.cc/full/qz/wallhaven-qz5r6q.jpg') center/cover fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            }

        .main-container {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin: 10px;
            
            }

        p {
            font-size: 15px;
            line-height: 15px;
            color: #fff;
        }

        .back-button {
            text-align: center;
            margin-top: 20px;
            }

            .back-button a {
            text-decoration: none;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.05);
            }
        h2 {
            color: #fff;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
            }
        .row {
            margin-top: 10%;
            border: 1px solid #fff0;
            border-radius: 15px;
            margin: 5px;
            padding: 10px;
            display: flex;
            height: 88%;
            align-items: center;
        }

        .col {
            width: 600px;
            height: 400px;
            margin: 10px;
            flex-basis: 50%;
            backdrop-filter: blur(15px);
        }
        img{
            border-radius: 20px;
        }*/
        * {
            padding: 0;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
        }

        body {
            background: url('https://i.ibb.co/qCkd9jS/img1.jpg') center/cover fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .main-container {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin: 10px;
            width:100vw;
            position: relative;
        }

        p {
            font-size: 15px;
            line-height: 1.5;
            color: #fff;
        }

        .back-button {
            text-align: center;
            margin-top: 20px;
        }

        .back-button a {
            text-decoration: none;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.05);
            display: block;
        }

        h2 {
            color: #fff;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .row {
            margin-top: 10%;
            border-radius: 15px;
            margin: 5px;
            padding: 10px;
            display: flex;
            height: 88%;
            align-items: center;
        }

        .col {
            border-radius:20px;
            width: 600px;
            height: 400px;
            margin: 10px;
            flex-basis: 50%;
            
        }
          
        .left{
            backdrop-filter: blur(15px);
            padding: 20px;
        }

        img {
            border-radius: 20px;
            width: 100%;
            height: 100%;
            /*object-fit: cover;*/
        }
    </style>
</head>
<body>
<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventmanagement";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{ echo "";}




if(isset($_GET['id'])){
$id=$_GET['id'];


$sql = "SELECT * FROM complaint WHERE id =$id ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row=$result->fetch_assoc()){

        $sname= $row['sname'];
        $capt= $row['capt'];
        $hall = $row['hall'];
        $details = $row['details'];
        $img = $row['img'];

        


    }}
}

?>

<div class="main-container">


    <div class="row 1">
            <div class="col left">
                <!-- text-container -->
                <h2>Complaint Details</h2>
                <p><strong>Staff Name:</strong> <?php echo $sname; ?></p>
                <p><strong>Caption:</strong> <?php echo $capt; ?></p>
                <p><strong>Hall:</strong> <?php echo $hall; ?></p>
                <p><strong>Details:</strong> <?php echo $details; ?></p>
            </div>
            <div class="col">
                
                    <img  src='../complaints/<?php echo $img; ?>' alt='Complaint Image'>
                
            </div>
        </div>
        <div class="back-button">
            <a href="verifiedcomplaints.php">Go Back</a>
        </div>

    <!-- You can add more details as needed -->
</div>



</body>
</html>
