<?php
    session_start();
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/phongban/Phongban.php";
    
    $function = new My_function();
    $phongban = new Phongban();
    $error = array();
    
    $maphongban = $_GET['id'];
    $action = $_GET['action'];
    
    if($action == "edit"){
        $detail = $phongban->get_phongban_by_id($maphongban);
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST['maphongban'])){
                $ma_pb = $function->validate_input_form($_POST['maphongban']);
            }else{
                $error[] = "Hãy nhập vào mã phòng ban.";
            }
            
            if(!empty($_POST['tenphongban'])){
                $ten_pb = $function->validate_input_form($_POST['tenphongban']);
            }else{
                $error[] = "Hãy nhập vào tên phòng ban.";
            }
            
            if(!empty($_POST['sodienthoai'])){
                $sdt = $function->validate_input_form($_POST['sodienthoai']);
            }else{
                $error[] = "Hãy nhập vào số điện thoại.";
            }
            
            if(empty($error)){
                $input = array("maphongban"=>$ma_pb,"tenphongban"=>$ten_pb,"sdt"=>$sdt);
                
                if($phongban->update_phongban_by_id($maphongban,$input)){
                    $message = "Cập nhật dữ liệu thành công";
                }else{
                    $warnning = "Lỗi! Không cập nhật được dữ liêu.";
                }
            }
            
        }
        
        include Configs::ABS_PATH . "views/admin/phongban/edit.view.php";
    }
    
    if($action == "delete"){
        if($phongban->delete_phongban_by_id($maphongban)){ ?>
            <script type="text/javascript">
                        var event = alert("Xóa thành công.");
                            if(!event){
                                location.href = 'http://localhost/QLNS/admin/phongban/list.php';
                            }
                        
                   </script>
<?php   }else{  ?>
            <script type="text/javascript">
                        var event = alert("Lỗi! Không xóa được.");
                            if(!event){
                                location.href = 'http://localhost/QLNS/admin/phongban/list.php';
                            }
                        
                   </script>
<?php   }
    }
    
    