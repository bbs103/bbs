<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="/bbsGit/Public/admin/css/public.css" />
	<title></title>
</head>
<body>
	<form action="/bbsGit/admin.php/Home/Teach/upload?id=<?php echo ($info["id"]); ?>" method="post">
		<table class="table">
			<tr >
				<td class="th" colspan="2">添加教师</td>
			</tr>
			<tr>
				<td>教师姓名</td>
				<td>
					<input type="text" name="t_name" value="<?php echo ($info["t_name"]); ?>" class="title"/>
				</td>
			</tr>
			<tr>
				<td>教师照片</td>
				<td><input type="file" value="<?php echo ($info["t_photo"]); ?>" name="t_photo"/></td>
			</tr>
			<tr>
				<td>教师所在导航id</td>
				<td>
					<input type="text" value="<?php echo ($info["nav_id"]); ?>" name="nav_id">
				</td>

			</tr>

			<tr>
				<td>教师所属专业</td>
				<td>
					<select name='f_id'>
					<?php if(is_array($list)): foreach($list as $key=>$val): if( $val["f_id"] == $info["f_id"] ): ?><option value="<?php echo ($val["f_id"]); ?>" selected='selected'><?php echo ($val["f_name"]); ?></option>
						<?php else: ?>
						<option value="<?php echo ($val["f_id"]); ?>" ><?php echo ($val["f_name"]); ?></option><?php endif; endforeach; endif; ?>
					</select>
				</td>

			</tr>
			<tr>
				<td>教师简介</td>
				<td>
					<textarea id="editor_id" name="t_intro" style="width:700px;height:300px;"><?php echo ($info["t_intro"]); ?></textarea>
				</td>
			</tr>
			<tr>
				<td>教师职称</td>
				<td>
					<input type="" name='t_job' value="<?php echo ($info["t_job"]); ?>"/>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="修改" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>