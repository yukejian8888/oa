<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
    //设置数据表主键字段
    protected $pk = 'user_id';
    //设置数据表字段
    protected $fields = array(
        'user_id','user_name','user_nickname','user_password','user_deptid',
        'user_sex','user_birthday','user_tel','user_email','user_ctime'
    );
    //设置表单和数据表的映射
    protected $_map = array(
        'name' => 'user_name',
        'nickname' => 'user_nickname',
        'password' => 'user_password',
        'deptid' => 'user_deptid',
        'sex' => 'user_sex',
        'birthday' => 'user_birthday',
        'tel' => 'user_tel',
        'email' => 'user_email'
    );
    //验证表单数据
    protected $_validate = array(
        array('user_name','username','您的用户名不符合规则', 1, 'regex', 3),
        array('user_nickname','require','昵称不能为空',1,'regex',3),
        array('user_password','password','密码不符合规则',1,'regex',3),
        array('re-password','user_password','两次密码不一致',0,'confirm',1),
        array('user_birthday','checkDateTime','生日日期错误',0,'function',3),
        array('user_tel','tel','手机格式不正确',0,'regex',3),
        array('user_email','email','邮箱格式不正确',0,'regex',3) 
    );
    //定义自动完成
    protected $_auto = array(
        array('user_password','md5',3,'function'),
        array('user_ctime','setDateTime',1,'function')
    );
    
    function checkLogin($name,$password){
        //根据用户名，从数据表中查询到唯一数据
        $info = $this->where("user_name='$name'")->find();
        //检查数据表中的用户名和密码是否和表单提交的一致
        if($info['user_name'] == $name && $info['user_password'] == md5($password)){
           session('uid',$info['user_id']);
           session('uname',$info['user_name']);
           session('unickname',$info['user_nickname']);
           session('udeptid',$info['user_deptid']);
           //记录当前登录用户的role_id值
           session('uroleid',$info['user_roleid']);
           //获取role_path的值
           $role_tmp = D('Role')->field('role_path')->find($info['user_roleid']);
           $role_path = $role_tmp['role_path'];
           session('urolepath',$role_path);
           return true; 
        }else{
            return false;
        }
    }
    
}