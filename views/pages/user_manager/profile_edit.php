 <!-- SQL QUERY PROCESS -->
 <?php
    $edit_id = $_GET['user_id'];
          include_once 'config/connect.php';
          $sql1 = "SELECT * FROM user_login WHERE id='$edit_id'";
                                                                                       
          $result1 = $conn->query($sql1);
              if ($result1->num_rows > 0) {
                  while($row = $result1->fetch_assoc()) {     
?>
<!-- /SQL QUERY PROCESS -->
<!-- <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="img_name" required class="form-control" placeholder="ชื่อภาพ"> <br>
            <font color="red">*อัพโหลดได้เฉพาะ .jpeg , .jpg , .png </font>
        <input type="file" name="img_file" required   class="form-control" accept="image/jpeg, image/png, image/jpg"> <br>
        <button type="submit" class="btn btn-primary">Upload</button>
</form> -->



    <div class="row">
        <div class="col-sm-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-address-card">แก้ไขข้อมูลผู้ใช้งานระบบ</i></h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="row">
                         
                                <div class="mx-auto">
                                    <div class="d-flex justify-content-center align-items-center rounded">
                                        <img src="profile_img/<?php echo  $row["img"]; ?>" 
                                        id="previewImg" 
                                        class="avatar img-thumbnail" 
                                        alt="avatar">
                                    </div>

                                </div>
                                <div class="mx-auto mt-2">
                                    <div class="d-flex justify-content-center align-items-center rounded">
                                      <form action="database/img_profile_update.php" method="post" id="img_form"  enctype="multipart/form-data">
                                                <label class="btn btn-primary btn-block">
                                                    <i class="fa fa-fw fa-camera" ></i>
                                                    <span>Change Photo</span>
                                                    <input type="file" name="img_file" id="img_file" class="file-upload-personnel" onchange="loadFile(event)" accept="image/jpeg, image/png, image/jpg" style="display: none;">
                                                </label>
                                        
                                        
                                    </div>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                    </form> 
                                </div>
                            </div>
                        </div>
                        <script>
                                var loadFile = function(event) {
                                        var reader = new FileReader();
                                        reader.onload = function(){
                                        var output = document.getElementById('previewImg');      
                                        output.src = reader.result;
                                      
                                        };
                                        reader.readAsDataURL(event.target.files[0]);
                                };
                        </script>
                        
                        <!-- /.col -->

                                           <!-- SQL QUERY PROCESS -->
                                              
                                            <!-- /SQL QUERY PROCESS -->
        <form id="user_form" method="POST" action="database/api_profile_update.php" enctype="multipart/form-data">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="user_prefix">คำนำหน้า</label>
                                                    <select name="user_prefix" id="user_prefix" class="custom-select" required >
                                                        <option selected="selected" value="<?php echo  $row["prefix"]; ?>"><?php echo  $row["prefix"]; ?></option>
                                                        <option value="นาย">นาย</option>
                                                        <option value="นาง">นาง</option>
                                                        <option value="นางสาว">นางสาว</option>
                                                        <option value="ว่าที่ ร้อยตรี">ว่าที่ ร้อยตรี</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="user_fname">ชื่อ</label>
                                                        <!-- ซ่อน ID Edit -->
                                                    <input type="hidden" name="user_id" id="user_id" value="<?php echo  $row["id"]; ?>" />

                                                    <input type="text" name="user_fname" id="user_fname" value="<?php echo  $row["firstname"]; ?>" class="form-control" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="user_lname">นามสกุล</label>
                                                    <input type="text" name="user_lname" id="user_lname" value="<?php echo  $row["lastname"]; ?>" class="form-control" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="user_position">ตำแหน่ง</label>
                                                    <input type="text" name="user_position" id="user_position" value="<?php echo  $row["position"]; ?>" class="form-control" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

            
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">เบอร์โทรศัพท์</label>
                                                    <input class="form-control"  name="tel" type="text" value="<?php echo  $row["tel"]; ?>" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h3 class="mgbt-xs-15">บัญชีผู้เข้าใช้งานระบบ</h3>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="user_email">Email address</label>
                                                <input type="text" name="user_email" id="user_email" value="<?php echo  $row["email"]; ?>" class="form-control" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="username">User Level</label>
                                                    <input type="text" name="user_level" id="user_level" value="####" class="form-control" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                    <input type="text" name="username" id="username" value="<?php echo  $row["username"]; ?>" class="form-control" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="user_pass">รหัสผ่าน</label>
                                                <input class="form-control" id="password" name="password" type="password"  value="<?php echo  $row["username"]; ?>">
                                                <span id="error_password"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Confirm <span class="d-none d-xl-inline">รหัสผ่าน(อีกครั้ง)</span></label>
                                                <input class="form-control" id="user_re_enter_password" name="re_user_pass" type="password" value="<?php echo  $row["username"]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                             <h3 class="mgbt-xs-15">สังกัด</h3>
                            <div class="row">        
                                    <div class="col-md-1"></div>
                                            <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <!-- text input สำนัก/กอง -->
                                                            <?php
                                                                    include('config/connect.php');
                                                                    $sql = "SELECT * FROM tbl_division";
                                                                    $query = mysqli_query($conn, $sql);
                                                                ?>

                                                                <label for="division_ref">กอง/สำนัก</label>
                                                                    <select class="form-control" name="division_ref" id="division_ref">
                                                                    <option value="">สำนัก/กอง</option> 
                                                                
                                                                    
                                                                    <option selected="selected" value="<?php echo  $row["division"]; ?>"><?php echo  $row["division"]; ?></option>
                                                                    

                                                                        <?php while($result = mysqli_fetch_assoc($query)): ?>
                                                                            <option value="<?=$result['division_code']?>"><?=$result['division_name']?></option>
                                                                        <?php endwhile; ?>
                                                                    </select>

                                                                    <?php mysqli_close($conn); ?>
                                                                <!-- text input สำนัก/กอง -->
                                                            </div>
                                                        </div>

                                                        <!-- text input ส่วน -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                    <label for="part_ref">ส่วน</label>
                                                                    <select name="part_ref" id="part_ref" class="form-control">
                                                                    <option value="">เลือกส่วน</option>
                                                                    <option selected="selected" value="<?php echo  $row["part"]; ?>"><?php echo  $row["part"]; ?></option>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                        <!-- /text input ส่วน -->

                                            </div>
                                    </div>
     
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-9">
                                         
                                                <!-- text input ฝ่าย -->
                                               
                                                <div class="form-group">
                                                        <label for="subdivision_ref">ฝ่าย</label>
                                                        <select name="subdivision_ref" id="subdivision_ref" class="form-control">
                                                        <option value="">เลือกฝ่าย</option>
                                                        <option selected="selected" value="<?php echo  $row["subdivision"]; ?>"><?php echo  $row["subdivision"]; ?></option>
                                                        </select>
                                                </div>
                                                   
                                                <!-- /text input ฝ่าย -->
                                    
                                            <!-- /text input งาน -->
                                                <div class="form-group">
                                                    <label for="section_ref">งาน</label>
                                                        <select  name="section_ref" id="section_ref" class="form-control">
                                                            <option value="">เลือกงาน</option>
                                                            <option selected="selected" value="<?php echo  $row["section"]; ?>"><?php echo  $row["section"]; ?></option>
                                                        </select>
                                                </div>
                                            <!-- /text input งาน -->
                                         <hr>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                <button class="btn btn-success" id="save_user" type="submit"><i class="fa fa-save fa-fw"></i>บันทึกข้อมูล</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</form>

 <!-- ######### PHP CLOSE SQL QUERY ############# -->
 <?php
                                                                                        
         } 
     }

?>
                                                                            <!-- ######### PHP CLOSE SQL QUERY ############# -->



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


<!-- sent data too update to Data  SCRIPT -->
<!-- <script type="text/javascript" language="javascript" >
$(document).on('submit', '#user_form', function(event){
            event.preventDefault();
              $.ajax({
                url:"database/api_profile_update.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                  //alert(data);
                  $('#user_form')[0].reset();
                  $('#dataModal').modal('hide');
                  Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'เพิ่มข้อมูล'+ data +'สำเร็จ',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  //dataTable.ajax.reload();
                  window.location.replace("?page=UserManager");
                }
              });
          
         });
</script> -->
<!-- /sent data too update to Data  SCRIPT -->