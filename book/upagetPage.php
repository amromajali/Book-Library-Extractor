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




<main role="main" class="container">


    <!--  -->
    <div class="container py-5">

        <div class="row py-4">
            <div class="col-lg-6 mx-auto">
                <!-- Uploaded image area-->
                <p class="font-italic text-white text-center">The image uploaded will be
                    rendered inside the box below.</p>
                <div class="image-area mt-4"><img id="imageResult" src="#" alt=""
                        class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                <!-- Upload image input-->
                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                    <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                    <div class="input-group-append">
                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4">
                            <i class="fa fa-upload mr-2 text-muted"></i><small
                                class="text-uppercase font-weight-bold text-muted">
                                Upload File</small></label>
                    </div>


                </div>
                <div class="input-group-append">
                    <button id="go-button" class="btn btn-light m-0 rounded-pill px-4">
                        <i class="fa fa-cloud-upload mr-2 text-muted"></i><small
                            class="text-uppercase font-weight-bold text-muted">
                            Go
                        </small>
                    </button>
                </div>



            </div>
        </div>
    </div>

    <!--  -->





</main>



<div class="d-none">


    <?php

    include '../assets/layouts/footer.php'

        ?>
    <script>

        /*  ==========================================
            SHOW UPLOADED IMAGE
        * ========================================== */
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imageResult')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $('#upload').on('change', function () {
                readURL(input);
            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME
        * ========================================== */
        var input = document.getElementById('upload');
        var infoArea = document.getElementById('upload-label');

        input.addEventListener('change', showFileName);
        function showFileName(event) {
            var input = event.srcElement;
            var fileName = input.files[0].name;
            infoArea.textContent = 'File name: ' + fileName;
        }
    </script>

    <script>
        $(function () {
    var pageFinalID = '<?php echo $page_id;?>';
    //alert(pageFinalID);
    // Handle click event on the "Go" button
    $('#go-button').on('click', function () {
        // Get the file input element
        var fileInput = $('#upload')[0].files[0];

        // Check if a file is selected
        if (fileInput) {
            // Create a FileReader object to read the file content
            var reader = new FileReader();

            // Define a function to execute after reading the file
            reader.onload = function (event) {
                // Encode the file content as base64
                var imageData = event.target.result;

                // Send an AJAX request to the server
                $.ajax({
                    url: 'http://localhost:3000/', // Modify this URL to your server endpoint
                    type: 'POST',
                    data: { image: imageData, pageId: pageFinalID }, // Send the base64-encoded image data and the pageId
                    success: function (response) {
                        // Handle the response from the server
                        console.log(response);
                        // Redirect to a new page or do something else

                        // Create a hidden form element dynamically
                        var form = $('<form action="operations/validate.php" method="post" style="display: none;"></form>');

                        // Create an input field to hold the JSON data
                        var jsonDataInput = $('<input type="hidden" name="jsonData">');
                        var pageIdInput = $('<input type="hidden" name="pageId">');

                        // Set the value of the input fields
                        jsonDataInput.val(JSON.stringify(response));
                        pageIdInput.val(response.pageId);

                        // Append the input fields to the form
                        form.append(jsonDataInput);
                        form.append(pageIdInput);

                        // Append the form to the document body
                        $('body').append(form);

                        // Submit the form
                        form.submit();
                    },
                    error: function (xhr, status, error) {
                        // Handle errors
                        console.error(xhr.responseText);
                    }
                });
            };

            // Read the file content as a data URL (base64)
            reader.readAsDataURL(fileInput);
        } else {
            // If no file is selected, show an error message
            alert('Please select a file.');
        }
    });
});

    </script>

</div>