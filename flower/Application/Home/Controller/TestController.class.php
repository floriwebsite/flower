<?php
// +----------------------------------------------------------------------
// | Flori Website
// +----------------------------------------------------------------------
// | Copyright (c) 2015 .... All rights reserved.
// +----------------------------------------------------------------------
// | Author: 尹俊民 <vrforyjm@gmail.com>
// +----------------------------------------------------------------------

namespace Home\Controller;
use Think\Controller;
class TestController extends Controller {
    public function index(){
        $this->display();
    }
    public function index2(){
    	$xx	=	I('post.myEditor');
    	$jj	=	I('post.ni');
    	echo $xx;
    	echo $jj;
    	
    }
}