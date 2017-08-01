<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Store Template, Free CSS Template, cssMoban.com</title>
<meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML, cssMoban.com" />
<meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website from cssMoban.com" />
    <link href="/Public/Home/css/templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="templatemo_container">
    <div id="templatemo_menu">
    <ul>
        <li><a href="/index.php/Home/Main/Index" class="current">首页</a></li>
        <?php if(is_array($cate)): foreach($cate as $key=>$value): ?><li><a href="/index.php/Home/Main/Index/cid/<?php echo ($value["cat_id"]); ?>" style = "float:left"><?php echo ($value["cat_name"]); ?></a></li><?php endforeach; endif; ?>
        <li style = "float:right"><a href="details.html">退出</a></li>
        <li style = "float:right"><a href="details.html">user1</a></li>
    </ul>

</div> <!-- end of menu -->

<div id="templatemo_header" style="position:relative;">
    <div id="Web_title">
        <span>Book Share</span><br/><br/>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;最好的网上图书分享网站</p>
    </div>
    <div id="templatemo_special_offers">
        <p>
            <span>25%</span> discounts for
            purchase over $80
        </p>
        <a href="details.html" style="margin-left: 50px;">更多...</a>
    </div>


    <div id="templatemo_new_books">
        <ul>
            <li>Suspen disse</li>
            <li>Maece nas metus</li>
            <li>In sed risus ac feli</li>
        </ul>
        <a href="details.html" style="margin-left: 50px;">更多...</a>
    </div>
</div>
    <!-- end of header -->
    
    <div id="templatemo_content">
    	
        <div id="templatemo_content_left">
            <div class="templatemo_content_left_section">
    <h1>男生喜爱区域</h1>
    <ul>
        <li><a href="/index.php/Home/Main/subpage">{v.book_name}</a></li>
        <?php if(is_array($data)): foreach($data as $key=>$v): ?><li><a href="/index.php/Home/Main/subpage">{v.book_name}</a></li><?php endforeach; endif; ?>
    </ul>
</div>
<div class="templatemo_content_left_section">
    <h1>女生喜爱区域</h1>
    <ul>
        <li><a href="#">[ 花 千 骨 ]</a></li>
        <li><a href="#">[ 校 花 的 贴 身 保 镖 ]</a></li>
        <li><a href="#">[ 女 汉 子 是 怎 么 炼 成 的 ]</a></li>
        <li><a href="#">[ 少 女 之 心 ]</a></li>
    </ul>
</div>

<div class="templatemo_content_left_section">
    <a href="http://validator.w3.org/check?uri=referer"><img style="border:0;width:88px;height:31px" src="" alt="Valid XHTML 1.0 Transitional" width="88" height="31" vspace="8" border="0" /></a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px"  src="" alt="Valid CSS!" vspace="8" border="0" /></a>
</div>
            </div>

         <!-- end of content left -->
        
        <div id="templatemo_content_right">
        	
            <h1>Book Title <span>(by author name)</span></h1>
            <div class="image_panel"><img src="/Public/Home/images/templatemo_image_02.jpg" alt="CSS Template" width="100" height="150" /></div>
          <h2>Read the lessons - Watch the videos - Do the exercises</h2>
            <ul>
	            <li>By Deke <a href="#">McClelland</a></li>
            	<li>January 2024</li>
                <li>Pages: 498</li>
                <li>ISBN 10: 0-496-91612-0 | ISBN 13: 9780492518154</li>
            </ul>
            
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec dui. Donec nec neque ut quam sodales feugiat. Nam sodales, pede vel dapibus lobortis, ipsum diam molestie risus, a vulputate risus nisl pulvinar lacus.</p>

			<p>Donec at arcu. Nunc aliquam, dolor vitae sollicitudin lacinia, nibh orci sagittis diam, dignissim sodales dui erat nec eros. Fusce quis enim. Aenean eleifend, neque hendrerit elementum sodales, odio erat sagittis quam, sed tempor orci magna vitae tellus. Proin dui mauris, tempor eget, pulvinar sed, pretium sit amet, dui. Proin vulputate justo et quam.</p>

			<p>In fermentum, eros ac tincidunt aliquam, elit velit semper nunc, a tincidunt orci lectus a arcu. Nullam commodo, arcu non facilisis imperdiet, felis lectus tempus felis, vitae volutpat augue ante quis leo. Aliquam tristique dolor ac odio. Sed consectetur, lacus et dictum tristique, odio neque elementum ante, nec eleifend leo dolor vel tortor.</p>
            
             <div class="cleaner_with_height">&nbsp;</div>
            
            <a href="index.html"><img src="/Public/Home/images/templatemo_ads.jpg" alt="css template ad" /></a>
            
        </div> <!-- end of content right -->
    
    	<div class="cleaner_with_height">&nbsp;</div>
     <!-- end of content -->
    
    <div id="templatemo_footer">
        <a href="details.html">Home</a> | <a href="details.html">Search</a> | <a href="details.html">Books</a> | <a href="#">New Releases</a> | <a href="#">FAQs</a> | <a href="#">Contact Us</a><br />
Copyright © 2024 <a href="#"><strong>Your Company Name</strong></a> | from <a href="http://www.cssmoban.com" target="_parent" title="网站模板">网站模板</a>	</div>
</div> <!-- end of footer -->
        </div>
<!--  Free CSS Template www.cssmoban.com -->
</div> <!-- end of container -->
</body>
</html>