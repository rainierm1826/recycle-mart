<?php
    include '/xampp/htdocs/recycle-mart-main/Components/navbar.php';
    include '/xampp/htdocs/recycle-mart-main/database/conn.php';

    function user_registration() {
        $con = connection();
        
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        if (isset($_POST['register-username']) && isset($_POST['contact-number']) && isset($_POST['register-password']) && isset($_POST['confirm-password']) && isset($_POST['current-address']) && isset($_POST['email-address'])) {
            $reg_username = $_POST['register-username'];
            $reg_contactNumber = $_POST['contact-number'];
            $reg_password = $_POST['register-password'];
            $reg_confirmPassword = $_POST['confirm-password'];
            $reg_currentAddress= $_POST['current-address'];
            $reg_email = $_POST['email-address'];
        
            // Check if passwords match
            if ($reg_confirmPassword !== $reg_password) {
                echo 'Passwords do not match';
            } else {

                $sql = "INSERT INTO user_account (username, password, current_address, contact_number, email_address) VALUES ('$reg_username', '$reg_password', '$reg_currentAddress', '$reg_contactNumber', '$reg_email')";
        
                if ($con->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $con->error;
                }
            }
        }
        
    }
    user_registration();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--navbar css link-->
    <link rel="stylesheet" href="recycle-mart-main/Components/navbar.css">
    <!--font awesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!--registration css link-->
    <link rel="stylesheet" href="/recycle-mart-main/Pages/registrationPage/registration.css">
    <!--lato font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <title>RECYCLEMART</title>
</head>
<body>

    <div class="register-container" id="register-container">
         <div class="user-profile-register"><i class="fa-solid fa-user"></i></div>
                <form class="register-form" method="POST" action="/recycle-mart-main/Pages/registrationPage/registrationPage.php">
                    <div class="form-control">
                    <label for="register-username">Username</label>
                    <input type="text" name="register-username" id="register-username">

                    <label for="contact-number">Contact Number</label>
                    <input type="text" name="contact-number" id="contact-number">

                    <label for="register-password">Password</label>
                    <input type="password" name="register-password" id="register-password">

                    <label for="current-address">Current Address</label>
                    <input type="text" name="current-address" id="current-address">

                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" name="confirm-password" id="confirm-password">

                    <label for="email-address">Email Address</label>
                    <input type="text" name="email-address" id="email-address">
                    </div>

                    <div class="register-btn"><button class="btn-register" type="submit" id="submit">REGISTER</button></div>     
                </form>
    </div>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="/recycle-mart-main/Pages/registrationPage/registrationPage.js"></script>

</body>
</html>