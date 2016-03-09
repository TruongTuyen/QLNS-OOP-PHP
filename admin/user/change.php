<?php
    session_start();
    require '../../configs/configs.php';
    if(!isset($_SESSION['ss_user'])){
        header("Location:login.php");exit;
    }else{
        if($_SESSION['ss_role'] != 1){ 
            include Configs::ABS_PATH . "views/template/no-access.view.php";
?>      
            <script type="text/JavaScript">setTimeout("location.href = 'http://localhost/QLNS/admin/user/user-home.php';", 5000);</script>
<?php       exit();
        }
        $id = $_GET['id'];
        $action = $_GET['action'];
        
        require Configs::ABS_PATH .'/models/user/User.php';
        require Configs::ABS_PATH .'/libraries/function.class.php';
        $error = array();
        $user = new User();
        
        if($action == "edit"){ // Thực hiện sửa.
        
            if(is_numeric($id)){
                $userList = $user->get_by_id($id);
                
            }else{
                $warnning = "ID không hợp lệ."; ?>
                <script type="text/javascript">
                        var event = alert("ID không hợp lệ.");
                            if(!event){
                                location.href = 'http://localhost/QLNS/admin/user/list.php';
                            }
                        
                </script> 
                
<?php       }
            if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($warnning)){
                $myfunction = new My_function();
                $email = $myfunction->validate_input_form($_POST['email']);
                $phone = $myfunction->validate_input_form($_POST['phone']);
                $fullname = $myfunction->validate_input_form($_POST['fullname']);
                $role = $myfunction->validate_input_form($_POST['role']);
                $address = $myfunction->validate_input_form($_POST['address']);
                $sex = $myfunction->validate_input_form($_POST['sex']);
                
                //Khởi tạo biến cần dùng
                $input = array();
                $error = array();
                
                //Kiểm tra lỗi và gán giá trị
                if(!empty($email)){
                    $input['email'] = $email;
                }else{
                    $error[] = "Email không được để trống.";
                }
                if(!empty($phone)){
                    $input['sodienthoai'] = $phone;
                }else{
                    $input['sodienthoai'] = "NULL";
                }
                if(!empty($fullname)){
                    $input['hoten'] = $fullname;
                }else{
                    $error[] = "Họ tên không được để trống.";
                }
                if(!empty($address)){
                    $input['diachi'] = $address;
                }else{
                    $error[] = "Địa chỉ không được để trống.";
                }
                if(!empty($sex)){
                    $input['gioitinh'] = $sex;
                }else{
                    $error[] = "Giới tính không được để trống.";
                }
                $input['ngaysua'] = "NOW()";
                $newid = $userList->get_ID();
                
                //Nếu không có lỗi thì tiến hành update
                if(!empty($input)){
                   $userEdit = $user->update_user_by_id($newid,$input);
                   if($userEdit){
                        $message = "Cập nhập dữ liệu thành công!";
                        unset($userList);
                        $userList = $user->get_by_id($id);
                   }else{
                        $warnning = "Lỗi! Không thể cập nhập dữ liệu!";
                   } 
                }
                
                
                
                
            }
            
            require Configs::ABS_PATH . "views/admin/user/edit.view.php";
        }//End edit
        
        if($action == "delete" ){ //Thực hiên xóa.
            if(is_numeric($id)){
                if($user->delete_user($id)){ ?>
                   <script type="text/javascript">
                        var event = alert("Xóa thành công.");
                            if(!event){
                                location.href = 'http://localhost/QLNS/admin/user/list.php';
                            }
                        
                   </script>  
<?php            }else{  ?>
                   <script type="text/javascript">
                        var event = alert("Không thể xóa. Đã xảy ra lỗi");
                            if(!event){
                                location.href = 'http://localhost/QLNS/admin/user/list.php';
                            }
                        
                   </script> 
<?php            } ?>
<?php          }else{ ?>
                <script type="text/javascript">
                        var event = alert("ID không hợp lệ.");
                            if(!event){
                                location.href = 'http://localhost/QLNS/admin/user/list.php';
                            }
                        
                </script>  
<?php                
            }
            
        }//End delete
    
    
    
    
    
    }//Ket thuc