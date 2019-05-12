<!doctype html>
<html lang="en">
<?php include 'layouts/header.php'; ?>
<body class="account-pages">

    <div class="accountbg" style="background: url('<?php echo asset_url()?>images/bg-2.jpg');background-size: cover;background-position: center;"></div>

    <div class="wrapper-page account-page-full">

        <div class="card">
            <div class="card-block">

                <div class="account-box">

                    <div class="card-box p-5">
                        <h2 class="text-uppercase text-center pb-4">
                            <a href="<?php echo base_url();?>" class="text-success">
                                <span><img src="<?php echo asset_url()?>images/image.png" alt="" height="100" width=""></span>
                            </a>
                        </h2>

                        <?php echo form_open('index.php/Login/Login/userAuthenticate');?>
                            <?php
                                if (isset($error)) {
                                    echo "
                                        <div class='alert alert-danger alert-dismissible bg-danger text-white border-0 fade show role='alert>
                                            ".$error."
                                        </div>
                                    ";
                                } else if (isset($inactive)) {
                                    echo "
                                        <div class='alert alert-warning alert-dismissible bg-warning text-white border-0 fade show role='alert>
                                            ".$inactive."
                                        </div>
                                    ";
                                }
                            ?>
                            <div class="form-group m-b-20 row">
                                <div class="col-12">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" id="emailaddress" name="user_email" required="" placeholder="Input your email" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" required="" id="password" name="user_password" placeholder="Input your password">
                                </div>
                            </div>

                            <div class="form-group row text-center m-t-10">
                                <div class="col-12">
                                    <button class="btn btn-block btn-primary waves-effect waves-light" type="submit"> <i class="mdi mdi-login-variant"></i> Sign In</button>
                                </div>
                            </div>

                        <?php echo form_close();?>

                    </div>
                </div>

            </div>
        </div>

        <div class="m-t-40 text-center">
            <p class="account-copyright">2019 © Exam Quiz</p>
        </div>

    </div>
    <?php include 'layouts/scripts.php'; ?>
</body>
</html>