<!--
=========================================================
* Argon Dashboard 3 - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php
include "../../classes/koneksi.php";
session_start();

// Periksa apakah pengguna sudah login dan memiliki role guru
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'premium') {
    echo "<script>
            alert('Akses ditolak! Hanya akun premium yang bisa mengakses halaman ini. Silahkan langganan dulu.');
            window.location.href = '../../index.php';
          </script>";
    exit;
}

?>

<?php 
$user_id = $_SESSION['id'];
$role = $_SESSION['role'];
// Query untuk mengambil data pengguna berdasarkan id_user
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$user_id'");
$data = mysqli_fetch_assoc($query);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Dashboard | IntellectAI
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.1.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
  <div class="min-height-300 bg-gradient-dark position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="dashboard.php" target="_blank">
        <img src="../../assets/img/logo-ct-dark.png" width="26px" height="26px" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">IntellectAI [Beta]</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link active " href="course.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Courses</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="ebook.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-book-bookmark text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">E-Book</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../../classes/logout.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-fat-remove text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-settings text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">User Settings</span>
          </a>
        </li>
        
      </ul>

      
</div>
    <div class="sidenav-footer mx-3 my-6 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <div class="card-body text-center p-3 w-100 pt-0">
          <div class="docs-info">
            <p class="mb-0">Status Anda adalah : </p>
            <?php echo "<h6>{$data['role']}  - beta</h6>" ?>
          </div>
        </div>
      </div>
    </div>

  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Courses</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Courses</h6>
          
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          </div>
          <ul class="navbar-nav justify-content-end">
            <!-- User Icon -->
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"> 
                <?php echo "<p>Hallo, {$data['nama']} ! </p>" ?>
                </span>
              </a>
            </li>
          
            <!-- Sidenav Toggler -->
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
          
            <!-- Settings Icon -->
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
          
          
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card card-profile card-plain">
            <div class="card-body text-center bg-gradient-dark shadow border-radius-lg p-3">
              <a href="javascript:;">
                <img class="w-100 border-radius-md" src="../../assets/img/course/course1.png">
              </a>
              <h5 class="mt-3 mb-2 text-light d-md-block d-none">Introduction To AI</h5>
              
              <p class="mb-0 text-xs font-weight-bolder text-bg-info text-gradient text-uppercase">Perkenalan Ke dunia AI</p>
            </div>
          </div>
        </div>
      
        <div class="col-md-4 mb-4">
          <div class="card card-profile card-plain">
            <div class="card-body text-center bg-gradient-dark shadow border-radius-lg p-3">
              <a href="javascript:;">
                <img class="w-100 border-radius-md" src="../../assets/img/course/course2.png">
              </a>
              <h5 class="mt-3 mb-2 text-light d-md-block d-none">Ethical Use For AI</h5>
              
              <p class="mb-0 text-xs font-weight-bolder text-bg-info text-gradient text-uppercase">Sebuah tata cara etik pemakaian AI </p>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card card-profile card-plain">
            <div class="card-body text-center bg-gradient-dark shadow border-radius-lg p-3">
              <a href="../../classes/unavailabe.php">
                <img class="w-100 border-radius-md" src="../../assets/img/course/course3.png">
              </a>
              <h5 class="mt-3 mb-2 text-light d-md-block d-none">AI For Students</h5>
              
              <p class="mb-0 text-xs font-weight-bolder text-bg-info text-gradient text-uppercase">AI untuk membantu para pelajar</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card card-profile card-plain">
            <div class="card-body text-center bg-gradient-dark shadow border-radius-lg p-3">
              <a href="../../classes/unavailabe.php">
                <img class="w-100 border-radius-md" src="../../assets/img/course/course4.png">
              </a>
              <h5 class="mt-3 mb-2 text-light d-md-block d-none">AI For Bussiness</h5>
              
              <p class="mb-0 text-xs font-weight-bolder text-bg-info text-gradient text-uppercase">AI untuk meningkatkan bisnis</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card card-profile card-plain">
            <div class="card-body text-center bg-gradient-dark shadow border-radius-lg p-3">
              <a href="../../classes/unavailabe.php">
                <img class="w-100 border-radius-md" src="../../assets/img/course/course5.png">
              </a>
              <h5 class="mt-3 mb-2 text-light d-md-block d-none">AI For Creator</h5>
              
              <p class="mb-0 text-xs font-weight-bolder text-bg-info text-gradient text-uppercase">AI untuk para creative creator</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card card-profile card-plain">
            <div class="card-body text-center bg-gradient-dark shadow border-radius-lg p-3">
              <a href="../../classes/unavailabe.php">
                <img class="w-100 border-radius-md" src="../../assets/img/course/course6.png">
              </a>
              <h5 class="mt-3 mb-2 text-light d-md-block d-none">AI for Proggramer</h5>
             
              <p class="mb-0 text-xs font-weight-bolder text-bg-info text-gradient text-uppercase">AI untuk Proggramer</p>
            </div>
          </div>
        </div>
        

        <div class="col-md-4 mb-4">
          <div class="card card-profile card-plain">
            <div class="card-body text-center bg-gradient-dark shadow border-radius-lg p-3">
              <a href="../../classes/unavailabe.php">
                <img class="w-100 border-radius-md" src="../../assets/img/course/coursecome.png">
              </a>
              <h5 class="mt-3 mb-2 text-light d-md-block d-none">COMING SOON</h5>
             
              <p class="mb-0 text-xs font-weight-bolder text-bg-info text-gradient text-uppercase">More Content Coming Soon</p>
            </div>
          </div>
        </div>
        
        </div>
      </div>

      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <!-- <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div> -->
            </div>
            <div class="col-lg-6">
              <!-- <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul> -->
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>

</html>