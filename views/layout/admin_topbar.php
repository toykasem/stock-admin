  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="?page=Home" class="nav-link">Home</a>
        <!-- http://rangsit.org/engineering/admin/views/pages/home.php -->
      </li>
      <?php
           //session_start();
      if(isset($_SESSION["Userlevel"])){ 
           if($_SESSION["Userlevel"]=="Admin"){ ?>
                 <li class="nav-item d-none d-sm-inline-block"><a href="?page=UserManager" class="nav-link">ระบบจัดการผู้ใช้งาน</a></li>
      <?php } } ?>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <?php if(isset($_SESSION["Userlevel"])){ ?>
      </li>
      <li class="nav-item">
        <a href="?page=Profiles&&user_id=<?php echo $_SESSION["UserID"]; ?>" class="nav-link" onclick=save_log("click-menu","UserManager") > 
        <?php 
              if($_SESSION["Userlevel"]=="User"){
                 echo  $_SESSION["UserID"]."   ".$_SESSION["name"]; 
              }else if($_SESSION["Userlevel"]=="Admin"){
                echo  $_SESSION["username"]; 
              }
        ?>  
        </a>
      </li>
     
      <li class="nav-item">
      <a href="logout.php" class="nav-link"><!-- icon Log-out --> <i class="fas fa-sign-out-alt"></i></a>
      </li> 

      <?php }else{ ?>
          <li class="nav-item">
          <a href="login.php" class="nav-link">Login</a>
          </li> 
      <?php } ?>
      
<!-- 
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li> -->
    </ul>
  </nav>