<?php
require '../../assets/setup/db.inc.php';


if (isset($_POST['addPage'])) {
    $page_book_id = $_POST['page_book_id'];
    $page_number = $_POST['page_number'];


    $sql = "INSERT INTO pages (page_book_id, page_number)
        VALUES ('$page_book_id', '$page_number')";



    $addBook = mysqli_query($conn, $sql);

    if ($addBook) {
        header("Location: ../index.php?id=$page_book_id");
    
    } else {
        // Handle the error, you might want to display an error message or log the error
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: ../");
}