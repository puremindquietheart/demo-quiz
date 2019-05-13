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
                        <h4 class="page-title"> Manage Users </h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Navigation</a></li>
                            <li class="breadcrumb-item active"> User List</li>
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
                                <button type="button" id="new_user" class="btn btn-icon waves-effect waves-light btn-success"><i class="mdi mdi-account-plus"></i> <span>New User</span> </button>
                                <hr>                                
                                <h4 class="m-t-0 header-title">List of Users</h4>
                                <table id="user_list_tbl" class="table table-bordered table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>User Type</th>
                                            <th>User Email</th>
                                            <th>User Status</th>
                                            <th>Edit User</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div>
            </div>

            <footer class="footer">
            2019 © Exam Quiz
            </footer>

        </div>
    </div>
    <?php include 'admin-modal/users-modal.php'; ?>
    <?php include 'layouts/scripts.php'; ?>
    <script src="<?php echo asset_url()?>js/view-js/user-js/manage-users.js"></script>
  </body>
</html>