<ul class="list-unstyled topbar-right-menu float-right mb-0">

    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            <?php 
                if ($this->session->userdata('user_type') == 1) {
                    echo "<img src='http://localhost/Quiz/assets/images/users/admin.png' alt='user' class='rounded-circle'>";
                } else if ($this->session->userdata('user_type') == 2 && $this->session->userdata('user_gender') == 1) {
                    echo "<img src='http://localhost/Quiz/assets/images/users/user_male.png' alt='user' class='rounded-circle'>";
                } else if ($this->session->userdata('user_type') == 2 && $this->session->userdata('user_gender') == 2) {
                    echo "<img src='http://localhost/Quiz/assets/images/users/user_female.png' alt='user' class='rounded-circle'>";
                }
            ?>
                
            <span class="ml-1"><?php echo $this->session->userdata('user_name') ?><i class="mdi mdi-chevron-down"></i> </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">

            <div class="dropdown-item noti-title">
                <h6 class="text-overflow m-0">Hello <?php echo $this->session->userdata('user_name'); ?>!</h6>
            </div>

            <a href="<?php echo base_url()?>index.php/Login/Login/userLogout" class="dropdown-item notify-item">
                <i class="fi-power"></i> <span>Logout</span>
            </a>

        </div>
    </li>

</ul>