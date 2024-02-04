
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


    $sql="select * from complaint where id='$id'";
$result=$conn->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){

                        
                        $eid= $row['id'];
                    $name = $row['sname'];
                    $cap = $row['capt'];
                    $hall = $row['hall'];
                    $details = $row['details'];

                    echo $details;
                   // echo "<td><img style='width: 100px; height: 100px; object-fit: cover;' src='../complaints/". $row['img'] ." ' alt='Complaint Image'></td>";
        
                    
                    
                   
                   
}




}
?>




<html>
    <head><title>Complaint Form</title></head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }

        /* Floating Message Box */
        .message-box {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            padding: 15px;
            display: none;
            border-radius: 5px;
            z-index: 999;
        }

        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #3c763d;
        }

        .error-message {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #a94442;
        }

        .close-btn {
            float: right;
            cursor: pointer;
        }
    </style>
    <body>
        <form name='myform' method='post' enctype='multipart/form-data'>
        <table>
            <tr>
                <td>Staff Name:</td>
                <td><input type='text' name='sname' value ='<?php echo $name; ?>'></td>
            </tr>
            <tr>
                <td>Caption</td>
                <td><input type='text' name='cp' value ='<?php echo $cap; ?>' ></td>
            </tr>
            
            <tr>
        <td>Select Hall</td>
        <td><select id="hall" name="hall" value ='<?php echo $hall; ?>'>
                    <option value="UV">U.V Hall</option>
                    <option value="RJ">Ramanujam Hall</option>
                    <option value="PG">PG Seminar Hall</option>
                    <option value="SJ">Silver Jubliee Hall</option>
            </select>
</td>
    </tr>
    <tr>
                <td>Details</td>
                <td><TextArea name='abt' value ='<?php echo $details; ?>'><?php echo htmlspecialchars($details); echo "hii";?></textarea></td>
            </tr>

            <tr>
                <td>Image Proff:</td>
                <td><input type='file' name='image' required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type='submit' name='submit' value='submit'>&nbsp &nbsp<input type='reset' name='reset' value='reset'></td>
            </tr>
        </table>        
</form>
    </body>
</html>




<!-- Script to show the dialog box -->
<div class="message-box success-message" id="success-box">
    Complaint updated successfully!
    <span class="close-btn" onclick="closeMessage('success-box')">X</span>
</div>

<div class="message-box error-message" id="error-box">
    Sorry, there was an error registering your complaint.
    <span class="close-btn" onclick="closeMessage('error-box')">X</span>
</div>



<!-- Script to show the dialog box -->

<!-- Script to show the dialog box -->
<script>
    function displayMessage(boxId) {
        var messageBox = document.getElementById(boxId);
        messageBox.style.display = 'block';
        setTimeout(function () {
            messageBox.style.display = 'none';
        }, 5000);  // Display for 5 seconds
    }

    function closeMessage(boxId) {
        document.getElementById(boxId).style.display = 'none';
    }
</script>




<?php
}else{

    echo "";
}
?>

<!-- Script to show the dialog box -->




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
if(isset($_POST['submit'])){

    //print_r($_POST);

  //  echo "HELLLO";

    $sname= $_POST['sname'];
    $cap= $_POST['cp'];
    $hall= $_POST['hall'];
    $details= $_POST['abt'];
    //$proof = $_POST['image'];
   

    $targetDir = "../complaints/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $img=basename($_FILES["image"]["name"]);
    //echo $img;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        $uploadOk = $check !== false ? 1 : 0;
    }
    
    if (/*file_exists($targetFile) ||*/ $_FILES["image"]["size"] > 5000000 ||
        !in_array($imageFileType, ["jpg", "jpeg", "png"])) {
        $uploadOk = 0;
    }
    
    if ($uploadOk == 1 && move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
       
    
        $insertQuery = "UPDATE complaint  SET sname = '$sname', capt='$cap', hall='$hall', details='$details', img='$img' WHERE id = $id";
        
        if ($conn->query($insertQuery) === TRUE) {
           echo '<script>displayMessage("success-box");</script>';
        } else {
            echo "Error inserting record into the database: " . $conn->error;
        }
    
       // $conn->close();
    } else {
        echo '<script>displayMessage("error-box");</script>';
    }
}
            

?>

