<!doctype html>
<html lang="en">
  <?php include 'layouts/header.php'; ?>
  <body>
    <div id="wrapper">
      <?php include 'layouts/side_nav.php';?>
      <div class="content-page">
        <div class="top-bar">
          <nav class="navbar-custom">
            <?php include 'layouts/head_nav.php';?>

            <ul class="list-inline menu-left mb-0">
              <li class="float-left">
                  <button class="button-menu-mobile open-left disable-btn">
                      <i class="dripicons-menu"></i>
                  </button>
              </li>
              <li>
                <div class="page-title-box">
                  <h4 class="page-title"> Dashboard </h4>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Navigation</a></li>
                    <?php
                      if ($this->session->userdata('user_type') == 1) {
                        echo "<li class='breadcrumb-item active'> Admin Dashboard</li>";
                      } else {
                        echo "<li class='breadcrumb-item active'> User Dashboard</li>";
                      }
                    ?>
                  </ol>
                </div>
              </li>
            </ul>
          </nav>
        </div>
        
        <div class="content">
          <div class="container-fluid">
            <div class="row text-center">
              <div class="col-sm-6 col-xl-3">
                  <div class="card-box widget-flat border-primary bg-primary text-white">
                      <i class="fi-tag"></i>
                      <h3 class="m-b-10" id="current_active_examinees"></h3>
                      <p class="text-uppercase m-b-5 font-13 font-600">Active Examinees</p>
                  </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                  <div class="card-box bg-warning widget-flat border-warning text-white">
                      <i class="fi-archive"></i>
                      <h3 class="m-b-10" id="current_inactive_examinees"></h3>
                      <p class="text-uppercase m-b-5 font-13 font-600">Inactive Examinees</p>
                  </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                  <div class="card-box widget-flat border-success bg-success text-white">
                      <i class="fi-help"></i>
                      <h3 class="m-b-10" id="current_passed_exams"></h3>
                      <p class="text-uppercase m-b-5 font-13 font-600">Passed Exams</p>
                  </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                  <div class="card-box bg-danger widget-flat border-danger text-white">
                      <i class="fi-delete"></i>
                      <h3 class="m-b-10" id="current_failed_exams"></h3>
                      <p class="text-uppercase m-b-5 font-13 font-600">Failed Exams</p>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="card-box">
                  <h4 class="header-title">User Overall Data</h4>

                  <div id="morris-bar-stacked" style="height: 350px;" class="mt-4"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <footer class="footer">
          2019 © Exam Quiz
        </footer>

      </div>
    </div>

    <?php include 'layouts/scripts.php'; ?>
    <script src="<?php echo asset_url()?>js/view-js/dashboard-js/admin-dashboard.js"></script>
  </body>
</html>