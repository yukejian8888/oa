<?php
namespace Admin\Controller;
use Think\Controller;
class RoleController extends CommonController{
    function index(){
        $role = D('Role');
        $data = $role->select();
        $this->assign('rlist', $data);
        $this->display();
    }

    function distribute(){
        //接收要修改的role_id
        $id = I('get.id');
        $this->assign('role_id', $id);
        // 读取node表，获取所有的节点信息
        $node = D('Node');
        $data = $node->order('node_id asc')->select();
        $this->assign('nlist', $data);
        // 读取role表中的 role_nodeid字段
        $rdata = D('Role')->find($id);
        $this->assign('rdata', $rdata['role_nodeid']);
        $this->display();
    }

    function distributeOk(){
        $role_id = I('get.roleid');
        $ids = I('get.ids');
        // 剪裁掉最后一个 ,
        $ids = substr($ids, 0, strlen($ids) - 1);
        // 根据ids拼接role_path中的内容
        // where id in ('1,2,3,4');
        // 根据ids，查询Node表中的数据
        $data = D('Node')->order('node_id asc')
            ->where("node_id in ($ids)")->select();
        //dump($data);
        // 将所有取得到的 node_path拼接
        $str_path = "Admin-Main-index,";
        foreach($data as $value){
            if(!empty($value['node_path'])){
                $str_path .= $value['node_path'].',';
            }
        }
        //去掉str_path的最后一个，
        $str_path = substr($str_path, 0, strlen($str_path) - 1);
        //echo $str_path;

        // 修改用户权限
        $tmp = array(
            'role_id' => $role_id,
            'role_nodeid' => $ids,
            'role_path' => $str_path
        );

        if(D('Role')->save($tmp)){
            $this->success('分配权限成功', U('index'), 3);
        } else {
            $this->error('分配权限失败', U('index'), 3);
        }
    }
    function add()
    {
        $this->display();
    }
    function addOk()
    {
        $role['role_name']=I('post.name');
        $role['role_nodeid']=1;
        $role['role_path']="Home-Main-index,Home-Main-home,Home-Main-outlogin,";
        $roledb=M('Role');
        if($roledb->add($role))
        {
            $this->success('添加成功',U('Admin/Role/index'),3);
        }
        else
        {
            $this->error('添加失败',U('Admin/Role/index'),3);
        }
    }
}