<?php
namespace Home\Controller;
use Think\Upload;
class DocController extends CommonController{
    function index(){
        $doc = D('Doc');
        $data = $doc->select();
        $this->assign('docList',$data);
        $this->display();
    }
    function add(){
        $this->display();
    }
    function addOk(){
        //1.文件上传，配置上传参数
        $config = array(
            'maxSize'  => 5242880,
            'exts'     => array('doc','docx','jpg','png','gif','txt'),
            'rootPath' => './Uploads/'
        );
        //实例化上传类
        $upload = new Upload($config);
        $info = $upload->upload();
        if(!$info){
            echo $upload->getError();
        }
        //2.数据表添加
        //实例化Doc模型
        $doc = D('Doc');
        //调用create方法，创建数据对象
        $data = $doc->create();
        //将文件保存路径补充到$data中
        $data['doc_file'] = './Uploads/'.$info['file']['savepath'].$info['file']['savename'];
        if($doc->add($data)){
            $this->success('添加公文成功',U('index'),3);
        }else{
            $this->error('添加公文失败',U('add'),3);
        } 
    }
   function download(){
        //接收id,查询附件路径
        $id = I('get.id');
        $info = D('Doc')->find($id);
        $path = $info['doc_file'];
        
        //调用PHP的下载方法
        header("Content-type: application/octet-stream");
        header('Content-Disposition: attachment; filename="' . basename($path) . '"');
        header("Content-Length: ". filesize($path));
        readfile($path);
    }
    function getContent(){
        //接收id
        $id = I('get.id');
        $info = D('Doc')->find($id);
        $info['doc_content'] = htmlspecialchars_decode($info['doc_content']);
        echo json_encode($info);
    }
    function del(){
        $id = I('get.id');
        $doc = D('Doc');
        //1.删除文件
        $info = $doc->find($id);
        $path = $info['doc_file'];
        unlink($path);
        //2.删除数据表中的数据
        if($doc->delete($id)){
            $this->success('删除公文成功',U('index'),3);
        }else{
            $this->error('删除公文失败',U('index'),3);
        }   
    }
    function edit(){
        $id = I('get.id');
        $doc = D('Doc');
        $info = $doc->find($id);
        $this->assign('info',$info);
        $this->display();
    }
    function modify(){
        $config = array(
            'maxSize'  => 5242880,
            'exts'     => array('doc','docx','jpg','png','gif','txt'),
            'rootPath' => './Uploads/'
        );
        //确定是否更新了附件
        $upload = new Upload();
        $info = $upload->upload();
        $doc = D('Doc');
        //从表单接收数据
        $data = $doc->create();
        //dump($data);die;
        if($info){
            //删除旧文件
            $tmp = $doc->find($data['doc_id']);
            $path = $tmp['doc_file'];
            unlink($path);
            //将新上传的文件路径保存到$data中
            $data['doc_file'] = './Uploads/'.$info['file']['savepath'].$info['file']['savename'];   
        }
        //执行更新操作
        //echo $doc->save($data);die;
        //dump($doc->save($data));die;
        if($doc->save($data)){
            $this->success('修改公文成功',U('index'),3);
        }else{
            $this->error('修改公文失败',U("Home/Doc/edit/id/{$data['doc_id']}"),3);
        }
    }
}