    
    
    <?php
           $userlevel = $_SESSION["Userlevel"];
           if($userlevel=="Admin"){ ?>

            <button type="button" id="add_button" data-toggle="modal" data-target="#dataModal" class="btn btn-info btn-lg">เพิ่มข้อมูล</button>
            <br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>id</th>
                  <th>firstname</th>
                  <th>lastname</th>
                  <th>username</th>
                  <th>email</th>
                  <th>ตำแหน่ง</th>
                  <th>Telephone No.</th>
                  <th>จัดการข้อมูล</th>
                  
                </tr>

                </thead>
     <tbody>
                       <?php
                         include ('config/connect.php');
                         $sql = "SELECT * FROM admin_login
                         JOIN tbl_positions ON admin_login.position = tbl_positions.position_code 
                         ";
                         $result = $conn->query($sql);
                               //SELECT `id`, `firstname`, `lastname`, `username`, `password`, `email`, `tel`, `user_level` FROM `user_login` WHERE 1
                         if ($result->num_rows > 0) {
                            //echo "<table><tr><th>ID</th><th>Name</th></tr>";
                            // output data of each row
                              while($row = $result->fetch_assoc()) {
                                $id_edit = $row["id"];
                              echo "<tr><td>"
                              .$row["id"]."</td><td>"
                              .$row["firstname"]."</td><td>"
                              .$row["lastname"]."</td><td>"
                              .$row["username"]."</td><td>"
                              .$row["email"]."</td><td>"
                              .$row["position_name"]."</td><td>"
                              .$row["tel"]."</td><td>"
                             
                             
                              ?>

                              
                              <a href="?page=AdminProfile&&user_id=<?php echo $id_edit ?>" data-placement="top" data-toggle="tooltip" title="ดูรายละเอียดข้อมูล" class="btn btn-info btn-sm veiw"><span class="fas fa-eye" aria-hidden="true"></span></a>
                              <button id="<?php echo $id_edit ?>" data-placement="top" data-toggle="tooltip" title="แก้ไขข้อมูล" class="btn btn-primary btn-sm edit"><span class="fas fa-user-edit" aria-hidden="true"></span></button>
                              <button  id="<?=$row["id"];?>"  data-placement="top" data-toggle="tooltip" title="ลบ"  class="btn btn-danger btn-sm delete"><span class="fas fa-trash-alt" aria-hidden="true"></span></button>


                              
                            </tr>
                         <?php  
                          } 
                          ?>
                               
                                 
</tbody>
                <tfoot>
                <tr>
                  <th>id</th>
                  <th>firstname</th>
                  <th>lastname</th>
                  <th>username</th>
                  <th>email</th>
                  <th>ตำแหน่ง</th>
                  <th>Telephone No.</th>
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
    
    <?php }else{  ?>

      <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
      <script>
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'User Level คุณไม่ใช้ Administrator',
              footer: '<a href>Why do I have this issue?</a>'
            })
      </script>

   <?php }  ?>


   
   

   <!-- Modal -->

   <div id="dataModal" class="modal fade">
	<div class="modal-dialog modal-xl">

      <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">เพิ่มผู้ดูแลระบบ</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
      </div>
      <div class="modal-body">

          <!-- form -->
	        <form  method="post" id="user_form" enctype="multipart/form-data">
               
              
                <div class="row">
                    <!-- text input -->
                    <div class="col-sm-6">
                          <div class="form-group">
                              <label>ชื่อ</label>
                              <input type="text" name="user_fname" id="user_fname" class="form-control" placeholder="Enter ชื่อ" required >
                          </div>
                        </div>
                        <!-- text input -->
                    <div class="col-sm-6">
                    <div class="form-group">
                            <label>นามสกุล</label>
                            <input type="text"name="user_lname" id="user_lname" class="form-control" placeholder="Enter นามสกุล" required >
                          </div>
                        </div>
                </div>

                <div class="row">
                    <!-- text input -->
                    <div class="col-sm-6">
                          <div class="form-group">
                              <label>Username</label>
                              <input type="text" name="username" id="username"  class="form-control" placeholder="Enter Username" required >
                          </div>
                        </div>
                        <!-- text input -->
                    
                    <div class="col-6">
                    <div class="form-group">
                            <label>Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input class="form-control" type="password" name="password" id="password" required>
                                <div class="input-group-append">
                                <span class="input-group-text"><a href=""> <i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                                </div>
                              </div>
                                        
                          </div>
                        </div>
                          <script type="text/javascript" language="javascript" >  
                                                $(document).ready(function() {
                              $("#show_hide_password a").on('click', function(event) {
                                  event.preventDefault();
                                  if($('#show_hide_password input').attr("type") == "text"){
                                      $('#show_hide_password input').attr('type', 'password');
                                      $('#show_hide_password i').addClass( "fa-eye-slash" );
                                      $('#show_hide_password i').removeClass( "fa-eye" );
                                  }else if($('#show_hide_password input').attr("type") == "password"){
                                      $('#show_hide_password input').attr('type', 'text');
                                      $('#show_hide_password i').removeClass( "fa-eye-slash" );
                                      $('#show_hide_password i').addClass( "fa-eye" );
                                  }
                              });
                          });   
                          </script>          
                </div>
              
                <div class="row">
                    <!-- text input -->
                    <div class="col-sm-6">
                          <div class="form-group">
                              <label>Email</label>
                              <input type="email"  name="user_email" id="user_email"  class="form-control" placeholder="Enter email" required >
                          </div>
                        </div>
                        <!-- text input -->
                    <div class="col-sm-6">
                         <div class="form-group">
                            <label>ตำแหน่ง</label>
                            <!-- <input type="text" name="user_position" id="user_position" class="form-control" placeholder="Enter ตำแหน่ง" required > -->
                            <select type="text" name="position" id="position" class="form-control"></select>
                          </div>
                        </div>
                   </div>

                   

                <div class="row">
                    <!-- text input -->
                    <div class="col-sm-6">
                          <div class="form-group">
                              <label>หมายเลขโทรศัพท์</label>
                              <input type="text"  name="tel" id="tel"  class="form-control" placeholder="Enter หมายเลขโทรศัพท์" required >
                          </div>
                        </div>
                         <!-- text input -->
                    <!-- <div class="col-sm-6">
                    <div class="form-group">
                            <label>user_level</label>
                            <input type="text"  name="user_level" id="user_level" class="form-control" placeholder="Enter user_level" required>
                          </div>
                        </div> -->
                       
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
              <input type="hidden" name="admin_id" id="admin_id"  />
              <input type="hidden" name="operation" id="operation" />
              <input  type="submit" name="action" id="action" class="btn btn-primary" value="เพิ่มข้อมูล" />
            </div>

      </form>  <!-- / form -->
	</div>
	
	</div>
