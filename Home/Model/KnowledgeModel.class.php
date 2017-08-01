<?php
namespace Home\Model;
use Think\Model;
class KnowledgeModel extends Model{
    protected $pk = 'k_id';
    protected $fields = array(
        'k_id','k_title','k_content','k_pic','k_smallpic',
        'k_userid','k_ctime'
    );
    //字段映射
    protected $_map = array(
        'id' => 'k_id',
        'title' => 'k_title',
        'content' => 'k_content',
        'pic' => 'k_pic',
        'smallpic' => 'k_smallpic'
    );
    //自动验证
    protected $_validate = array(
        array('k_title','require','标题不能为空'),
        array('k_content','require','内容不能为空')
    );
    //自动完成
    protected $_auto = array(
        array('k_userid','setS',3,'callback'),
        array('k_ctime','setDateTime',1,'function')
    );
    function setS(){
        return session('uid');
    }
}