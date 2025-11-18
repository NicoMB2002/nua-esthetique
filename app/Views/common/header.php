<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <title><?= $page_title ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= APP_ASSETS_DIR_URL ?>/css/style.css">
</head>



<body>



<header class="navBar">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="home" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img src="./public/assets/resources/images/NuaLogo.png" width="150" height="150" class="me-2" />
        </a>

        <ul class="nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Products</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Lashes</a></li>
            <li><a class="dropdown-item" href="#">Tweezers</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Promotions</a></li>
        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Services</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Book Appointment</a></li>
            <li><a class="dropdown-item" href="#">Training</a></li>
          </ul>
        </li>
      </ul>

    <div class="nav-icons">
        <input type="text" placeholder="Search for..." />

        <a href="login"><button type="button" id="accountBtn" class="btn btn-outline-dark me-2"><i class="bi bi-person-fill"></i> Account</button></a>
        <a href="#"><button type="button" id="cartBtn" class="btn btn-outline-dark me-2"><i class="bi bi-cart" style="color: black;"></i> Cart</button></a>

    </div>

      </div>
    </div>
</header>
