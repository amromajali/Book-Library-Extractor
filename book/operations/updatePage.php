<?php
require '../../assets/setup/db.inc.php';


if (isset($_POST['update'])) {
    $pageText = $_POST['pageText'];
    $page_id = $_POST['page_id'];


    $sql = "UPDATE pages SET page_text = '$pageText' WHERE page_id = $page_id";



    $upadtePage = mysqli_query($conn, $sql);

    if ($upadtePage) {
        header("Location: ../page.php?id=$page_id");
    
    } else {
        // Handle the error, you might want to display an error message or log the error
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: ../");
}