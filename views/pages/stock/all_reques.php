<!-- <button type="button" id="add_button" data-toggle="modal" data-target="#dataModal" class="btn btn-info btn-lg">เพิ่มข้อมูล</button> -->
           
           <!-- /.card-header -->
           <div class="card-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <!-- <th>ลำดับที่</th> -->
                 <th>#</th>
                 <th>เลขที่ใบเบิก</th>
                 <th>ชื่อผู้เบิก</th>
                 <th>วัน/เวลา ที่เบิก</th>
                 <th>Action</th>
                
                 
               </tr>

               </thead>

                      <?php
                       include_once 'config/connect.php';
                      // mysql_query("SET character_set_results=utf8");
                        $sql = "SELECT * FROM tbl_withdraw ";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                           //echo "<table><tr><th>ID</th><th>Name</th></tr>";
                           // output data of each row
                             while($row = $result->fetch_assoc()) {
                               $id_edit = $row["id"];
                               $id_withdraw = $row["withdraw_id"];
                               
                             echo "<tr><td>"
                             .$row["id"]."</td><td>"
                             .$row["withdraw_id"]."</td><td>"
                             .$row["user"]."</td><td>"
                             .$row["time"]."</td>" //division_initials
                             ?>
                            <td> 
                            <button onclick="window.location.href='?page=withdraw-detail&withdraw_id=<?=$row['withdraw_id'];?>'"  id="<?=$row["withdraw_id"];?>" name="<?=$row["user"];?>" data-placement="top" data-toggle="tooltip" title="ลบ"  class="btn btn-info btn-sm veiw">ดุรายละอียดทั้งหมด</button>

                             </td>
                           </tr>
                        <?php  
                         } 
                         ?>
                              
                                
</tbody>
               <tfoot>
               <tr>
               <th>#</th>
                 <th>เลขที่ใบเบิก</th>
                 <th>ชื่อผู้เบิก</th>
                 <th>วัน/เวลา ที่เบิก</th>
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

        $('#add_button').click(function(){
                  $('#matirial_form')[0].reset();
                  $('.modal-title').text("เพิ่มข้อมูล");
                  $('#action').val("Add");
                  $('#operation').val("Add");
          });



          $(document).on('submit', '#matirial_form', function(event){
            event.preventDefault();

              $.ajax({
                url:"database/db_mat_add_update.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                  //alert(data);
                  $('#matirial_form')[0].reset();
                  $('#dataModal').modal('hide');
                  Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'เพิ่มข้อมูล'+ data +'สำเร็จ',
                    showConfirmButton: false,
                    timer: 1500
                    }).then((result) => {
                         window.location.replace("?page=matirial");
                   })
                 
                }
              });
          
         });


      $(document).on('click', '.edit', function(){
          var id = $(this).attr("id");
        $.ajax({
                url:"database/db_mat_fine.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data)
                               {
                                    $('#id').val(data.id);
                                    $('#mat_code').val(data.mat_code);
                                    $('#mat_name').val(data.mat_name);
                                    $('#price').val(data.price);
                                    
                                    $('#action').val("Save changes");
				                          	$('#operation').val("Update");
                                    $('#dataModal').modal('show');
                               }
          })
            
     });


     $(document).on('click', '.delete', function(){
				var id_delete = $(this).attr("id");
        var name = $(this).attr("name");
				//if(confirm("แน่ใจไหมว่าต้องการลบผู้ใช้รายนี้?")){
				Swal.fire({
					    title: 'คำเตือน',
							text: "คุณแน่ใจว่าต้องการลบ " + name + "ออกจากระบบ ?",
							icon: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'ใช่, ต้องการจะลบ!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                              $.ajax({
                                url:"database/db_mat_delete.php",
                                method:"POST",
                                data:{id_delete:id_delete},
                                success:function(response)
                                    {
                                      //alert(data);
                                      consol.log(response);
                                      Swal.fire(
                                            'Good job!',
                                            response.message +'You clicked the button!',
                                            'success'
                                        ).then((result) => {
                                           window.location.replace("?page=matirial");
                                           })
                 
                                    }
                              });
                          }
        
                      })
          	});
	
</script>
<!--CRIPT -->



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
                    <div class="col-sm-2">
                          <div class="form-group">
                              <label>รหัสวัสดุ</label>
                              <input type="text" name="mat_code" id="mat_code" class="form-control" placeholder="Enter รหัสวัสดุ" required >
                          </div>
                        </div>
                        <!-- text input -->
                    <div class="col-sm-8">
                    <div class="form-group">
                            <label>ชื่อสวัสดุ</label>
                            <input type="text" name="mat_name" id="mat_name" class="form-control" placeholder="Enter ชื่อสวัสดุ" required >
                          </div>
                        </div>
                
                  <!-- text input -->
                  <div class="col-sm-2">
                    <div class="form-group">
                            <label>ราคาต่อหน่วย / บาท</label>
                            <input type="text" name="price" id="price" class="form-control" placeholder="Enter ราคา(บาท) " required >
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

