 <!-- <h3 class="card-title">ข้อมูลการว่าจ้าง</h3>  -->
            
 <!-- <input onclick="window.location.href='?page=DocumentOfficialInForm'" type="button" name="add" value="เพิ่มรายการ" class="btn btn-info view_data"  />
            <br><br>  -->

<?php if($_SESSION["Userlevel"]=="Admin"){      ?>   
 <button type="button" id="add_button" data-toggle="modal" data-target="#dataModal" class="btn btn-info btn-lg">เพิ่มข้อมูล</button>  <br><br> 
<?php } ?>
<!-- ********************************************************************************************************************************* -->
<?php echo $_SESSION["Userlevel"]; ?>
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
                  <th>รหัสวัสดุ</th>
                  <th>ชื่อวัสดุ</th>
                  <th>วัสดุคงเหลือ</th> 
                  <th>หน่วยนับ</th> 
                  <th>ทำรายการ</th> 
                </tr>

                </thead>

                       <?php
                       include_once 'config/connect.php';
                         $sql = "SELECT tbl_stock.id, tbl_stock.mat_code, tbl_stock.qty, tbl_mat.mat_name ,tbl_unit.unit_name
                         FROM `tbl_stock` 
                         JOIN tbl_mat  on tbl_stock.mat_code = tbl_mat.mat_code
                         JOIN tbl_unit  on tbl_stock.unit_code = tbl_unit.unit_code
                         ;";
                         $result = $conn->query($sql);

                         if ($result->num_rows > 0) {
                            //echo "<table><tr><th>ID</th><th>Name</th></tr>";
                            // output data of each row
                              while($row = $result->fetch_assoc()) {
                                $id_edit = $row["id"];
                               
                              echo "<tr><td>"
                              .$row["id"]."</td><td>"
                              .$row["mat_code"]."</td><td>"
                              .$row["mat_name"]."</td><td>"
                              .$row["qty"]."</td><td>"
                              .$row["unit_name"]."</td>";
                            ?>
                              <td> 
                              <?php if($_SESSION["Userlevel"]=="Admin"){      ?>  
                                <button  id="<?=$id_edit;?>" data-placement="top" data-toggle="tooltip" title="แก้ไขข้อมูล" class="btn btn-primary btn-sm edit">แก้ไขยอด</button>
                                <?php }else{ ?>

                              <button onclick="window.location.href='?page=Activity&mat-code=<?=$row["mat_code"];?>'"  data-placement="top" data-toggle="tooltip" title="ดูรายละเอียดข้อมูล" class="btn btn-info btn-sm veiw">ขอเบิก</button>
                              <?php } ?>
                            </td>
                              
                        <?php 
                         } 
                          ?>
                               
                                 
</tbody>
                <tfoot>
                <tr>
                <th>id</th>
                  <th>รหัสวัสดุ</th>
                  <th>ชื่อวัสดุ</th>
                  <th>วัสดุคงเหลือ</th> 
                  <th>หน่วยนับ</th> 
                  <th>ทำรายการ</th> 
                  
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


$('#add_button').click(function(){
                  $('#matirial_form')[0].reset();
                  $('.modal-title').text("เพิ่มข้อมูล222");
                  $('#action').val("Add");
                  $('#operation').val("Add");
          });



          $(document).on('submit', '#matirial_form', function(event){
            event.preventDefault();

              $.ajax({
                url:"database/db_stock_add_update.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                  //alert(data);
                  
                  var responseData = JSON.parse(data);
                  $('#matirial_form')[0].reset();
                  $('#dataModal').modal('hide');

                  if(responseData && responseData.status && responseData.message && responseData.icon){
                    Swal.fire({
                            position: 'top-end',
                            icon: responseData.icon,
                            title: "success!",
                            text: responseData.message,
                            showConfirmButton: true
                           // timer: 1500
                        }).then((result) => {
                             window.location.reload();
                   })


                  }
                  
                
                 
                }
              });
          
         });


         
      $(document).on('click', '.edit', function(){
          var id = $(this).attr("id");
        $.ajax({
                url:"database/db_stock_fine.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data)
                               {
                                    $('#id').val(data.id); 
                                    $("#mat_code option:selected").val(data.mat_code).text(data.mat_name);
                                    $('#qty').val(data.qty);
                                    $("#unit_code option:selected").val(data.unit_code).text(data.unit_name);
                                   // $('#unit_ref').val(data.mat_name);
                                    
                                    $('#action').val("Save changes");
				                          	$('#operation').val("Update");
                                    $('#dataModal').modal('show');
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
            <h4 class="modal-title">เพิ่มข้อมูล</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
      </div>
      <div class="modal-body">

          <!-- form -->
	        <form  method="post" id="matirial_form" enctype="multipart/form-data">
               
              
                <div class="row">
                        <!-- text input -->
                    <div class="col-sm-8">
                        <?php
                            include('config/connect.php');
                            $sql = "SELECT * FROM tbl_mat";
                            $query = mysqli_query($conn, $sql);
                        ?>
                        <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="material">รายการวัสดุ</label>
                                  <select name="mat_code" id="mat_code" class="form-control">
                                        <option value="">เลือก รายการวัสดุ</option>
                                          <?php while($result = mysqli_fetch_assoc($query)): ?>
                                            <option value="<?=$result['mat_code']?>"><?=$result['mat_name']?></option>
                                        <?php endwhile; ?>
                                    </select>
                              </div>
                            </div>
                            <?php mysqli_close($conn); ?>
                    </div>
                    <!-- /text input Eend -->
                
                      <!-- text input begin -->
                      <div class="col-sm-2">
                        <div class="form-group">
                                <label>จำนวน</label>
                                <input type="text" name="qty" id="qty" class="form-control" placeholder="จำนวนวัสดุ" required >
                        </div>
                      </div>
                      <!-- /text input Eend -->

                      <!-- text input begin -->
                      <div class="col-sm-2">
                        <?php
                            include('config/connect.php');
                            $sql2 = "SELECT * FROM tbl_unit";
                            $query2 = mysqli_query($conn, $sql2);
                        ?>
                        <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="material">หน่วยนับ</label>
                                  <select name="unit_code" id="unit_code" class="form-control">
                                        <option value="">เลือก</option>
                                          <?php while($result2 = mysqli_fetch_assoc($query2)): ?>
                                            <option value="<?=$result2['unit_code']?>"><?=$result2['unit_name']?></option>
                                        <?php endwhile; ?>
                                    </select>
                              </div>
                            </div>
                            <?php mysqli_close($conn); ?>
                    </div>
                      <!-- /text input Eend -->
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