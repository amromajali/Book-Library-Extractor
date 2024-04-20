<?php
require '../../assets/setup/db.inc.php';



    $book_id = $_GET['book_id'];
    $status = $_GET['status'];

    if($status == 'Published'){
        $status = 'Draft';
    }else{
        $status ='Published';
    }
  
    

    $sql = "UPDATE books SET book_status = '$status' WHERE book_id = '$book_id'";



    $addBook = mysqli_query($conn, $sql);

    if ($addBook) {
        header("Location: ../index.php");
    
    } else {
        // Handle the error, you might want to display an error message or log the error
        echo "Error: " . mysqli_error($conn);
    }
