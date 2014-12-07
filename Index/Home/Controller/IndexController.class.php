<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
      $this->display();
    }
    public function teach(){
		$teach=D('b_teacher_list');
		$info=$teach->select();
		$this->assign('info',$info);

		$interview=D('b_interview');
		$list=$interview->select();
		$this->assign('list',$list);
                $this->display();

    }
	function view_info(){
		$interview=D('b_interview');
		$list=$interview->find();
		$this->assign('list',$list);
        $this->display();
	}
	public function course(){
                   $this->display();

    }
	public function quesion(){
                 $this->display();
    }
}