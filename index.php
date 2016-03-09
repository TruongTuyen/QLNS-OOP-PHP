<?php
    session_start();
    if(isset($_SESSION['user'])){
        if($_SESSION['role'] == 1){
            header("Location:admin/admin-home.php");
        }else{
            header("Location:admin/user/user-home.php");
        }
    }else{
        header("Location:admin/user/login.php");
    }