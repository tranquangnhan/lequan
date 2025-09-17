<?php 
require_once "../../system/config.php";
require_once "../../system/database.php";
require_once "../models/login.php";
require_once "../../lib/myfunctions.php";
class Login
{
    function __construct()
    {
       
        $this->model = new Model_login();
        $this->lib = new lib();
        $act = "login";
        if(isset($_GET["act"])==true) $act = $_GET['act'];
        switch ($act) {
            case 'login':
                $this->checkUser();
               
                break;
            case 'logout':
                $this->logOut();
                break; 
            default:
                break;
        }
     
    }
    function checkUser()
    {   
        // Auto-login using remember cookie if session not present
        if(!isset($_SESSION['sid']) && isset($_COOKIE['remember_token']) && !empty($_COOKIE['remember_token'])){
            $token = $_COOKIE['remember_token'];
            $tokenFile = __DIR__ . '/../../system/remember_tokens.php';
            if(file_exists($tokenFile)){
                $data = include $tokenFile;
                if(is_array($data) && isset($data[$token])){
                    $userId = $data[$token];
                    // load user by id
                    $sql = "select * from user where idUser=?";
                    $user = $this->model->result1(1,$sql,$userId);
                    if(is_array($user)){
                        $_SESSION['sid'] = $user['idUser'];
                        $_SESSION['suser']= $user['name'];
                        $_SESSION['srole'] = $user['role'];
                        header('location: ../?ctrl=product');
                        exit;
                    }
                }
            }
        }

        if(isset($_POST['login'])&&($_POST['login']))
        {
                $email= $_POST['email'];
                $pass = $_POST['password'];
                $exist = $this->model->checkEmailTonTai($email);
                if($exist != null){
                   $checklogin = $this->model->checkUser($email,$pass);
                   if($checklogin == true){
                      if($_SESSION['srole'] == 0){
                          $role = 'You are not admin';
                      }else{
                        // If remember me checked, create token and persist
                        if(isset($_POST['remember_me']) && $_POST['remember_me']){
                            $token = bin2hex(random_bytes(32));
                            $tokenFile = __DIR__ . '/../../system/remember_tokens.php';
                            $arr = array();
                            if(file_exists($tokenFile)){
                                $arr = include $tokenFile;
                                if(!is_array($arr)) $arr = array();
                            }
                            $arr[$token] = $_SESSION['sid'];
                            // write back to file as php array
                            $export = var_export($arr,true);
                            $content = "<?php\nreturn " . $export . ";\n";
                            file_put_contents($tokenFile,$content, LOCK_EX);
                            // set cookie for 30 days
                            setcookie('remember_token', $token, time() + (30*24*60*60), '/', '', false, true);
                        }
                        header('location: ../?ctrl=product');
                      }
                   }else{
                      $checkloginwarn = 'Your password is not valid';
                   }
                }else{
                   $emailexist= 'Your email does not exist!';
                }
        }
        require_once "../views/login.php";
    }
    function logOut()
    {
        if(isset($_GET['logout'])&&($_GET['logout'])){
            unset($_SESSION['sid']);
            unset($_SESSION['suser']);
            unset($_SESSION['role']);
            // remove remember token if present
            if(isset($_COOKIE['remember_token']) && $_COOKIE['remember_token']!=''){
                $token = $_COOKIE['remember_token'];
                $tokenFile = __DIR__ . '/../../system/remember_tokens.php';
                if(file_exists($tokenFile)){
                    $arr = include $tokenFile;
                    if(is_array($arr) && isset($arr[$token])){
                        unset($arr[$token]);
                        $export = var_export($arr,true);
                        $content = "<?php\nreturn " . $export . ";\n";
                        file_put_contents($tokenFile,$content, LOCK_EX);
                    }
                }
                setcookie('remember_token','', time() - 3600, '/', '', false, true);
            }
            header('location: login.php?act=login');
        }
    }
}
new Login;