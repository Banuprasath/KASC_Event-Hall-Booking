
<?php
session_start();
if(!isset($_SESSION['login']) ){
   
  
    
    echo "Un Verfied Staff";
    die;

}
else{
    $sname1=$_SESSION['sname'];
    $sno = $_SESSION['sno'];
   // echo "Staff ID:".$sno;
}
?>



<!---------- KABILAN CODE 


-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/a364e8076a.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../kabilan/css/hall_complaint_reg.css">
    <script src="../kabilan/js/hall_complaint_reg.js"></script>
    <title>STAFF QUIRIES</title>
</head>

<body>
    <div>
        <header class="header">
            <h1><a href="#" class="blog">KASC</a></h1>
            <i class="des-menu fa-solid fa-bars" style="color: #fff;" id="menu-icon"></i>
        </header>
        <div class="side-bar">
            <nav>
                <ul>
                    <li><a href="http://www.kasc.ac.in/" class="logo" target="_self">
                            <img src="https://www.naukrimessenger.com/wp-content/uploads/2021/08/kasc.jpg" alt="">
                            <span class=" des nav-items">KASC</span>
                        </a></li>
                    <!-- <li><a href="#" target="_self">
                            <i class="des fa-solid fa-house" style="color: #fff;"></i>
                            <span class="nav-items">HOME</span>
                        </a></li> -->
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
                    <li><a href="#" class="logout" target="_self">
                            <i class="des fa-solid fa-arrow-right-from-bracket" style="color: #fff;"></i>
                            <!--fa-beat-fade-->
                            <span class="nav-items">LOGOUT</span>
                        </a></li>
                </ul>
            </nav>
        </div>



        <div class="complaint">

            <div>
                <h1 class="complaint_form_heading">Complaint Registration</h1>
            </div>

            <div class="complaint_form">
                <form name='myform' method='post' enctype='multipart/form-data' onsubmit="return validateForm()">
                    <table>
                        <!-- <tr>
                            <td><label for='sname'>Staff Name:</label></td>
                            <td><input type='text' name='sname' id='sname' autofocus></td>
                        </tr> -->
                        
                        <tr>
                            <td><label for='cp'>Caption:</label></td>
                            <td><input type='text' name='cp' id='cp'></td>
                        </tr>
                        <tr>
                            <td><label for='hall'>Select Hall:</label></td>
                            <td>
                                <select id='hall' name='hall'>
                                    <option value=''></option>
                                    <option value='UV'>U.V Hall</option>
                                    <option value='RJ'>Ramanujam Hall</option>
                                    <option value='PG'>PG Seminar Hall</option>
                                    <option value='SJ'>Silver Jubilee Hall</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for='abt'>Details:</label></td>
                            <td><textarea name='abt' id='abt'></textarea></td>
                        </tr>
                        <tr>
                            <td><label for='image'>Image Proof:</label></td>
                            <td><input type='file' name='image' id='image' required></td>
                        </tr>
                        <tr>
                            <td><input type='reset' name='reset' value='Reset'></td>
                            <td><input type='submit' name='submit' value='Submit'></td>
                        </tr>
                    </table>
                </form>
            </div>
            
            </div>
    </div>
</body>

</html>



<!-- Script to show the dialog box -->

<style>   .message-box {
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
        }</style>
<div class="message-box success-message" id="success-box">
    Complaint registered successfully!
    <span class="close-btn" onclick="closeMessage('success-box')">X</span>
</div>

<div class="message-box error-message" id="error-box">
    Sorry, there was an error registering your complaint.
    <span class="close-btn" onclick="closeMessage('error-box')">X</span>
</div>





<!-- Script to show the dialog box -->
<!-- <script>
    // Check if the user is logged in
function checkLogin() {
    var isLoggedIn = <?php echo isset($_SESSION['login']) ? 'true' : 'false'; ?>;
    if (!isLoggedIn) {
        alert('Unverified Staff');
        window.location.href = 'login.php'; // Redirect to login page or any other appropriate action
    } else {
        var sname = <?php echo isset($_SESSION['sname']) ? "'".$_SESSION['sname']."'" : "''"; ?>;
        var sno = <?php echo isset($_SESSION['sno']) ? $_SESSION['sno'] : "''"; ?>;
        // You can perform further actions here if needed
    }
}

