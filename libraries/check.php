<?php
    include "upload.class.php";
    $upload = new Upload_image("picture","../uploads/");
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if($upload->check_file_type() == false){
            echo "Khong ho tro dinh dang da chon <br/>" ;
        }
        
        if($upload->check_image_size() == false){
            echo "kich thuoc qua lon <br/>";
        }
        
        if($upload->check_choose_file() == false){
            echo "Chua chon tep tin";
        }
        
        if(empty($upload->errors)){
            if($upload->upload()){
                echo "upload thanh cong <br/>";
            }else{
                echo "co loi. Khong upload duoc <br/>";
            }
        }else{
            echo "<pre>";
            print_r($upload->errors);
            echo "</pre>";
        }
    }
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Upload form</title>
    </head>

    <body>
    <img src="../uploads/pic_1430272964.jpg" />
        <h1>Upload hình ảnh</h1>
        <form id="myForm" name="myForm" method="post" enctype="multipart/form-data" action="">
            <input type="file" name="picture" id="picture"/>
            <br/>
            <input type="submit" name="button" id="button" value="Submit"/>
        </form>
    </body>
</html>