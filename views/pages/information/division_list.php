<button type="button" id="add_button" data-toggle="modal" data-target="#dataModal" class="btn btn-info btn-lg">เพิ่มข้อมูล</button>
           
           <!-- /.card-header -->
           <div class="card-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <!-- <th>ลำดับที่</th> -->
                 <th>#</th>
                 <th>รหัสกอง</th>
                 <th>ชื่อสำนัก/กอง</th>
                 <th>ชื่อย่อ</th>
                 <th>จัดการข้อมูล</th>
                
                 
               </tr>

               </thead>

                      <?php
                       include_once 'config/connect.php';
                      // mysql_query("SET character_set_results=utf8");
                        $sql = "SELECT * FROM tbl_division";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                           //echo "<table><tr><th>ID</th><th>Name</th></tr>";
                           // output data of each row
                             while($row = $result->fetch_assoc()) {
                               $id_edit = $row["division_id"];
                               
                             echo "<tr><td>"
                            // .$row["id"]."</td><td>"
                             .$row["division_id"]."</td><td>"
                             .$row["division_code"]."</td><td>"
                             .$row["division_name"]."</td><td>"
                             .$row["division_initials"]."</td>" //division_initials
                             ?>
                            <td> 

                            <button onclick="window.location.href='#'"  data-placement="top" data-toggle="tooltip" title="ดูรายละเอียดข้อมูล" class="btn btn-info btn-sm veiw"><span class="fas fa-eye" aria-hidden="true"></span></button>
                            <button  id="<?=$row["division_id"];?>" data-placement="top" data-toggle="tooltip" title="แก้ไขข้อมูล" class="btn btn-primary btn-sm edit"><span class="fas fa-user-edit" aria-hidden="true"></span></button>
                            <button  id="<?=$row["division_id"];?>" name="<?=$row["division_name"];?>" data-placement="top" data-toggle="tooltip" title="ลบ"  class="btn btn-danger btn-sm delete"><span class="fas fa-trash-alt" aria-hidden="true"></span></button>

                             </td>
                           </tr>
                        <?php  
                         } 
                         ?>
                              
                                
</tbody>
               <tfoot>
               <tr>
                 <!-- <th>ลำดับที่</th> -->
                 <th>#</th>
                 <th>รหัสกอง</th>
                 <th>ชื่อสำนัก/กอง</th>
                 <th>ชื่อย่อ</th>
                 <th>จัดการข้อมูล</th>
                 
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
                  $('#division_form')[0].reset();
                  $('.modal-title').text("เพิ่มข้อมูล");
                  $('#action').val("Add");
                  $('#operation').val("Add");
          });



          $(document).on('submit', '#division_form', function(event){
            event.preventDefault();

              $.ajax({
                url:"database/db_division_add_update.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                  //alert(data);
                  $('#division_form')[0].reset();
                  $('#dataModal').modal('hide');
                  Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'เพิ่มข้อมูล'+ data +'สำเร็จ',
                    showConfirmButton: false,
                    timer: 1500
                    }).then((result) => {
                         window.location.replace("?page=DivisionList");
                   })
                 
                }
              });
          
         });


      $(document).on('click', '.edit', function(){
          var division_id = $(this).attr("id");
        $.ajax({
                url:"database/ad_division_fine.php",
                method:"POST",
                data:{division_id:division_id},
                dataType:"json",
                success:function(data)
                               {
                                    $('#division_id').val(data.division_id);
                                    $('#division_code').val(data.division_code);
                                    $('#division_name').val(data.division_name);
                                    $('#division_initials').val(data.division_initials);
                                    
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
                                url:"database/db_division_delete.php",
                                method:"POST",
                                data:{id_delete:id_delete},
                                success:function(data)
                                    {
                                      //alert(data);
                                      Swal.fire(
                                            'Good job!',
                                            data +'You clicked the button!',
                                            'success'
                                        ).then((result) => {
                                           window.location.replace("?page=DivisionList");
                                           })
                 
                                    }
                              });
                          }
        
                      })
          	});
	
</script>
<!--CRIPT -->



<!-- Modal -->

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
	        <form  method="post" id="division_form" enctype="multipart/form-data">
               
              
                <div class="row">
                    <!-- text input -->
                    <div class="col-sm-2">
                          <div class="form-group">
                              <label>รหัส สำนัก/กอง</label>
                              <input type="text" name="division_code" id="division_code" class="form-control" placeholder="Enter รหัส สำนัก/กอง" required >
                          </div>
                        </div>
                        <!-- text input -->
                    <div class="col-sm-8">
                    <div class="form-group">
                            <label>ชื่อ สำนัก/กอง</label>
                            <input type="text" name="division_name" id="division_name" class="form-control" placeholder="Enter ชื่อ สำนัก/กอง" required >
                          </div>
                        </div>
                
                  <!-- text input -->
                  <div class="col-sm-2">
                    <div class="form-group">
                            <label>ชื่อย่อ สำนัก/กอง</label>
                            <input type="text" name="division_initials" id="division_initials" class="form-control" placeholder="Enter ชื่อย่อ " required >
                          </div>
                        </div>
                </div>
				</div>

        <div class="modal-footer justify-content-between">
              
              
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="hidden" name="division_id" id="division_id"  />
              <input type="hidden" name="operation" id="operation" />
              <input   type="submit" name="action" id="action" class="btn btn-success"  value = "เพิ่มข้อมูล" /> 
              
            </div>

      </form>  <!-- / form -->
	</div>
	
	</div>
</div>
<!-- / Modal -->

