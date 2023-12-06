<button type="button" id="add_button" data-toggle="modal" data-target="#dataModal" class="btn btn-info btn-lg">เพิ่มข้อมูล</button>
           
           <!-- /.card-header -->
           <div class="card-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <!-- <th>ลำดับที่</th> -->
                 <th>#</th>
                 <th>รหัสฝ่าย</th>
                 <th>ชื่อฝ่าย</th>
                 <th>ส่วน</th>
                 <th>สังกัด สำนัก/กอง</th>
                 <th>จัดการข้อมูล</th> 
               </tr>

               </thead>

                      <?php
                       include_once 'config/connect.php';
                      // mysql_query("SET character_set_results=utf8");
                        $sql = "SELECT * FROM tbl_subdivision 
                        JOIN  tbl_part ON tbl_subdivision.part_ref = tbl_part.part_code
                        JOIN  tbl_division ON tbl_subdivision.division_ref=tbl_division.division_code";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                           //echo "<table><tr><th>ID</th><th>Name</th></tr>";
                           // output data of each row
                             while($row = $result->fetch_assoc()) {
                                $id_edit = $row["subdivision_id"];
                               
                             echo "<tr><td>"
                            // .$row["id"]."</td><td>"
                             .$row["subdivision_id"]."</td><td>"
                             .$row["subdivision_code"]."</td><td>"
                             .$row["subdivision_name"]."</td><td>" 
                             .$row["part_name"]."</td><td>"
                             .$row["division_name"]."</td>"
                             ?>
                            <td> 

                            <button onclick="window.location.href='#'"  data-placement="top" data-toggle="tooltip" title="ดูรายละเอียดข้อมูล" class="btn btn-info btn-sm veiw"><span class="fas fa-eye" aria-hidden="true"></span></button>
                            <button  id="<?=$row["subdivision_id"];?>" data-placement="top" data-toggle="tooltip" title="แก้ไขข้อมูล" class="btn btn-primary btn-sm edit"><span class="fas fa-user-edit" aria-hidden="true"></span></button>
                            <button  id="<?=$row["subdivision_id"];?>" name="<?=$row["subdivision_name"];?>" data-placement="top" data-toggle="tooltip" title="ลบ"  class="btn btn-danger btn-sm delete"><span class="fas fa-trash-alt" aria-hidden="true"></span></button>

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
                  $('#data_form')[0].reset();
                  $('.modal-title').text("เพิ่มข้อมูล");
                  $('#action').val("Add");
                  $('#operation').val("Add");
          });

$(document).on('submit', '#data_form', function(event){
            event.preventDefault();

              $.ajax({
                url:"database/db_subdivision_add_update.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,                             
                processData:false,
                success:function(data)
                {
                  //alert(data);
                  $('#data_form')[0].reset();
                  $('#dataModal').modal('hide');
                  Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'เพิ่มข้อมูล'+ data +'สำเร็จ',
                    showConfirmButton: false,
                   timer: 1500
                    }).then((result) => {
                         window.location.replace("?page=SubDivisionList");
                     })
                 
                }
              });
          
         });



$(document).on('click', '.delete', function(){
               var id_delete = $(this).attr("id");
       var doc_topic = $(this).attr("name");
               //if(confirm("แน่ใจไหมว่าต้องการลบผู้ใช้รายนี้?")){
               Swal.fire({
                       title: 'คำเตือน',
                           text:  "คุณแน่ใจไหมว่าต้องการที่จะลบรายการ?  =>"+ doc_topic,
                           icon: 'warning',
                           showCancelButton: true,
                           confirmButtonColor: '#3085d6',
                           cancelButtonColor: '#d33',
                           confirmButtonText: 'ใช่, ต้องการจะลบ!'
                 }).then((result) => {
                   if (result.isConfirmed) {
                             $.ajax({
                               url:"database/db_subdivision_delete.php",
                               method:"POST",
                               data:{id_delete:id_delete},
                               success:function(data)
                                   {
                                     //alert(data);
                                     Swal.fire(
                                           'Good job!',
                                           data +'You clicked the button!',
                                           'success'
                                       );
                                       window.location.replace("?page=SubDivisionList");
                                   }
                             });
                         }
       
                     })
             });
  

