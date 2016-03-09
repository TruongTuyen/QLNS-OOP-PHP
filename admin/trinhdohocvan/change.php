<?php
    session_start();
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/trinhdohocvan/Hocvan.php";
    
    $function = new My_function();
    $hocvan = new Hocvan();
    $error = array();
    
    $matdhv = $_GET['id'];
    $action = $_GET['action'];
    
    if($action == "edit"){
        $detail = $hocvan->get_hocvan_by_id($matdhv);
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST['matdhv'])){
                $ma_hv = $function->validate_input_form($_POST['matdhv']);
            }else{
                $error[] = "Hãy nhập vào mã trình độ học vấn.";
            }
            
            if(!empty($_POST['tentdhv'])){
                $ten_hv = $function->validate_input_form($_POST['tentdhv']);
            }else{
                $error[] = "Hãy nhập vào tên trình độ học vấn.";
            }
            
            if(!empty($_POST['chuyennganh'])){
                $chuyennganh = $function->validate_input_form($_POST['chuyennganh']);
            }else{
                $chuyennganh = "NULL";
            }
            
            if(empty($error)){
                $input = array("matdhv"=>$ma_hv,"trinhdohocvan"=>$ten_hv,"chuyennganh"=>$chuyennganh);
                
                if($hocvan->update_hocvan_by_id($matdhv,$input)){
                    $message = "Cập nhật dữ liệu thành công";
                }else{
                    $warnning = "Lỗi! Không cập nhật được dữ liêu.";
                }
            }
            
        }
        
        include Configs::ABS_PATH . "views/admin/trinhdohocvan/edit.view.php";
    }
    
    if($action == "delete"){
        if($hocvan->delete_hocvan_by_id($matdhv)){ ?>
            <script type="text/javascript">
                        var event = alert("Xóa thành công.");
                            if(!event){
                                location.href = 'http://localhost/QLNS/admin/trinhdohocvan/list.php';
                            }
                        
                   </script>
<?php   }else{  ?>
            <script type="text/javascript">
                        var event = alert("Lỗi! Không xóa được.");
                            if(!event){
                                location.href = 'http://localhost/QLNS/admin/trinhdohocvan/list.php';
                            }
                        
                   </script>
<?php   }
    }
    
    