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
class PersonCenterController extends Controller {
	//花艺师个人中心首页
	public function index(){
		$array				=	getMessage();
		$personData			=	M('personal_data');
		$limit['artist']			=	$array['artist_id'];
		$blog				=	$personData->where($limit)->find();
		//博客显示还未写
		$this->assign($array);
		$this->display();
	}
	
/*	public function showDataWrite(){
		$array				=	getMessage();
		$personData			=	M('personal_data');
		$limit['artist']			=	$array['artist_id'];
		$blog				=	$personData->where($limit)->find();
		//
		$this->assign($array);
		$this->display();
	}*/
	//个人中心作品展示
	public function showWorks(){
		$array				=	getMessage();
		$Work 				=	M('work');
		$limit['artist_id']		=	$data['artist_id'];
		$limit['type']			=	"婚礼花艺";
		$list1 				=	$Work->where($limit)->select();
		$limit['type']			=	"商务花艺";
		$list2				=	$Work->where($limit)->select();
		$limit['type']			=	"礼品花艺";
		$list3				=	$Work->where($limit)->select();
		$limit['type']			=	"居家花艺";
		$list4				=	$Work->where($limit)->select();
		$this->assign($array);
		$this->assign('list1',$list1);
		$this->assign('list2',$list2);
		$this->assign('list3',$list3);
		$this->assign('list4',$list4);
		$this->display();
		
	}
	//个人中心 服务区域展示
	public function showServerArea(){
		$array				=	getMessage();
		$serviceArea			=	M('service_area');
		$limit['artist']			=	$data['artist_id'];
		$blog				=	$serviceArea->where($limit)->find();
		////博客显示还未写
		$this->assign($array);
		$this->display();
		
	}
	//个人信息留言版
	public function messageBoard(){
		$array				=	getMessage();
		$Message 			=	M('message');
		$limit['artist']			=	$data['artist_id'];
		$count		 		=	$Message->where($limit)->count();
		$Page       			=	new \Think\Page($count,7);
		$show      			= 	$Page->show();
		//
		$list 				=	$Message->join('user on user.user_id=message.user_id')->where($limit)->order('time')->limit($Page->firstRow.','.$Page->listRows)->select();

		$this->assign('list',$list);
		$this->assign('page',$show);
		//page 是作为前端的按钮
		
		$this->display();
		
	}
	//留言
	public function leaveMessage(){
		$array				=	getMessage();
		$user_id 			=	$array['artist_id'];
		$artist_id			=	$user_id;
		$data['user_id']			=	$artist_id;
		$data['artist']			=	$artist_id;
		$content 			=	I('post.content');
		$data['message']		=	$content;
		$Message 			=	M('message');
		if($Message->data($data)->add()){
			$this->redirect('PersonCenter/messageBoard');
			//不行就redirect
		}else{
			$this->error('留言失败');
		}

	}

	//得到花艺师个人中心资料
	private function getMessage(){
		$user_type	=	session('user_type');
		if($user_type	!=	1){
			$this->redirect('/Index/index');
		}else{
			$condition['user_id']		=	session('user_id');
			
			$User 				=	M('user');
			$data 				=	$User->where($condition)->find();
			$array['city']			=	$data['city'];
			$array['photo']			=	$data['photo'];
			$array['is_sure']		=	$data['is_sure'];
			$array['level']			=	$data['level'];
			$array['name']			=	$data['user_name'];
			$array['phone']			=	$data['phone'];
			$array['artist_id']		=	$data['user_id'];
			$rule['artist']			=	$array['artist_id'];
			$Fan 				=	M('focus');
			$record				=	$Fan->where($rule)->count();
			$array['fan']			=	$record;
		}
		return $array;
	}