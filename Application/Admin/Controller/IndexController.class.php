<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
class IndexController extends Controller
{
	public function index()
	{
		$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>', 'utf-8');
	}

	function login()
	{
		$this->display();
	}

	function verify()
	{
		$arr = array(
			/*'imageH' => 38,
            'imageW' => 75,*/
				'fontSize' => 10,
				'useCurve' => false,
				'useNoise' => false,
				'bg' => array(93, 202, 27),
				'length' => 5,
				'fontttf' => '5.ttf'
		);
		$v = new Verify($arr);
		$v->entry();
	}

	function checkLogin()
	{
		//1.接收表单提交的验证码
		$code = I('post.code');
		//2.检测该验证码的正确性
		$v = new Verify();
		if (!$v->check($code)) {
			$this->error('验证码不正确', U('login'), 3);
		}
		//3.接收用户名和密码
		$name = I('post.name');
		$password = I('post.password');
		//根据用户名，从数据表中刚查询到唯一数据
		$db = D('Admin');
		$info = $db->where("admin_name='$name'")->find();
		//dump($info);
		//die;
		//检测数据表中的用户名和密码是否和表单提交的用户名和密码一致
		if ($info['admin_name'] == $name && $info['password'] == md5($password)) {
			session('uid', $info['admin_id']);
			session('uname', $info['admin_name']);
			//记录当前用户的role_id值
			session('uroleid', $info['role_id']);
			//获取role_path的值
			$role_tmp = D('Role')->field('role_path')->find($info['role_id']);
			$role_path = $role_tmp['role_path'];
			session('urolepath', $role_path);
			$this->success('登录成功', U('Main/index'), 3);
		} else {
			$this->error('登录失败', U('login'), 3);
		}
		/*//3.接收用户名和密码
        $name = I('post.name');
        $password = I('post.password');
        if(D('Admin')->checkLogin($name,$password)){
            $this->success('登录成功',U('Main/index'),3);
        }else{
            $this->error('登录失败',U('login'),3);
        }*/
	}
}