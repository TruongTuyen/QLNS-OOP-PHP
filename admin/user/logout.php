<?php 
    session_start();
    session_destroy();
?>    
    <h1>Bạn đã đăng xuất khỏi hệ thống!</h1>
    <p>Hệ thống sẽ chuyển hướng sau 10s</p>
    <script type="text/JavaScript">setTimeout("location.href = 'http://localhost/QLNS/admin/user/login.php';", 10000);</script>