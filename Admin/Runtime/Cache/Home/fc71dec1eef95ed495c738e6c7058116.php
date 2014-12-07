<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="/bbsGit/Public/admin/css/public.css" />
	<script type="text/javascript" src="/bbsGit/Public/admin/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/bbsGit/Public/admin/js/public.js"></script>	
</head>
<body>
	<table class="table">
		<tr>
			<td class="th" colspan="10">师资列表</td>
		</tr>
		<tr>
			<td class="tdLittle1">AID</td>
			<td class="tdLittle2">教师姓名</td>
			<td class="tdLittle2">教师职称</td>
			<td class="tdLtitle3">教师简介</td>
			<td class="tdLtitle4">教师照片</td>
			<td class="tdLtitle7">操作</td>
		</tr>
		<?php if(is_array($info)): foreach($info as $key=>$val): ?><tr>
			<td ><?php echo ($val["id"]); ?></td>
			<td><?php echo ($val["t_name"]); ?></td>
			<td><a href=""><?php echo ($val["t_job"]); ?></a></td>
			<td><?php echo ($val["t_intro"]); ?></td>
			<td><img src="/bbsGit/Public/<?php echo ($val["t_photo"]); ?>" height=80 width=60/></td>
			<td>
				
				<a href="/bbsGit/admin.php/Home/Teach/edite?id=<?php echo ($val["id"]); ?>">[修改]</a>
				<a href="/bbsGit/admin.php/Home/Teach/del?id=<?php echo ($val["id"]); ?>">[删除]</a>
			</td>
		</tr><?php endforeach; endif; ?>
	</table>
	<div class="page">
		<?php echo ($page); ?>
	</div>
</body>
</html>