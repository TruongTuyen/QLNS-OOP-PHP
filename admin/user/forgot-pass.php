<meta charset="utf-8" />
<?php
    include "../../configs/configs.php";
    include Configs::ABS_PATH ."libraries/function.class.php";
    include Configs::ABS_PATH ."models/user/User.php";
    include Configs::ABS_PATH ."libraries/phpmailer/class.phpmailer.php"; 
    include Configs::ABS_PATH ."libraries/phpmailer/class.smtp.php"; 
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $myfunction = new My_function();
        
        if(!empty($_POST["forgot-email"])){
            $email = $myfunction->validate_input_form($_POST['forgot-email']);
            $user = new User();
            $check_email = $user->get_by_email($email);
            $db_email = $check_email->get_email();
            $user_name = $check_email->get_fullname();
            
            
            
            
            if($email === $db_email){
                //Tạo randpass
                $newpass = $myfunction->rand_password();
                $randpass = sha1($newpass); 
                //Update lại pass
//                if($user->update_pass_by_email($db_email,$randpass)){
//                    echo $newpass . "<br/>";
//                    echo $randpass . "<br/>";
//                    echo "Update pass thanh cong";
//                }else{
//                    echo "Khong update duoc";
//                }
                
                if($user->update_pass_by_email($db_email,$randpass)){ //update pass thanh cong
                    //Cấu hình gửi mail
                   $mail = new PHPMailer();
                    $mail->CharSet="utf-8"; 
                    $mail->IsSMTP(); 
                    $mail->Host = "smtp.gmail.com"; 
                    $mail->Port = 465; 
                    $mail->SMTPAuth = true; 
                    $mail->SMTPSecure = 'ssl';
                    $mail->Username = "hieuluong100495@gmail.com"; 
                    $mail->Password = "hieudieuluong100495";
                    $from = "hieuluong100495@gmail.com"; // Reply to this email
                    $to="$db_email"; // Recipients email ID
                    $name="$user_name"; // Recipient's name
                    $mail->From = $from;
                    $mail->FromName = "Admin"; // Name to indicate where the email came from when the recepient received
                    $mail->AddAddress($to,$name);
                    $mail->AddReplyTo($from,"aply");
                    $mail->WordWrap = 50; // set word wrap
                    $mail->IsHTML(true); // send as HTML
                    $mail->Subject = "Quên mật khẩu";
                    $mail->Body = "Hệ thống đã reset lại mật khẩu cũ của bạn. Mật khẩu mới là: ".$newpass.". Hãy truy cập tài khoản với mật khẩu mới."; //HTML Body
                    $mail->AltBody = "Reset mật khẩu cũ"; //Text Body
                    //$mail->SMTPDebug = 2;
                    if(!$mail->Send()){
                        $message = "<p>Không gửi được mail, có lỗi xảy ra: " . $mail->ErrorInfo . '</p><p>Vui lòng quay lại sau</p>';
                    }else{
                        $message = "<p>Hệ thống đã gửi mail tới email của bạn. Hãy kiểm tra email của bạn!</p>";
                    }   

                }else{
                    $message = "<p>Đã xảy ra lỗi. Vui lòng quay lại sau!</p>";
                }
            }else{
                $message = "<p>Không tồn tại email này!</p>";
            }        
            
            
            
        }else{
            $message = "<p>Vui lòng điền vào email của bạn!</p>";
        }
        
        
    }
    
    include Configs::ABS_PATH."views/admin/user/forgot-pass.view.php";
    
    
    ////////////////////////////
            
             
            