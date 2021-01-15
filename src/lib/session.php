<?php
/**
*Session Class
**/
class Session{
   //tao session ban dau,luu phien giao dich
 public static function init(){
  if (version_compare(phpversion(), '5.4.0', '<')) {
        if (session_id() == '') {
            session_start();
        }
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
 }
//set() $key thanh gia tri
 public static function set($key, $val){
    $_SESSION[$key] = $val;
 }
//get() get gia tri
 public static function get($key){
    if (isset($_SESSION[$key])) {
     return $_SESSION[$key];
    } else {
     return false;
    }
 }
// check coi gia tri co ton tai khong
 public static function checkSession(){
    self::init();
    //default la trang login
    if (self::get("login")== false) {
     self::destroy();
     header("Location:login.php");
    }
 }
//huy phien lam viec do
 public static function checkLogin(){
    self::init();
    if (self::get("login")== true) {
     header("Location:index.php");
    }
 }

 public static function destroy(){
  session_destroy();
  header("Location:login.php");
 }
}
?>