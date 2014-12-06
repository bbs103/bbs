<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
      $this->display();
    }
    public function teach(){
        $this->display();

    }
	public function course(){
        $this->display();

    }
	public function quesion(){
        $this->display();
    }
}