</div>


<!-- / Modal -->



 
<script type="text/javascript" language="javascript">
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



<script type="text/javascript" language="javascript" >

        $('#add_button').click(function(){
                  $('#user_form')[0].reset();
                  $('.modal-title').text("เพิ่มข้อมูล");
                  $('#user_uploaded_image').html('');
                  $('#action').val("Add");
                  $('#operation').val("Add");
          });



          $(document).on('submit', '#user_form', function(event){
            event.preventDefault();
            // var user_fname    = $('#user_fname').val();
            // var user_lname    = $('#user_lname').val();
            // var username      = $('#username').val();
            // var password      = $('#password').val();
            // var user_email    = $('#user_email').val();
            // var user_level    = $('#user_level').val();
            // var tel           = $('#tel').val();
            // var user_position = $('#user_position').val();
           
          
              $.ajax({
                url:"database/db_admin_insert_change.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                  var responseData = JSON.parse(data);
                  //alert(data);
                  $('#user_form')[0].reset();
                  $('#dataModal').modal('hide');
                  if(responseData && responseData.status && responseData.message && responseData.icon){
                    Swal.fire({
                      position: 'top-end',
                            icon: responseData.icon,
                            title: "success!",
                            //text: responseData.message,
                            showConfirmButton: true
                    //timer: 1500
                    }).then((result) => {
                        // window.location.replace("?page=matirial");
                            window.location.reload();
                   })
                 
                  }
                }


              });
          
         });


      $(document).on('click', '.edit', function(){
          var admin_id = $(this).attr("id");
        $.ajax({
                url:"database/db_admin_fine.php",
                method:"POST",
                data:{admin_id:admin_id},
                dataType:"json",
                success:function(data)
                               {
                                    alert(data.position+"="+ data.position_name);
                                    $('#admin_id').val(data.id);
                                    $('#user_fname').val(data.firstname);
                                    $('#user_lname').val(data.lastname);
                                    $('#username').val(data.username);
                                    $('#password').val(data.password);
                                    $('#user_email').val(data.email);
                                    $('#tel').val(data.tel);
                                   // $('#user_position').val(data.position);
                                    //$("#mat_code option:selected").val(data.mat_code).text(data.mat_name);
                                   // $("#unit_code option:selected").val(data.unit_code).text(data.unit_name);
                                    $("#position option:selected").val(data.position).text(data.position_name);
                                    $('#user_uploaded_image').html(data.img);
                                   // $('#user_img').val(data.img);
                                    $('#action').val("Save changes");
				                          	$('#operation').val("Update");
                                    $('#dataModal').modal('show');
                               }
          })
            
     });


     $(document).on('click', '.delete', function(){
				var id_delete = $(this).attr("id");
				//if(confirm("แน่ใจไหมว่าต้องการลบผู้ใช้รายนี้?")){
				Swal.fire({
					    title: 'คำเตือน',
							text: "คุณแน่ใจไหมว่าต้องการลบผู้ใช้รายนี้?!",
							icon: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'ใช่, ต้องการจะลบ!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                              $.ajax({
                                url:"database/dbS_user_delete.php",
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
                                        //window.location.replace("?page=UserManager");
                                        window.location.reload();
                                    }
                              });
                          }
        
                      })
          	});


            $(function(){
                      // ปรกาศค่าตัวแปล Dropdown
                   
                    var positionObject = $('#position');
                            
                            // on change division
                            positionObject.on('click', function(){
                              $.get('database/db_position_send.php', function(data){
                                  var result = JSON.parse(data);
                                  $.each(result, function(index, item){
                                    positionObject.append(
                                          $('<option></option>').val(item.position_code).html(item.position_name)
                                      );
                                  });
                              });
                          });

                });
	
</script>



