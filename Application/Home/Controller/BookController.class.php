<?php
namespace Home\Controller;
use Think\Upload;
class BookController extends CommonController{
    function download(){
        $id = I('get.id');
        $book = D('Book');
        $data = $book->find($id);
        $info['download_times'] = $data['download_times']+1;
        $book->where("book_id=$id")->save($info);
        $path = $data['book_path'];
            //调用PHP的下载方法
            header("Content-type: application/octet-stream");
            header('Content-Disposition: attachment; filename="' . basename($path) . '"');
            header("Content-Length: ". filesize($path));
            readfile($path);
    }
    function uploadPic(){
        $config = array(
            'maxSize' => 1024*1024*2,
            'exts' => array('jpg','jpeg','png','gif'),
            'rootPath' => './Upload/Pic/',
        );
        //实例化文件上传类
        $upload = new Upload($config);
        //调用Upload类中upload方法
        $info = $upload->upload();
        if(!$info){
            //上传失败输出错误信息
            echo $upload->getError();
        }else{
            $path = '/Upload/Pic/'.$info['Filedata']['savepath'].$info['Filedata']['savename'];
            echo json_encode($path);
        }
    }
    function uploadBook(){
        $config = array(
            'maxSize' => 1024*1024*20,
            'exts' => array('txt'),
            'rootPath' => './Upload/Book/',
        );
        //实例化文件上传类
        $upload = new Upload($config);
        //调用Upload类中upload方法
        $info = $upload->upload();
        if(!$info){
            //上传失败输出错误信息
            echo $upload->getError();
        }else{
            $path = './Upload/Book/'.$info['Filedata']['savepath'].$info['Filedata']['savename'];
            echo json_encode($path);
        }
    }
    function addBook(){
        $book = D('Book');
        $data = $book->create();
        if(!$data){
            $this->error($book->getError(),U('back'),2);
        }else{
            $info = $book->where("book_name='{$data['book_name']}' and author='{$data['author']}'")->find();
            if($info==""){
                if($book->add($data)){
                    $this->success('上传图书成功',U('User/Person','ac=4'),2);
                }else{
                    $this->error('上传图书失败',U('back'),2);
                }
            }else{
                $imagepath = ".".$data['image'];
                unlink($imagepath);
                unlink($data['book_path']);
                $this->error('您上传的图书已存在！',U('back'),3);
            }
        }
    }
    function back(){
        echo "<script>history.go(-2)</script>";
    }
}
