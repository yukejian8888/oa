<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/12
 * Time: 12:55
 */
namespace Admin\Model;
use Think\Model;

class AdminModel extends Model{
    //设置数据表主键字段
    protected $pk = 'user_id';
    //设置数据表字段
    protected $fields = array(
        'admin_id','admin_name','role_id','sex','password','birthday','phone','email','other_contact','create_time','update_time'
    );
    //设置表单和数据表的映射
    protected $_map = array(
        'name' => 'admin_name',
        'pwd' => 'password',
        'sexx' => 'sex',
        'role' => 'role_id',
        'birth' => 'birthday',
        'tel' => 'phone',
        'emailbox' => 'email',
    );
    //验证表单数据
    protected $_validate = array(
        array('admin_name', 'username', '您的用户名不符合规则', 1, 'regex', 3),
        array('password', 'passwordd', '密码不符合规则', 1, 'regex', 3),
        array('re-password', 'password', '两次密码不一致', 0, 'confirm', 1),
        array('birthday', 'checkDateTime', '生日日期错误', 0, 'function', 3),
        array('phone', 'tel', '手机格式不正确', 0, 'regex', 3),
        array('email', 'email', '邮箱格式不正确', 0, 'regex', 3),
        array('role_id', 'require', '权限不能为空', 1, 'regex', 3),
    );
    //定义自动完成
    protected $_auto = array(
        array('password','md5',3,'function'),
        array('create_time','setDateTime',1,'function'),
        array('update_time','setDateTime', 3, 'function')
    );


}