<?php if (!defined('THINK_PATH')) exit(); if(is_array($ulist)): $i = 0; $__LIST__ = $ulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><tr>
        		<td><input type="checkbox" name="id[]" value="<?php echo ($value["user_id"]); ?>" /></td>
            	<td class="num"><?php echo ($value["user_id"]); ?></td>
                <td class="name"><?php echo ($value["user_name"]); ?></td>
                <td class="nickname"><?php echo ($value["user_nickname"]); ?></td>
                <td class="dept"><?php echo ($value["dept_name"]); ?></td>
                <td class="sex"><?php echo ($value["user_sex"]); ?></td>
                <td class="birthday"><?php echo ($value["user_birthday"]); ?></td>
                <th class="tel"><?php echo ($value["user_tel"]); ?></th>
                <th class="email"><?php echo ($value["user_email"]); ?></th>
                <th class="ctime"><?php echo ($value["user_ctime"]); ?></th>
                <th class="operate">
                	<a href="/myoa/index.php/Home/User/del/id/<?php echo ($value["user_id"]); ?>">删除</a>|
                	<a href="<?php echo U('edit','id='.$value['user_id']);?>">修改</a>
                </th>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>