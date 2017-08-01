<?php
namespace Home\Controller;
class RoleController extends CommonController{
    function index(){
        $role = D('Role');
        $data = $role->select();
        $this->assign('rlist',$data);
        $this->display();
    }
    function distribute(){
        //接收要秀给的role_id
        $id = I('get.id');
        //读取node表，获取所有的信息
        $node = D('Node');
        $data = $node->select();
        $this->assign('nlist',$data);
        $this->display();
    }
    function distributeOk(){
        $role_id = I('get.roleid');
        $ids = I('get.ids');
        //剪裁掉最后一个,
        $ids = substr($ids, 0, strlen($ids)-1);
        //根据id拼接role_path中的内容
        //如:where id in ('1,2,3,4');
        //根据ids,查询Node表中的数据
        $data = D('Node')->order('node_id asc')
            ->where("node_id in ($ids)")
            ->select();
        //dump($data);
        //将所有渠道的node_path拼接
        $str_path = "Home-Main-index";
        foreach($data as $value){
            if(!empty($value['node_path'])){
                $str_path .= $value['node_path'].',';  
            }
        }
        //去掉str_path的最后一个,
        $str_path = substr($str_path, 0, strlen($str_path)-1);
        //修改用户权限
        $tmp = array(
            'role_id' => $role_id,
            'role_nodeid' => $ids,
            'role_path' => $str_path
        );
        if(D('Role')->save($tmp)){
            $this->success('分配权限成功',U('index'),3);
        }else{
            $this->error('分配权限失败',U('index'),3);
        }
    }
}