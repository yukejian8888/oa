<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图书分享</title>
<meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML" />
<meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website" />
<link href="/Public/Home/css/templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="templatemo_container">
    <link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
<script src="/Public/Home/js/jquery-1.10.1.js"></script>
<script src="/Public/Home/js/login.js"></script>
<script>
var itime=59;
    function gettime()
    {
        if(itime>=0)
        {
            if(itime!=0)
            {
                var act=setTimeout('gettime()',1000);
                $("#telcode").val("剩"+itime+"秒");
                itime--;
            }
            else
            {
                clearTimeout(act);
                $("#telcode").val("获取验证码").attr("disabled",false);
                itime=59;
            }
        }
    }
    //ajax验证手机号
    $(function() {
        $("#tel").blur(function() {
            var tel=$("#tel").val();
            $.ajax({
                type:'get',
                url:"<?php echo U('Register/checktel/');?>?tel="+tel,
                success:function(msg) {
                    if(msg==1)
                    {
                        $('#telcf').val('1');
                        $("#telmsg").html("");
                    }
                    else
                    {
                        $('#telcf').val('0');
                        $("#telmsg").html("手机号已绑定，不能重复绑定");
                    }
                }
            });
        });
    });
//ajax发送验证码
    $(function() {
        $("#telcode").click(function() {
            var tel=$("#tel").val();
            $.ajax({
                type:'get',
                url:"<?php echo U('Register/send/');?>?tel="+tel,
                success:function(msg) {
                    if(msg==1)
                    {
                        $("#telcode").attr("disabled",true);
                        gettime();
                    }
                }
            });
        });
    });
//ajax判断验证码是否正确
    $(function() {
        $("#yanzheng").blur(function() {
            var telyanzheng=$("#yanzheng").val();
            $.ajax({
                type:'get',
                url:"<?php echo U('Register/checkcode/');?>?yanzheng="+telyanzheng,
                success:function(msg) {
                    if(msg==1)
                    {
                        $('#telcodehdn').val('1');
                        $("#telcodemsg").html("");
                    }
                    else if(msg==0)
                    {
                        $('#telcodehdn').val('0');
                        $("#telcodemsg").html("手机验证码错误，请充填");
                    }
                    else
                    {
                        $('#telcodehdn').val('0');
                        $("#telcodemsg").html("发生未知错误，请重新获取");
                    }
                }
            });
        });
    });
    //提交注册表单
    $(function() {
        $('#register').click(function () {
            var telcodehdn = $('#telcodehdn').val();
            var pwdhdn = $('#pwdhdn').val();
            var codehdn = $('#codehdn').val();
            if (telcodehdn == pwdhdn && telcodehdn == codehdn && telcodehdn == 1) {
                $('#registerForm').submit();
            }
            else {
                alert('请将信息填写正确后在提交');
            }
        });
    });
    //判断密码是否一致
    $(function() {
        $('#repassword').blur(function () {
            var repwd = $('#repassword').val();
            var pwd = $('#password').val();
            if (repwd != pwd) {
                $('#pwdhdn').val('0');
                $('#pwdmsg').html('两次输入密码不一致');
            }
            else {
                $('#pwdhdn').val('1');
                $('#pwdmsg').html('');
            }
        })
    });
    //ajax判断验证码
    $(function() {
        $('#code').blur(function () {
            var code = $('#code').val();
            $.ajax({
                type: 'get',
                url: "<?php echo U('Register/checktxtCode/');?>?code="+code,
                success: function (msg) {
                    if(msg == 1) {
                        $('#codehdn').val('1');
                        $("#txtcode").html("");
                    }
                    else if(msg == 0) {
                        $('#codehdn').val('0');
                        $("#txtcode").html("验证码错误，请重填");
                    }
                    else {
                        $('#codehdn').val('0');
                        $("#txtcode").html("发生未知错误，请重新获取");
                    }
                }
            });
        });
    });
    function search(){
        var obj1 = document.getElementById('keywords');
        var obj2 = document.getElementById('choose');
        var keywords = obj1.value;
        var choose = obj2.value
        if(keywords==""){
            obj1.placeholder="！关键字不能为空！";
        }else{
            location.href = '/Home/Main/search/kw/'+keywords+'/ch/'+choose;
        }
    }
    function sendform(url,n){
        var fm = document.getElementsByTagName('form')[n];
        var fd = new FormData(fm);

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4){
                var info = xhr.responseText;
                    if(info=="登录成功！"){
                        /*prompt_show(info);*/
                        location.href = '/Home/Main/Index';
                    }else{
                        alert(info);
                        /*location.href = '/Home/Main/Index';*/
                        /*prompt_show(info);*/
                    }
            }
        }
        xhr.open('post',url);
        xhr.send(fd);
    }
    function logout(url){
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4){
                /*location.href = '/Home/Main/Index';*/
                prompt_show(xhr.responseText);
                setTimeout("location.href='/Home/Main/Index'",2500);
            }
        }
        xhr.open('get',url);
        xhr.send(null);
    }
    function changecode(obj)
    {
        obj.src="<?php echo U('Register/Verify');?>?"+Math.random();
    }
