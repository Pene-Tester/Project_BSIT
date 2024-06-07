<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']) {
    
if (isset($_GET['delete_success'])) {
    if($_GET['delete_success'] == 1) {
        echo "<script>alert('Book deleted successfully');</script>";
    } else {
        echo "<script>alert('Failed to delete book');</script>";
    }
    if(isset($_GET['delete_success']) && $_GET['delete_success'] == 1) {
        echo "<script>alert('Delete successful');</script>";
        session_destroy();
    }
}
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
         <a href="index.php"><img src="images/logo.png" alt=""></a>
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
                                <li><a href="book.php"><i class="menu-icon icon-book"></i>ALL BOOKS</a></li>
                                <li><a href="addbook.php"><i class="menu-icon icon-edit"></i>ADD BOOKS</a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>LOGOUT</a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>

                    <div class="span9">
                  <form class="form-horizontal row-fluid" action="book.php" method="post">
                                        <div class="control-group">
                                           
                                            <div class="controls">
                                                <input type="text" id="title" name="title" placeholder="Enter Name/ID of Book" class="span8" required>
                                                <button type="submit" name="submit"class="btn">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    <?php
                                    if(isset($_POST['submit']))
                                        {$s=$_POST['title'];
                                            $sql="select * from db_library.book where BookId='$s' or Title like '%$s%'";
                                        }
                                    else
                                        $sql="select * from db_library.book";

                                    $result=$conn->query($sql);
                                    $rowcount=mysqli_num_rows($result);

                                    if(!($rowcount))
                                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                                    else
                                    {

                                    
                                    ?>
                        <table class="table" id = "tables">
                                  <thead>
                                    <tr>
                                      <th>Book id</th>
                                      <th>Book name</th>
                                      <th>Availability</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                            
                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $bookid=$row['BookId'];
                                $name=$row['Title'];
                                $avail=$row['Availability'];
                            
                           
                            ?>
                                    <tr>
                                      <td><?php echo $bookid ?></td>
                                      <td><?php echo $name ?></td>
                                      <td><b><?php echo $avail ?></b></td>
                                        <td><center>
                                            <form action="delete_details.php" method="post" class="delete-form">
                                                <input type="hidden" name="id" value="<?php echo $bookid; ?>">
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </form>

                                            <a href="bookdetails.php?id=<?php echo $bookid; ?>" class="btn btn-primary">Details</a>
                                            <a href="edit_book_details.php?id=<?php echo $bookid; ?>" class="btn btn-success">Edit</a>
                                            
                                        </center></td>
                                    </tr>
                               <?php }} ?>
                               </tbody>
                                </table>
                            </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>

        <div class="legal">
    <p>Copyright (c) 2024 Copyright Holder All Rights Reserved.</p>
  </div>
        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      

        <script>
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var bookId = $(this).data('bookid');
            $.ajax({
                url: 'delete_details.php',
                type: 'POST',
                data: { id: bookId },
                success: function(response) {
                    // Reload the page or update UI as needed
                    window.location.reload(); // Reload the page after deletion
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while deleting the book.');
                    console.error(error);
                }
            });
        });
    });
</script>

    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
    
} ?>