<?php
    session_start();
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/ktkl/Ktkl.php";
    include Configs::ABS_PATH . "models/staff/Staff.php";
    
    $myfunction = new My_function();
    $ktkl = new Ktkl();
    $error = array();
    
    $get_id = $_GET['id'];
    $action = $_GET['action'];
    
    $staff = new Staff();
    $list_staff = $staff->get_list_staff();
    $ktkl_detail = $ktkl->get_ktkl_by_id($get_id);
    
    if($action == "edit"){
        $detail = $ktkl->get_ktkl_by_id($get_id);
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["maktkl"])){
                $error[] = "Hãy nhập vào mã khen thưởng, kỷ luật.";
            }else{
                $maktkl = $myfunction->validate_input_form($_POST['maktkl']);
            }
            
            if(empty($_POST["loai"])){
                $error[] = "Hãy chọn loại.";
            }else{
                $loai = $myfunction->validate_input_form($_POST['loai']);
            }
            
            if(empty($_POST["lydo"])){
                $error[] = "Hãy nhập vào lý do.";
            }else{
                $lydo = $myfunction->validate_input_form($_POST['lydo']);
            }
            
            if(!empty($_POST["ngaylap"])){
                $ngaylap = $myfunction->validate_input_form($_POST["ngaylap"]);
            }
            
            $input = array(
                "maktkl"=>$maktkl,
                "loai"=>$loai, //Loai 1:khen thuong, loai 2: Ky luat;
                "lydo"=>$lydo,
            );
            
            if(isset($ngaylap)){
                $input["ngaylap"] = $ngaylap;
            }
            
            if(empty($error)){
                if($ktkl->update_ktkl_by_id($get_id,$input)){
                    $message = "Cập nhật dữ liệu thành công";
                }else{
                    $warnning = "Lỗi! Không cập nhật được dữ liêu.";
                }
            }
            
        }
        
        include Configs::ABS_PATH . "views/admin/ktkl/edit.view.php";
    }
    
    if($action == "delete"){
        if($ktkl->delete_ktkl_by_id($get_id)){ ?>
            <script type="text/javascript">
                        var event = alert("Xóa thành công.");
                            if(!event){
                                location.href = '<?php echo Configs::ABS_URL; ?>admin/ktkl/list.php';
                            }
                        
                   </script>
<?php   }else{  ?>
            <script type="text/javascript">
                        var event = alert("Lỗi! Không xóa được.");
                            if(!event){
                                location.href = '<?php echo Configs::ABS_URL; ?>admin/ktkl/list.php';
                            }
                        
                   </script>
<?php   }
    }
    
    