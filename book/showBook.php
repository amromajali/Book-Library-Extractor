<?php

define('TITLE', "Book");
include '../assets/layouts/header.php';
check_verified();


// get the page details based on the provided id by link
$book_id = $_GET['id'];

?>


<main role="main" class="container">

    <?php


    $query = "SELECT * FROM pages WHERE page_book_id = '$book_id' ORDER BY page_number ASC";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        die('ERROR IN CONNECTION');
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '
                                
                                
               ' . $row['page_text'] . '
                               
            <br>';
        }
    }
    ?>
</main>



<div class="d-none">
    <?php include '../assets/layouts/footer.php' ?>
</div>