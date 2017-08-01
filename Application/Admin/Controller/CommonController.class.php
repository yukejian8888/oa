<?php  
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{
	function __construct(){
		parent::__construct();
		if(!session('?uname')) {
			$this->error('尚未登录，请您登录后再访问', U('Index/login'), 3);
		}
			//获取当前访问的模块-控制器-方法
			$now_action = MODULE_NAME.'-'.CONTROLLER_NAME.'-'.ACTION_NAME;
			$role_path = session('urolepath');
			$role_path = explode(',', $role_path);
			//判断$now_action在$role_path中
			if(!in_array($now_action,$role_path)){
				$this->error('您无权访问该页面',U('main/index'),3);
			}
		}
}
?>