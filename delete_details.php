<?php
session_start();
require('dbconn.php');

if(isset($_POST['id']) && !empty($_POST['id'])) {
    $bookId = $_POST['id'];
    
    // Start a transaction
    $conn->begin_transaction();
    
    try {
        // Delete related rows in the author table
        $sql = "DELETE FROM author WHERE BookId = '$bookId'";
        $conn->query($sql);
        
        // Delete the row in the book table
        $sql = "DELETE FROM book WHERE Bookid = '$bookId'";
        $conn->query($sql);
        
        // Commit the transaction
        $conn->commit();
        
        echo "<script type='text/javascript'>alert('Success')</script>";
        header("Refresh:0.01; url=book.php", true, 303);
        exit(); // Stop further execution of the script
    } catch (mysqli_sql_exception $e) {
        // Roll back the transaction if an error occurs
        $conn->rollback();
        echo "Error deleting book: " . $e->getMessage();
    }
} else {
    echo "Book ID not provided in the request.";
}
?>
