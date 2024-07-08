<?php
include 'conn.php';
session_start();

if (isset($_POST['submit'])) {
    $name = $_POST['user'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM staff WHERE  uname='$name' AND `pass` ='$pass'";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) == 1) {
        while ($row = $query_run->fetch_assoc()) {
            $sno = $row['sno'];
            $sid = $row['sid'];
            $sname = $row['sname'];
        }

        $_SESSION['login'] = "verified";
        $_SESSION['sname'] = $sname;
        $_SESSION['sno'] = $sno;
        $_SESSION['sid'] = $sid;

        header('Location:sadmin.php');
        exit; // Always add exit after header to prevent further execution
    } else {
        echo '<script>alert("Invalid username and password");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>STAFF LOGINS</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Bree+Serif&family=Caveat:wght@400;700&family=Lobster&family=Monoton&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display+SC:ital,wght@0,400;0,700;1,700&family=Playfair+Display:ital,wght@0,400;0,700;1,700&family=Roboto:ital,wght@0,400;0,700;1,400;1,700&family=Source+Sans+Pro:ital,wght@0,400;0,700;1,700&family=Work+Sans:ital,wght@0,400;0,700;1,700&display=swap');
*{
    margin: 0;
    padding: 0;
}
section {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: url("https://i.ibb.co/qCkd9jS/img1.jpg") no-repeat;
    background-size: cover;
    background-position: center;
    /*animation: animateBg 5s linear infinite;
}

@keyframes animateBg {
    100% {
        filter: hue-rotate(360deg);
    }*/
}



.login-cont {
    position: relative;
    width: 400px;
    height: 450px;
    background: transparent;
    border: 2px solid #e1e1e1;
    border-radius: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    backdrop-filter: blur(15px);
}

.heading {
    font-size: 2em;
    color: #fff;
    text-align: center;
    pointer-events: none;
}

.input-cont {
    position: relative;
    width: 310px;
    margin: 30px 0;
    border-bottom: 2px solid #fff;
}

.label {
    position: absolute;
    top: 50px;
    left: 5px;
    transform: translateY(-25px);
    font-size: 1em;
    color: #fff;
    pointer-events: none;
    transition: .5s;
}

.input-cont .log-input:focus~.label,
.input-cont .log-input:valid~.label {
    top: -5px;
}


.log-input {
    width: 100%;
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    color: #fff;
    padding: 0 35px 0 5px;
}

.input-cont .icon {
    position: absolute;
    right: 10px;
    color: #fff;
    font-size: 1.2em;
    line-height: 57px;
}

.rem-for {
    margin: -15px 0 15px;
    font-size: .9em;
    color: #fff;
    display: flex;
    justify-content: space-between;
}

.rem-for .rem-label {
    margin-right: 5px;
}

.rem-for .a {
    color: #fff;
    text-decoration: none;
}

.rem-for .a:hover {
    text-decoration: underline;
}

button {
    width: 100%;
    height: 40px;
    background: #fff;
    border: none;
    outline: none;
    border-radius: 30px;
    cursor: pointer;
    font-size: 1em;
    color: #000;
    font-weight: 600;
}

.reg-link {
    font-size: .9em;
    color: #fff;
    text-align: center;
    margin: 25px 0 10px;
}

.reg-link p a {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
}

.reg-link p a:hover {
    text-decoration: underline;
}

@media (max-width: 360px) {
    body {
        position: flex;
    }

    .login-cont {
        width: 100%;
        height: 100vh;
        border: none;
        border-radius: 0;
    }

    .input-cont {
        width: 290px;

    }
}

</style>
</head>

<body>
    <section>
        <div class="login-cont">
            <form method="post" name="myform" target="_self" action="">
                <h2 class="heading">Login</h2>
                <div class="input-cont">
                    <span class="icon">
                        <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <input class="log-input" type="text" id="username" name="user" required="input">
                    <label class="label">User Name</label>
                </div>
                <div class="input-cont">
                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input class="log-input" type="password" id="password" name="pass" required="input" maxlength="8">
                    <label class="label">Password</label>
                </div>
                <!--<div class="rem-for">
                    <label><input class="rem-label" type="checkbox">Remember me</label>
                    <a class="a" href="#">Forget Password ?</a>
                </div>-->
                <button type="submit" value='submit' name="submit">Login</button>
                <div class="reg-link">
                    <p>Don't have any account?<a href="register.php">Register
                        </a> </p>
                </div>
            </form>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
