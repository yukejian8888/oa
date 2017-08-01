<?php
namespace Home\Controller;
class UserController extends CommonController{
    function index(){
        //p下标就代表当前页号的下标
        $pageno = I('get.p');
        //每页显示数量
        $pagesize = C('PAGE_SIZE');
        $this->assign('pagesize',$pagesize);
        //1.实例化数据表模型
        $user = D('User');
        //2.使用select方法查询所有数据
        $data = $user->alias('u')
            ->page($pageno,$pagesize)
            ->join('left join oa_dept d on u.user_deptid=d.dept_id')
            ->select();
        //3.将结果分配到视图文件中
        $this->assign('ulist',$data);
        //$this->display('index');
        //4.实例化分页类
        $count = $user->count(); //获取总记录数
        $this->assign('count',$count);
        $page = new \Think\Page($count,$pagesize);
        //产生分页导航条的字符串
        $str = $page->show();
        //6.将导航条字符串分配到视图中
        $this->assign('page',$str);
        $this->display('index');
       
    }
    function add(){
        $this->display();
    }
    function addOk(){
        //获取表单提交数据的数据对象
       $user = D('User');
       $data = $user->create();
       if(!$data){
           $this->error($user->getError(),U('add'),3);
       }else{
           if($user->add($data)){
               $this->success('新用户添加成功',U('index'),3);
           }else{
               $this->error('新用户添加失败',U('add'),3);
           }
       }
    }
    function del(){
        $id = I('get.id');
        if(M('User')->delete($id)){
            $this->success('删除用户成功',U('index'),3);
        }else{
            $this->error('删除用户失败',U('index'),3);
        }
    }
    function dels(){
        //接收URL的批量传参，得到的是一个id的字符串
        $ids = I('get.ids');
        if(empty($ids)){
            echo "<script>alert('请选择要删除的用户选项')</script>";
            $this->index();
            die;
        }
        //将字符串使用，来进行分割
        $id_arr = explode(',',$ids);
        //弹出数组的最后一个单元
        array_pop($id_arr);
        //循环删除
        $user = M('User');
        foreach($id_arr as $value){
            $user->delete($value);
        }
    
        $this->success('批量删除用户成功',U('index'),3);
    }
    function edit(){
        //接收get传递的id值
        $id = I('get.id');
        //实例化数据表模型
        $user = M('User');
        //使用find()方法查询用户信息
        $info = $user->find($id);
        //将数组分配到模板视图
        $this->assign('dinfo',$info);
        //查询用户表，获取所有用户信息
        //$list = $user->select();
       // $this->assign('dlist',$list);
        //调用视图
        $this->display();
    }
    function modify(){
        //从表单获取修改后的用户信息
        $info = array();
        $info['user_id'] = $_POST['id'];
        $info['user_name'] = $_POST['name'];
        $info['user_nickname'] = $_POST['nickname'];
        $info['user_password'] = $_POST['password'];
        $info['user_sex'] = $_POST['sex'];
        $info['user_birthday'] = $_POST['birthday'];
        $info['user_tel'] = $_POST['tel'];
        $info['user_email'] = $_POST['email'];
        //实例化数据表，并且进行修改
        if(M('User')->save($info)){
            $this->success('修改用户成功',U('index'),3);
        }else{
            $this->error('修改用户失败',U('edit'),3);
        }
    }
    function getContent(){
        $page = I('get.p');
        $pagesize = C('PAGE_SIZE');
        $user = D('User');
        $data = $user
            ->page($page,$pagesize)
            ->select();
        $this->assign('ulist',$data);
        $this->display();
    }
    function charts(){
        //1.实例化User数据表模型
        $user = D('User');
        //2.查询数据
        $data = $user->alias('u')
            ->join('left join oa_dept d on u.user_deptid=d.dept_id')
            ->field('d.dept_name,count(*) as num')
            ->group('user_deptid')
            ->select();
        //将产生的数组转换成charts.html中使用结构
        $str = "";
        foreach($data as $value){
            $str .= "['".$value['dept_name']."',".$value['num']."],";  
        }
        $this->assign('str',$str);
        $this->display();
    }
    
}