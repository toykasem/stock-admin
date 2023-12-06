<!-- =========================================================== -->
<?php
if($_SESSION["Userlevel"]=="User"){      ?>              
               
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>150</h3>

          <p>รายการที่ขอเบิก</p>
        </div>
        <div class="icon">
          <i class="fas fa-download"></i>
        </div>
        <a href="?page=UserReques" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
   
    
  </div>
  <!-- /.row -->
              
<?php   }else{ 

 include_once 'dashboard_count_fuction.php';
  $member = get_total_member();
  $admin = get_total_admin();
  $withdraw = get_total_withdraw();
  $approved= get_total_approved();
  $waiting_approve = get_total_waiting_approve();
  $stock_emty = stock_emty();
 echo <<<_DASHBOAD

  
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">

            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>$withdraw</h3>

                <p>รายการขอเบิกทั้งหมด</p>
              </div>
              <div class="icon">
                <i class="fas fa-download"></i>
              </div>
              <a href="?page=Allwithdraw" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          
          <!-- .col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                  <div class="small-box bg-secondary">
                    <div class="inner">
                      <h3>$waiting_approve</h3>

                      <p>รายการเบิกที่รออนุมัติ</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-spinner fa-spin"></i>
                    </div>
                    <a href="?page=WaittingApprove" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
          <!-- ./col -->


          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>$approved</h3>

                <p>รายการอนุมัติแล้ว</p>
              </div>
              <div class="icon">
                <i class="far fa-smile"></i>
              </div>
              <a href="?page=Approved" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

         


          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>$stock_emty </h3>

                <p>รายการของหมด</p>
              </div>
              <div class="icon">
                <i class="fas fa-eye-slash"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->


  <!-- Small boxes (Stat box) -->
  <div class="row">

        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>
              $member
              </h3>

              <p>จำนวนผู้ใช้งานในระบบ</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?page=UserManager" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>


     

            <!-- .col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                  <div class="small-box bg-light">
                    <div class="inner">
                      <h3>$admin</h3>

                      <p>Admin ระบบ</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-user"></i>
                    </div>
                    <a href="?page=AdminManager" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
          <!-- ./col -->


           <!-- .col -->
           <div class="col-lg-3 col-6">
                <!-- small box -->
                  <div class="small-box bg-primary bg-gradient">
                    <div class="inner">
                      <h3>150</h3>

                      <p>โครงสร้างองค์กร</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-sitemap"></i>
                    </div>
                    <a href="?page=Information" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
          <!-- ./col -->
  </div>


  _DASHBOAD;
  ?>

  <!-- =========================================================== -->
 

   <?php   
        }

  ?>