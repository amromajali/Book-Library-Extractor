<?php

define('TITLE', "Book");
include '../assets/layouts/header.php';
check_verified();


// get the page details based on the provided id by link
$book_id = $_GET['id'];

$sql = "SELECT * FROM books WHERE book_id = '$book_id'";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    die('SQL ERROR');
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $book = mysqli_fetch_assoc($result);
}
?>


<main role="main" class="container">

    <div class="row">
        
        <div class="col-sm-12">

            <div class="d-flex align-items-center p-3 mt-5 mb-3 text-white-50 bg-purple rounded box-shadow">
                <img class="mr-3" src="../assets/images/logonotextwhite.png" alt="" width="48" height="48">
                <div class="lh-100">
                    <h6 class="mb-0 text-white lh-100">Book Details</h6>
                    <small><?php echo $book['book_name']; ?></small>


                </div>
            </div>

            <!-- create new page dialog -->

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                Create new page
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">New Page</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="operations/insert.php" method="POST">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Page Number</label>
                                    <input type="text" class="form-control" name="page_number">
                                </div>


                                <input style="display:none;" type="text" value="<?php echo $book['book_id'] ?>"
                                    name="page_book_id">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="addPage" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- create new page dialog END -->
            <!-- pages table -->
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>

                        <th scope="col">Page Number</th>
                        
                        <th scope="col">Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <!-- get all pages related to current book -->

                    <?php
                    // $book_id = $_GET['id'];

                    $query = "SELECT * FROM pages WHERE page_book_id = '$book_id' ORDER BY page_number ASC";
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $query)) {
                        die('ERROR IN CONNECTION');
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                                <tr>
                                
                                    <td>' . $row['page_number'] . '</td>
                               
                                   
                                    <td>
                                        <a href="../book/page.php?id=' . $row['page_id'] . '" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Show </a>
                                        <a href="../book/upagetPage.php?id=' . $row['page_id'] . '" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add Content </a>
                                        <a href="../assets/includes/delete_function.php?table=pages&key=page_id&id=' . $row['page_id'] . '" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete </a>
                                    </td>
                                </tr>';
                        }
                    }
                    ?>
                    <!-- get all pages related to current book END -->

                </tbody>
            </table>

        </div>
    </div>
</main>



<div class="d-none">
<?php

include '../assets/layouts/footer.php'

    ?>

</div>