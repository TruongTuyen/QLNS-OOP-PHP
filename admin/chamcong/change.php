<?php
    session_start();
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/hopdong/Hopdong.php";
    
    $function = new My_function();
    $hopdong = new Hopdong();
    $error = array();
    
    $mahopdong = $_GET['id'];
    $action = $_GET['action'];
    
    if($action == "edit"){
        $detail = $hopdong->get_hopdong_by_id($mahopdong);
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST['mahd'])){
                $ma_hd = $function->validate_input_form($_POST['mahd']);
            }else{
                $error[] = "Hãy nhập vào mã hợp đồng.";
            }
            
            if(!empty($_POST['tenhd'])){
                $ten_hd = $function->validate_input_form($_POST['tenhd']);
            }else{
                $error[] = "Hãy nhập vào tên hợp đồng.";
            }
            
            if(!empty($_POST['ngayki'])){
                $ngayki = $function->validate_input_form($_POST['ngayki']);
            }else{
                $error[] = "Hãy nhập vào ngày kí.";
            }
            
            if(empty($_POST["ngayhethan"]) || strlen($_POST['ngayhethan']) == 0){
                $ngayhethan = "NULL";
            }else{
                $ngayhethan = $function->validate_input_form($_POST['ngayhethan']);
            }
            if(empty($error)){
                $input = array("mahd"=>$ma_hd,"tenhopdong"=>$ten_hd,"ngaykiket"=>$ngayki,"ngayhethan"=>$ngayhethan);
                
                if($hopdong->update_hopdong_by_id($mahopdong,$input)){
                    $message = "Cập nhật dữ liệu thành công";
                }else{
                    $warnning = "Lỗi! Không cập nhật được dữ liêu.";
                }
            }
            
        }
        
        include Configs::ABS_PATH . "views/admin/hopdong/edit.view.php";
    }
    
    if($action == "delete"){
        if($hopdong->delete_hopdong_by_id($mahopdong)){ ?>
            <script type="text/javascript">
                        var event = alert("Xóa thành công.");
                            if(!event){
                                location.href = 'http://localhost/QLNS/admin/hopdong/list.php';
                            }
                        
                   </script>
<?php   }else{  ?>
            <script type="text/javascript">
                        var event = alert("Lỗi! Không xóa được.");
                            if(!event){
                                location.href = 'http://localhost/QLNS/admin/hopdong/list.php';
                            }
                        
                   </script>
<?php   }
    }
    
    