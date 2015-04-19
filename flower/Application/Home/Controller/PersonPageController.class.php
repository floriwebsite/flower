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
		if($user){
			$condition['user']		=	$user;
			$condition['artist']		=	$artist_id;
			$result				=	$Focus->where($condition)->find();
			if($result){
				$array['is_focus'] 	=	0;
			}else{
				$array['is_focus'] 	=	1;
			}
			$Order 				=	M('order');
			$limit['artist_id']		=	$artist_id;
			$limit['user']			=	$user;
			$result 				=	$Order->where($limit)->find();
			if($result){
				$array['is_book'] 	=	0;
			}else{
				$array['is_book'] 	=	1;
			}
			$record				=	$Fan->where($rule)->count();
			$array['fan']			=	$record;

		}else{
			//未登入
			$array['is_focus'] 	=	1;
			$array['is_book'] 	=	1;
			
		}
		return $array;
	}
	//关注
	public function focus(){
		$action_result 	    	=	array('flag' => 0);
		$user 			=	session('user');
		//未登入
		if(!$user){
			/*$this->ajaxReturn($action_result);*/
			echo "error";
			return 0;
		}else{

			$artist 			=	I('post.artist_id');
			$condition['artist']	=	$artist;
			$condition['user']	=	$usr;
			$Focus 			=	M('focus');
			$result 			=	$Focus->where($condition)->find();
			//前端已经禁用 却还可以关注
			if($result){
				/* echo "<script language=javascript>alert('不合法操作!');</script>"
				$this->redirect('Index/index');*/
				echo "error";
				return 0;

			}
			$result			=	$Focus->data($condition)->add();
			/*$action_result 	    	=	array('flag' => 1);
			$this->ajaxReturn($action_result);*/
		}
	}
	//预订
	public function book(){
		$action_result 	    	=	array('flag' => 0);
		$user 			=	session('user');
		//未登入
		if(!$user){
			/*$this->ajaxReturn($action_result);*/
			echo "error";
			return 0;
		}else{

			if(I('post.address')){
				$data['address']	=	I('post.address');
			}
			$phone			=	I('post.phone');
			$name 			=	I('post.name');
			$artist 			=	I('post.artist_id');
			$data['artist_id']	=	$artist;
			$data['user']		=	$user;
			
			$data['phone']		=	$phone;
			$data['name']		=	$name;
			$Order 			=	M('order');
			$limit['artist_id']	=	$artist;
			$limit['user']		=	$user;
			$result 			=	$Order->where($limit)->find();
			//前端已经禁用 还是post过来 非法操作
			if($result){
				/*return 0;*/
				echo "error";
				return 0;
			}
			$result			=	$Order->data($data)->add();
			/*$action_result 	    	=	array('flag' => 1);
			$this->ajaxReturn($action_result);*/
		}
	}

}