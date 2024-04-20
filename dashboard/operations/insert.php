<?php
require '../../assets/setup/db.inc.php';


if (isset($_POST['addBook'])) {
    $ownerID = $_POST['ownerID'];
    $book_name = $_POST['book_name'];


    $sql = "INSERT INTO books (owner_id, book_name, book_status)
        VALUES ('$ownerID', '$book_name', 'Draft')";



    $addBook = mysqli_query($conn, $sql);

    if ($addBook) {
        header("Location: ../");
    
    } else {
        // Handle the error, you might want to display an error message or log the error
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: ../");
}