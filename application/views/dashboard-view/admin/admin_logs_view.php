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