</script>
<div id="templatemo_menu">
    <ul>
        <li><a href="/Home/Main/Index" class="current">首页</a></li>
        <?php if(is_array($cate)): foreach($cate as $key=>$value): ?><li><a href="/Home/Main/Index/cid/<?php echo ($value["cat_id"]); ?>" style = "float:left"><?php echo ($value["cat_name"]); ?></a></li><?php endforeach; endif; ?>
        <div id="search">
            <input type="text" id="keywords" placeholder='输入关键字进行搜索' value='<?php echo ($data["keywords"]); ?>'/>
            <select id="choose"><option value="1" <?php if($data['choose'] == 1): ?>selected<?php endif; ?> >书名</option><option value="2" <?php if($data['choose'] == 2): ?>selected<?php endif; ?> >作者</option></select>
            <!--<a href="javascript:;" onclick="">搜索</a>-->
            <button onclick="search()" onmousemove="style='color:#e6e154;'" onmouseout="style='color:rgb(150,150,70);'">搜索</button>
        </div>
        <li style = "float:right">
            <?php if($user != ''): ?><a href="javascript:;" id="user" ><span><?php echo ($user); ?></span><em>∨</em></a><?php else: ?>
                <a href="javascript:;" id="loginButton"><span>登录</span><em></em></a><a href="javascript:;" id="registerButton"><span>注册</span><em></em></a><?php endif; ?>
        </li>
    </ul>

</div> <!-- end of menu -->

<div id="templatemo_header" style="position:relative;">
    <div id="Web_title">
        <span>Book Share</span><br/><br/>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;最好的网上图书分享网站</p>
    </div>

            <!-- 登录开始 -->
            <div id="loginBox">
                <form id="loginForm" method="post" action="">
                    <fieldset id="body1">
                        <fieldset>
                            <label>手机号</label>
                            <input type="text" name="phone" />
                        </fieldset>
                        <fieldset>
                            <label>密码</label>
                            <input type="password" name="password" />
                        </fieldset>
                        <fieldset>
                            <label>验证码</label>
                            <input type="text" name="code" style="width:120px;"/>
                            <img src="<?php echo U('Main/Verify');?>" width="80" height="35" onclick="this.src='<?php echo U('Main/Verify');?>?'+Math.random()" style="vertical-align:middle;"/>
                        </fieldset>
                        <input type="button" id="login" value="登录" onclick="sendform('<?php echo U('Main/LoginCheck');?>',0)"/>
                        <label><input type="checkbox" id="checkbox" />记住密码</label>
                    </fieldset>
                    <span><a href="javascript:;">忘记密码?</a></span>
                </form>
            </div>
            <!-- 登录结束 -->
            <!-- 注册开始 -->
            <div id="registerBox">
                <form id="registerForm" action="<?php echo U('Register/save');?>" method="post">
                    <input type="hidden" id="telcodehdn" value="0" />
                    <input type="hidden" id="telcf" value="0" />
                    <input type="hidden" id="pwdhdn" value="0" />
                    <input type="hidden" id="codehdn" value="0" />
                    <fieldset id="body2">
                        <fieldset>
                            <label>手机号</label>
                            <input type="text" name="tel" id="tel" />
                            <span id="telmsg"></span>
                        </fieldset>
                        <fieldset>
                            <label>手机验证码</label>
                            <input type="button" value="发送手机验证码" id="telcode">
                            <input type="text" name="yanzheng" id="yanzheng" />
                            <span id="telcodemsg"></span>
                        </fieldset>
                        <fieldset>
                            <label>设置密码</label>
                            <input type="password" name="password" id="password" />
                        </fieldset>
                        <fieldset>
                            <label>确认密码</label>
                            <input type="password" name="repassword" id="repassword"/>
                            <span id="pwdmsg"></span>
                        </fieldset>
                        <fieldset>
                            <label>验证码</label>
                            <img src="<?php echo U('Register/Verify');?>" width="80" height="35" onclick="changecode(this)"/>
                            <input type="text" name="code" id="code" />
                            <span id="txtcode"></span>
                        </fieldset>
                        <input type="button" id="register" value="注册" />
                    </fieldset>
                </form>
            </div>
            <!-- 注册结束 -->
            <!--个人中心开始-->
            <div id="person">
                <a href="<?php echo U('User/person');?>" target="_blank">个人中心</a><br />
                <a href="javascript:;" onclick="logout('<?php echo U('User/Logout');?>')" >退出</a><br />
            </div>
            <!--个人中心结束-->
            <!--提示框开始-->
            <div id="prompt"></div>
            <!--提示框结束--->
    <div id="templatemo_special_offers">
        <ul>
            <?php if(is_array($dload)): foreach($dload as $key=>$val): ?><li><a href="/Home/Main/details/id/<?php echo ($val["book_id"]); ?>">《<?php echo ($val["book_name"]); ?>》</a></li><?php endforeach; endif; ?>
        </ul>
        <a href="/Home/Main/index/show/1" style="margin-left: 50px;">更多...</a>
    </div>


    <div id="templatemo_new_books">
        <ul>
            <?php if(is_array($uload)): foreach($uload as $key=>$v): ?><li><a href="/Home/Main/details/id/<?php echo ($v["book_id"]); ?>">《<?php echo ($v["book_name"]); ?>》</a></li><?php endforeach; endif; ?>
        </ul>
        <a href="/Home/Main/index/show/2" style="margin-left: 50px;">更多...</a>
    </div>
