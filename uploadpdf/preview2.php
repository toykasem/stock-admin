<!DOCTYPE html>
<!-- release v5.1.3, copyright 2014 - 2020 Kartik Visweswaran -->
<!--suppress JSUnresolvedLibraryURL -->
<html lang="en">
<head>
    <meta charset="UTF-8"/>

<style type="text/css">
#uploadForm{
	float: left;
	width: 100%;
}
.div-center img, .div-center embed{
	margin-top: 20px;
}
.div-center input[type="file"]{
    display: inline-block;
    border: 1px solid;
    padding: 5px;
    border-radius: 2px;
}
</style>

</head>
<body>
<form method="post" action="" enctype="multipart/form-data" id="uploadForm">
                    <input type="file" name="file" id="file" />
                    <input type="submit" name="submit" class="btn btn-primary" value="Upload"/>
</form>

        	<!-- JavaScript -->
		<script src="jquery.min.js"></script>
     	        <script src="http://demos.codexworld.com/includes/js/bootstrap.js"></script>
        <!-- Place this tag in your head or just before your close body tag. -->
        <!--<script src="https://apis.google.com/js/platform.js" async defer></script>-->
    	<script>
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            //$('#uploadForm + img').remove();
            //$('#uploadForm').after('<img src="'+e.target.result+'" width="450" height="300"/>');
            $('#uploadForm + embed').remove();
            $('#uploadForm').after('<embed src="'+e.target.result+'" width="450" height="300">');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#file").change(function () {
    filePreview(this);
});
</script>

</body>

</html>