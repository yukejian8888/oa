<?php
namespace Home\Controller;
class UserController extends CommonController{
    function _initialize(){
        if(!session('?username')){
            $this->error('请先登录！',U('Main/Index'),2);
        }
    }
    function Logout(){
        session(null);
        /*$this->success('退出登录成功 ！',U('Main/Index'),2);*/
        echo '退出登录成功 ！';
    }
    function Person(){
        $action = I('get.ac');
        if($action==1){
            $data['action'] = 1;
            $this->assign('data',$data);
            $this->display();
        }else if($action==2){
            $data['action'] = 2;
            $this->assign('data',$data);
            $this->display();
        }else if($action==3){
            $data['action'] = 3;
            $cat = M('Category');
            $info = $cat->select();
            $this->assign('data',$data);
            $this->assign('cat',$info);
            $this->display();
        }else if($action==4){
            $data['action'] = 4;
            $userid = session('userid');
            $book = D('Book');
            $info = $book->where("user_id=$userid")->field('book_id,book_name,author,upload_time,is_show')->select();
            $this->assign('data',$data);
            $this->assign('book',$info);
            $this->display();
        }else{
            $this->display();
        }
    }
    function reNickName(){
        $userid = session('userid');
        $newnickname['nick_name'] = I('post.nickname');
        $user = D('User');
        $info = $user->where("user_id=$userid")->save($newnickname);
        if($info===false){
            echo $this->error($user->getError(),U('back'),2);
        }else{
            echo $this->success('修改昵称成功！',U('person'),2);
            session('nickname',$newnickname['nick_name']);
        }
    }
    function rePassWord(){
        $userid = session('userid');
        $repwd = I('post.newpwd');
        $newpwd['password'] = md5($repwd);
        $user = D('User');
        $info = $user->where("user_id=$userid")->save($newpwd);
        if($info===false){
            echo $this->error($user->getError(),U('back'),2);
        }else{
            echo $this->success('修改密码成功！',U('person'),2);
        }
    }
    function back(){
        echo "<script>history.go(-2)</script>";
    }
}