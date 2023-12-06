<!-- SELECT * FROM `tbl_part` JOIN tbl_division ON tbl_part.divison_ref=tbl_division.part_code -->
<button type="button" id="add_button" data-toggle="modal" data-target="#dataModal" class="btn btn-info btn-lg">เพิ่มข้อมูล</button>
           
           <!-- /.card-header -->
           <div class="card-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <!-- <th>ลำดับที่</th> -->
                 <th>ลำดับ</th>
                 <th>รหัส</th>
                 <th>ชื่อสายงาน</th>
                 <th>สังกัดฝ่าย</th>
                 <th>สังกัดส่วน</th>
                 <th>สังกัดสำนัก/กอง</th>
                 <th>จัดการข้อมูล</th>
                
                 
               </tr>

               </thead>

                      <?php
                       include_once 'config/connect.php';
                      // mysql_query("SET character_set_results=utf8");
                        $sql = "SELECT `work_id`,`work_code`,`work_name`,`subdivision_name`, `part_name`,`division_name`
                        FROM tbl_work 
                        JOIN tbl_subdivision ON tbl_work.subdivision_ref =tbl_subdivision.subdivision_code 
                        JOIN tbl_part ON tbl_work.part_ref =tbl_part.part_code 
                        JOIN tbl_division ON tbl_work.division_ref=tbl_division.division_code";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                           //echo "<table><tr><th>ID</th><th>Name</th></tr>";
                           // output data of each row
                             while($row = $result->fetch_assoc()) {
                               $id_edit = $row["work_id"]; ?>
                               
                          <tr>
                         <?php
                          echo "<td>"
                            // .$row["id"]."</td><td>"
                             .$row["work_id"]."</td><td>"
                             .$row["work_code"]."</td><td>"
                             .$row["work_name"]."</td><td>"
                             .$row["subdivision_name"]."</td><td>"
                             .$row["part_name"]."</td><td>"
                             .$row["division_name"]."</td>"
                            ?>

                            <td> 

                               <button onclick="window.location.href='#'"  data-placement="top" data-toggle="tooltip" title="ดูรายละเอียดข้อมูล" class="btn btn-info btn-sm veiw"><span class="fas fa-eye" aria-hidden="true"></span></button>
                               <button  id="<?=$row["work_id"];?>" data-placement="top" data-toggle="tooltip" title="แก้ไขข้อมูล" class="btn btn-primary btn-sm edit"><span class="fas fa-user-edit" aria-hidden="true"></span></button>
                               <button  id="<?=$row["work_id"];?>" name="<?=$row["work_name"];?>" data-placement="top" data-toggle="tooltip" title="ลบ"  class="btn btn-danger btn-sm delete"><span class="fas fa-trash-alt" aria-hidden="true"></span></button>
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


});

   
</script>
<!-- /DropDownList SCRIPT -->



<!-- AJAX DELET SCRIPT -->

<script type="text/javascript" language="javascript" >

        $('#add_button').click(function(){
                  $('#work_form')[0].reset();
                  $('.modal-title').text("เพิ่มข้อมูลงาน");
                  $('#action').val("Add");
                  $('#operation').val("Add");
          });


          $(document).on('submit', '#work_form', function(event){
            event.preventDefault();

              $.ajax({
                url:"database/api_work_add_update.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,                             
                processData:false,
                success:function(data)
                {
                  //alert(data);
                  $('#work_form')[0].reset();
                  $('#dataModal').modal('hide');
                  Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: "บันทึกสำเร็จ",
                    showConfirmButton: false,
                    timer: 1500
                    }).then((result) => {
                         //window.location.replace("?page=workList");
                         window.location.reload();
                     })
                 
                }
              });
          
         });



      $(document).on('click', '.edit', function(){
          var work_id = $(this).attr("id");
         // var divisionObject = $('#division_ref');
        $.ajax({
                url:"database/api_work_fine.php",
                method:"POST",
                data:{work_id:work_id},
                dataType:"json",
                success:function(data)
                               {
                                    //ส่วนข้อมูลที่ Respone
                                    $('.modal-title').text("แก้ไขข้อมูล");
                                    $('#work_id').val(data.work_id);
                                    $('#work_code').val(data.work_code);
                                    $('#work_name').val(data.work_name);
                                   
                                    
                                    $("#division_ref option:selected").val(data.division_ref).text(data.division_name);
                                    $("#part_ref option:selected").val(data.part_ref).text(data.part_name);
                                    $("#subdivision_ref option:selected").val(data.subdivision_ref).text(data.subdivision_name);

                                  
                                    //ส่วนข้อมูลที่ ที่ส่งต่อ
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
                                url:"database/api_work_delete.php",
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
                                           //.window.location.replace("?page=workList");
                                           window.location.reload();
                                           })
                 
                                    }
                              });
                          }
        
                      })
          	});
	
