<?php
namespace Home\Model;
use Think\Model;
class DocModel extends Model{
    protected $pk = "doc_id";
    protected $fields = array(
        'doc_id','doc_title','doc_content','doc_file','doc_userid','doc_ctime'
    );
    protected $_map = array(
        'id' => 'doc_id',
        'title' => 'doc_title',
        'file'  => 'doc_file',
        'content' => 'doc_content'
    );
    protected $_validate = array(
        array('doc_title', 'require', '标题不能为空'),
        array('doc_content', 'require', '内容不能为空'),
    );
    protected $_auto = array(
        array('doc_ctime', 'setDateTime', 1, 'function'),
        array('doc_userid', 'getS', 3, 'callback')
    );
    function getS(){
        return session('uid');
    }
    
}