<?php
    session_start();
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/chucvu/Chucvu.php";
    
    $function = new My_function();
    $chucvu = new Chucvu();
    $error = array();
    
    $machucvu = $_GET['id'];
    $action = $_GET['action'];
    
    if($action == "edit"){
        $detail = $chucvu->get_chucvu_by_id($machucvu);
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST['machucvu'])){
                $ma_cv = $function->validate_input_form($_POST['machucvu']);
            }else{
                $error[] = "Hãy nhập vào mã chức vụ.";
            }
            
            if(!empty($_POST['tenchucvu'])){
                $ten_cv = $function->validate_input_form($_POST['tenchucvu']);
            }else{
                $error[] = "Hãy nhập vào tên chức vụ.";
            }
            
            if(empty($error)){
                $input = array("machucvu"=>$ma_cv,"tenchucvu"=>$ten_cv);
                
                if($chucvu->update_chucvu_by_id($machucvu,$input)){
                    $message = "Cập nhật dữ liệu thành công";
                }else{
                    $warnning = "Lỗi! Không cập nhật được dữ liêu.";
                }
            }
            
        }
        
        include Configs::ABS_PATH . "views/admin/chucvu/edit.view.php";
    }
    
    if($action == "delete"){
        if($chucvu->delete_chucvu_by_id($machucvu)){ ?>
            <script type="text/javascript">
                        var event = alert("Xóa thành công.");
                            if(!event){
                                location.href = 'http://localhost/QLNS/admin/chucvu/list.php';
                            }
                        
                   </script>
<?php   }else{  ?>
            <script type="text/javascript">
                        var event = alert("Lỗi! Không xóa được.");
                            if(!event){
                                location.href = 'http://localhost/QLNS/admin/chucvu/list.php';
                            }
                        
                   </script>
<?php   }
    }
    
    