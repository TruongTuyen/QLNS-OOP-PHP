<?php
    session_start();
    
    //Kiem tra dang nhap hay chua
    if(!isset($_SESSION['ss_user']) || empty($_SESSION['ss_user'])){
        header('location:login.php');exit();
    }
    
    if($_SESSION['ss_role'] != 1){
        $warnning = "Bạn không có quyên truy cập trang này. Hệ thống đang chuyển hướng."; ?>
        <script type="text/JavaScript">setTimeout("location.href = 'http://localhost/QLNS/admin/user/user-home.php';", 4000);</script>
<?php }
    //require cac file can su dung
    require '../../configs/configs.php';
    require Configs::ABS_PATH .'/models/user/User.php';

    //khoi tao doi tuong
    $userModel = new User();

    //Lay danh sach thanh vien
    $userList = $userModel->get_list_user();

    //Chen file view
    require Configs::ABS_PATH . 'views/admin/user/list.view.php';
    
?>