<?php
namespace Admin\Controller;
use Think\Controller;

class DBController extends Controller{
    function add_test(){
        //1.实例化数据表模型
        //不需要数据表前缀，建议首字母大写
        $student = M('Student');
        //2.设置插入数据
        $data = array(
           
            'sname' => '张翠山',
            'sage' => 45,
            'ssex' => '男',
            'sdept' => 'UI学院',
            'saddtime' => date('Y-m-d')
        );
        //使用add方法进行数据插入操作
        $student->add($data);
    }
    function save_test(){
        //1.实例化数据表模型
        $student = M('Student');
        //2.设置修改数据的信息
        $data = array(
            'sno' => 10002,
            'sage'=> 28,
            'sdept' => 'IOS学院'
        );
        $student->save($data);
    
    }
    function del_test(){
        //实例化数据表模型
        //调用delete方法进行删除，根据主键删除
        M('Student')->delete(10003);
    }
    function read_test(){
        //1.实例化数据表模型
        $student = M('Student');
        //2.执行select(),查询多条数据
        //$data = $student->select();
        //3.使用dump()输出数据
        //使用find方法查询
        $data = $student->find(10001);
        
        dump($data);
    }
    
}