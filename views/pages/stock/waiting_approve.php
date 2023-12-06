 <h1>รายการรออนุมัติ</h1>  
 <?php 
 $name='w'.date('Y-m-d_hia'); 
 echo   $name;
 
 ?>

 <br>   
            
<!-- ********************************************************************************************************************************* -->
<div class="col-md-12">
           <div class="card card-outline card-primary">
           
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
            
<!-- ********************************************************************************************************************************* -->
            
           
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>เลขที่ใบเบิก</th>
                  <th>รหัสวัสดุ</th> 
                  <th>ชื่อวัสดุ</th> 
                  <th>ยอดคงเหลือ</th> 
                  <th>จำนวนที่เบิก</th> 
                  <th>จัดการ</th> 
                </tr>

                </thead>

                       <?php
                       include_once 'config/connect.php';
                         $sql = "SELECT tbl_withdraw_log.id, tbl_withdraw_log.withdraw_id,tbl_withdraw_log.withdraw_mat, tbl_mat.mat_name,tbl_stock.qty, tbl_withdraw_log.withdraw_qty 
                         FROM `tbl_withdraw_log` 
                         JOIN tbl_mat  on tbl_withdraw_log.withdraw_mat = tbl_mat.mat_code 
                         JOIN tbl_stock  on  tbl_withdraw_log.withdraw_mat = tbl_stock.mat_code
                         where status='1' ;";
                         $result = $conn->query($sql);

                         if ($result->num_rows > 0) {
                            //echo "<table><tr><th>ID</th><th>Name</th></tr>";
                            // output data of each row
                              while($row = $result->fetch_assoc()) {
                                $id_edit = $row["id"];
                               
                              echo "<tr><td>"
                              .$row["id"]."</td><td>"
                              .$row["withdraw_id"]."</td><td>"
                              .$row["withdraw_mat"]."</td><td>"
                              .$row["mat_name"]."</td><td>"
                              .$row["qty"]."</td><td>"
                              .$row["withdraw_qty"]."</td>";
                            ?>
                              <td> 
                              <button  id="<?=$row["id"];?>" name="<?=$row["mat_name"];?>" mat_code="<?=$row["withdraw_mat"];?>" qty="<?=$row["withdraw_qty"];?>" data-placement="top" data-toggle="tooltip" title="Approve" class="btn btn-info btn-sm approve">อนุมัติ</button>
                              <button  id="<?=$row["id"];?>" data-placement="top" data-toggle="tooltip" title="แก้ไขข้อมูล" class="btn btn-primary btn-sm edit"><span class="fas fa-user-edit" aria-hidden="true"></span></button>
                              <button  id="<?=$row["id"];?>" name="<?=$row["mat_name"];?>" qty="<?=$row["withdraw_qty"];?>" data-placement="top" data-toggle="tooltip" title="NotApprove"  class="btn btn-danger btn-sm not">ไม่อนุมัติ</button>

                            </td>
                              
                        <?php 
                         } 
                          ?>
                               
                                 
</tbody>
                <tfoot>
                <tr>
                
                  <th>id</th>
                  <th>เลขที่ใบเบิก</th>
                  <th>รหัสวัสดุ</th> 
                  <th>ชื่อวัสดุ</th> 
                  <th>ยอดคงเหลือ</th> 
                  <th>จำนวนที่เบิก</th> 
                  <th>จัดการ</th> 
                  
                </tr>
                </tfoot>

                
                <?php
                             echo "</table>";
                           } else {
                               echo "0 results";
                              }
                             $conn->close();
                        ?>

                         <!-- ********************************************************************************************************************************* -->


   </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.card-body -->


</div>
</div>
<!-- ********************************************************************************************************************************* -->
               
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
 <!-- #################### content-header #############################################  -->
                                



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

    
$(document).on('click', '.edit', function(){
          var id = $(this).attr("id");
        $.ajax({
                url:"database/db_mat_withdraw_fine.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data)
                    {
                        $('#id').val(data.id);
                        $('#withdraw_id').val(data.withdraw_id);
                        $('#withdraw_qty').val(data.withdraw_qty);
                        $('#price').val(data.price);
                        
                        $('#action').val("Save changes");
                        $('#operation').val("Update");
                        $('#dataModal').modal('show');
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




<!-- Modal Start -->

<div id="dataModal" class="modal fade">
	<div class="modal-dialog modal-xl">

      <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">แก้ไขยอดเบิก</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
      </div>
      <div class="modal-body">

          <!-- form -->
	        <form  method="post" id="matirial_form" enctype="multipart/form-data">
               
              
                <div class="row">
                    <!-- text input -->
                    <div class="col-sm-2">
                          <div class="form-group">
                              <label>รหัสวัสดุ</label>
                              <input type="text" name="withdraw_id" id="withdraw_id" class="form-control" placeholder="Enter รหัสวัสดุ" required >
                          </div>
                        </div>
                        <!-- text input -->
                    <div class="col-sm-8">
                    <div class="form-group">
                            <label>ชื่อสวัสดุ</label>
                            <input type="text" name="withdraw_qty" id="withdraw_qty" class="form-control" placeholder="Enter ชื่อสวัสดุ" required >
                          </div>
                        </div>
                
                 
                </div>
				</div>

        <div class="modal-footer justify-content-between">
              
              
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="hidden" name="id" id="id"  />
              <input type="hidden" name="operation" id="operation" />
              <input   type="submit" name="action" id="action" class="btn btn-success"  value = "เพิ่มข้อมูล" /> 
              
            </div>

      </form>  <!-- / form -->
	</div>
	
	</div>
</div>
<!-- / Modal End -->