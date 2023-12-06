<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fileName = $_FILES['inputFile']['name'];
    //$fileExt = pathinfo($_FILES["inputFile"]["name"], PATHINFO_EXTENSION);
    $filePath = "../files/".$fileName;
    if (move_uploaded_file($_FILES["inputFile"]["tmp_name"], $filePath)) {
        echo "Upload success";
    } else {
        echo "Upload failed";
    }
}
?>