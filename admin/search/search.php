<?php 
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "models/Db.php";
    
    $db = new Db();
    
    $search = $_POST["seach"];
    
    $query = "SELECT * FROM hosonhanvien WHERE hoten LIKE '%$search%' OR manv LIKE '%$search%'";
    $result = $db->run_query($query);
    $num_row = mysqli_num_rows($result);
//    if($num_row == 0){
//        echo "Khong co ket qua";
//    }else{
//        echo "Co $num_row ket qua tra ve";
//        $row = $db->get_fetch();
//        
//        foreach($row as $result){
//            echo $result . "<br/>";
//        }
//    }
    include Configs::ABS_PATH . "views/admin/search/search.view.php";