<?php
namespace Home\Controller;
use Think\Upload;
use Think\Image;
class KnowledgeController extends CommonController{
    function index(){
        $knowledge = D('Knowledge');
        $data = $knowledge->select();
        $this->assign('kList',$data);
        $this->display();
    }
    function add(){
        $this->display();
    }
    function upload_file(){
        if(session('?pic')){
            unlink(session('pic'));
        }
        if(session('?smallpic')){
            unlink(session('smallpic'));
        }
        //1.上传图片操作
        $config = array(
            'maxSize' => 5242880,
            'exts'    => array('jpg','gif','png'),
            'rootPath' => './Uploads/images/'
        );
        $upload = new Upload($config);
        $info = $upload->upload();
        $fp = fopen('f:/a.txt', 'w');
        fwrite($fp,serialize($info));
        //dump($info);die;
        if(!$info){
            echo $upload->getError();
        }else{
            //2.进行缩略图制作
            $img = new Image();
            $pic = './Uploads/images/'.$info['Filedata']['savepath'].$info['Filedata']['savename'];
            session('pic',$pic);
            //打开图片
            
            $img->open($pic);
            //制作缩略图
            $img->thumb(150,120,6);
            //拼接缩略图的路径
            $smallpic = './Uploads/images/'.$info['Filedata']['savepath'].'small_'.$info['Filedata']['savename'];
            session('smallpic',$smallpic);
            //保存缩略图
            $img->save($smallpic);
        }
         echo json_encode(array('pic'=>$pic,'smallpic'=>$smallpic));
    }
    function addOk(){
        $knowledge = D('Knowledge');
        $data = $knowledge->create();
        if($knowledge->add($data)){
            session('pic',null);
            session('smallpic',null);
            $this->success('添加知识成功',U('index'),3);
        } else{
            $this->error('添加知识失败',U('add'),3);
        }
    }
}