<?php
include_once "classReservation.php";
include_once "classRoom.php";
include_once "classDatabase.php";

session_start();
if (!isset($_SESSION['email'])) {
    header('location: page-login.php');
}
if (isset($_GET['Logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: page-login.php");
}
$connection = new DB();
$conn = $connection->connect();
    $conn->query("SET NAMES 'utf8'");
$email = $_SESSION['email']; 
$sql4 = "SELECT * FROM user WHERE Email='$email' AND IsDeleted=0 ";    
            $resultQuery4 = $conn->query($sql4);
            while($row4= $resultQuery4->fetch_assoc())
            {
                if($row4==true)
                {
                    $IDTEST=$row4["ID"];
                }
            }
            $sql5 = "SELECT * FROM student WHERE Student_ID='$IDTEST' ";    
             
            $resultQuery5 = $conn->query($sql5);
            while($row5= $resultQuery5->fetch_assoc())
            {
                if($row5==true)
                {
                    $State_ID=$row5["State_ID"];
                    if($State_ID==2)
                    {
                        header("location:AllPages.php");
                        
                    }
                    
                } 
               


            }
            $sqlt = "SELECT * FROM user WHERE Email='$email' AND IsDeleted=0";
            $resultt = $conn->query($sqlt);
            if ($resultt->num_rows > 0) {
                while($rowt = $resultt->fetch_assoc()) {
                    $id=$rowt['ID'];
                    $sqltwo = "SELECT * FROM student WHERE Student_ID=$id";
                            $resulttwo = $conn->query($sqltwo);
                            if ($resulttwo->num_rows > 0) {
                                while($rowtwo = $resulttwo->fetch_assoc()) {
                                    $stdid=$rowtwo['ID'];
                                    $sqltw = "SELECT * FROM reservation WHERE Student_ID='$stdid' AND IsDeleted=0";
                                    $resulttw = $conn->query($sqltw);
                                    if ($resulttw->num_rows > 0) {
                                        while($rowtw = $resulttw->fetch_assoc()) {
                                            $Room_ID=$rowtw['Room_ID'];
                                            
                                        }
                                    }
                                }
                            }
                        }
                    }           

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

    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
    li button {
    display: block;
    color: black;
    padding: 8px 16px;
    text-decoration: none;
    background-color: #f1f1f1;
    border: none;
    padding: 12px 28px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

li button:hover{
    background-color: white;
    color: black;
    text-decoration: none;
}

li button.active {
    background-color: white;
    color: black;
}
    </style>
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b><img src="UniLogoSmall.png" alt="homepage" class="dark-logo" /></b>
                        
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <!--<span><img src="images/logo-text.png" alt="homepage" class="dark-logo" /></span>-->
                    </a>
                </div>
                <!-- End Logo -->
                        <!-- Profile -->
                        <li class="nav-item dropdown" style="margin-left: 70%">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="facebook-avatar.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                            <form  method="get" >
                                <ul class="dropdown-user">
                                    <!--<li><a href="#"><i class="ti-user"></i> تعديل بياناتك</a></li>-->
                                    <li><button class="active" name="Logout"><i class="fa fa-power-off"></i> تسجيل الخروج</button></li>
                                </ul>
                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label" style="font-size:150%; text-align:center; color: rgba(45, 65, 21);">مسئولياتك</li>
                        
                                <?php
                                            
                                            $connection = new DB();
                                            $conn = $connection->connect();
                                    $conn->query("SET NAMES 'utf8'");

                                    $email = $_SESSION['email']; 
                                    $sql = "SELECT * FROM user WHERE Email='$email' AND IsDeleted=0";
                                    $result = $conn->query($sql);
                                        while($row = $result->fetch_assoc()){
                                            if($row==true)
                                            {
                                                $Name=$row["FirstName"];
                                                $FName=$row["FamilyName"];
                                                $usertype_ID=$row['usertype_ID'];
                                                $sqltwo = "SELECT * FROM usertypelinks WHERE userType_ID='$usertype_ID' AND IsDeleted=0";
                                                $resulttwo = $conn->query($sqltwo);
                                                    while($rowtwo = $resulttwo->fetch_assoc()){
                                                        if($rowtwo==true)
                                                        {
                                                            $links_ID=$rowtwo['links_ID'];
                                                            $sqlt = "SELECT * FROM links WHERE ID='$links_ID' AND IsDeleted=0";
                                                            $resultt = $conn->query($sqlt);
                                                                while($rowt = $resultt->fetch_assoc()){
                                                                    if($rowt==true)
                                                                    {
                                                                        $PhysicalAddress=$rowt['PhysicalAddress'];
                                                                        $FriendlyAddress=$rowt['FriendlyAddress'];
                                                                        echo '<li><a style="font-size:120%; text-align:center" href='.$PhysicalAddress.'>'.$FriendlyAddress.' </a></li>';
                                                                    }
                                                                }
                                                            
                                                        }
                                                    }
                                                
                                            }
                                        }
                                    
                                    $conn->close();
                                ?>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <br>
                                <h2 style='text-align:center; color: rgba(45, 65, 21)'> زميلاتك في الغرف</h2>
                                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">تنزيل البيانات</h4>
                                <h6 class="card-subtitle">Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <th>تاريخ نهاية الحجز</th>
                                                <th>تاريخ بدأ الحجز</th>
                                            <th>السعة</th>
                                                <th>الدور</th>
                                                <th>المبني</th>
                                                <th>رقم الغرفة</th>
                                                <th>بريد الطالب الالكتروني</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $connection = new DB();
                                                $conn = $connection->connect();
                                                $conn->query("SET NAMES 'utf8'");
                                                        $sqltw = "SELECT * FROM reservation WHERE Room_ID='$Room_ID' AND IsDeleted=0";
                                                        $resulttw = $conn->query($sqltw);
                                                        if ($resulttw->num_rows > 0) {
                                                            while($rowtw = $resulttw->fetch_assoc()) {
                                                                $Reservation_ID=$rowtw['ID'];
                                                                $Student_ID=$rowtw['Student_ID'];
                                                                $sqlt = "SELECT * FROM reservationdetails WHERE Reservation_ID=$Reservation_ID";
                                                                $resultt = $conn->query($sqlt);
                                                                if ($resultt->num_rows > 0) {
                                                                    while($rowt = $resultt->fetch_assoc()) {
                                                                        //$Room_ID=$rowt['Room_ID'];
                                                                        $Reservation_ID=$rowt['Reservation_ID'];
                                                                        $DateFrom=$rowt['YearFrom'];
                                                                                $DateTo=$rowt['YearTo'];
                                                                                echo "<tr>";
                                                                        echo "<td style='color:#514F4E;'>" . $DateTo . "</td>";
                                                                        echo "<td style='color:#514F4E;'>" . $DateFrom . "</td>";
                                                                    
                                                    
                                                                $sql = "SELECT * FROM room WHERE ID=$Room_ID AND IsDeleted=0";
                                                                $result = $conn->query($sql);
                                                                if ($result->num_rows > 0) {
                                                                    while($row = $result->fetch_assoc()) {
                                                                        $Capacity=$row['Capacity'];
                                                                        $FloorNo=$row['FloorNo'];
                                                                        $BuildingNo=$row['BuildingNo'];
                                                                        $RoomNo=$row['RoomNo'];
                                                                        
                                                                        echo "<td style='color:#514F4E;'>" . $Capacity . "</td>";
                                                                        echo "<td style='color:#514F4E;'>" . $FloorNo . "</td>";
                                                                        echo "<td style='color:#514F4E;'>" . $BuildingNo . "</td>";
                                                                        echo "<td style='color:#514F4E;'>" . $RoomNo . "</td>";
                                                                    }
                                                                }
                                                                $sqltwo = "SELECT * FROM student WHERE ID=$Student_ID";
                                                                $resulttwo = $conn->query($sqltwo);
                                                                if ($resulttwo->num_rows > 0) {
                                                                    while($rowtwo = $resulttwo->fetch_assoc()) {
                                                                        $userid=$rowtwo['Student_ID'];
                                                                        $sqlto = "SELECT * FROM user WHERE ID=$userid AND IsDeleted=0";
                                                                        $resultto = $conn->query($sqlto);
                                                                        if ($resultto->num_rows > 0) {
                                                                            while($rowto = $resultto->fetch_assoc()) {
                                                                                $Email=$rowto['Email'];
                                                                                echo "<td style='color:#514F4E;'>" . $Email . "</td>";
                                                                                echo "</tr>";
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                    
                                                            }
                                                        }
                                                            
                                                        }
                                                    }

                                               
                                                $conn->close();

                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>


                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © <?php echo date("Y"); ?> All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
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


    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>