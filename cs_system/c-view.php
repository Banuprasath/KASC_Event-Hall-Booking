<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Details</title>
    <!-- Add your CSS styles here -->
    <style>
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
<div class="complaint-details">
    <h2>Complaint Details</h2>

    <p><strong>Staff Name:</strong> <?php echo $sname; ?></p>
    <p><strong>Caption:</strong> <?php echo $capt; ?></p>
    <p><strong>Hall:</strong> <?php echo $hall; ?></p>
    <p><strong>Details:</strong> <?php echo $details; ?></p>

    <img src='../complaints/<?php echo $img; ?>' alt='Complaint Image'>

    <!-- You can add more details as needed -->

</div>

<div class="back-button">
    <a href="c-admin.php">Back to Complaints</a>
</div>

</body>
</html>
