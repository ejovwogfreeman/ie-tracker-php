<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossOrigin="anonymous">
    <!-- Bootstrap Icon CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>

<style>
  body {
    background-color: #d3d3d3;
  }
  nav {
    background: rgba(0, 0, 0, 0.5);
    z-index: 0;
  }
  @media screen and (max-width: 500px) {
    body {
      overflow-x: hidden;
    }
  }
</style>

<!-- <?php session_start(); ?> -->

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark py-3 fixed-top">
    <div class="container">
      <!-- navbar brand / title -->
      <a class="navbar-brand" href="index.php">
        <span class="text-light fw-bold">
          <h3 class="m-0">
            <i class="bi bi-coin"></i>
            IE-Tracker
          </h3>
        </span>
      </a>
      <!-- toggle button for mobile nav -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- navbar links -->
      <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light ms-lg-3 ms-0" href="index.php#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light ms-lg-3 ms-0" href="index.php#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light ms-lg-3 ms-0" href="index.php#web_technologies">Web Technologies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light ms-lg-3 ms-0" href="index.php#team">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light ms-lg-3 ms-0" href="index.php#faq">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light ms-lg-3 ms-0" href="index.php#contact">Contact</a>
          </li>
          <li class="nav-item d-lg-none d-flex">

          <?php if(isset($_SESSION['user_id'])==false): ?>
            <a class="nav-link btn btn-primary px-3" href="signin.php">Sign In</a>
            <a class="nav-link btn btn-primary px-3 ms-2" href="signup.php">Sign Up</a>
          <?php else: ?>
            <a class="nav-link btn btn-primary px-3" href="dashboard.php">Dashboard</a>
            <a class="nav-link btn btn-primary px-3 ms-2" href="logout.php">Logout</a>
          <?php endif; ?>


          <?php if(isset($_SESSION['user_id'])==false): ?>
          <li class="nav-item ms-2 d-none d-lg-inline" id="toggleshow">
            <a class="btn btn-primary" href="signin.php">Sign In</a>
          </li>
          <li class="nav-item ms-2 d-none d-lg-inline" id="toggleshow">
            <a class="btn btn-primary" href="signup.php">Sign Up</a>
          </li>
          <?php else: ?>
            <li class="nav-item ms-2 d-none d-lg-inline" id="toggleshow">
            <a class="btn btn-primary" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item ms-2 d-none d-lg-inline" id="toggleshow">
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

<!-- <div class="container"> -->



    
