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
                  <h4 class="page-title"> Manage User Logs </h4>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Navigation</a></li>
                    <li class="breadcrumb-item active"> User Logs</li>
                  </ol>
                </div>
              </li>
            </ul>
          </nav>
        </div>
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card-box table-responsive">
                  <hr>                             
                  <h4 class="m-t-0 header-title">List of User Logs</h4>
                  <table id="user_logs_tbl" class="table table-bordered table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                      <tr>
                        <th>Action By</th>
                        <th>Action Made</th>
                        <th>Date Time</th>
                      </tr>
                    </thead>
                  </table>
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
    <script src="<?php echo asset_url()?>js/view-js/log-js/user-logs.js"></script>
  </body>
</html>