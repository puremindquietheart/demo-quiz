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
                        <h4 class="page-title"> Manage Exams </h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Navigation</a></li>
                            <li class="breadcrumb-item active"> Exams</li>
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
                                <button type="button" id="new_exam" class="btn btn-icon waves-effect waves-light btn-success"><i class="mdi mdi-file-plus"></i> <span>New Exam</span> </button>
                                <hr>        
                                <?php include 'layouts/message.php'; ?>                        
                                <h4 class="m-t-0 header-title">List of Exams</h4>
                                <table id="exam_list_tbl" class="table table-bordered table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Exam Name</th>
                                            <th>Exam Type</th>
                                            <th>Apply Questions</th>
                                            <th>Edit Exam Details</th>
                                            <th>Assign Exam</th>
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
    <?php include 'admin-modal/exams-modal.php'; ?>
    <?php include 'layouts/scripts.php'; ?>
    <script src="<?php echo asset_url()?>js/view-js/exam-js/manage-exams.js"></script>
  </body>
</html>