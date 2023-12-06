<!-- งานประกันสัญญา -->

    <!-- ปิดกระบวนการตรวจสอบสิทธิ์ในการเข้าถึง -->
         <?php
          //  $userlevel = $_SESSION["Userlevel"];
          //  if($userlevel=="a" || $userlevel=="b") { 
            ?> 

    <!-- ปิดกระบวนการตรวจสอบสิทธิ์ในการเข้าถึง -->

         <li class="nav-item">

  
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                ระบบ
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=CheckContractList" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>สัญญาเต็มรูปแบบ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=ProjectCompleteList" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>สัญญาที่จบแล้ว</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=DocAcceptList" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เอกสารตรวจรับงาน</p>
                </a>
              </li>

              <?php //} ?>


              
              <li class="nav-item">
                <a href="?page=RecheckList" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>บันทึกแจ้งตรวจสอบ</p>
                </a>
              </li>

              </li>
              <li class="nav-item">
                <a href="?page=treasury-List" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>รายการจากสำนักการคลัง</p>
                </a>
              </li>
              
            </ul>
          </li>
         <!-- สิ้นสุดงานประกันสัญญา -->
