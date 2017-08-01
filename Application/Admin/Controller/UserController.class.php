<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/11
 * Time: 20:12
 */
namespace Admin\Controller;
use Think\Controller;

class UserController extends CommonController{
    //加载用户列表
    function index(){
        //当前页号下标
        $pageno = I('get.p');
        //每页显示数量
        $pagesize = C('PAGE_SIZE');
        $this->assign('pagesize',$pagesize);

        //1.实例化表模型
        $user = M('User');
        //2.使用select方法查询所有数据
        $data = $user->page($pageno,$pagesize)
            ->select();
        //3.将结果分配到视图中
        $this->assign('ulist',$data);
        //4.实例化分页类
        $count = $user->count();//获取总记录数
        $this->assign('count',$count);
        $page = new \Think\Page($count,$pagesize);
        //5.产生分页导航条的字符串
        $str = $page->show();
        //6.将导航条分配到视图中
        //$this->assign('page',$str);
        $this->display();
    }
    //ajax分页显示内容
    function getContent(){
        $page = I('get.p');
        //echo $page;die;
        $pagesize = C('PAGE_SIZE');
        $user = M('User');
        $data = $user
            ->page($page,$pagesize)
            ->select();
        $this->assign('ulist',$data);
        $this->display();
    }
    //删除用户信息
    function del(){
        $id = I('get.id');
        $user = M('User');
        if($user->delete($id)){
            $this->success('删除用户成功',U('User/index'),3);
        }else{
            $this->error('删除失用户败',U('User/index'),3);
        }

}
}