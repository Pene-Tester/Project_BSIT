﻿<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']) {
    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="x-icon" href="images/icon.png">
        <title>MALUPITON LIBRARY</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="css/header.css" rel="stylesheet">
        <link type="text/css" href="css/footer.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
 <header>
    <div class="content flex_space">
      <div class="logo">
         <a href="index.php"><img src="images/logo.png"></a>
      </div>
  </header>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                            <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>HOME</a></li>
                                <li><a href="book.php"><i class="menu-icon icon-book"></i>ALL BOOKS </a></li>
                                <li><a href="addbook.php"><i class="menu-icon icon-edit"></i>ADD BOOKS </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>LOGOUT</a></li>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    
                    <div class="span9">
                        <center>
                            <div class="card" style="width: 50%;"> 
                                <img class="card-img-top" src="images/profile2.png" alt="Card image cap">
                                <div class="card-body">

                                <?php
                                $rollno = $_SESSION['RollNo'];
                                $sql="select * from db_library.user where RollNo='$rollno'";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();

                                $name=$row['Name'];
                                $email=$row['EmailId'];
                                $mobno=$row['MobNo'];
                                ?>    
                                    <i>
                                    <h1 class="card-title"><center><?php echo $name ?></center></h1>
                                    <br>
                                    <p><b>EMAIL ID: </b><?php echo $email ?></p>
                                    <br>
                                    <p><b>MOBILE NUMBER: </b><?php echo $mobno ?></p>
                                    </b>
                                </i>

                                </div>
                            </div>
                        <br>
                        <a href="edit_admin_details.php" class="btn btn-primary">Edit Details</a>
                        </center>               
                    </div>
                    
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        
  <div class="legal">
    <p>Copyright (c) 2024 Copyright Holder All Rights Reserved.</p>
  </div>
        </div>
        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>

    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>