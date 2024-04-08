<?php

define('TITLE', "Welcome");
include '../assets/layouts/header.php';

?>



<main role="main">

    <section class="jumbotron text-center py-5">
        <div class="container">
            <h1 class="jumbotron-heading mb-4">Books System</h1>
            <p class="text-muted">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci eos soluta eius molestias, maiores accusantium pariatur recusandae quam harum atque corrupti inventore. Minus natus in ipsum praesentium repellat blanditiis quas?
                
                <hr width="300" class="my-3">

                <sub>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est, magnam enim fugiat distinctio natus architecto minima vel, iusto obcaecati reprehenderit maxime minus labore iste qui dolor non! Accusamus, fuga recusandae!
                </sub>

                <hr width="300" class="my-3">

                <sub>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum soluta non adipisci impedit in totam doloremque aut, pariatur iure explicabo sunt dicta. Rerum vero maxime fuga commodi id quasi omnis!
                </sub>
            </p>
            <p>
                <a href="#" class="btn btn-primary my-2" target="_blank">See Creator</a>
                <a href="#" class="btn btn-secondary my-2" target="_blank">See Repository</a>
            </p>
        </div>
    </section>

    <div class="album py-5">
        <div class="container">

            <div class="text-center text-muted mb-5">
                <h2>Check Out Published Books</h2>
                <hr width="300">
            </div>
        
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src='../assets/images/repo_gitklik.png' alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Title</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-outline-secondary" target="_blank">View</a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary" target="_blank">Download</a>
                                </div>
                                <small class="text-muted">[Title]</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src='../assets/images/repo_klik.png' alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Title</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-outline-secondary" target="_blank">View</a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary" target="_blank">Download</a>
                                </div>
                                <small class="text-muted">[Title]</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src='../assets/images/repo_loginsystem.png' alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Title</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-outline-secondary" target="_blank">View</a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary" target="_blank">Download</a>
                                </div>
                                <small class="text-muted">[Title]</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</main>


<?php

include '../assets/layouts/footer.php'

?>