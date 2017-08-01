<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
class ImgController extends Controller{
    function index(){
        $arr = array(
            'fontSize' => 25,
            'useCurve' => false,
            'useNoise' => false,
            'useImgBg' => false,
            'bg'       => array(200,100,180),
            'fontttf'  => 'SIMSUN.TTC',
            'useZh'    => true,
            'zhSet'    => '是人事科定时开我上课额你的思考电脑上',
        );
        $v = new Verify($arr);
        $v->entry();
    }
}