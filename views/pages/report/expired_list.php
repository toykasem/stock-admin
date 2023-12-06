
    <!-- ปิดกระบวนการตรวจสอบสิทธิ์ในการเข้าถึง -->
    <?php
           $userlevel = $_SESSION["Userlevel"];
           if($userlevel=="a"){ ?> 

    <!-- ปิดกระบวนการตรวจสอบสิทธิ์ในการเข้าถึง -->
  
  <!-- /.*****************************************************content-header -->
<!-- /.card -->
<section class="content">
      <div class="row">
        <div class="col-12">


           <div class="card">
           
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>เลขที่สัญญา</th>
                  <th>ผู้รับจ้าง</th>
                  <th>รายละเอียดงาน</th>
                  <th> วันที่ตรวจรับ </th>
                  <th>ระยะเวลาประกัน</th>
                  <th>วันหมดประกัน</th>
                  <th>เหลือเวลา/วัน</th>
				  <th>Action</th>
                 
                  
                  
                </tr>

                </thead>

                       <?php
                       
                       include ('config/connect.php');

                         $sql = "SELECT *,TIMESTAMPDIFF(DAY,NOW(),`due_date`) AS DAYCount FROM `service_contract` WHERE TIMESTAMPDIFF(DAY,NOW(),`due_date`) < 1";
                         $result = $conn->query($sql);

                         if ($result->num_rows > 0) {
                            //echo "<table><tr><th>ID</th><th>Name</th></tr>";
                            // output data of each row
                              while($row = $result->fetch_assoc()) {
                                $id_edit = $row["contract_id"];
                              echo "<tr><td>"
                              .$row["contract_id"]."</td><td>"
                              .$row["contractor"]."</td><td>"
                              .$row["job_detail"]."</td><td>"
                              .$row["date_accept"]."</td><td>"
                              .$row["conditions"]."</td><td>"
                              .$row["due_date"]."</td><td>"
							  .$row["DAYCount"]."</td><td>"
						?>
							  
							  <input onclick="window.location.href='?page=memo_export&&id=<?php echo $id_edit ?>'" type="button" name="view" value="ออกบันทึก" class="btn btn-info view_data" id="<?=$row["id"];?>" /></td></tr>  

						<?php	  
                          }   
                          ?>
                               
                                 
</tbody>
                <tfoot>
                <tr>
                  <th>เลขที่สัญญา</th>
                  <th>ผู้รับจ้าง</th>
                  <th>รายละเอียดงาน</th>
                  <th> วันที่ตรวจรับ </th>
                  <th>ระยะเวลาประกัน</th>
                  <th>วันหมดประกัน</th>
                  <th>เหลือเวลา/วัน</th>
				  <th>Action</th>
                  
                </tr>
                </tfoot>

                
                <?php
                           echo "</table>";
                           } else {
                              echo "0 results";
                              }
                             $conn->close();
                             
                             ?>

            </div>
            <!-- /.card-body -->
<!-- /.card-body -->
</div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
            
    <!-- *******************************************************Main content -->
    
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>


<!-- ปิดกระบวนการตรวจสอบสิทธิ์ในการเข้าถึง -->
<?php }else{  ?>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script>
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'ท่านไม่มีสิทธิ์ในการเข้าถึง',
              footer: '<a href>Why do I have this issue?</a>'
            })
            </script>
   <?php }  ?>

   <!-- ปิดกระบวนการตรวจสอบสิทธิ์ในการเข้าถึง -->