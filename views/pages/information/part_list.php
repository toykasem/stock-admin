<!-- SELECT * FROM `tbl_part` JOIN tbl_division ON tbl_part.divison_ref=tbl_division.part_code -->
<button type="button" id="add_button" data-toggle="modal" data-target="#dataModal" class="btn btn-info btn-lg">เพิ่มข้อมูล</button>
           
           <!-- /.card-header -->
           <div class="card-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <!-- <th>ลำดับที่</th> -->
                 <th>#</th>
                 <th>รหัส</th>
                 <th>ชื่อส่วน</th>
                 <th>สังกัด</th>
                 <th>จัดการข้อมูล</th>
                
                 
               </tr>

               </thead>

                      <?php
                       include_once 'config/connect.php';
                      // mysql_query("SET character_set_results=utf8");
                        $sql = "SELECT * FROM `tbl_part` JOIN tbl_division ON tbl_part.division_ref=tbl_division.division_code ";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                           //echo "<table><tr><th>ID</th><th>Name</th></tr>";
                           // output data of each row
                             while($row = $result->fetch_assoc()) {
                               $id_edit = $row["part_id"];
                               
                             echo "<tr><td>"
                            // .$row["id"]."</td><td>"
                             .$row["part_id"]."</td><td>"
                             .$row["part_code"]."</td><td>"
                             .$row["part_name"]."</td><td>"
                             .$row["division_name"]."</td>"
                             
                             
                             ?>
                            <td> 

                            <button onclick="window.location.href='#'"  data-placement="top" data-toggle="tooltip" title="ดูรายละเอียดข้อมูล" class="btn btn-info btn-sm veiw"><span class="fas fa-eye" aria-hidden="true"></span></button>
                            <button  id="<?=$row["part_id"];?>" data-placement="top" data-toggle="tooltip" title="แก้ไขข้อมูล" class="btn btn-primary btn-sm edit"><span class="fas fa-user-edit" aria-hidden="true"></span></button>
                            <button  id="<?=$row["part_id"];?>" name="<?=$row["part_name"];?>" data-placement="top" data-toggle="tooltip" title="ลบ"  class="btn btn-danger btn-sm delete"><span class="fas fa-trash-alt" aria-hidden="true"></span></button>

                             </td>
                           </tr>
                        <?php  
                         } 
                         ?>
                              
                                
</tbody>
              
               
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
                  $('#part_form')[0].reset();
                  $('.modal-title').text("เพิ่มข้อมูล");
                  $('#action').val("Add");
                  $('#operation').val("Add");
          });

          $(document).on('submit', '#part_form', function(event){
            event.preventDefault();

              $.ajax({
                url:"database/db_part_add_update.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,                             
                processData:false,
                success:function(data)
                {
                  //alert(data);
                  $('#part_form')[0].reset();
                  $('#dataModal').modal('hide');
                  Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: "บันทึกสำเร็จ",
                    showConfirmButton: false,
                    timer: 1500
                    }).then((result) => {
                         window.location.replace("?page=PartList");
                     })
                 
                }
              });
          
         });


      $(document).on('click', '.edit', function(){
          var part_id = $(this).attr("id");
         // var divisionObject = $('#division_ref');
        $.ajax({
                url:"database/db_part_fine.php",
                method:"POST",
                data:{part_id:part_id},
                dataType:"json",
                success:function(data)
                               {
                                    $('#part_id').val(data.part_id);
                                    $('#part_code').val(data.part_code);
                                    $('#part_name').val(data.part_name);
                                    $("#division_ref option:selected").val(data.division_ref).text(data.division_name);
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
                                url:"database/db_part_delete.php",
                                method:"POST",
                                data:{id_delete:id_delete},
                                success:function(data)
                                    {
                                      //alert(data);
                                      Swal.fire(
                                            'ลบข้อมูลสำเร็จ!',
                                            data +'ลบข้อมูล ส่วน!'+name,
                                            'success'
                                        ).then((result) => {
                                           window.location.replace("?page=PartList");
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
            <h4 class="modal-title">เพิ่มข้อมูลส่วนงาน</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
      </div>
      <div class="modal-body">

          <!-- form -->
	        <form  method="post" id="part_form" enctype="multipart/form-data">
               
              
            <div class="row">
                    <!-- text input -->
                    <div class="col-sm-6">
                          <div class="form-group">
                              <label>รหัส ส่วน</label>
                              <input type="text" name="part_code" id="part_code" class="form-control" placeholder="Enter รหัส สำนัก/กอง" required >
                          </div>
                        </div>
                        <!-- text input -->
                    <div class="col-sm-6">
                          <div class="form-group">
                            <label>ชื่อ ส่วน</label>
                            <input type="text" name="part_name" id="part_name" class="form-control" placeholder="Enter ชื่อ สำนัก/กอง" required >
                          </div>
                        </div>
             </div>
             <div class="row">

                <?php
                    include('config/connect.php');
                    $sql = "SELECT * FROM tbl_division";
                    $query = mysqli_query($conn, $sql);
                 ?>
                    <div class="col-sm-12">
                          <div class="form-group">
                              <label for="division">สังกัด สำนัก/กอง</label>
                              <select name="division_ref" id="division_ref" class="form-control">
                                    <option value="">เลือก สำนัก/กอง</option>
                                      <?php while($result = mysqli_fetch_assoc($query)): ?>
                                        <option value="<?=$result['division_code']?>"><?=$result['division_name']?></option>
                                    <?php endwhile; ?>
                                </select>
                          </div>
                        </div>
                        <?php mysqli_close($conn); ?>
           
		         </div>


        <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="hidden" name="part_id" id="part_id"  />
              <input type="hidden" name="operation" id="operation" />
              <input   type="submit" name="action" id="action" class="btn btn-success"  value = "เพิ่มข้อมูล" /> 
              
            </div>

      </form>  <!-- / form -->
	</div>
	
	</div>
</div>
<!-- / Modal -->

