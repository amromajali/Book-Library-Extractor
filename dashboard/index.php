<?php

define('TITLE', "Home");
include '../assets/layouts/header.php';
check_verified();

?>


<main role="main" class="container">

    <div class="row">
        <div class="col-sm-3">

            <?php include ('../assets/layouts/profile-card.php'); ?>

        </div>
        <div class="col-sm-9">

            <div class="d-flex align-items-center p-3 mt-5 mb-3 text-white-50 bg-purple rounded box-shadow">
                <img class="mr-3" src="../assets/images/logonotextwhite.png" alt="" width="48" height="48">
                <div class="lh-100">
                    <h6 class="mb-0 text-white lh-100">My Dashboard</h6>
                    <small>My Books</small>


                </div>
            </div>

            <!-- create new book dialog -->

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                Create new book
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">New Book</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="operations/insert.php" method="POST">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Book Name</label>
                                    <input type="text" class="form-control" name="book_name">
                                </div>


                                <input style="display:none;" type="text" value="<?php echo $_SESSION['id'] ?>"
                                    name="ownerID">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="addBook" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- create new book dialog END -->
            <!-- books table -->
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>

                        <th scope="col">Book Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- get all tabels related to loggedin user -->

                    <?php
                    $owner_id = $_SESSION['id'];

                    $query = "SELECT * FROM books WHERE owner_id = '$owner_id'";
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $query)) {
                        die('ERROR IN CONNECTION');
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                                <tr>
                                
                                    <td>' . $row['book_name'] . '</td>
                                    <td>' . $row['book_status'] . '</td>
                                    <td>
                                        <a href="../book/index.php?id=' . $row['book_id'] . '" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Show </a>
                                        <a href="operations/publish.php?book_id=' . $row['book_id'] . '&status='.$row['book_status'].'" class="btn btn-success btn-xs"><i class="fa fa-rocket"></i> Publish / Unpublish </a>
                                        <a href="../assets/includes/delete_function.php?table=books&key=book_id&id=' . $row['book_id'] . '" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete </a>
                                    </td>
                                </tr>';
                        }
                    }
                    ?>
                    <!-- get all tabels related to loggedin user END -->

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
