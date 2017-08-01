<?php  
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
	/*function checkLogin($name,$password){
		//根据用户名，从数据表中刚查询到唯一数据
		$info = $this->where("admin_name='$name'")->find();
		///检测数据表中的用户名和密码是否和表单提交的用户名和密码一致
		if($info['admin_name']==$name && $info['password']==$password){
			session('uid',$info['admin_id']);
			session('uname',$info['admin_name']);
            //记录当前用户的role_id值
            session('uroleid',$info['role_id']);
            //获取role_path的值
			$role_tmp = D('Role')->field('role_path')->find($info['role_id']);
            $role_path = $role_tmp['role_path'];
            session('urolepath',$role_path);
            //获取role_path的值
			$role_tmp = D('Role')->field('role_path')->find($info['role_id']);
            $role_path = $role_tmp['role_path'];
            session('urolepath',$role_path);
			return true;
		}else{
			return false;
		}
	}*/
}
?>