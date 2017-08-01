<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller{
    function _initialize(){
        if(!session('?uname')){
            $this->error('尚未登录,请您先登录后再访问',U('Index/login'),3);
        }
        //获取当前访问的 模块-控制器-方法
        //dump(session('uname'));die;
        $now_action = MODULE_NAME.'-'.CONTROLLER_NAME;
        //从session中获取rolepath
        $role_path = session('urolepath');
        $role_path = explode(',',$role_path);
        //dump($role_path);
        if(strpos($role_path,$now_action)===false){
            $this->error('您无权访问该页面',U('Index/login'),3);
        }
    }
}