<?php
namespace Home\Model;
use Think\Model;
class NodeModel extends Model{
    protected $pk = 'node_id';
    protected $fields = array(
        'node_id','node_name','node_pid','node_module','node_controller','node_action',
        'node_path','node_level','node_title','node_sort'
    );
    protected $_map = array(
        'id' => 'node_id',
        'name' => 'node_name',
        'pid' => 'node_pid',
        'module' => 'node_module',
        'controller' => 'node_controller',
        'action' => 'node_action',
        'level' => 'node_level',
        'title' => 'node_title',
        'sort' => 'node_sort'
    );
}