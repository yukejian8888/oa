<?php
namespace Admin\Controller;
use Think\Controller;
class FileController extends Controller{
    function index(){
        //common_test();
        myfile_test();
    }
    function class_test(){
        $test = new \Tools\Test();
        $test->getName();
    }
}