</div>

     <!-- end of header -->
    
    <div id="templatemo_content">

        <div id="templatemo_content_left">
            <div class="templatemo_content_left_section">
    <h1>男生喜欢：</h1>
    <ul>
        <?php if(is_array($book_m)): foreach($book_m as $key=>$v): ?><li><a href="/Home/Main/details/id/<?php echo ($v["book_id"]); ?>">《<?php echo ($v["book_name"]); ?>》</a></li><?php endforeach; endif; ?>
    </ul>
</div>
<div class="templatemo_content_left_section">
    <h1>女生喜欢：</h1>
    <ul>
        <?php if(is_array($book_w)): foreach($book_w as $key=>$val): ?><li><a href="/Home/Main/details/id/<?php echo ($val["book_id"]); ?>">《<?php echo ($val["book_name"]); ?>》</a></li><?php endforeach; endif; ?>
    </ul>
</div>

<div class="templatemo_content_left_section">
    <a href="http://validator.w3.org/check?uri=referer"><img style="border:0;width:88px;height:31px" src="" alt="Valid XHTML 1.0 Transitional" width="88" height="31" vspace="8" border="0" /></a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px"  src="" alt="Valid CSS!" vspace="8" border="0" /></a>
</div>
        </div> <!-- end of content left -->

        <div id="templatemo_content_right">
            <?php if(!empty($book)): if(is_array($book)): foreach($book as $key=>$val): ?><div class="templatemo_product_box">
            	<h1>《<?php echo ($val["book_name"]); ?>》  <span>(作者：<?php echo ($val["author"]); ?>)</span></h1>
                <?php if($val['image'] != 'null'and $val['image'] != ''): ?><img src="<?php echo ($val["image"]); ?>" alt="image" width="100" height="150"/>
                <?php else: ?>
   	                <img src="/Public/Home/images/templatemo_image_01.jpg" alt="image" width="100" height="150"/><?php endif; ?>
                <div class="product_info">
                	<p><?php echo ($val["intro"]); ?></p>
                  <h2>下载量：<?php echo ($val["download_times"]); ?> | 推荐量：<?php echo ($val["isgood"]); ?></h2>
                    <div class="book_details"><a href="/Home/Main/details/id/<?php echo ($val["book_id"]); ?>">书籍详情</a></div>
                    <div class="book_download"><a href="<?php echo U('book/download','id='.$val['book_id']);?>">下载</a></div>
                </div>
                <div class="cleaner">&nbsp;</div>
            </div>
                <?php if($key%2==0): ?><div class="cleaner_with_width">&nbsp;</div>
                    <?php else: ?>
                    <div class="cleaner_with_height">&nbsp;</div><?php endif; endforeach; endif; ?>
                <?php else: ?><h2>无此搜索项！</h2><?php endif; ?>

            <div class="cleaner_with_height">&nbsp;</div>
            <div><?php echo ($page); ?></div>

            <a href=""><img src="/Public/Home/images/templatemo_ads.jpg" alt="ads" /></a>
        </div> <!-- end of content right -->

    	<div class="cleaner_with_height">&nbsp;</div>
    </div> <!-- end of content -->

    <div id="templatemo_footer">
        <a href="details.html">Home</a> | <a href="details.html">Search</a> | <a href="details.html">Books</a> | <a href="#">New Releases</a> | <a href="#">FAQs</a> | <a href="#">Contact Us</a><br />
Copyright © 2024 <a href="#"><strong>Your Company Name</strong></a> | from <a href="http://www.cssmoban.com" target="_parent" title="网站模板">网站模板</a>	</div>
</div> <!-- end of footer -->
	       </div>
    <!-- end of footer -->
<!--  Free CSS Template www.cssmoban.com -->
</div> <!-- end of container -->
</body>
</html>