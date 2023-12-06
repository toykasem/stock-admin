<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>Basic PHP PDO ระบบแจ้งเมื่อสินค้าใกล้หมดสต๊อก by devbanban.com 2021</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                    <h3>รายการสินค้า *ตัวอย่างการสร้างเงื่อนไขตรวจสอบสต๊อกสินค้า</h3>
                    <b>สีฟ้า = เหลือ >=  10 , สีเหลือง = เหลือ <= 5 , สีแดง = สินค้าหมด </b>
                    <table class="table  table-hover table-responsive table-bordered">
                        <thead>
                            <tr class="table-dark">
                                <th width="5%">ลำดับ</th>
                               
                                <th width="65%">ชื่อสินค้า</th>
                                
                                <th width="10%" class="text-center">QTY</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //เรียกไฟล์เชื่อมต่อฐานข้อมูล
                            require_once 'connect.php';
                            //คิวรี่ข้อมูลมาแสดงในตาราง
                            $stmt = $conn->prepare("SELECT* FROM tbl_stock");
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            foreach($result as $row) {

                              //สร้างเงื่อนไขตรวจสอบจำนวนคงเหลือในสต๊อกสินค้า
                              if($row['qty'] == 0){
                                //สินค้าหมด
                                $tableClass = "table-danger";
                                $txtTitle = "<font color='red'> สินค้าหมด !! </font>";
                              }elseif($row['qty'] <= 5) {
                                //สินค้ากำลังจะหมด
                                $tableClass = "table-warning";
                                $txtTitle = "";
                              }else{
                                //เหลือ > 10 ชิ้น
                                $tableClass = "table-info";
                                $txtTitle = "";
                              }
                            ?>
                            <tr>
                                <td><?= $row['id'];?></td>
                                 <!-- <td><img src="upload/<= // $row['product_img'];?>" width="60%"></td> -->
                                <td><?= $row['mat_code'];?></td>
                                
                                <td align="center" class="<?= $tableClass;?>">
                                    <?=$row['qty'];?>
                                    <br>
                                    <?=$txtTitle;?>
                                  </td>
                               
                            <?php } ?>
                        </tbody>
                    </table>
                    <br>
                    <center>Basic PHP PDO ระบบแจ้งเมื่อสินค้าใกล้หมดสต๊อก by devbanban.com 2021 <br>
                        คอร์สออนไลน์ <a href="https://devbanban.com/?cat=250" title="click">click</a>
                    </center>
                </div>
            </div>
        </div>
    </body>
</html>