// Validate the complaint registration form
function validateForm() {
    var isCaptionValid = validateCaption();
    var isSelectHallValid = validateSelectHall();
    var isDetailsValid = validateDetails();
    var isImageValid = validateImage();

    if (isCaptionValid && isSelectHallValid && isDetailsValid && isImageValid) {
        return true; // Submit the form
    } else {
        return false; // Prevent form submission
    }
}

function validateCaption() {
    var caption = document.getElementById('cp').value;
    if (caption.trim() === '') {
        alert('Please enter a caption.');
        return false;
    }
    return true;
}

function validateSelectHall() {
    var selectedHall = document.getElementById('hall').value;
    if (selectedHall.trim() === '') {
        alert('Please select a hall.');
        return false;
    }
    return true;
}

function validateDetails() {
    var details = document.getElementById('abt').value;
    if (details.trim() === '') {
        alert('Please enter details.');
        return false;
    }
    return true;
}

function validateImage() {
    var imageInput = document.getElementById('image');
    if (imageInput.files.length === 0) {
        alert('Please upload an image.');
        return false;
    }
    var file = imageInput.files[0];
    var fileSize = file.size; // Size in bytes
    var maxSizeInBytes = 5000000; // 5MB
    if (fileSize > maxSizeInBytes) {
        alert('File size exceeds 5MB limit.');
        fileInput.value = '';
        return false;
    }
    var allowedExtensions = ['jpg', 'jpeg', 'png'];
    var fileName = file.name.toLowerCase();
    var fileExtension = fileName.split('.').pop();
    if (!allowedExtensions.includes(fileExtension)) {
        alert('Please upload a valid image file (JPG, JPEG, or PNG).');
        return false;
    }
    return true;
}

// Initialize the form validation and check login status
window.onload = function () {
    validateForm();
    checkLogin();
};
// Validate image size
function validateImageSize() {
    var fileInput = document.getElementById('image');
    if (fileInput.files.length > 0) {
        var fileSize = fileInput.files[0].size; // in bytes
        var maxSize = 5 * 1024 * 1024; // 5MB in bytes
        if (fileSize > maxSize) {
            alert('Please select an image file smaller than 5MB.');
            // Clear the file input to remove the selected file
            fileInput.value = '';
            return false;
        }
    }
    return true;
}

// Clear file input value on reset button click
document.addEventListener('DOMContentLoaded', function () {
    var resetButton = document.querySelector('.reset-button');
    resetButton.addEventListener('click', function () {
        var fileInput = document.getElementById('image');
        fileInput.value = ''; // Clear the file input value
    });
    
    var form = document.querySelector('form');
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent form submission

        var isImageSizeValid = validateImageSize();

        if (isImageSizeValid) {
            form.submit(); // Submit the form
        }
    });
});

</script> -->

<!-- Script to show the dialog box -->

<!--New Script -->
<script>
// Function to validate form inputs and file size
function validateForm() {
    var caption = document.getElementById('cp').value.trim();
    var hall = document.getElementById('hall').value.trim();
    var details = document.getElementById('abt').value.trim();
    var imageInput = document.getElementById('image');
    var image = imageInput.value.trim();

    // File size limit in bytes (5MB = 5 * 1024 * 1024 bytes)
    var maxSize = 5 * 1024 * 1024;

    if (caption === '' || hall === '' || details === '' || image === '') {
        alert('Please fill in all fields.');
        return false;
    }

    // Check if file size exceeds the limit
    if (imageInput.files.length > 0 && imageInput.files[0].size > maxSize) {
        alert('File size exceeds the limit of 5MB. Please choose a smaller file.');
        imageInput.value = ''; // Clear the file input value
        return false;
    }

    return true;
}

