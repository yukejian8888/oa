<?php
namespace Home\Controller;
use Think\Verify;
class RegisterController extends CommonController
{
    function save()
    {
        $data['phone']=I("post.tel");
        $pwd=I("post.password");
        $data['password']=md5($pwd);
        $data['birthday']="2000-1-1";
        $data['create_time']=date("Y-m-d H:i:s");
        $db=D("User");
        if($db->add($data))
        {
            echo "<script>alert('注册成功，请返回登录');history.go(-1);</script>";
        }
        else
        {
            echo "<script>alert('注册失败，请重新注册');history.go(-1);</script>";
        }
    }
    function checktel()
    {
        $tel=I('get.tel');
        $db=M('User')->where("phone=$tel")->find();
        if (empty($db)) {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
    function send()
    {
        session_start();
//随机验证码
        $code = rand(1000,9999);
//生成的验证码存放到session，方便后续的验证操作
        $_SESSION['code']=$code;
        import("Vendor.sms.REST");
//主帐号,对应开官网发者主账号下的 ACCOUNT SID
        $accountSid= '8a216da85751104901579ebe02631e39';
//主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
        $accountToken= 'ebc9910f9eb749e684a9f1ca5e3c0c4a';
//应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
//在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
        $appId='8a216da857ad33250157b27201ac0439';
//请求地址
//沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
//生产环境（用户应用上线使用）：app.cloopen.com
        $serverIP='sandboxapp.cloopen.com';
//请求端口，生产环境和沙盒环境一致
        $serverPort='8883';
//REST版本号，在官网文档REST介绍中获得。
        $softVersion='2013-12-26';


        /**
         * 发送模板短信
         * @param to 手机号码集合,用英文逗号分开
         * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
         * @param $tempId 模板Id,测试应用和未上线应用使用测试模板请填写1，正式应用上线后填写已申请审核通过的模板ID
         */


//Demo调用
        //**************************************举例说明***********************************************************************
        //*假设您用测试Demo的APP ID，则需使用默认模板ID 1，发送手机号是13800000000，传入参数为6532和5，则调用方式为           *
        //*result = sendTemplateSMS("13800000000" ,array('6532','5'),"1");																		  *
        //*则13800000000手机号收到的短信内容是：【云通讯】您使用的是云通讯短信模板，您的验证码是6532，请于5分钟内正确输入     *
        //*********************************************************************************************************************
//获取传递手机号码
        $telphone = $_GET['tel'];
        $res = $this->sendTemplateSMS($telphone,array($code,1),"1",$accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion);//手机号码，替换内容数组，模板ID
 //var_dump($res);die;
        if($res){
            echo $res;
        }else{
            echo $res;
        }
    }
    function sendTemplateSMS($to,$datas,$tempId,$accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion)
    {
        // 初始化REST SDK
//        global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
        $rest = new \REST($serverIP,$serverPort,$softVersion);
        $rest->setAccount($accountSid,$accountToken);
        $rest->setAppId($appId);

        // 发送模板短信
        // echo "Sending TemplateSMS to $to <br/>";
        $result = $rest->sendTemplateSMS($to,$datas,$tempId);
        if($result == NULL ) {
            return $result."11";
        }

        if($result->statusCode!=0) {
            return $result->statusCode."22"."error code :" . $result->statusCode . "<br>"."error msg :" . $result->statusMsg . "<br>";;
            //TODO 添加错误处理逻辑
        }else{
            return true;
            //TODO 添加成功处理逻辑
        }
    }
    function checkcode()
    {
        $code=I('get.yanzheng');
        session_start();
        $usercode=$_SESSION['code'];
        if($code==$usercode)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
    //验证码
    function verify(){
        $arr = array(
            'useImgBg'  =>  true,
            'fontSize' => 18,
            'useCurve' => true,
            'useNoise' => false,
            'length' => 5,
            'fontttf'   =>  '5.ttf'
        );
        $v = new Verify($arr);
        $v->entry();
    }
    function checktxtCode()
    {
        $code=I('get.code');
        $codeobj=new Verify();
        if($codeobj->check($code))
        {
            echo '1';
        }
        else
        {
            echo '0';
        }
    }
}