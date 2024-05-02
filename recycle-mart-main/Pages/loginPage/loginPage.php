<?php
include '/xampp/htdocs/recycle-mart-main/Components/navbar.php';
include '/xampp/htdocs/recycle-mart-main/database/conn.php';

session_start();

$invalidAccount = "";
function cleanData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}


if(isset($_POST['login-username']) && isset($_POST['login-password'])) {
    $username = cleanData($_POST['login-username']);
    $password = cleanData($_POST['login-password']);

    $con = connection();

    $sql = "SELECT username, password FROM user_account WHERE username='$username' && password ='$password'";
    $result = mysqli_query($con, $sql);


    if(mysqli_num_rows($result)==1) {
        $row = mysqli_fetch_assoc($result);
        if($row['username']==$username && $row['password']==$password){
           header('Location:/recycle-mart-main/Pages/shopPage/shopPage.php');
            exit();
        }
    } else {
        $invalidAccount = "Wrong Username or Password";
    }
    
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--navbar css link-->
    <link rel="stylesheet" href="/Components/navbar.css">
    <!--font awesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!--login css link-->
    <link rel="stylesheet" href="/recycle-mart-main/Pages/loginPage/loginPage.css">
    <!--lato font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
        <!---->

        <div class="login-container" id="login-container">
            <form class="login-form" action="/recycle-mart-main/Pages/loginPage/loginPage.php" method="POST">

            <span class="user-profile-login"><i class="fa-solid fa-user"></i></span>

                <label for="login-username">Username</label>
                <input type="text" name="login-username" id="login-username">
                <label for="login-password">Password</label>
                <input type="password" name="login-password" id="login-password">
                <p class="validation"><?php echo $invalidAccount;?></p>
                <span class="login-btn"><button class="btn-login" id="close-login" type="submit">LOGIN</button></span> 
            </form>
        </div>

<script src="https://unpkg.com/scrollreveal"></script>
<script src="/recycle-mart-main/Pages/loginPage/loginPage.js"></script>



</body>


</html>