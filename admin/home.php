<?php
    session_start();
?>
    <style type="text/css">
    body{background: black;}
     .loading-area{
        width:250px;height:250px; margin:200px auto;
     }
     .loading{width: 800px; margin: 0 auto;}
    </style>
    
<?php    
    if(isset($_SESSION['ss_user']) && $_SESSION['ss_role'] == 1){
?>
    <div class="loading-area">
        <div class="loading"><img src="http://localhost/QLNS/includes/images/loading.gif" /></div>
        <script type="text/JavaScript">setTimeout("location.href = 'http://localhost/QLNS/admin/staff/add.php';", 5000);</script>
    </div>
<?php }else if(isset($_SESSION['ss_user']) && $_SESSION['ss_role'] == 2){ ?> 
    <div class="loading-area">
        <div class="loading"><img src="http://localhost/QLNS/includes/images/loading.gif" /></div>
        <script type="text/JavaScript">setTimeout("location.href = 'http://localhost/QLNS/admin/user/user-home.php';", 8000);</script>
    </div>
<?php }else{ ?>
    <div class="loading-area">
        <h1 class="success">Bạn chưa đăng nhập, hệ thống đang chuyển bạn tới trang phù hợp</h1>
        <div class="loading"><img src="http://localhost/QLNS/includes/images/loading.gif" /></div>
        <script type="text/JavaScript">setTimeout("location.href = 'http://localhost/QLNS/admin/user/user-home.php';",8000);</script>
    </div>
<?php    }    ?>