<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta :: start -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="IMAGES/kec_icon.png">
	<link rel="icon" type="image/x-icon" href="IMAGES/kec_icon.png">

    <!-- meta :: end -->

    <!-- stylesheetLink :: start -->
    <link rel="stylesheet" href="CSS/addStudentPage.css" type="text/css">
    <!-- stylesheetLink :: end -->

    <!-- bootstrapCDNLink :: start -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- bootstrapCDNLink :: end -->

    <!-- fontawesomeCDNLink :: start -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- fontawesomeCDNLink :: end -->

    <!-- googleFontsCDNLink :: start -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
    <!-- googleFontsCDNLink :: start -->

    <!-- title :: start -->
    <title>Profile</title>
    <!-- title :: end -->

</head>

<body>
    <!-- navBar :: start -->
    <nav role="navigation" class="navbar navbar-dark bg-dark navbar-fixed-top">
        <div class="container-fluid">
            <!-- navbar-header :: start -->
            <div class="navbar-header">
                <!-- navbar-brand :: start -->
                <div class="navbar-brand">
                    <!-- logo-container :: start -->
                    <div class="logo-container">
                        <img src="IMAGES/kecLogo.jpg" alt="KEC" />
                    </div>
                    <!-- logo-container :: end -->
                </div>
                <!-- navbar-brand :: start -->

                <!-- toggle-container :: start -->
                <div class="toggle-container">
                    <!-- toggle-button :: start -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar bg-success"></span>
                        <span class="icon-bar bg-success"></span>
                        <span class="icon-bar bg-success"></span>
                    </button>
                    <!-- toggle-button :: end -->
                </div>
                <!-- toggle-container :: end -->
            </div>
            <!-- navbar-header :: end -->

            <!-- navbar-menus-container :: start -->
            <div class="navbar-menus-container">
                <!-- navbar-collapse :: start -->
                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <!-- navbar-menus :: start -->
                    <ul class="nav navItems navbar-nav navbar-left menu-items">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="eventPage.php">Events</a></li>
                        <?php
				if($_SESSION['designation'] != 1) {
                                    echo '<li><a href="circularPage.php">Add Circulars</a></li>
                        		  <li><a href="addEventPage.php">Add Events</a></li>';
                                }

				if($_SESSION['designation'] == 1) {
                                    echo '<li><a href="sappointPage.php">SAP Points</a></li>';
                                }
			?>
			<li><a href="aboutusPage.php">About us</a></li>
                    </ul>
                    <!-- navbar-menus :: end -->

                    <!-- profile-container :: start -->
                    <div class="profile-container">
                        <div class="dropdown">
                            <button onclick="profileFunction()" class="dropbtn"><i class="fa-regular fa-user"></i>  <?= ucwords($_SESSION['staffName']) ?> <i class="fa-solid fa-angle-down down-angle"></i></button>
                            <div id="myDropdown" class="dropdown-content">
                                <div class="profile">
                                    <div class="image-container">
                                        <img src="IMAGES/avatar.png" alt="Profile"/>
                                    </div>
                                    <a id="profile-name" href="profilePage.php"><?= $_SESSION['staffEmail'] ?></a>
                                </div>
                                <a href="profilePage.php"><i class="fa-solid fa-user-pen"></i> User Info</a>
				<a href="getReportPage.php"><i class="fa-solid fa-book"></i> Student Report</a>
				<a href="addStudentPage.php"><i class="fa-solid fa-user-plus"></i> Add Student</a>
                                <?php     
                                    if($_SESSION['designation'] == 4 || $_SESSION['designation'] == 5) {
                                          echo '<a href="addStaffPage.php"><i class="fa-solid fa-user-plus"></i> Add Staff</a>';
                                    }
                                ?>
                                <a href="PHP/LOGOUT/logout.php"><i class="fa-solid fa-power-off"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- profile-container :: end -->
            </div>
                </div>
                <!-- navbar-collapse :: end -->
            </div>
            <!-- navbar-menus-container :: end -->


        </div>
    </nav>
    <!-- navBar :: end -->

    <!--main :: start-->
    <main>
        <!-- button-container :: start -->
        <div class="button-container">
            <form method="post" action="PHP/PROFILE/addStudent.php">
                <button class="btn add-button" name="add">ADD STUDENT</button>
            </form>
        </div>
        <!-- button-container :: end -->
        
        <!-- google-sheet-container :: start -->
        <div class="google-sheet-container">
            <iframe class="google-sheet" src="https://docs.google.com/spreadsheets/d/15cIepMw9Vo9SGd8T3746FAQJPJ6dS6ecoDSRlvFXYfo/edit?usp=sharing" title="Add Student"></iframe>
        </div>
        <!-- google-sheet-container :: end -->
        
    </main>
    <!--main :: end-->

    <!-- javascriptLink :: start -->
    <script src="JAVASCRIPT/profilePage.js"></script>
    <!-- javascriptLink :: end -->

</body>

</html>