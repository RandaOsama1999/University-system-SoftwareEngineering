<?php
include_once "classUser.php";
session_start();
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
			$conn->query("SET NAMES 'utf8'");
            if(isset($_POST['login'])){
                $count=0;
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $sql = "SELECT * FROM alazharuni.user WHERE Email='$email' AND Password='$pass'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    if($row==true)
                    {
                        $_SESSION['email'] = $email;
                        header("location: AllPages.php");
                        
                    }
                }
                if($count==0)
                {
                    echo '
                    <div id="myModal" class="modal">
    
                    <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2 class="header">Wrong Login Info</h2>
                    </div>
                
                </div>';
                }
						}
						
            
            $conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Ela - Bootstrap Admin Dashboard Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                            <h2 style="text-align:center;">تسجيل الدخول</h2>
                                <form method="post">
                                    <div class="form-group">
                                    <label for="pass" class="label" for="val-email" style="margin-left: 55%;font-size:20px">البريد الالكتروني<span class="text-danger">*</span></label>
                                        <input id="pass" type="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="pass" class="label"  for="val-password" style="margin-left: 70%;font-size:20px" > كلمه السر<span class="text-danger">*</label>
                                        <input id="pass" type="password" class="form-control" name ="password" required>
                                    </div>
                                    <div class="checkbox">
                                        <label>
        										<input type="checkbox"> تذكرني
                                            </label>
                    </div>
                    <div>
                                        <label class="pull-right" >
        										<a href="#" >هل نسيت كلمة المرور؟</a>
        									</label>

                                    </div>
                                    <button type="submit" name="login" class="btn btn-primary btn-flat m-b-30 m-t-30">تسجيل الدخول</button>
                                    <div class="register-link m-t-15 text-center">
                                        <p> ليس لديك حساب؟ <a href="page-register.php">انشئ حساب من هنا </a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

</body>

</html>