<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/11
 * Time: 20:12
 */
namespace Admin\Controller;
use Think\Controller;

class AdminController extends CommonController{
    //加载管理员列表
    function index(){
        $data = D('Admin')->select();
        $this->assign('data',$data);
        $this->display();
    }
    //加载添加管理员页面111
    function add(){
        $this->display();
    }
    //提交添加管理员页面
    public function addSave(){
        $admin = D('Admin');
        $data = $admin->create();
        if(!$data){
            $this->error($admin->getError(),U('add'),3);
        }else{
            if($admin->add($data)){
                $this->success('添加管理员成功',U('Admin/Admin/index'),3);
            }else{
                $this->error('添加管理员失败',U('Admin/Admin/back'),3);
            }
        }
    }
    //加载修改管理员页面
    function edit(){
        $id = I('get.id');
        $data = D('Admin')->where("admin_id = $id")->select();
        //echo "<pre>";var_dump($data);die;
        $data = $data[0];
        $this->assign('admin',$data);
        $this->display();
    }
    //提交修改管理员数据
    function modify(){
        $admin = D('Admin');
        $data = $admin->create();
        $id = I('get.id');
        //执行更新操作
        if($admin-> where("admin_id=$id")->save($data)){
            $this->success('更新管理员信息成功',U('Admin/Admin/index'),3);
        }else{
            $this->error('更新管理员信息失败',U('Admin/Admin/edit/id/'.$id),3);
        }
    }
    //删除管理员信息
    function del(){
        $id = I('get.id');
        $admin = M('Admin');
        if($admin->delete($id)){
            $this->success('删除管理员信息成功',U('Admin/Admin/index'),3);
        }else{
            $this->error('删除管理员信息失败',U('Admin/Admin/index'),3);
        }
    }
    function back(){
        echo "<script>history.go(-2)</script>";
    }
}
