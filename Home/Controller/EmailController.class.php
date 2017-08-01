<?php
namespace Home\Controller;
class EmailController extends CommonController{
    function add(){
        $this->display();
    }
    function getNames(){
        $name = I('post.name');
        $user = D('User');
        $data = $user->field('user_nickname')
            ->where("user_nickname like '%$name%'")
            ->select();
        echo json_encode($data);
    }
}