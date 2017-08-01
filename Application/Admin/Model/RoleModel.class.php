<?php
namespace Home\Model;
use Think\Model;

class RoleModel extends Model{
    protected $pk = 'role_id';
    protected $fields = array(
        'role_id', 'role_name', 'role_nodeid', 'role_path'
    );
}