<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {

    /**
     *后台首页
    */
    public function index(){
      $this->display();
    }
}