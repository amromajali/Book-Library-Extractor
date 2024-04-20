<?php
require '../setup/db.inc.php';



    $table = $_GET['table'];
    $key = $_GET['key'];
    $id = $_GET['id'];
    

    $sql = "DELETE FROM $table WHERE $key = $id ";



    $addBook = mysqli_query($conn, $sql);

    if ($addBook) {
        header("Location: ../../dashboard");
    
    } else {
        // Handle the error, you might want to display an error message or log the error
        echo "Error: " . mysqli_error($conn);
    }
