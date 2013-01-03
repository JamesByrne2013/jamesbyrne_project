<html>
<head>
<title>Upload Form</title>
</head>
<body>


 <?=form_open_multipart('homeprofile/upload');?>
        <input type="file" name="userfile" />
        <?=form_submit('submit', 'upload')?>
        <?=form_close();?> 



</body>
</html>