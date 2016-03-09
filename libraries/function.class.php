<?php
    include_once(Configs::ABS_PATH ."models/Db.php");
    class My_function{
        public $conn;
        
        public function __construct(){
            $db = new My_mysqli();
            $this->conn = $db->conn;
        }
        
        public function validate_input_form($input){
            return mysqli_real_escape_string($this->conn,htmlspecialchars($input));
        }
        
        public function rand_password() { //Hàm này sẽ tạo pass ngẫu nhiên có độ dài là 5 ký tự
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $size = strlen( $chars );
            for( $i = 0; $i < 5; $i++ ) {
            $str .= $chars[ rand( 0, $size - 1 ) ];
             }
            return $str;
        }
        
        public function check_login(){
            $path = Configs::ABS_URL . "admin/user/login.php";
            if(!isset($_SESSION['ss_user']) || empty($_SESSION['ss_user'])){
                header("location:".$path);
                exit();
            }
        }
        
        public function check_admin(){
            if($_SESSION['ss_role'] != 1){
                $warnning = "Bạn không có quyền truy cập trang này. Hệ thống sẽ chuyển hướng."; ?>
                <script type="text/JavaScript">
                    var event = alert("Bạn không có quyền truy cập trang này.");
                        if(!event){
                            location.href = 'http://localhost/QLNS/admin/user/user-home.php';
                        }
                </script>
<?php   }
    }
}    