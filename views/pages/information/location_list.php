<button type="button" id="add_button" data-toggle="modal" data-target="#dataModal" class="btn btn-info btn-lg">เพิ่มข้อมูล</button>
           
           <!-- /.card-header -->
           <div class="card-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <!-- <th>ลำดับที่</th> -->
                 <th>#</th>
                 <th>รหัสงาน</th>
                 <th>สังกัดงาน</th>
                 <th>รายละเอียดงาน</th>
                 <th>LAT</th>
                 <th>LNG</th>
                 <th>สังกัดฝ่าย</th>
                 <th>สังกัดส่วน</th>
                 <th>สำนัก/กอง</th>
                 <th>จัดการข้อมูล</th>
                
                 
               </tr>

               </thead>

                      <?php
                       include_once 'config/connect.php';
                      // mysql_query("SET character_set_results=utf8");
                       $sql =  "SELECT * FROM tbl_location 
                                JOIN tbl_division on tbl_location.division_ref = tbl_division.division_code
                                JOIN tbl_part on tbl_location.part_ref = tbl_part.part_code
                                JOIN tbl_subdivision on tbl_location.subdivision_ref = tbl_subdivision.subdivision_code";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                           //echo "<table><tr><th>ID</th><th>Name</th></tr>";
                           // output data of each row
                             while($row = $result->fetch_assoc()) {
                               $id_edit = $row["id"];
                               
                             echo "<tr><td>"
                            // .$row["id"]."</td><td>"
                             .$row["id"]."</td><td>"
                             .$row["location_code"]."</td><td>"
                             .$row["location_name"]."</td><td>"
                             .$row["location_detail"]."</td><td>"
                             .$row["LAT"]."</td><td>"
                             .$row["LNG"]."</td><td>"
                             .$row["subdivision_name"]."</td><td>"
                             .$row["part_name"]."</td><td>"
                             .$row["division_name"]."</td>"
                             
                             
                             ?>
                            <td> 

                            <button onclick="window.location.href='#'"  data-placement="top" data-toggle="tooltip" title="ดูรายละเอียดข้อมูล" class="btn btn-info btn-sm veiw"><span class="fas fa-eye" aria-hidden="true"></span></button>
                            <button  id="<?=$row["location_id"];?>" data-placement="top" data-toggle="tooltip" title="แก้ไขข้อมูล" class="btn btn-primary btn-sm edit"><span class="fas fa-user-edit" aria-hidden="true"></span></button>
                            <button  id="<?=$row["location_id"];?>" name="<?=$row["location_name"];?>" data-placement="top" data-toggle="tooltip" title="ลบ"  class="btn btn-danger btn-sm delete"><span class="fas fa-trash-alt" aria-hidden="true"></span></button>

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
                 <th>รหัสงาน</th>
                 <th>สังกัดงาน</th>
                 <th>รายละเอียดงาน</th>
                 <th>LAT</th>
                 <th>LNG</th>
                 <th>สังกัดฝ่าย</th>
                 <th>สังกัดส่วน</th>
                 <th>สำนัก/กอง</th>
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

  
// $(document).on('submit', '#data_form', function(event){
//             event.preventDefault();
//               $.ajax({
//                 url:"database/api_location_add.php",
//                 method:'POST',
//                 data:new FormData(this),
//                 contentType:false,
//                 processData:false,
//                 success:function(data)
//                 {
//                   //alert(data);
//                   $('#data_form')[0].reset();
//                   $('#dataModal').modal('hide');
//                   Swal.fire({
//                     position: 'top-end',
//                     icon: 'success',
//                     title: 'เพิ่มข้อมูล'+ data +'สำเร็จ',
//                     showConfirmButton: false,
//                     timer: 1500
//                   })
//                   //dataTable.ajax.reload();
//                   window.location.replace("?page=LocationList");
//                 }
//               });
          
//          });



$(document).on('click', '.edit', function(){
          var section_id = $(this).attr("id");
         // var divisionObject = $('#division_ref');
        $.ajax({
                url:"database/api_location_fine.php",
                method:"POST",
                data:{section_id:section_id},
                dataType:"json",
                success:function(data)
                               {
                                    //ส่วนข้อมูลที่ Respone
                                    $('#section_id').val(data.section_id);
                                    $('#section_code').val(data.section_code);
                                    $('#section_name').val(data.section_name);
                                    $('#subdivision_ref').val(data.subdivision_ref);
                                    $("#division_ref option:selected").val(data.division_ref).text(data.division_name);
                                  
                                    //ส่วนข้อมูลที่ ที่ส่งต่อ
                                    $('#action').val("Save changes");
				                          	$('#operation').val("Update");
                                    $('#dataModal').modal('show');
                               }
          })
            
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
                               url:"database/api_location_delete.php",
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
                                       window.location.replace("?page=LocationList");
                                   }
                             });
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
	        <form  method="post" action ="database/api_location_add.php" id="data_form" enctype="multipart/form-data">
               
              
                <div class="row">
                    <!-- text input -->
                    <div class="col-sm-3">
                          <div class="form-group">
                              <label>รหัสสถานที่</label>
                              <input type="text" name="location_code" id="location_code" class="form-control" placeholder="Enter รหัสสถานที่" required >
                          </div>
                        </div>
                        <!-- text input -->
                    <div class="col-sm-9">
                    <div class="form-group">
                            <label>ชื่อสถานที่</label>
                            <input type="text"name="location_name" id="location_name" class="form-control" placeholder="Enter สถานที่" required >
                          </div>
                        </div>
                </div>

                <div class="row">

                 <!-- text input -->
                 <div class="col-sm-8">
                    <div class="form-group">
                            <label>ที่อยู่/รายละเอียด</label>
                            <input type="text"name="location_detail" id="location_detail" class="form-control" placeholder="Enter ที่อยู่" required >
                          </div>
                        </div> 
                    <!-- text input -->
                    <div class="col-sm-2">
                          <div class="form-group">
                              <label>latitude</label>
                              <input type="text" name="LAT" id="LAT"  class="form-control" placeholder="Enter latitude" required >
                          </div>
                        </div>  
            
                    <!-- text input -->
                    <div class="col-sm-2">
                          <div class="form-group">
                              <label>longitude</label>
                              <input type="text"  name="LNG" id="LNG"  class="form-control" placeholder="Enter longitude" required >
                          </div>
                        </div> 
                </div>

                <div class="row">
                      <?php
                          include('config/connect.php');
                          $sql = "SELECT * FROM tbl_division";
                          $query = mysqli_query($conn, $sql);
                      ?>

                    <!-- text input สำนัก/กอง -->
                    <div class="col-sm-6">
                          <div class="form-group">
                              <label for="division_ref">เลือก สำนัก/กอง</label>
                              <select name="division_ref" id="division_ref" class="form-control">
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


                    
                         <!-- text input ฝ่าย -->
                    <div class="col-sm-6">
                    <div class="form-group">
                            <label for="subdivision_ref">ฝ่าย</label>
                            <select name="subdivision_ref" id="subdivision_ref" class="form-control">
                            <option value="">เลือกฝ่าย</option>
                            </select>
                          </div>
                        </div>
                       <!-- /text input ฝ่าย -->

                <!-- /text input งาน -->
                <div class="col-sm-6">
                <div class="form-group">
                      <label for="section_ref">งาน</label>
                          <select  name="section_ref" id="section_ref" class="form-control">
                          <option value="">เลือกงาน</option>
                          </select>
                    </div>
                </div>
                <!-- /text input งาน -->
           </div>
           
      
				</div>
        
				<!-- <div class="modal-footer">
                 <input type="hidden" name="user_id" id="user_id"  />
                <input type="hidden" name="operation" id="operation" />
                <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div> -->

        <div class="modal-footer justify-content-between">
              
              
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="hidden" name="location_id" id="location_id"  />
              <input type="hidden" name="operation" id="operation" />
              <input   type="submit" name="action" id="action" class="btn btn-success"  value = "เพิ่มข้อมูล" /> 
              
            </div>

      </form>  <!-- / form -->
	</div>
	
	</div>
