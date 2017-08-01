<?php
namespace Admin\Controller;
use Think\Controller;
class BooksController extends Controller{
    function index(){
        $pageno = I('get.p');
        $pagesize = 6;
        $this->assign('pagesize',$pagesize);
        $book =M('book');
        /*$data = $book->page($pageno,$pagesize)
            ->select();*/
        $data = $book->alias('b')
            ->page($pageno,$pagesize)
            ->field('b.*,u.nick_name,c.cat_name')
            ->join('bs_user u on b.user_id=u.user_id')
            ->join('bs_category c on b.cat_id = c.cat_id')
            ->order('book_id desc')
            ->select();
        $this->assign('data',$data);


        $count = $book->count();
        /*$count = intval($count);*/
        //dump($count);die;
        $this->assign('count',$count);
        $page = new \Think\Page($count,$pagesize);

        $str = $page->show();
        $this->assign('page',$str);
        $this->display();
    }
    function getContent(){
        $page = I('get.p');
        $pagesize = 6;
        $Book = D('book');
        /*$data = $Book
            ->page($page,$pagesize)
            ->select();*/
        $data = $Book->alias('b')
            ->page($page,$pagesize)
            ->field('b.*,u.nick_name,c.cat_name')
            ->join('bs_user u on b.user_id=u.user_id')
            ->join('bs_category c on b.cat_id = c.cat_id')
            ->order('book_id desc')
            ->select();
        $this->assign('data',$data);
        $this->display();
    }
   /* function Del(){
        $id = I('get.id');
        $book = M('book');
       if($info = $book->delete($id)){
           $this->success('删除成功',U('index'),3);
       }else{
           $this->error('删除失败',U('index'),3);
       }
   }*/
    /*function audit(){
        $id = I('get.id');
        $book = D('book');
        $info = $book->alias('b')
            ->field('b.*,u.nick_name')
            ->join('left join bs_user u on b.user_id=u.user_id')
            ->find($id);
        $data = $book->alias('b')
            ->field('b.*,c.cat_name')
            ->join('left join bs_category c on b.cat_id=c.cat_id')
            ->find($id);
       // dump($info);
        $this->assign('info',$info);
        $this->assign('data',$data);
        $this->display();
    }*/
    function auditok(){
        $id = I('get.id');
        $book = D('book');
        $num['is_show'] = 1;
        $book->where("book_id=$id")->save($num);
        $this->success('通过审核',U('index'),3);

        /*$info = array();
        $info['id'] = I('post.id');
        $info['status'] = I('post.status');
        dump($info);die;
        $book = M('book');
        if($book->save($info)){
            $this->success('审核成功',U('index'),3);
        }else{
            $this->error('失败',U('index'),3);
        }*/

    }
    function auditno(){
        $id = I('get.id');
        $book = D('book');
        $num['is_show'] = 2;
        $book->where("book_id=$id")->save($num);
        $this->success('通过未通过审核',U('index'),3);
    }
    function download(){
        //下载文文件路径
        $id = I('get.id');
        $info = D('book')->find($id);
        $path = $info['book_path'];

        header("Content-type: application/octet-stream");
        header('Content-Disposition: attachment; filename="' . basename($path) . '"');
        header("Content-Length: ". filesize($path));
        readfile($path);
    }
}