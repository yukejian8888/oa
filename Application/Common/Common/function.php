<?php
//可以发送https，http，get方式，post方式  post数据发送
function request($url,$https=true,$method='get',$data=null){
  //1.初始化curl
  $ch = curl_init($url);
  //2.设置相关的参数
  //字符串不直接输出,进行一个变量的存储
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  // curl_setopt($ch, CURLOPT_HEADER, 1);
  //判断是否为https请求
  if($https === true){
    //为了确保https请求能够请求成功
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  }
  //判断是否为post请求
  if($method == 'post'){
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  }
  //3.发送请求
  $str = curl_exec($ch);
  // $hd = curl_getinfo($ch);
  //4.关闭连接
  curl_close($ch);
  //返回请求到的结果
  // return array('str'=>$str,'hd'=>$hd);
  return $str;
}
function DateTime(){
  return time();
}
//添加管理员表单自动完成规则
function setDateTime(){
  return date('Y-m-d H:i:s');
}
//添加管理员表单生日验证
function checkDateTime($data){
  $arr = explode('-', $data);
  if($arr[0] > date('Y')){ //验证年份
    return false;
  } else if($arr[1] < 1 || $arr[1] > 12){
    return false;
  } else if($arr[2] < 1 || $arr[2] > 31){
    return false;
  }
}