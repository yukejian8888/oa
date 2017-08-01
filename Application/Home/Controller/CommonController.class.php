<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller{
    function Top(){
        $cate = D('Category');
        $book = D('Book');
        $data = $cate->select();
        $this->assign('cate',$data);
        $d = $book->field('book_id,book_name')->order('download_times desc')->limit(0,4)->select();
        $u = $book->field('book_id,book_name')->order('isgood desc')->limit(0,4)->select();
        $nickname = session('nickname');
        $this->assign('user',$nickname);
        $this->assign('dload',$d);
        $this->assign('uload',$u);
    }
    function Left(){
        $book = M('Book');
        $data = $book->field("book_id,book_name")->where("cat_id in (1,2,3,5,6,7)")->order('isgood desc')->limit(0,6)->select();
        $info = $book->field("book_id,book_name")->where("cat_id in (4,7)")->order('isgood desc')->limit(0,6)->select();
        $this->assign('book_m', $data);
        $this->assign('book_w',$info);
    }
}
