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
class WorkShowController extends Controller {
	//总的花艺展示页面
	public function index(){
		$Work 				=	M('work');
		$limit['type']			=	"婚礼花艺";
		$list1 				=	$Work->where($limit)->order('default')->limit(3)->select();
		$limit['type']			=	"商务花艺";
		$list2				=	$Work->where($limit)->order('default')->limit(4)->select();
		$limit['type']			=	"礼品花艺";
		$list3				=	$Work->where($limit)->order('default')->limit(4)->select();
		$limit['type']			=	"居家花艺";
		$list4				=	$Work->where($limit)->order('default')->limit(4)->select();
		$this->assign('list1',$list1);
		$this->assign('list2',$list2);
		$this->assign('list3',$list3);
		$this->assign('list4',$list4);
		$this->display();
	}
	//热门排序的总的花艺展示
	public function hotIndex(){
		$Work 				=	M('work');
		$limit['type']			=	"婚礼花艺";
		$list1 				=	$Work->where($limit)->order('click_count')->limit(3)->select();
		$limit['type']			=	"商务花艺";
		$list2				=	$Work->where($limit)->order('click_count')->limit(4)->select();
		$limit['type']			=	"礼品花艺";
		$list3				=	$Work->where($limit)->order('click_count')->limit(4)->select();
		$limit['type']			=	"居家花艺";
		$list4				=	$Work->where($limit)->order('click_count')->limit(4)->select();
		$this->assign('list1',$list1);
		$this->assign('list2',$list2);
		$this->assign('list3',$list3);
		$this->assign('list4',$list4);
		$this->display('index');
	}
	//时间排序的总的花艺展示
	public function newIndex(){
		$Work 				=	M('work');
		$limit['type']			=	"婚礼花艺";
		$list1 				=	$Work->where($limit)->order('time')->limit(3)->select();
		$limit['type']			=	"商务花艺";
		$list2				=	$Work->where($limit)->order('time')->limit(4)->select();
		$limit['type']			=	"礼品花艺";
		$list3				=	$Work->where($limit)->order('time')->limit(4)->select();
		$limit['type']			=	"居家花艺";
		$list4				=	$Work->where($limit)->order('time')->limit(4)->select();
		$this->assign('list1',$list1);
		$this->assign('list2',$list2);
		$this->assign('list3',$list3);
		$this->assign('list4',$list4);
		$this->display('index');
	}
	//婚礼花艺展示
	public function weddingShow(){
		$city				=	I('post.city');
		$order  			=	I('post.order');
		//得到选择城市 未定义为成都
		$city				=	($city=="")?"成都":$city;
		//得到选择排序方式 未定义为默认
		$order  			=	($order=="")?"default":$order;
		$Work 				=	M('work');
		$limit['type']			=	"婚礼花艺";
		$limit['city']			=	$city;
		$count		 		=	$Work->where($limit)->count();
		//每页显示个数
		$pagecount			=	9;

		$Page       			=	new \Think\Page($count,$pagecount);
		$show      			= 	$Page->show();
		$list 				=	$Work->join('user on user.user_id=work.artist.id')->where($limit)->limit($Page->firstRow.','.$Page->listRows)->order($order)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		//page 是作为前端的按钮
		
		$this->display();

	}
	//商务花艺展示
	public function businessShow(){
		$city				=	I('post.city');
		$order  			=	I('post.order');
		//得到选择城市 未定义为成都
		$city				=	($city=="")?"成都":$city;
		//得到选择排序方式 未定义为默认
		$order  			=	($order=="")?"default":$order;
		$Work 				=	M('work');
		$limit['type']			=	"商务花艺";
		$limit['city']			=	$city;
		$count		 		=	$Work->where($limit)->count();
		//每页显示个数
		$pagecount			=	9;

		$Page       			=	new \Think\Page($count,$pagecount);
		$show      			= 	$Page->show();
		$list 				=	$Work->join('user on user.user_id=work.artist.id')->where($limit)->limit($Page->firstRow.','.$Page->listRows)->order($order)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		//page 是作为前端的按钮
		
		$this->display();
	}
	//居家花艺展示
	public function homeShow(){
		$city				=	I('post.city');
		$order  			=	I('post.order');
		$city				=	($city=="")?"成都":$city;
		$order  			=	($order=="")?"default":$order;
		$Work 				=	M('work');
		$limit['type']			=	"居家花艺";
		$limit['city']			=	$city;
		$count		 		=	$Work->where($limit)->count();
		//每页显示个数
		$pagecount			=	9;

		$Page       			=	new \Think\Page($count,$pagecount);
		$show      			= 	$Page->show();
		$list 				=	$Work->join('user on user.user_id=work.artist.id')->where($limit)->limit($Page->firstRow.','.$Page->listRows)->order($order)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		//page 是作为前端的按钮
		
		$this->display();
	}
	//礼品花艺展示
	public function presentShow(){
		$city				=	I('post.city');
		$order  			=	I('post.order');
		$city				=	($city=="")?"成都":$city;
		$order  			=	($order=="")?"default":$order;
		$Work 				=	M('work');
		$limit['type']			=	"礼品花艺";
		$limit['city']			=	$city;
		$count		 		=	$Work->where($limit)->count();
		//每页显示个数
		$pagecount			=	9;

		$Page       			=	new \Think\Page($count,$pagecount);
		$show      			= 	$Page->show();
		$list 				=	$Work->join('user on user.user_id=work.artist.id')->where($limit)->limit($Page->firstRow.','.$Page->listRows)->order($order)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		//page 是作为前端的按钮
		
		$this->display();
	}
	public function workShow(){
		
	}
}