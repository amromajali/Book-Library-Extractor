<?php

define('TITLE', "Page");
include '../assets/layouts/header.php';
check_verified();


// get the page details based on the provided id by link
$page_id = $_GET['id'];

$sql = "SELECT * FROM pages WHERE page_id = '$page_id'";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    die('SQL ERROR');
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $page = mysqli_fetch_assoc($result);
}
?>
<script src="https://cdn.tiny.cloud/1/4ooihyuvpv7xuyl6isdy14f25os1ulnvc7r6azqb2tpstsqx/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>



<main role="main" class="container">

    <div class="row">

        <div class="col-sm-12">

            <div class="d-flex align-items-center p-3 mt-5 mb-3 text-white-50 bg-purple rounded box-shadow">
                <img class="mr-3" src="../assets/images/logonotextwhite.png" alt="" width="48" height="48">
                <div class="lh-100">
                    <h6 class="mb-0 text-white lh-100">Page Details</h6>
                    <small><?php echo $page['page_number']; ?></small>
                </div>

            </div>

            <form action="operations/updatePage.php" method="POST">
        </div>
        <textarea name="pageText" id="editor"><?php echo htmlspecialchars($page['page_text']); ?></textarea>
        <div class="modal-footer">
            <input name="page_id" type="text" value="<?php echo $page['page_id']?>" class="d-none" >
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </div>
        </form>
    </div>




</main>



<div class="d-none">
    <script>
        tinymce.init({
            selector: '#editor',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            height: 500,
            width: 4900,
            menubar: false
        });
    </script>
    <?php

    include '../assets/layouts/footer.php'

        ?>

</div>