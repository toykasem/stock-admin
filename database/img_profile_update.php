<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=rangsit_engineer;charset=utf8", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');

   //ประกาศตัวแปรรับค่าจากฟอร์ม
  // $img_name = $_POST['img_file'];

   if (isset($_POST['img_file'])) {
    require_once 'connect.php';
     //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
    $date1 = date("Ymd_His");
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $img_file = (isset($_POST['img_file']) ? $_POST['img_file'] : '');
    $upload=$_FILES['img_file']['name'];

    //มีการอัพโหลดไฟล์
    if($upload !='') {
    //ตัดขื่อเอาเฉพาะนามสกุล
    $typefile = strrchr($_FILES['img_file']['name'],".");

    //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
    if($typefile =='.jpg' || $typefile  =='.jpeg' || $typefile  =='.png'){

    //โฟลเดอร์ที่เก็บไฟล์
    $path="upload/";
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname = $numrand.$date1.$typefile;
    $path_copy=$path.$newname;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    move_uploaded_file($_FILES['img_file']['tmp_name'],$path_copy); 

     //ประกาศตัวแปรรับค่าจากฟอร์ม
    $img_name = $_POST['img_name'];
    
    
   //sql insert
   $stmt = $conn->prepare("INSERT INTO user_login (img, img_file)
    VALUES (:img, '$newname')");
   $stmt->bindParam(':img_name', $img_name, PDO::PARAM_STR);
   $result = $stmt->execute();
   //เงื่อนไขตรวจสอบการเพิ่มข้อมูล

   //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
            if($result){
                echo '<script>
                    setTimeout(function() {
                    swal({
                        title: "อัพโหลดภาพสำเร็จ",
                        type: "success"
                    }, function() {
                        window.location = "upload.php"; //หน้าที่ต้องการให้กระโดดไป
                    });
                    }, 1000);
                </script>';
            }else{
            echo '<script>
                    setTimeout(function() {
                    swal({
                        title: "เกิดข้อผิดพลาด",
                        type: "error"
                    }, function() {
                        window.location = "upload.php"; //หน้าที่ต้องการให้กระโดดไป
                    });
                    }, 1000);
                </script>';
            } //else ของ if result


            }else{ //ถ้าไฟล์ที่อัพโหลดไม่ตรงตามที่กำหนด
            echo '<script>
                        setTimeout(function() {
                        swal({
                            title: "คุณอัพโหลดไฟล์ไม่ถูกต้อง",
                            type: "error"
                        }, function() {
                            window.location = "upload.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                        }, 1000);
                    </script>';
            } //else ของเช็คนามสกุลไฟล์

            } // if($upload !='') {

            $conn = null; //close connect db
            } //isset
?>