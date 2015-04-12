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
class BookCenterController extends Controller {
	//订单显示
	public function index(){
		$user_type			=	session('user_type');
		$condition['password']		=	session('password');
		$condition['name']		=	session('username');
		$User 				=	M('artist');
		$data 				=	$User->where($condition)->find();
		$user_id			=	$data['user_id'];
		//盗链
		if(!$user_type){
			$this->redirect('/Index/index');
		//一般用户
		}else if($user_type		==	0){
			$Order			=	M('order');
			$limit['user']		=	$user_id;
			$list			=	$Order->join('LEFT JOIN work on work.work_id=order.work_id')->join('LEFT JOIN user on user.user_id=order.artist_id')->field('user.user_name,work.name,order_id,status,order.time')->where($limit)->select();
			$this->assign('list',$list);
			$ths->display();
		//花艺师
		}else if($user_type		==	1){
			$Order			=	M('order');
			$limit['artist']		=	$user_id;
			$list			=	$Order->join('LEFT JOIN work on work.work_id=order.work_id')->join('LEFT JOIN user on user.user_id=order.artist_id')->field('order.address,order.phone,user.user_name,work.name,order_id,status,order.time')->where($limit)->select();
			$this->assign('list',$list);
			$ths->display();
		}
	}
	//花艺师操作订单 删除或接受
	public function operateOrder(){
		$operate 	=	I('post.operate');
		$order_id 	=	I('get.order_id')
		//接受
		if($operate 	==	0){
			$limit['order_id']	=	$order_id;
			$Order 			=	M('order');
			$Order->status 		=	1;
			$result			=	$Order->where($limit)->save();
			if($result)
				$this->redirect('BookCenter/index');
			else
				$this->error('更新失败');
		//删除
		}else if($operate 	==	1){
			$limit['order_id']	=	$order_id;
			$Order 			=	M('order');
			$result			=	$Order->where($limit)->delete();
			if($result)
				$this->redirect('BookCenter/index');
			else
				$this->error('删除失败');

		}
	}