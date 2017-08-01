<?php
namespace Home\Controller;
class NodeController extends CommonController{
    function add(){
        $data = D('Node')->select();
        $this->assign('nList',$data);
        $this->display();
    }
    function addOk(){
        $node = D('Node');
        $data = $node->create();
        if(!empty($data['node_module'])){
            $data['node_path'] = $data['node_module'].'-'.$data['node_controller']
            .'-'.$data['node_action'];
        }
        if($node->add($data)){
            $this->success('添加节点成功',U('index'),3);
        }else{
            $this->error('添加节点失败',U('add'),3);
        }
    }
    function index(){
        $data = D('Node')->select();
        $data = getNodeTree($data);
        $this->assign('nList',$data);
        $this->display();
    }
}