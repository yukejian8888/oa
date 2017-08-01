<?php
//1.声明命名空间
namespace Home\Controller;
//2.引入控制器基类
//3.声明控制器类
class MainController extends CommonController{
    function index(){
        //1.实例化role模型,从中获取到role_nodeid
        $rid = session('uroleid');
        $role_tmp = D('Role')->field('role_nodeid')->find($rid);
        $nodeid = $role_tmp['role_nodeid'];
        //dump($nodeid);die;
        //2.实例化node模型,根据查询的nodeid来找到具体可操作权限
        //$node_tmp = D('Node')->where("node_id in ($nodeid)")->select();
        //dump($node_tmp);die;
        //分别获取一级菜单和二级菜单的数组,都分配到模板中
        $levelA = D('Node')
            ->where("node_id in ($nodeid) and node_level=0 and isshow=0")->select();
        $levelB = D('Node')
            ->where("node_id in ($nodeid) and node_level=1 and isshow=1")->select();
        $this->assign('levelA',$levelA);
        $this->assign('levelB',$levelB);                    
        $this->display();
    }
    function home(){
        $this->display();
    }
    function login(){
        session(null);
        $this->success('登出成功',U('Index/login'),3);
    }
    public function write(){
        S(array('type'=>'memcache','host'=>'127.0.0.1','port'=>11211));
        $rs = S('name','php50',20);
        dump($rs);
    }
    public function read(){
        S(array('type'=>'memcache','host'=>'127.0.0.1','port'=>11211));
        $data = S('name');
        dump($data);
    }
}