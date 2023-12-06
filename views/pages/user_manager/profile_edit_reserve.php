<form id="form_user" method="POST" enctype="multipart/form-data">
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
                                        <input type="hidden" name="user_img" value="<?= $rs_user->profile_img ?>">
                                        <img src="../../uploads/user_img/<?= $rs_user->profile_img ?>" class="avatar img-thumbnail" alt="avatar">
                                    </div>
                                </div>
                                <div class="mx-auto mt-2">
                                    <div class="d-flex justify-content-center align-items-center rounded">
                                        <label class="btn btn-primary btn-block">
                                            <i class="fa fa-fw fa-camera"></i>
                                            <span>Change Photo</span>
                                            <input type="file" name="image_profile" id="image_profile" class="file-upload-personnel" style="display: none;">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="user_prefix">คำนำหน้า</label>
                                                    <select name="user_prefix" id="user_prefix" class="custom-select" required >
                                                        <option value="นาย">นาย</option>
                                                        <option value="นาง">นาง</option>
                                                        <option value="นางสาว">นางสาว</option>
                                                        <option value="ว่าที่ ร้อยตรี">ว่าที่ ร้อยตรี</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="user_fname">ชื่อ</label>
                                                    <input type="hidden" name="user_id" id="user_id" value="" />
                                                    <input type="text" name="user_fname" id="user_fname" value="" class="form-control" required />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="user_lname">นามสกุล</label>
                                                    <input type="text" name="user_lname" id="user_lname" value="" class="form-control" required />
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
                                                    <input type="text" name="user_position" id="user_position" value="" class="form-control" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                                        </select>
                                                    </div>
                                                   
                                                <!-- /text input ฝ่าย -->
                                    
                                            <!-- /text input งาน -->
                                            <div class="form-group">
                                                <label for="section_ref">งาน</label>
                                                    <select  name="section_ref" id="section_ref" class="form-control">
                                                    <option value="">เลือกงาน</option>
                                                    </select>
                                            </div>
                                            <!-- /text input งาน -->
                                       

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
                                                    <input class="form-control" type="text" value="555" name="user_tel">
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
                                                <input type="text" name="user_email" id="user_email" value="6666" class="form-control" required />
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
                                                    <input type="text" name="username" id="username" value="7777" class="form-control" required />
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
                                                <input class="form-control" id="user_new_password" name="user_pass" type="password" placeholder="********">
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
                                                <input class="form-control" id="user_re_enter_password" name="re_user_pass" type="password" placeholder="********">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                <button class="btn btn-success" id="save_user" type="submit"><i class="fa fa-save fa-fw"></i>บันทึกข้อมูล</button>
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

<div class="modal fade" id="modal-permissions">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><i class="far fa-address-card"> การกำหนดสิทธิ์การเข้าใช้งานระบบ</i></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <dl class="row">
                <dt class="col-sm-4">Admin</dt>
                <dd class="col-sm-8">ผู้ดูและระบบ ควบคุมกำกับกดูแลระบบ สามารถบริหารจัดการข้อมูลต่างๆ ในระบบได้</dd>
                <dt class="col-sm-4">Boss</dt>
                <dd class="col-sm-8">ผู้บริหาร สถานะผู้ใช้งานระดับหัวหน้าหน่วยงาน องค์กร สามารถดูสถานะข้อมูล รายงานส่วนอื่นๆ ในระบบ แต่ไม่สามารถแก้ไขหรือจัดการข้อมูลได้</dd>
                <dd class="col-sm-8 offset-sm-4">*หมายเหตุ การจัดการข้อมูลบางส่วนที่ได้รับอนุญาติ ตามระดับสิทธิ์การใช้งาน</dd>
                <dt class="col-sm-4">Ewployes</dt>
                <dd class="col-sm-8">บุคลากร/เจ้าหน้าที่ ที่เกียวข้องสามารถบริหารจัดการข้อมูลต่างๆ ในระบบได้ ดูสถานะข้อมูล รายงานส่วนอื่นๆ ในระบบ</dd>
                <dt class="col-sm-4">Staff</dt>
                <dd class="col-sm-8">พนักงาน ที่มีหน้าที่ได้รับมอบหมายจากผู้บริหาร สามารถบริหารจัดการข้อมูลต่างๆ ในระบบได้ ดูสถานะข้อมูล รายงานส่วนอื่นๆ ในระบบตามระดับสิทธิ์การใช้งาน </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->






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
