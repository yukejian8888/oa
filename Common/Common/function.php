<?php
function common_test(){
    echo "Common-->test()";
}
function getTree($arr,$pid=0,$level=0){
    static $result = array();
    foreach($arr as $value){
        if($value['dept_pid']==$pid){
            $value['dept_level'] = $level;
            $result[] = $value;
            getTree($arr,$value['dept_id'],$level+1);
        }
    }
    return $result;
}
function getNodeTree($arr,$pid=0){
    static $result = array();
    foreach($arr as $value){
        if($value['node_pid']==$pid){
            $result[] = $value;
            getNodeTree($arr,$value['node_id']);
        }
    }
    return $result;
}
function checkDept($dept_id){
    $data = M('Dept')->field('dept_id')->select();
    $arr = array();
    foreach($data as $value){
        $arr[] = $value['dept_id'];
    }
    if(in_array($dept_id,$arr)){
        return true;
    }else{
        return false;
    }
}
function setDateTime(){
    return date('Y-m-d');
}
function checkDateTime($data){
    $arr = explode('-',$data);
    if($arr[0] > date('Y')){ //验证年份
        return false;
    }else if($arr[1] < 1 || $arr[2] > 12){
        return false;
    }else if($arr[2] < 1 || $arr[2] > 31){
        return false;
    }
}