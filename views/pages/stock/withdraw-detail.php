<?php 
$withdraw_id = $_GET['withdraw_id'];
echo  "<h1>  ใบเบิกเลขที่  ".$withdraw_id."</h1><br>";
?>
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>รหัสวัสดุ</th>
                  <th>ชื่อวัสดุ</th>
                  <th>จำนวนที่เบิก</th> 
                  
                  <th>สถานะ</th> 
                  <?php if($_SESSION["Userlevel"]=="Admin"){ ?>
                    <th>Action</th> 
                    <?php } ?>
                </tr>

                </thead>

<?php

include_once 'config/connect.php';
                         $sql = "SELECT tbl_withdraw_log.id, tbl_withdraw_log.withdraw_mat, tbl_mat.mat_code, tbl_mat.mat_name, tbl_withdraw_log.withdraw_qty, tbl_withdraw_log.status
                         FROM tbl_withdraw_log
                         JOIN tbl_mat  on tbl_withdraw_log.withdraw_mat = tbl_mat.mat_code
                         WHERE tbl_withdraw_log.withdraw_id  = '$withdraw_id'
                         ;";
                         $result = $conn->query($sql);

                         if ($result->num_rows > 0) {
                            //echo "<table><tr><th>ID</th><th>Name</th></tr>";
                            // output data of each row
                              while($row = $result->fetch_assoc()) {
                                $id_edit = $row["id"];
                               
                              echo "<tr><td>"
                              .$row["id"]."</td><td>"
                              .$row["withdraw_mat"]."</td><td>"
                              .$row["mat_name"]."</td><td>"
                              .$row["withdraw_qty"]."</td>";?>
                              <td>
                              <?php 
                              if($row["status"]==3){
                                echo "อนุมัติแล้ว";   
                              }else if($row["status"]==2){
                                echo "ไม่อนุมัติ";
                              }else if($row["status"]==1){
                                echo "รออนุมัติ";
                              }
                               ?>
                              
                            </td>
                            <?php if($_SESSION["Userlevel"]=="Admin"){ ?>
                            <td>
                              <button  id="<?=$row["id"];?>" name="<?=$row["mat_name"];?>" mat_code="<?=$row["withdraw_mat"];?>" qty="<?=$row["withdraw_qty"];?>" data-placement="top" data-toggle="tooltip" title="Approve" class="btn btn-info btn-sm approve">อนุมัติ</button>
                              <button  id="<?=$row["id"];?>" name="<?=$row["mat_name"];?>" qty="<?=$row["withdraw_qty"];?>" data-placement="top" data-toggle="tooltip" title="NotApprove"  class="btn btn-danger btn-sm not">ไม่อนุมัติ</button>
                            </td> 
                            <?php } ?>

                            
                          
                          
                          </tr>
                              
                              
                        <?php 
                              }
                         } 
                          ?>

</tbody>
               <tfoot>
               <tr>
                  <th>id</th>
                  <th>รหัสวัสดุ</th>
                  <th>ชื่อวัสดุ</th>
                  <th>จำนวนที่เบิก</th> 
                  <th>สถานะ</th> 
                  <?php if($_SESSION["Userlevel"]=="Admin"){ ?>
                    <th>Action</th> 
                    <?php } ?>
                </tr>
               </tfoot>
               </table>
<br>



  <!-- this row will not appear when printing -->
  <div class="row no-print">
                <div class="col-12">
                <button onclick="window.location.href='?page=UserReques'" type="button" class="btn btn-info float-left">Back</button>
                  <a href="withdraw-print.php" rel="noopener" target="_blank" class="btn btn-default float-right"><i class="fas fa-print"></i> Print</a>
                 
                  </div>
   </div>

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



 <!-- AJAX DELET SCRIPT -->
 <script type="text/javascript" language="javascript" >

$(document).on('click', '.approve', function(){
		    var id = $(this).attr("id");
        var mat_name = $(this).attr("name");
        var mat_qty = $(this).attr("qty");
        var mat_code =$(this).attr("mat_code");
				//if(confirm("แน่ใจไหมว่าต้องการลบผู้ใช้รายนี้?")){
				Swal.fire({
					        title: 'คำเตือน',
							text:  "อนุมัติให้เบิก"+ mat_name+"  จำนวน  "+ mat_qty,
							icon: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'ใช่!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                              $.ajax({
                                url:"database/db_mat_approve.php",
                                method:"POST",
                                data:{id:id,mat_code:mat_code,mat_qty:mat_qty},
                                success:function(data)
                                    {
                                      Swal.fire({
                                            position: 'top-end',
                                            icon: 'success',
                                            title: 'อนุมัติการเบิกสำเร็จ',
                                            showConfirmButton: false,
                                            timer: 1500
                                               }).then((result) => {
                                               // save_log("DELETE","หนังสือขาเข้า เรื่อง :"+doc_topic); //  script function อยู่ที่หน้า admin ==> index.php
                                                  location.reload();
                                                  })
                                      
                                      
                                  
                                      
                                    }
                                    
                              });
                          }
        
                      })
          	});

    
$(document).on('click', '.not', function(){
		var id = $(this).attr("id");
        var mat_name = $(this).attr("name");
        var mat_qty = $(this).attr("qty");
				//if(confirm("แน่ใจไหมว่าต้องการลบผู้ใช้รายนี้?")){
				Swal.fire({
					        title: 'คำเตือน',
							text:  "ไม่อนุมัติให้เบิก"+ mat_name+"  จำนวน  "+ mat_qty,
							icon: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'ใช่!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                              $.ajax({
                                url:"database/db_mat_notapprove.php",
                                method:"POST",
                                data:{id:id},
                                success:function(data)
                                    {
                                      Swal.fire({
                                            position: 'top-end',
                                            icon: 'success',
                                            title: 'บันทึกรายการสำเร็จ',
                                            showConfirmButton: false,
                                            timer: 1500
                                               }).then((result) => {
                                               // save_log("DELETE","หนังสือขาเข้า เรื่อง :"+doc_topic); //  script function อยู่ที่หน้า admin ==> index.php
                                                  location.reload();
                                                  })
                                      
                                      
                                  
                                      
                                    }
                                    
                              });
                          }
        
                      })
          	});
	
</script>
<!-- /AJAX DELET SCRIPT -->