</div>
<!-- / Modal -->




<!-- DropDownList SCRIPT -->
<!-- <script type="text/javascript" language="javascript" >
$(function(){
      // ปรกาศค่าตัวแปล Dropdown
    var divisionObject = $('#division_ref');
    var subdivisionObject = $('#subdivision_ref');
    var locationObject = $('#location_ref');
            // on change division
          divisionObject.on('change', function(){
              var divisionCode = $(this).val();

              subdivisionObject.html('<option value="">เลือกฝ่าย</option>');
            // locationObject.html('<option value="">เลือกงาน</option>');

              $.get('database/api_get_subdivision.php?division_ref='+ divisionCode, function(data){
                  var result = JSON.parse(data);
                  $.each(result, function(index, item){
                      subdivisionObject.append(
                          $('<option></option>').val(item.subdivision_code).html(item.subdivision_name)
                      );
                  });
              });
          });

                     // on change subdivision
        subdivisionObject.on('change', function(){
            var subdivisionCode = $(this).val();

            locationObject.html('<option value="">สถานที่</option>');
            
            $.get('database/api_get_location.php?subdivision_code=' + subdivisionCode, function(data){
                var result = JSON.parse(data);
                $.each(result, function(index, item){
                    locationObject.append(
                        $('<option></option>').val(item.location_id).html(item.location_name)
                    );
                });
            });
        });
});

   
</script> -->
<!-- /DropDownList SCRIPT -->



