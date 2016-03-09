<?php
    session_start();
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/luongthoathuan/Luong.php";
    include Configs::ABS_PATH . "models/staff/Staff.php";
    
    $myfunction = new My_function();
    $luong = new Luong();
    $error = array();
    
    $get_id = $_GET['id'];
    $action = $_GET['action'];
    
    $staff = new Staff();
    $list_staff = $staff->get_list_staff();
    $luong_detail = $luong->get_luong_by_id($get_id);
    
    if($action == "edit"){
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["manv"])){
                $error[] = "Hãy nhập vào mã nhân viên.";
            }else{
                $manv = $myfunction->validate_input_form($_POST['manv']);
            }
            
            if(empty($_POST["luongcoban"])){
                $error[] = "Hãy nhập vào lương cơ bản.";
            }else{
                $luongcoban = $myfunction->validate_input_form($_POST['luongcoban']);
            }
            
            if(empty($_POST["hesoluong"])){
                $error[] = "Hãy nhập vào hệ số lương.";
            }else{
                $hesoluong = $myfunction->validate_input_form($_POST['hesoluong']);
            }
            
            
            $input = array(
                "manv"=>$manv,
                "luongcoban"=>$luongcoban, 
                "hesoluong"=>$hesoluong,
            );
            
            if(empty($error)){
                if($luong->update_luong_by_id($get_id,$input)){
                    $message = "Cập nhật dữ liệu thành công";
                }else{
                    $warnning = "Lỗi! Không cập nhật được dữ liêu.";
                }
            }
            
        }
        
        include Configs::ABS_PATH . "views/admin/luongthoathuan/edit.view.php";
		
    }
    
    if($action == "delete"){
        if($luong->delete_luong_by_id($get_id)){ ?>
            <script type="text/javascript">
                        var event = alert("Xóa thành công.");
                            if(!event){
                                location.href = '<?php echo Configs::ABS_URL; ?>admin/luongthoathuan/list.php';
                            }
                        
                   </script>
<?php   }else{  ?>
            <script type="text/javascript">
                        var event = alert("Lỗi! Không xóa được.");
                            if(!event){
                                location.href = '<?php echo Configs::ABS_URL; ?>admin/luongthoathuan/list.php';
                            }
                        
                   </script>
<?php   }
    }
    
    