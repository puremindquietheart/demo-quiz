<div class="left side-menu">

    <div class="topbar-left">
        <a href="<?php echo base_url()?>" class="logo">
            <span>
                <img src="<?php echo asset_url()?>images/image.png" alt="" height="60">
            </span>
        </a>
    </div>

    <!-- User box -->
    <div class="user-box">
        <div class="user-img">
            <?php 
                if ($this->session->userdata('user_type') == 1) {
                    echo "<img src='http://localhost/Quiz/assets/images/users/admin.png' alt='user' class='rounded-circle img-fluid'>";
                } else if ($this->session->userdata('user_type') == 2 && $this->session->userdata('user_gender') == 1) {
                    echo "<img src='http://localhost/Quiz/assets/images/users/user_male.png' alt='user' class='rounded-circle img-fluid'>";
                } else if ($this->session->userdata('user_type') == 2 && $this->session->userdata('user_gender') == 2) {
                    echo "<img src='http://localhost/Quiz/assets/images/users/user_female.png' alt='user' class='rounded-circle img-fluid'>";
                }
            ?>
        </div>
        <h5><a href="<?php echo base_url()?>"><?php echo $this->session->userdata('user_name')?></a> </h5>
        <p class="text-muted">
            <?php 
                if ($this->session->userdata('user_type') == 1) {
                    echo "System Administrator";
                } else {
                    echo "Examinee";
                }
            ?>
        </p>
    </div>
    <div id="sidebar-menu">

        <ul class="metismenu" id="side-menu">

            <li class="menu-title">Navigation</li>

            <li>
                <a href="<?php echo base_url()?>">
                    <i class="fi-air-play"></i><span> Dashboard </span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);">
                    <i class="fa fa-files-o"></i> <span> Pending Exams </span>
                </a>
            </li>

        </ul>

    </div>

    <div class="clearfix"></div>

</div>