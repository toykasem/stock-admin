<div id="content1">
                             <form role="form" action="" method="post" name="searchform" id="searchform">
                        
                             <div class="row">      
          
                                     <div class="col-md-6">
                                                    <div class="form-group">

                                                                            <label for="province">รายการเอกสาร</label>
                                                                            <select name="doc_id" id="doc_id" class="form-control">
                                                                            <option value="">เลือกหัวข้อ</option>
                                                                            <option value="1">เงินประกันสัญญา</option>
                                                                            <option value="2">หนังสือราชการ(ส่งออก)</option>
                                                                            <option value="3">หนังสือราชการ(รับเข้า)</option>
                                                                            <option value="4">เอกสารตรวจรับงาน</option>
                                                                            <option value="5">บันทึกข้อความ</option>
                                                                            <option value="6">คำสั่งผู้บริหาร</option>
                                                                            <option value="7">คำร้อง</option>
                                                                            <option value="8">ระเบียบ คำสั่ง อื่นๆ</option>
                                                                    </select>
                                                                    <script type="text/javascript">
                                                                        $(function () {
                                                                            $("#doc_id").change(function () {
                                                                                if ($(this).val() == "1") {
                                                                                        $("#content2").show();
                                                                                    
                                                                                }else if($(this).val() == "2") {
                                                                                        $("#table2").show();
                                                                                    
                                                                                }
                                                                            });
                                                                        });
                                                                    </script>
                                                                                
                                                                    </div>
                                                        </div>
                                                

                                                        <div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <label for="province">คำค้น</label>
                                                                   <input type="text" name="FirstName" id="FirstName" class="form-control" placeholder="คำค้นหา!" autocomplete="off">
                                                                
                                                                    </div>
                                                        </div>


                                            <div class="row">  
                                                <button type="button" class="btn btn-primary" id="btnSearch">
                                                    ค้นหา
                                                    </button> 
                                             </div>

                                                    <br>


                                                    <div class="input-group">
                                                            <div class="form-outline">
                                                                <input type="search" id="form1" class="form-control" />
                                                                
                                                            </div>
                                                            <button type="button" class="btn btn-primary">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                            </div>

          

                            </form>
                            
</div>

<div id="content2">


                    <table id="table1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                <th>เลขที่สัญญา</th>
                                <th>ผู้รับจ้าง</th>
                                <th>รายละเอียดงาน</th>
                                <th>วันที่ตรวจรับงาน</th>
                                <th>ระยะเวลาประกัน</th>
                                <th>วันหมดประกัน</th>  
                              </tr>
                          </thead>   
                          <tbody id="list-data"> </tbody>  
                          <tfoot>
                                <tr>
                                <!-- <th>ลำดับที่</th> -->
                                <th>เลขที่สัญญา</th>
                                <th>ผู้รับจ้าง</th>
                                <th>รายละเอียดงาน</th>
                                <th>วันที่ตรวจรับงาน</th>
                                <th>ระยะเวลาประกัน</th>
                                <th>วันหมดประกัน</th>
                                </tr>
                            </tfoot>
                     </table>  

</div>

<!-- /.content-wrapper -->
<!-- <script>
  $(function () {
    $("#tabale1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>  -->

<!-- page script -->


<script type="text/javascript">
$(document).ready(function(){
    $("#content2").hide();
    $("#table2").hide();

});

</script>
<script>
          $(function () {
            $("#table1").DataTable({
                  "responsive": true,
                  "autoWidth": false,
              });
           
            });
            $(function () {
            $("#table2").DataTable({
                  "responsive": true,
                  "autoWidth": false,
              });
           
            });
 </script>



<!-- <script type="text/javascript" src="jquery-1.11.2.min.js"></script>  -->
<script type="text/javascript">
            $(function () {
                $("#btnSearch").click(function () {
                    $.ajax({
                        url: "database/api_search_process.php",
                        type: "post",
                        data: {FirstName: $("#FirstName").val()},
                        beforeSend: function () {
                            $("#loading").show();
                        },
                        complete: function () {
                                 $("#loading").hide();
                            },
                        success: function (data) {
                            $("#list-data").html(data);
                        }
                    });
                });
                $("#searchform").on("keyup keypress",function(e){
                   var code = e.keycode || e.which;
                   if(code==13){
                       $("#btnSearch").click();
                       return false;
                   }
                });
            });
  </script>




 

