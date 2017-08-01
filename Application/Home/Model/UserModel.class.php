<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
    function LoginCheck($phone,$password){
        $info = $this->where("phone='$phone'")->find();
        if($info['phone']==$phone && $info['password']==md5($password)){
            session('userid',$info['user_id']);
            session('username',$info['user_name']);
            session('nickname',$info['nick_name']);
            return true;
        }else{
            return false;
        }
    }
}