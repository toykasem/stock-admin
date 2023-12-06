

<!-- 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href=" https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
   


    
             <div class="card-body">

                        <table id="memo_list" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>วันที่</th>
                                    <th>ไฟล์</th>
                                    <th>เลขที่สัญญา</th>
                                    <th>ปีงบประมาณ</th>
                                    <th>เลขที่บันทึก</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>วันที่</th>
                                    <th>ไฟล์</th>
                                    <th>เลขที่สัญญา</th>
                                    <th>ปีงบประมาณ</th>
                                    <th>เลขที่บันทึก</th>
                                </tr>
                            </tfoot>
                        </table>
              </div> -->
     


              <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>no</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                   
                  </tr>
                  </thead>

                  <?php
                       include_once 'config/connect.php';
                         $sql = "SELECT * FROM `doc_mgr_command` ORDER BY `doc_mgr_command`.`id` DESC";
                         $result = $conn->query($sql);

                         if ($result->num_rows > 0) {
                            
                            // output data of each row
                              while($row = $result->fetch_assoc()) {
                                $id_edit = $row["id"];
                              echo "<tr><td>"
                              .$row["id"]."</td><td>"
                              .$row["doc_id"]."</td><td>"
                              .$row["doc_date"]."</td><td>"
                              ?>
                             
                            </tr>
                         <?php  
                          } 
      
                           } else {
                               echo "0 results";
                              }
                             $conn->close();
                             ?>



                  <tfoot>
                  <tr>
                    <th>no</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                  
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           

<!-- 
<script type ="text/javascript">
   $(document).ready(function() {
    $('#memo_list').DataTable( {
        "ajax": "api/memo_list_json.php",
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "pageLength": 25,
        "columns": [
            { "data": "id" },
            { "data": "doc_id" },
            { "data": "doc_topic" },
            { "data": "doc_ref" },
            { "data": "department" },
            { "data": "file_name" }
        ]
    } );
} );
</script> -->


<!-- 

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
</script> -->


<script>
 $(document).ready(function() {
    $("#example1").DataTable({
      "pageLength": 25,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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