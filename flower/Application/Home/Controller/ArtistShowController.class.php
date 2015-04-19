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
class ArtistShowController extends Controller {
	//花艺师展示界面
	public function index(){
		$Artist			=	M('user');
		$limit['user_type']	=	1;
		$count			=	$Artist->where($limit)->count();
		$pagecount		=	9;

		$Page       		=	new \Think\Page($count,$pagecount);
		$show      		= 	$Page->show();
		$list			=	$Artist->where($limit)->limit($Page->firstRow.','.$Page->listRows)->order('hot')->select();
		$this->assign('list',$list);
		$this->display();
	}
	//城市选择 花艺师展示界面
	public function city_choose(){
		$Artist			=	M('user');
		$limit['user_type']	=	1;
		$limit['city']		=	I('post.city');
		$count			=	$Artist->where($limit)->count();
		$pagecount		=	9;

		$Page       		=	new \Think\Page($count,$pagecount);
		$show      		= 	$Page->show();
		$list 			=	$Artist->where($limit)->limit($Page->firstRow.','.$Page->listRows)->order('hot')->select();
		$this->assign('list',$list);
		$this->display('/AritistShow/index');
	}

	//花艺师搜索
	public function select(){
		$info 			=	I('post.info');
		$Artist 			=	M('user');
		$limit['user_type']	=	1;
		$limit['user_name']	=	array('LIKE',"%$info%");
		$count			=	$Artist->where($limit)->count();
		$pagecount		=	9;
		$Page       		=	new \Think\Page($count,$pagecount);
		$show      		= 	$Page->show();
		$list 			=	$Artist->where($limit)->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->display('/AritistShow/index');


	}
}	