</script>
<!--  AJAX DELET SCRIPT -->


<!-- Modal -->

<div id="dataModal" class="modal fade">
	<div class="modal-dialog modal-xl">

      <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">เพิ่มข้อมูลงาน</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
      </div>
      <div class="modal-body">

          <!-- form -->
	        <form  method="post" id="work_form" enctype="multipart/form-data">
               
              
            <div class="row">
                    <!-- text input -->
                    <div class="col-sm-6">
                          <div class="form-group">
                              <label>รหัสงาน</label>
                              <input type="text" name="work_code" id="work_code" class="form-control" placeholder="Enter รหัส งาน" required >
                          </div>
                        </div>
                        <!-- text input -->
                    <div class="col-sm-6">
                          <div class="form-group">
                            <label>ชื่องาน</label>
                            <input type="text" name="work_name" id="work_name" class="form-control" placeholder="Enter ชื่อ งาน" required >
                          </div>
                        </div>
             </div>

             <!-- text input สำนัก/กอง -->
             <div class="row">
                      <?php
                          include('config/connect.php');
                          $sql = "SELECT * FROM tbl_division";
                          $query = mysqli_query($conn, $sql);
                      ?>

                  
                    <div class="col-sm-4">
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

                    <!-- //text input สำนัก/กอง -->
                     
                     <!-- text input ส่วน -->
                     <div class="col-sm-4">
                    <div class="form-group">
                            <label for="part_ref">ส่วน</label>
                            <select name="part_ref" id="part_ref" class="form-control">
                            <option value="">เลือกส่วน</option>
                            </select>
                          </div>
                        </div>
                       <!-- /text input ส่วน -->

                    
                    <!-- text input ฝ่าย -->
                    <div class="col-sm-4">
                    <div class="form-group">
                            <label for="subdivision_ref">ฝ่าย</label>
                            <select name="subdivision_ref" id="subdivision_ref" class="form-control">
                            <option value="">เลือกฝ่าย</option>
                            </select>
                          </div>
                        </div>
                    <!-- /text input ฝ่าย -->
           
           
		</div>


        <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="text" name="work_id" id="work_id"  />
              <input type="hidden" name="operation" id="operation" />
              <input type="submit" name="action" id="action" class="btn btn-success"  value = "เพิ่มข้อมูล" /> 
              
            </div>

      </form>  <!-- / form -->
	</div>
	
	</div>
</div>
<!-- / Modal -->





<!-- DropDownList SCRIPT -->
<script type="text/javascript" language="javascript" >

  //เลือกสำนักกอง

    // $(document).ready(function() {
    //   var divisionObject = $('#division_ref');
    //     $('#division_ref').click(function() {
    //       $.get('database/db_get_division2.php, function(data1){
    //               var result0 = JSON.parse(data0);
    //               $.each(result0, function(index0, item0){
    //                 divisionObject.append(
    //                       $('<option></option>').val(item0.division_code).html(item0.division_name)
    //                   );
    //               });
    //           });
    //     });
   



  //เลือกส่วน
$(function(){
      // ปรกาศค่าตัวแปล Dropdown
    var divisionObject = $('#division_ref');
    var partObject = $('#part_ref');
    var subdivisionObject = $('#subdivision_ref');
            
            // on change division
          divisionObject.on('change', function(){
              var divisionCode = $(this).val();
              partObject.html('<option value="">-กรุณาเลือกส่วน-</option>');
             // subdivisionObject.html('<option value="">-กรุณาเลือกฝ่าย-</option>');
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

//เลือกฝ่าย

$(function(){
      // ปรกาศค่าตัวแปล Dropdown
   // var divisionObject = $('#division_ref');
    var partObject = $('#part_ref');
    var subdivisionObject = $('#subdivision_ref');
            
            // on change division
            partObject.on('change', function(){
              var PartCode = $(this).val();
      
              subdivisionObject.html('<option value="">-กรุณาเลือกฝ่าย-</option>');
              $.get('database/db_get_subdivision.php?part_ref='+ PartCode, function(data2){
                //window.alert(data2);
                  var result2 = JSON.parse(data2);
                  
                  $.each(result2, function(index2, item2){
                    subdivisionObject.append(
                          $('<option></option>').val(item2.subdivision_code).html(item2.subdivision_name)
                      );
                  });
              });
          });

           
});



   
</script>
<!-- /DropDownList SCRIPT -->