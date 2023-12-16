<?php




if(isset($_FILES['fileToUpload'])){
   $targetDir = "uploads/";
   $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
   $uploadOk = 1;
   $ext = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


// القيود على حجم الملف (1 ميجابايت)
if ($_FILES["fileToUpload"]["size"] > 900000) {
    echo "عذرًا، حجم الملف كبير جدًا.";
    echo "<br />";
    $uploadOk = 0;
}

// القيود على أنواع الملفات (تأكد من أن الملف هو صورة)
if($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif" ) {
    echo "عذرًا، يسمح فقط بتحميل ملفات الصور.";
    echo "<br />";
    $uploadOk = 0;
}
   
// التحقق من القيمة التي أرسلتها النموذج
if ($uploadOk == 0) {
    echo "عذرًا، لم يتم تحميل الملف.";
} else {
    // إذا كانت جميع القيود متوفرة، قم بنقل الملف إلى الدليل المحدد
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "تم تحميل الملف " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " بنجاح.";
    } else {
        echo "عذرًا، حدثت مشكلة أثناء تحميل الملف.";
    }
}


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رفع ملف</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="fileToUpload">اختر الملف:</label>
        <label class="custom-file-upload">
            <input type="file" name="fileToUpload" id="fileToUpload">اختر الملف
        </label>
        <br>
        <input type="submit" value="رفع الملف" name="submit">
    </form>
</body>
</html>
