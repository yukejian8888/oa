<?php if (!defined('THINK_PATH')) exit();?><div id="templatemo_menu">
    <ul>
        <li><a href="index.html" class="current">首页</a></li>
        <?php if(is_array($cate)): foreach($cate as $key=>$value): ?><li><a href="index.html" class="current"><?php echo ($value["cat_name"]); ?></a></li><?php endforeach; endif; ?>
        <li style = "float:right"><a href="subpage.html">退出</a></li>      <li style = "float:right"><a href="subpage.html">个人中心</a></li>
        <li style = "float:right"><a href="subpage.html">user1</a></li>
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
        <a href="subpage.html" style="margin-left: 50px;">更多...</a>
    </div>


    <div id="templatemo_new_books">
        <ul>
            <li>Suspen disse</li>
            <li>Maece nas metus</li>
            <li>In sed risus ac feli</li>
        </ul>
        <a href="subpage.html" style="margin-left: 50px;">更多...</a>
    </div>
</div>