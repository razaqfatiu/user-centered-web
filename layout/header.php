<?php
include './config/database.php';
// header("Content-Type: application/javascript");
// header("Cache-Control: max-age=604800, public");

session_start();

if (isset($_SESSION['user_id'])) {
  $is_athenticated = true;
  $is_admin = $_SESSION['is_admin'];
} else {
  $is_athenticated = false;
}

$sql_category = "SELECT * FROM category;";
$categories = mysqli_query($conn, $sql_category);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="public/index.css">
  <script>
    <?php require_once('header.js'); ?>
  </script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark px-0 py-3 my-nav">
      <div class="container-xl">
        <a class="navbar-brand" href="/e-commerce/index.php">
          OPUS-CO
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">

          <ul class="navbar-nav mx-lg-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">tuber</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/e-commerce/contact-us.php">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="badge text-bg-success">4</span>
              </a>
            </li>
          </ul>

          <div class="navbar-nav ms-lg-4">
            <form class="d-flex mt-0 me-5" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success text-white" type="submit">Search</button>
            </form>
          </div>

          <?php if (!$is_athenticated) : ?>
            <div class="navbar-nav ms-lg-4">
              <a class="nav-item nav-link" href="/e-commerce/login.php">Sign in</a>
            </div>
            <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
              <a href="/e-commerce/signup.php" class="btn btn-sm btn-success w-full w-lg-auto">
                Register
              </a>
            </div>
            <?php else : ?>
            <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
              <a href="/e-commerce/signout.php" class="btn btn-sm btn-success w-full w-lg-auto">
                Logout
              </a>
            </div>
            <?php endif; ?>

          <?php if(!empty($is_admin) && $is_admin): ?>
            <div class="d-flex align-items-lg-center ms-3 mt-3 mt-lg-0">
              <a href="/e-commerce/new.php" class="nav-item nav-link">
                Upload
              </a>
            </div>
          <?php endif; ?>

        </div>
      </div>
    </nav>



  </header>