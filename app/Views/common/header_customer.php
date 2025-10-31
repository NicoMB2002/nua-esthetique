<?php

use App\Helpers\SessionManager;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title><?= $page_title ?></title>
    <!-- TODO: include your CSS files here -->
</head>



<body>


    <header class="p-3 bg-light text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="home" class="nav-link px-2 text-secondary">Home</a></li>
                    <li><a href="#" class="nav-link px-2 text-black">Pricing</a></li>
                    <li><a href="#" class="nav-link px-2 text-black">FAQs</a></li>
                    <li><a href="#" class="nav-link px-2 text-black">About</a></li>
                </ul>


                <a href="home" class="d-flex align-items-center mb-2 mb-lg-0 text-black text-decoration-none">
                 <span class="fs-4"><?= SessionManager::get('username')?></span>
                </a>
                <button type="button" id="myInput" class="btn btn-outline-dark me-2">Log out</button>

            </div>
        </div>
    </header>

    <div id="myModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Log Out</h5>
                    <button type="button" id="closeBtn" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are You sure you want to Log out.</p>
                </div>
                <div class="modal-footer">

                    <a href="logout"><button type="button" class="btn btn-outline-danger me-2">Log out</button></a>
                </div>
            </div>
        </div>
    </div>

    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')
        var closeBtn = document.getElementById('closeBtn')

        myInput.addEventListener('click', () => {
            myModal.style.display = 'flex';
        })

        closeBtn.addEventListener('click', () => {
            myModal.style.display = 'none';
        })
    </script>