<!-- DropDownList SCRIPT -->
<script type="text/javascript" language="javascript" >
$(function(){
      // ปรกาศค่าตัวแปล Dropdown
    var divisionObject = $('#division_ref');
    var partObject = $('#part_ref');
    var subdivisionObject = $('#subdivision_ref');
    var SectionObject = $('#section_ref');
            
            // on change division
          divisionObject.on('change', function(){
              var divisionCode = $(this).val();

              partObject.html('<option value="">-กรุณาเลือกส่วน-</option>');
              subdivisionObject.html('<option value="">-กรุณาเลือกฝ่าย-</option>');

              $.get('database/api_get_part.php?division_ref='+ divisionCode, function(data1){
                  var result1 = JSON.parse(data1);
                  $.each(result1, function(index, item){
                    partObject.append(
                          $('<option></option>').val(item.part_code).html(item.part_name)
                      );
                  });
              });
          });

            // on change Part
            partObject.on('change', function(){
            var partCode = $(this).val();

            subdivisionObject.html('<option value="">-กรุณาเลือกฝ่าย-</option>');
            
            $.get('database/api_get_subdivision.php?part_ref='+ '"'+ partCode +'"', function(data2){
                var result2 = JSON.parse(data2);
                $.each(result2, function(index, item){
                  subdivisionObject.append(
                        $('<option></option>').val(item.subdivision_code).html(item.subdivision_name)
                    );
                });
            });
        });

        // on change subdivisionObject
        subdivisionObject.on('change', function(){
            var SectionCode = $(this).val();

            SectionObject.html('<option value="">-กรุณาเลือกงาน-</option>');
            
            $.get('database/api_get_section.php?section_ref='+ '"'+ SectionCode +'"', function(data3){
                var result3 = JSON.parse(data3);
                $.each(result3, function(index, item){
                    SectionObject.append(
                        $('<option></option>').val(item.section_code).html(item.section_name)
                    );
                });
            });
        });


});

   
</script>
<!-- /DropDownList SCRIPT -->
