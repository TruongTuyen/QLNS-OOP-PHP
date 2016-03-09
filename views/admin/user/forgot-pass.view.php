<style>
    .forgot-pass{width:500px;margin: 20px auto;border:1px solid gray;border-radius:5px;padding-left:20px;}
    input[name="forgot-email"]{padding:7px 5px;border-radius:5px;}
    input[name="submit"]{padding:7px 30px; border-radius:5px;background: #3293CD;color:white;cursor:pointer;}
    .show-message{width:500px;margin: 20px auto;border:1px solid gray;border-radius: 5px;padding-left:20px;background: #0080FF;color:white;}
    
</style>
<?php if(isset($message)){ ?>
    <div class="show-message"><?php echo $message; ?></div>
<?php } ?>
<div class="forgot-pass">
    <h2>Bạn quên mật khẩu</h2>
    <p>Vui lòng để lại địa chỉ email, chúng tôi sẽ gửi lại mật khẩu cho bạn.</p>
    <a href="<?php echo Configs::ABS_URL; ?>/admin/user/login.php">Quay lại trang đăng nhập</a>
    <form method="post" action="">
        Email: <input type="text" name="forgot-email" id="forgot-email" placeholder="Email" />
                <input type="hidden" name="email" id="email" />
                <input type="submit" name="submit" value="Gửi" />
    </form>
</div>