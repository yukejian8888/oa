<?php
namespace Home\Controller;
use Think\Verify;
class MainController extends CommonController{
    function Index(){
        //p 下标就代表当前页号的下标
        $pageno = I('get.p');
        //每页显示数量
        //$pagesize = C('PAGE_SIZE');
        $pagesize = 6;
        //1. 实例化表模型
        $book = M('Book');
        $this->Top();
        $this->Left();
        $cate = I('get.cid');
        $show = I('get.show');
        if($cate!=""){
            $info = $book->where("cat_id=$cate and is_show=1")->order('upload_time desc')->page($pageno,$pagesize)->select();
            $count = $book->where("cat_id=$cate and is_show=1")->count();
        }else{
            if($show==1){
                $info = $book->order('download_times desc')->where("is_show=1")->page($pageno,$pagesize)->select();
                $count = $book->where("is_show=1")->count();
            }else if($show==2){
                $info = $book->order('isgood desc')->where("is_show=1")->page($pageno,$pagesize)->select();
                $count = $book->where("is_show=1")->count();
            }else{
                $info = $book->order('upload_time desc')->where("is_show=1")->page($pageno,$pagesize)->select();
                $count = $book->where("is_show=1")->count();
            }
        }
        $this->assign('book',$info);
        //4. 实例化分页类
        $this->assign('count', $count);
        $page = new \Think\Page($count, $pagesize);
        //5. 产生分页导航条的字符串
        $str = $page->show();
        //6. 将导航条字符串分配到视图中
        $this->assign('page', $str);
        $this->display();
    }
    function details(){
        $book = M('Book');
        $cate = I('get.id');
        $info = $book->find($cate);
        $user = M('User');
        $username = $user->find($info['user_id']);
        $info['nickname'] = $username['nick_name'];
        $this->assign('book',$info);
        $this->Top();
        $this->Left();
        $this->display();
    }
    function isGood(){
        $id = I('get.id');
        $book = M('Book');
        $sum = $book->field('book_id,isgood')->find($id);
        $sum['isgood'] = $sum['isgood']+1;
        $book->where("book_id=$id")->save($sum);
        echo "推荐成功！";
    }
    function search(){
        $this->Top();
        $this->Left();
        $keywords = I('get.kw');
        $choose = I('get.ch');
        $book = M('Book');
        if($choose==1){
            $info = $book->where("book_name like '%$keywords%'")->select();
        }else if($choose==2){
            $info = $book->where("author like '%$keywords%'")->select();
        }
        $data['keywords'] = $keywords;
        $data['choose'] = $choose;
        $this->assign('data',$data);
        $this->assign('book',$info);
        $this->display('index');
    }
    function getAuthorAbstract(){
        $abstract = I('get.abstract');
        $url = "http://baike.baidu.com/api/openapi/BaikeLemmaCardApi?scope=103&format=json&appid=379020&bk_key=".$abstract."&bk_length=600";
        $content = request($url);
        $content = json_decode($content);
        //dump($content);
        $authorabstract[0] = $abstract;
        $authorabstract[1] = $content->card[0]->name."：".$content->card[0]->value[0];
        $authorabstract[2] = $content->card[1]->name."：".$content->card[1]->value[0];
        $authorabstract[3] = $content->card[2]->name."：".$content->card[2]->value[0];
        $authorabstract[4] = $content->card[3]->name."：".$content->card[3]->value[0];
        $authorabstract[5] = $content->card[4]->name."：".$content->card[4]->value[0];
        $authorabstract[6] = $content->card[5]->name."：".$content->card[5]->value[0];
        $authorabstract[7] = $content->card[6]->name."：".$content->card[6]->value[0];
        $authorabstract[8] = $content->card[7]->name."：".$content->card[7]->value[0];
        $authorabstract[9] = $content->card[8]->name."：".$content->card[8]->value[0];
        $authorabstract[10] = "简介：".$content->abstract;
        $authorabstract[11] = "版权：".$content->copyrights;
        $this->Top();
        $this->Left();
        $this->assign('abstract',$authorabstract);
        $this->display('abstract');
    }
    function Verify(){
        $arr = array(
            /*'imageH' => 38,
            'imageW' => 75,*/
            'fontSize' => 10,
            'useCurve' => false,
            'useNoise' => false,
            'bg' => array(72,60,48),
            'length' => 5,
            'fontttf' => '5.ttf',
        );
        $yzm = new Verify($arr);
        $yzm->entry();
    }
    function LoginCheck(){
        //接收表单提交的验证码
        $code = I('post.code');
        //对验证码进行验证
        $yzm = new Verify();
        if(!$yzm->check($code)){
            echo '验证码错误';die;
        }
        $phone = I('post.phone');
        $password = I('post.password');
        if(D('user')->LoginCheck($phone,$password)){
            echo "登录成功！";
        }else{
            echo '手机号或密码错误！';
        }
    }
}
