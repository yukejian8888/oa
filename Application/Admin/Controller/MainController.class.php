<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/11
 * Time: 16:39
 */

namespace Admin\Controller;

use Think\Controller;

class MainController extends CommonController{
    //显示后台主页面
     function index(){
        /*//实例化role模型，获取到role_nodeid
        $rid = session('uroleid');
        $role_tmp = D('Role')->field('role_nodeid')->find($rid);
        $nodeid = $role_tmp['role_nodeid'];
        //dump($nodeid);die();
        //2.实例化node模型,根据查询的nodeid来找到具体可操作权限
        $node_tmp = D('Node')->where("node_id in ($nodeid)")->select();
        //dump($node_tmp);die;
        //分别获取一级菜单和二级菜单的数组,都分配到模板中
        $levelA = D('Node')
            ->where("node_id in ($nodeid) and node_level=0")->select();
        $levelB = D('Node')
            ->where("node_id in ($nodeid) and node_level=1")->select();
        $this->assign('levelA',$levelA);
        $this->assign('levelB',$levelB);  */    
        $this->display();
    }
    //显示后台home页面
    function home(){
        $this->display();
    }
    //退出登录
    function loginOut(){
        session(null);
        $this->success('退出成功',U('Admin/Index/login'),3);
    }
    public function checkNotify() {
        // 实例化自定义的模型类
        $Notify = M("Book");
        // 由于Ajax三秒钟才执行一次，所以新数据的插入时间要晚于查询的的请求时间（当前时间）三秒钟
        $time = time() - 3;
        // 准备查询条件
        $where = "upload_time>$time";
        // 查找数据库中是否有新数据插入
        $bool = $Notify->where($where)->find();
        // 如果查询结果非空，
        //默认3秒中内只有一条消息，如果想更加精确，也可以缩短请求时间
        if ($bool != NULL) {
            echo $bool['book_name'];
        };
    }
}