// Clear file input value on reset button click
document.addEventListener('DOMContentLoaded', function () {
    var resetButton = document.querySelector('input[type="reset"]');
    resetButton.addEventListener('click', function () {
        var fileInput = document.getElementById('image');
        fileInput.value = ''; // Clear the file input value
    });

    // var form = document.querySelector('form[name="myform"]');
    // form.addEventListener('submit', function (event) {
    //     event.preventDefault(); // Prevent form submission

    //     var isFormValid = validateForm();

    //     if (isFormValid) {
    //         form.submit(); // Submit the form
    //     }
    // });

    var fileInput = document.getElementById('image');
    fileInput.addEventListener('change', function () {
        var fileSize = this.files[0].size;
        var maxSize = 5 * 1024 * 1024; // 5MB limit

        if (fileSize > maxSize) {
            alert('File size exceeds the limit of 5MB. Please choose a smaller file.');
            this.value = ''; // Clear the file input value
        }
    });
});


</script>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

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

    $sname= $sname1;
    $cap= $_POST['cp'];
    $hall= $_POST['hall'];
    $details= $_POST['abt'];
    //$email=$_POST['email'];
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
    
    if (file_exists($targetFile) || $_FILES["image"]["size"] > 5000000 ||
        !in_array($imageFileType, ["jpg", "jpeg", "png"])) {
        $uploadOk = 0;
    }
    
    if ($uploadOk == 1 && move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
       
    
        $insertQuery = "INSERT INTO complaint  (sname, capt,sno, hall, details, img,isVf)  VALUES  ('$sname','$cap','$sno','$hall', '$details' ,'$img','false' )  ";
        
        if ($conn->query($insertQuery) === TRUE) {
           echo '<script>displayMessage("success-box");</script>';
        } else {
            echo "Error inserting record into the database: " . $conn->error;
        }
    
       // $conn->close();
    } else {
        echo '<script>displayMessage("error-box");</script>';
    }


//---------------------------------------------------Mail Issue---------------------------------//

    $mail=new PHPMailer(true);
$mail->isSMTP();                                            //Send using SMTP
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'banuprasath.dev@gmail.com';                     //SMTP username
    $mail->Password   = 'wlgemaxenwcrhsjq';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       =  465;  
    
    $mail->setFrom('banuprasath.dev@gmail.com', 'From BCA ');
    //vijayalakshmi.v12b@gmail.com
    //kabilanbca2021@gmail.com'
    $mail->addAddress('banuprasath0339@gmail.com', 'KASC Admin');  
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $cap;
    $mail->Body="<b>There is a problem in </b> ".$hall." The Problem is:".$details;

    $mail->send();
    echo "<script>alert('Complaint Registered Succesfully and Mail has been sent to Admin');</script>";
    //---------------------------------------------------Mail Issue---------------------------------//
         



}





?>




<!--- --------------------------------------------------------------------------VIEW THE COMPLAINT ------------------------------------------------------------------------------>
<!--php


/*


if(isset($_POST['submit']))
{
$sname= $_POST['sname'];
echo "<center><h2>Your Recent Complaint's</h2></center>";

//echo $sname;
echo "<table border='1px solid'>";
echo "<tr>";
echo "<th>Sname</th>";
echo "<th>Dep</th>";
echo "<th>Hall</th>";
echo "<th>Details</th>";
echo "<th>Proof</th>";


echo "<th colspan='2'> Action </th>";
















$sql="select * from complaint where sno = '$sno'";
$result=$conn->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){

                        echo "<tr>";
                        $id= $row['id'];
                    echo "<td>".$row['sname']."</td>";
                    echo "<td>".$row['capt']."</td>";
                    echo "<td>".$row['hall']."</td>";
                    echo "<td>".$row['details']."</td>";
                    echo "<td><img style='width: 100px; height: 100px; object-fit: cover;' src='../complaints/". $row['img'] ." ' alt='Complaint Image'></td>";
        
                    
                    
                   
                    echo "<td><a href='edit.php?id=$id' class='edit-button'>Edit</td>";
                    echo "<td><a href='delete.php?id=$id' class='btn btn-success btn-sm'>Delete</td>";
                  //  echo "<td>".$etime12."</td>";

                    echo "</tr>";
}
} else {
echo "<tr><td colspan='3'>No data found</td></tr>";
}
}

*/