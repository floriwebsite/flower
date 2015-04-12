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
class PersonPageController extends Controller {
	//个人中心展示首页
	public function index(){
		$array				=	getMessage();
		$personData			=	M('personal_data');
		$limit['artist']			=	$array['artist_id'];
		$blog				=	$personData->where($limit)->find();
		//
		$this->assign($array);
		$this->display();

	}
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
		//
		$this->assign($array);
		$this->display();
		
	}
	//个人信息留言版
	public function messageBoard(){
		//未登入 留言
		if(session('warning')==0){
			session('warning',null);
			//渲染前端知道其未登入
			$this->assign('warning',0);
		}
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
		$action_result 	    		=	array('flag' => 0);
		$array				=	getMessage();
		$artist 				=	$array['artist_id'];
		//未登入
		if(!session('user_id')){

			session('warning',0);
			$this->redirect('PersonPage/messageBoard');
		}else{
			
			$data['user_id']			=	session('user_id');
			$data['artist']			=	$artist;
			$content 			=	I('post.content');
			$data['message']		=	$content;
			$Message 			=	M('message');
			if($Message->data($data)->add()){
				$action_result 	    		=	array('flag' => 0);
				$this->ajaxReturn($action_result);
				//不行就redirect
			}else{
				echo "getLastSql()";
			}
		}

	}
	//得到通用花艺师个人资料
	private function getMessage(){
		$artist_id			=	I('get.artist_id');
		$condition['user_id']		=	$artist_id;
		$User 				=	M('user');
		$data 				=	$User->where($condition)->find();
		$array['city']			=	$data['city'];
		$array['photo']			=	$data['photo'];
		$array['is_sure']		=	$data['is_sure'];
		$array['level']			=	$data['level'];
		$array['name']			=	$data['user_name'];
		$array['phone']			=	$data['phone'];
		$array['artist_id']		=	$data['user_id'];
		$rule['artist']			=	$artist_id;
		$Fan 				=	M('focus');
		$user 				=	session('user_id');
		$condition['user']		=	$user;
		$condition['artist']		=	$artist_id;
		$result				=	$Focus->where($condition)->find();
		if($result){
			return 0;
		}else{
			return 1;
		}
		$record				=	$Fan->where($rule)->count();
		$array['fan']			=	$record;
	}
	//关注
	public function focus(){
		$action_result 	    	=	array('flag' => 0);
		$user 			=	session('user');
		//未登入
		if(!$user){
			$this->ajaxReturn($action_result);
		}else{
			$artist 			=	I('get.artist_id');
			$condition['artist']	=	$artist;
			$condition['user']	=	$usr;
			$Focus 			=	M('focus');
			$result			=	$Focus->data($condition)->save();
			$action_result 	    	=	array('flag' => 1);
			$this->ajaxReturn($action_result);
		}
	}
	//预订
	public function book(){
		$action_result 	    	=	array('flag' => 0);
		$user 			=	session('user');
		//未登入
		if(!$user){
			$this->ajaxReturn($action_result);
		}else{
			$address		=	I('post.address');
			$phone			=	I('post.phone');
			$name 			=	I('post.name');
			$artist 			=	I('get.artist_id');
			$data['artist_id']	=	$artist;
			$data['user']		=	$user;
			$data['address']	=	$address;
			$data['phone']		=	$phone;
			$Order 			=	M('order');
			$result			=	$Order->data($data)->save();
			$action_result 	    	=	array('flag' => 1);
			$this->ajaxReturn($action_result);
		}
	}

}