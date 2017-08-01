<?php
namespace Home\Controller;
use Think\Controller;
class DeptController extends CommonController{
    function index(){
        //1.实例化数据表模型
        $dept = M('Dept');
        //2.使用select()查询所有的部门信息
        //$data = $dept->select();
        //使用join方法进行多表联合查询，需要设置要查询的字段名称
        $data = $dept->alias('d1')
            ->field('d1.dept_id,d1.dept_name,d1.dept_pid,d2.dept_name as name
                ,d1.dept_sort,d1.dept_remark')
            ->join('left join oa_dept d2 on d1.dept_pid=d2.dept_id')
            ->select();
        //调用getTree()函数充足$data数组
        $data = getTree($data);
        
        //3.将部门数据分配到模板中
        $this->assign('dlist',$data);
        $this->display('index');
    }
    function add(){
        //获取部门信息，用来做上下级部门的下拉菜单
        $dept = M('Dept');
        $data = $dept->select();
        $this->assign('dlist',$data);
        $this->display();
    }
    function addok(){
        //定义数组，用来保存表单提交的数据
        $info = array();
        $info['dept_name'] = $_POST['name'];
        $info['dept_pid'] = $_POST['pid'];
        $info['dept_sort'] = $_POST['sort'];
        $info['dept_remark'] = $_POST['remark'];
        $info['dept_ctime'] = date('Y-m-d');
        //实例化数据表模型
        $dept = M('Dept');
        //执行插入操作
        if($dept->add($info)){
            $this->success('添加部门成功',U('index'),3);
        }else{
            $this->error('添加部门失败',U('add'),3);
        }
    }
    function del(){
        //从URL中接收id的值
        $id = I('get.id');
        if(M('Dept')->delete($id)){
            $this->success('删除部门成功',U('index'),3);
        }else{
            $this->error('删除部门记录失败',U('index',3));
        }    
    }
    
    function dels(){
        //接收URL的批量传参，得到的是一个id的字符串                       
        $ids = I('get.ids');
        if(empty($ids)){
            echo "<script>alert('请选择要删除的部门选项')</script>";   
             $this->index();        
            die;
        }
        //将字符串使用，来进行分割
        $id_arr = explode(',',$ids);
        //弹出数组的最后一个单元
        array_pop($id_arr);
        //循环删除
        $dept = M('Dept');
        foreach($id_arr as $value){
            $dept->delete($value);
        }
    
            $this->success('批量删除部门成功',U('index'),3);
        
        
    }
    function edit(){
        //接收get传递的id值
        $id = I('get.id');
        //实例化数据表模型
        $dept = M('Dept');
        //使用find()方法查询部门信息
        $info = $dept->find($id);
        //将数组分配到模板视图
        $this->assign('dinfo',$info);
        //查询部门表，获取所有部门信息
        $list = $dept->select();
        $this->assign('dlist',$list);
        //调用视图
        $this->display(); 
    }
    function modify(){
        //从表单获取修改后的部门信息
        $info = array();
        $info['dept_id'] = $_POST['id'];
        $info['dept_name'] = $_POST['name'];
        $info['dept_pid'] = $_POST['pid'];
        $info['dept_sort'] = $_POST['sort'];
        $info['dept_remark'] = $_POST['remark'];
        //实例化数据表
        if(M('Dept')->save($info)){
            $this->success('修改部门信息成功',U('index'),3);
        }else{
            $this->error('修改部门信息失败',U('index'),3);
        }
    }
}