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
    
$sql = "SELECT img FROM complaint WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fileName = $row['img'];
}
$folderPath = "../complaints/";

    
    $filePath = $folderPath . $fileName;

    // Check if the file exists before deleting
    if (file_exists($filePath)) {
        // Delete the file
        if (unlink($filePath)) {
            echo "File deleted successfully.";
        } else {
            echo "Error deleting the file.";
        }
    } else {
        echo "File not found.";
    }


    $sqlInsert = "DELETE from complaint where id = $id";


    if ($conn->query($sqlInsert) === TRUE) {
        echo "Record delete successfully<br>";
        header('Location: complaint.php');
            } else {
                echo "Error inserting record: " . $conn->error . "<br>";
            }
}

?>


