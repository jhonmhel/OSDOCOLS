<?php 
    session_start();
    include 'Source/librarian/inc/connection.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>One SDO Calapan Online LIbrary System</title>
    <link rel="shortcut icon" href="images/libraryhub.png" type="image/x-icon">
    
    <style>
        .container{
            display: flex;
            justify-content: center;
}
        </style>
    <body style=" background-color: rgb(157, 255, 255)">
    <div class="container">
    <nav class="navigation">
        <ul class="list">
        <img src="images/libraryhub.png" style="margin-top: -20px; height: 80px; margin-left:-400px;">
            <li><a href="index.php"style="">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <img src="images/sdologo.png" style="right: -530px; margin-top: -20px; height: 100px;">
        </ul>
        <p class="title-log" style=" font-size: 55px;
                                    padding-left: 0px;
                                    font-family: 'Roboto', sans-serif;  
                                    font-weight: bold;
                                    position: absolute;
                                    margin-top: 100px;
                                    margin-left:-430px;
                                    letter-spacing: 10px;">One SDO Calapan <br>Online Library System</p>

    </nav>
    <img src="images/loginimage.png" style="height: 550px; right: 50px; 
                                            position: absolute; width: auto; 
                                            margin-top: 100px; padding: 0 0 0 0;
                                            opacity: 1;
                                            transform: translateY(0);
                                            animation: fadeDown 1s forwards;
                                            
                                            @keyframes fadeDown {
                                                from {
                                                opacity: 1;
                                                transform: translateY(-50px);
                                                }
                                                to {
                                                opacity: 1;
                                                transform: translateY(10px);
                                                }
                                            }">
   
    <div data-aos="fade-up" id="picuser" style="margin-left: 130px;"><img src="images/user.png" alt=""></div>


    <div id="login-form">
        <form class="form1" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <h2 style="margin-top:-20px;">Log In</h2>
            <P></P>
            <input type="text" id="useername" name="user_id" style="margin-top: 65px;" placeholder="User ID" required> 
            <br>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <br><br>
            <input type="submit" class="loginbot" style="border-bottom: none;"value="LOG IN AN ACCOUNT" name="login"   > 
    </div>
              

    <?php 
                    if (isset($_POST["login"])) {
                        $count = 0;
                        $user_id = mysqli_real_escape_string($link, $_POST["user_id"]);
                        $password = mysqli_real_escape_string($link, $_POST["password"]);
                        $res = mysqli_query($link, "SELECT * FROM user WHERE user_id='$user_id' AND passwords='$password'");
                        $count = mysqli_num_rows($res);
                        if ($count == 0) {
                            // display an error message
                            echo "Invalid username or password";
                            // echo '<div class="modal" tabindex="-1" role="dialog">
                            //         <div class="modal-dialog" role="document">
                            //             <div class="modal-content">
                            //             <div class="modal-header">
                            //                 <h5 class="modal-title">Modal title</h5>
                            //                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            //                 <span aria-hidden="true">&times;</span>
                            //                 </button>
                            //             </div>
                            //             <div class="modal-body">
                            //                 <p>Invalid username or password</p>
                            //             </div>
                            //             <div class="modal-footer">
                            //                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            //                 <button type="button" class="btn btn-primary">Save changes</button>
                            //             </div>
                            //             </div>
                            //         </div>
                            //         </div>';
                        } else {
                            $user = mysqli_fetch_assoc($res);
                            if ($user["statuss"] == "INACTIVE") {
                                // display a message saying that the user is inactive
                                echo "Sorry, your account is currently inactive";
                            } else {
                                $_SESSION["user_id"] = $user["user_id"];
                                if ($user["roles"] == "Admin") {
                                    header("Location: Source/librarian/dashboard.php");
                                    exit();
                                } else if ($user["roles"] == "School Librarian") {
                                    header("Location: Source/librarian/user/school_librarian/dashboard.php");
                                    exit();
                                }
                            }
                        }
                    }
                    
                    ?>


   
    </div>
  </div>
</div>
</head>
   
</body>
</html>