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
	//作品展示
	public function workShow(){
		$Work 			=	M('work');
		$id 			=	

		I('post.work_id');
		$condition['work_id']	=	$id;
		$result			=	$Work->where($condition)->find();
		$user_id 		=	session('user_id');
		//未登入或已关注/预订/点赞
		$result['is_focus']	=	1;
		$result['is_book']	=	1;
		$result['is_upvote']	=	1;
		//已登入
		if($user_id){
			
		
			$limit['work']		=	$id;
			$limit['user']		=	$user_id;
			$Upvote 		=	M('upvote');
			$result			=	$Upvote->where($limit)->find();
			//未点赞
			if(!$result){
				$result['is_upvote']	=	0;
			}
			$Focus 			=	M('focus_work');
			$result			=	$Focus->where($limit)->find();
			//未关注
			if(!$result){
				$result['is_focus']	=	0;
			}
			$condition['work_id']	=	$id;
			$condition['user']	=	$user_id;
			$Order 			=	M('order');

			$result			=	$Order->where($condition)->find();
			//未预订
			if(!$result){
				$result['is_book']	=	0;		
			}
		}
		$this->assign($result);

	}
	//关注作品
	public function focus(){
		$user 		=	session('user_id');
		//非法操作
		if(!$user){
			echo "error";
			return 0;
		}

		$condition['user']	=	$user;
		$condition['work']	=	I('post.work_id');
		$Focus 			=	M('focus_work');
		$result 			=	$Focus->where($condition)->find();
		//非法操作
		if($result){
			echo "error";
			return 0;
		}
		$work_id 		=	$condition['work'];
		$limit['work_id']	=	$work_id;
		$Work 			=	M('work');
		$result			=	$Work->where($limit)->find();

		//关注作品等于关注人
		$artist			=	$result['work_id'];
		$FocusMen 		=	M('focus');

		$request['artist']	=	$artist;
		$request['user']	=	$user;

		$answer 		=	$FocusMen->where($request)->find();

		if(!$answer){
			$answer	=	$FocusMen->data($request)->add();
		}
		//失败
		if(!$answer){
			error_save($FocusMen->getLastSql());
		}
		//
		$result			=	$Focus->data($condition)->add();
		if($result){
			echo "right";
		}else{
			echo "error";
			//错误信息保存数据库
			 error_save($Focus->getLastSql());
		}

	}
	//点赞
	public function upvote(){
		$user 		=	session('user_id');
		//非法操作
		if(!$user){
			echo "error";
			return 0;
		}
		$condition['user']	=	$user;
		$condition['work']	=	I('post.work_id');
		$Upvote 		=	M('upvote');
		$result 			=	$Upvote->where($condition)->find();

		//非法操作
		if($result){
			echo "error";
			return 0;
		}

		$result			=	$Upvote->data($condition)->add();
		if($result){
			echo "right";
		}else{
			echo "error";
			//错误信息保存数据库
			 error_save($Upvote->getLastSql());
		}
	}
	//预订
	public function book(){
		$user 		=	session('user_id');
		//非法操作
		if(!$user){
			echo "error";
			return 0;
		}
		$condition['user']	=	$user;
		$condition['work_id']	=	I('post.work_id');
		$Order 			=	M('order');
		$result 			=	$Order->where($condition)->find();

		//非法操作
		if($result){
			echo "error";
			return 0;
		}
		//address选填
		if(I('post.address')){
			$condition['address']	=	I('post.address');
		}
		$condition['phone']	=	I('post.phone');
		$condition['name']	=	I('post.name');
		$result 			=	$Order->data($condition)->add();
	}
	//上传作品
	public function uploadWork(){

	}
}