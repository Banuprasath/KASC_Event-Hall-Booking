
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="login1.css">
</head>
<style>
    body {
        background-image: url('images/land1.jpg');
    
        
        background-size: cover;
        background-repeat: no-repeat;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    .container {
        width: 100%;
        border-radius: 20px;
        opacity: 90%;

    }
</style>

<body>
    <div class="container">
        <h2>Login Form</h2>
        <form method="post" name="myform" target="_self">
            <label for="username">Username:</label>
            <input type="text" id="username" name="user" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="pass" required>




            <button type="submit" name="submit">Login</button>
            <br>
            <br>
          <p>New user click to   <a href="register.php">Register Here</a></p>
        </form>
        
    </div>
</body>

</html>

<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 400px;
    margin: 50px auto;
    background-color: #ffffff;
    
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 5px;
}

input {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

a {
    text-decoration: none;
    color: #007bff;
}

a:hover {
    text-decoration: underline;
}

</style>

<!-- PHP Starts Here -->
<?php
include 'conn.php';
session_start();
if(isset($_POST['submit'])){

    $name=$_POST['user'];
    $pass=$_POST['pass'];


    







    $query = "SELECT * FROM staff WHERE  uname='$name' AND `pass` ='$pass'";

    $query_run = mysqli_query($conn, $query);

    //$result = $conn->query($sql);

   
   
   // print_r($query_run); 


   
    if(mysqli_num_rows($query_run) ==1)
    {
        while($row=$query_run->fetch_assoc()){
            $sno= $row['sno'];
            $sid=$row['sid'];
            $sname=$row['sname'];

        }
       // header('Location: sadmin.php');

       echo $sno;
        $_SESSION['login']="verified";
        $_SESSION['sname']=$sname;
        $_SESSION['sno']=$sno;
        $_SESSION['sid']=$sid;
        header('Location: sadmin.php');
    }
    


    




    // if($name=='Admin' && $pass=='test'){
    //     header('Location: admin.php');
    //     $_SESSION['val']="PASS";


    //}
    else{
        echo '<script>alert("Invalid username and password");</script>';
    }
}


?>







