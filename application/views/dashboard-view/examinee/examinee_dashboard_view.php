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
        <input type="hidden" id="examinee_id" value="<?php echo $this->session->userdata('user_id')?>">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                  <i class="mdi mdi-file-multiple float-right text-muted"></i>
                  <h6 class="text-muted text-uppercase mt-0">Exam Taken</h6>
                  <h2 class="m-b-20" data-plugin="counterup" id="exam_taken"></h2>
                </div>
              </div>

              <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                  <i class="mdi mdi-percent float-right text-muted"></i>
                  <h6 class="text-muted text-uppercase mt-0">Pass Percentage</h6>
                  <h2 class="m-b-20"><span data-plugin="counterup" id="pass_exams"></span>%</h2>
                </div>
              </div>

              <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                  <i class="mdi mdi-cancel float-right text-muted"></i>
                  <h6 class="text-muted text-uppercase mt-0">Fail Percentage</h6>
                  <h2 class="m-b-20"><span data-plugin="counterup" id="fail_exams"></span>%</h2>
                </div>
              </div>

              <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                  <i class="mdi mdi-cart-plus float-right text-muted"></i>
                  <h6 class="text-muted text-uppercase mt-0">Prize Taken</h6>
                  <h2 class="m-b-20"><span data-plugin="counterup" id="count_price_taken"></span> PC/s</h2>
                </div>
              </div>
            </div>
            <!-- end row -->
          </div>
        </div>

        <footer class="footer">
          2019 © Exam Quiz
        </footer>

      </div>
    </div>

    <?php include 'layouts/scripts.php'; ?>
    <script src="<?php echo asset_url()?>js/view-js/examinee-js/examinee-dashboard.js"></script>
  </body>
</html>