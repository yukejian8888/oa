<?php
namespace Admin\Controller;
use Think\Controller;
class VarController extends Controller{
    function index(){
        //分配变量到模板文件
        //$str = "abcdefg";
        //$this->assign('s',$str);
        //$this->display();
        
        //分配数组到模板文件
        $arr = array('a','b','c','d');//索引数组
        $this->assign('arr',$arr);
        
        $info = array('id'=>1,'name'=>'小鱼儿','sex'=>'男');
        $this->assign('info',$info);
        $this->display();
        
    }
    //分配对象到模板文件
    function obj(){
        // \ 根空间
        // stdClass()是PHP底层空类
        $s = new \stdClass();
        $s->name = "李易峰";
        $s->age = 28;
        $this->assign('s',$s);
        $this->display();
        
    }
    function sys(){
        $this->display();
    }
    function modify(){
        $this->assign('str','abcdefg');
        $this->display();
    }
}