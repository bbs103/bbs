<?php
namespace Home\Controller;
use Think\Controller;
class TeachController extends Controller{
	function add_teacher(){
		//echo __APP__;
		$teach=D('teacher_fen');
		$list=$teach->select();
		$this->assign('info',$list);
		$this->display();
	}
	function insert(){
		$teacher=D('b_teacher_list');
		$a=$teacher->create();
		
		$upload = new \Think\Upload();// 实例化上传类  
		$upload->maxSize   =     3145728 ;// 设置附件上传大小   
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
		$upload->savePath  =      './uploads/'; // 设置附件上传目录    // 上传单个文件   
		$info   =   $upload->upload();
		if(!$info){// 上传错误提示错误信息
		$this->error($upload->getError());
			}
			else{// 上传成功 获取上传文件信息  
				foreach($info as $k=>$file){ 
					//print_r($file);
					$a['t_photo']=$file['savepath'].$file['savename']; 
					$teacher->add($a);
					$this->redirect("Admin/teacher_list");
				}
			}
	}
	function teacher_list(){
		$teacher=D('b_teacher_list');
		$_GET['p']=$_GET['p']?$_GET['p']:1;
		$list = $teacher->page($_GET['p'].',3')->select();
		$this->assign('info',$list);// 赋值数据集
		$count= $teacher->count();// 查询满足要求的总记录数
		$Page  = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数
		$show  = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板

	}
	function del(){
		$id=$_GET['id'];
		$teach=D('b_teacher_list');
		$a=$teach->where("id=$id")->delete();
		if($a){
			$this->success('删除成功',U('Teach/teacher_list'));
			header('location:teacher_list.html');
		}else{
			$this->error('删除失败');
		}
	}
	function edite(){
		$id=$_GET['id'];//echo $id; die;
		$teach=D('b_teacher_list');
		$info=$teach->join("teacher_fen on b_teacher_list.f_id=teacher_fen.f_id")->where("id=$id")->find();
		$this->assign('info',$info);
		$teach=D('teacher_fen');
		$list=$teach->select();
		$this->assign('list',$list);
		$this->display();
	}
	
}
?>