$(document).on('click', '.edit', function(){
          var fine_id = $(this).attr("id");
         // var divisionObject = $('#division_ref');
        $.ajax({
                url:"database/db_subdivision_fine.php",
                method:"POST",
                data:{fine_id:fine_id},
                dataType:"json",
                success:function(data)
                               {
                                    $('#subdivision_id').val(data.subdivision_id);
                                    $('#subdivision_code').val(data.subdivision_code);
                                    $('#subdivision_name').val(data.subdivision_name);
                                    
                                    //$("#division_ref").empty();
                                    //$("#division_ref").append("<option value='" + data.division_code +"'>" + data.division_name + "</option>");
                                   // $('#division_ref').append($('<option>').text(data.division_name).attr('value', data.division_code));
                                   // $('#division_ref').text(data.division_name).val( data.division_code).prop('selected', true);
                                    //$('#division_ref').append(new Option(data.division_name, data.division_code));
                                    $('#action').val("Save changes");
				                          	$('#operation').val("Update");
                                    $('#dataModal').modal('show');
                               }
          })
            
     });

</script>
<!-- /AJAX DELET SCRIPT -->



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
	        <form  method="post" id="data_form" enctype="multipart/form-data">
               
              
            <div class="row">
                    <!-- text input -->
                    <div class="col-sm-6">
                          <div class="form-group">
                              <label>รหัสฝ่าย</label>
                              <input type="text" name="subdivision_code" id="subdivision_code" class="form-control" placeholder="SD-XXX" required >
                          </div>
                        </div>
                        <!-- text input -->
                    <div class="col-sm-6">
                          <div class="form-group">
                            <label>ชื่อฝ่าย</label>
                            <input type="text" name="subdivision_name" id="subdivision_name" class="form-control" placeholder="Enter ชื่อ สำนัก/กอง" required >
                          </div>
                        </div>
             </div>
             <div class="row">
           
                <?php
                    include('config/connect.php');
                    $sql = "SELECT * FROM tbl_division";
                    $query = mysqli_query($conn, $sql);
                 ?>
                    <div class="col-sm-6">
                          <div class="form-group">
                              <label for="division">สังกัด สำนัก/กอง</label>
                              <select name="division_ref" id="division_ref" class="form-control" required>
                                     <option value="">เลือก สำนัก/กอง</option> 
                                      <?php while($result = mysqli_fetch_assoc($query)): ?>
                                        <option value="<?=$result['division_code']?>"><?=$result['division_name']?></option>
                                    <?php endwhile; ?>
                                </select>
                          </div>
                        </div>
                        <?php mysqli_close($conn); ?>
                         <!-- text input สำนัก/กอง -->
                     
                     <!-- text input ส่วน -->
                     <div class="col-sm-6">
                    <div class="form-group">
                            <label for="part_ref">ส่วน</label>
                            <select name="part_ref" id="part_ref" class="form-control">
                            <option value="">เลือกส่วน</option>
                            </select>
                          </div>
                        </div>
                       <!-- /text input ส่วน -->

           
		</div>


        <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="text" name="subdivision_id" id="subdivision_id"  />
              <input type="hidden" name="operation" id="operation" />
              <input   type="submit" name="action" id="action" class="btn btn-success"  value = "เพิ่มข้อมูล" /> 
              
            </div>

      </form>  <!-- / form -->
	</div>
	
	</div>
</div>
<!-- / Modal -->




<!-- DropDownList SCRIPT -->
<script type="text/javascript" language="javascript" >
$(function(){
      // ปรกาศค่าตัวแปล Dropdown
    var divisionObject = $('#division_ref');
    var partObject = $('#part_ref');
    var subdivisionObject = $('#subdivision_ref');
            
            // on change division
          divisionObject.on('change', function(){
              var divisionCode = $(this).val();

              partObject.html('<option value="">-กรุณาเลือกส่วน-</option>');
              subdivisionObject.html('<option value="">-กรุณาเลือกฝ่าย-</option>');

              $.get('database/db_get_part.php?division_ref='+ divisionCode, function(data1){
                  var result1 = JSON.parse(data1);
                  $.each(result1, function(index, item){
                    partObject.append(
                          $('<option></option>').val(item.part_code).html(item.part_name)
                      );
                  });
              });
          });

           
});

   
</script>
<!-- /DropDownList SCRIPT -->

