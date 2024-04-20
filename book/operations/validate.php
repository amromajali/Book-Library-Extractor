<?php
require '../../assets/setup/db.inc.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $jsonData = json_decode($_POST['jsonData'], true);
    $textContent = $jsonData['textContent'];
    $pageId = $jsonData['pageId'];
    // echo $textContent;
    // echo $pageId;

    $sql = "UPDATE pages SET page_text = '$textContent' WHERE page_id = $pageId";



    $upadtePage = mysqli_query($conn, $sql);

    if ($upadtePage) {
        header("Location: ../page.php?id=$pageId");
    
    } else {
        // Handle the error, you might want to display an error message or log the error
        echo "Error: " . mysqli_error($conn);
    }
}
?>
