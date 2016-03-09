<?php
    session_start();
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/sobaohiem/Baohiem.php";
    
    $function = new My_function();
    $baohiem = new Baohiem();
    $error = array();
    
    $masbh = $_GET['id'];
    $action = $_GET['action'];
    
    if($action == "edit"){
        $detail = $baohiem->get_baohiem_by_id($masbh);
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST['masbh'])){
                $ma_sbh = $function->validate_input_form($_POST['masbh']);
            }else{
                $error[] = "Hãy nhập vào mã sổ bảo hiểm.";
            }
            
            if(!empty($_POST['ngaycap'])){
                $ngaycap = $function->validate_input_form($_POST['ngaycap']);
            }else{
                $error[] = "Hãy nhập vào ngày cấp.";
            }
            
            if(!empty($_POST['noicap'])){
                $noicap = $function->validate_input_form($_POST['noicap']);
            }else{
                $error[] = "Hãy nhập vào nơi cấp.";
            }
            
            if(empty($_POST["ghichu"]) || strlen($_POST['ghichu']) == 0){
                $ghichu = "NULL";
            }else{
                $ghichu = $function->validate_input_form($_POST['ghichu']);
            }
            if(empty($error)){
                $input = array("masbh"=>$ma_sbh,"ngaycap"=>$ngaycap,"noicap"=>$noicap,"ghichu"=>$ghichu);
                
                if($baohiem->update_baohiem_by_id($masbh,$input)){
                    $message = "Cập nhật dữ liệu thành công";
                }else{
                    $warnning = "Lỗi! Không cập nhật được dữ liêu.";
                }
            }
            
        }
        
        include Configs::ABS_PATH . "views/admin/sobaohiem/edit.view.php";
    }
    
    if($action == "delete"){
        if($baohiem->delete_baohiem_by_id($masbh)){ ?>
            <script type="text/javascript">
                        var event = alert("Xóa thành công.");
                            if(!event){
                                location.href = 'http://localhost/QLNS/admin/sobaohiem/list.php';
                            }
                        
                   </script>
<?php   }else{  ?>
            <script type="text/javascript">
                        var event = alert("Lỗi! Không xóa được.");
                            if(!event){
                                location.href = 'http://localhost/QLNS/admin/sobaohiem/list.php';
                            }
                        
                   </script>
<?php   }
    }
    
    