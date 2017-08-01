<?php
namespace Home\Model;
use Think\Model;
class BookModel extends Model{
    protected $pk = 'book_id';
    protected $fields = array(
        'book_id','book_name','author','user_id','isgood','book_path','upload_time','is_show','image','sort','download_times','is_top','intro','update_time','cat_id','status'
    );
    protected $_map = array(
        'name' => 'book_name',
        'bookauthor' => 'author',
        'cat' => 'cat_id',
        'content' => 'intro',
        'Pic' => 'image',
        'book' => 'book_path'
    );
    protected $_validate = array(
        array('book_name','require','书名不能为空',1,'regex',3),
        array('author','require','作者不能为空',1,'regex',3),
        array('intro','require','书籍简介不能为空',1,'regex',3),
        array('book_path','require','必须上传书籍',1,'regex',3),
        array('cat_id','require','类别不能为空',1,'regex',3),
    );
    protected $_auto = array(
        array('user_id','setS',3,'callback'),
        array('upload_time','DateTime',1,'function'),
    );
    function setS(){
        return session('userid');
    }
}