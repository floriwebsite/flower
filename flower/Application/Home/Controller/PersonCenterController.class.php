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
		//博客
		$condition['artist']		=	session('user_id');
		$Person 			=	M('personal_data');
		$result 				=	$Person->where($condition)->find();
		$array['blog']			=	$result['content'];
		//
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
		//blog
		$limit['artist']			=	$data['artist_id'];
		$result				=	$serviceArea->where($limit)->find();
		$array['blog']			=	$result['area'];
		//
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
	//上传实名认证照片
	public function ident(){
	          $action_result 	=	array('flag' => 0);
	          $user_type	=	session('user_type');
	          $User 	   	=	M('user');
	          $limit['user_id']	=	session('user_id');
	          $result 		=	$User->where($limit)->find();
	          if($result['is_sure']==1){
	          	return 0;
	          }
	          if($user_type	!=	1){
			echo "<script language=javascript>alert('不合法操作!');</script>"
			$this->redirect('/Index/index');
	           }
	          $upload 		    = new \Think\Upload();// 实例化上传类
	          $upload->maxSize   =     3145728 ;// 设置附件上传大小
	          $upload->exts     	   =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	          $upload->rootPath  =      './Uploads/'; // 设置附件上传根目录
	           // 上传单个文件 
	          $info   		   =   $upload->uploadOne($_FILES['photo1']);
	          if(!$info) {// 上传错误提示错误信息
	                       $this->error($upload->getError());
	           }else{// 上传成功 获取上传文件信息
	                    $name 	   		=	$info['savename'];
	                    
	                    $condition['user_id']		=	session('user_id');
	                    $data['id_photo']		=	$name;
	                    $result 			=	$User->where($condition)->save($data);
	                    if($result){
	                    	$this->redirect('PersonCenter/index');
	                    }else{
	                    	$this->error();

	                    }
	           }
              }
              //编辑服务区域
              public function editAddress(){
             	          $action_result 	=	array('flag' => 0);
                        $user_type	=	session('user_type');
	          if($user_type	!=	1){
			echo "<script language=javascript>alert('不合法操作!');</script>"
			$this->redirect('/Index/index');
	           }
	           $data['area']		=	I('post.blog');
	           $condition['artist']	=	session('user_id');
	           $ServiceArea 	   	=	M('service_area');
	           $result 			=	$ServiceArea->where($condition)->save($data);
	           if($result){
	                    $this->ajaxReturn($action_result);
	            }else{
	            	      $action_result 	=	array('flag' => 1);
	                    $this->ajaxReturn($action_result);


	             }

              }
              //编辑个人资料
              public function editData(){
             	          $action_result 	=	array('flag' => 0);
                        $user_type	=	session('user_type');

	          if($user_type	!=	1){
			echo "<script language=javascript>alert('不合法操作!');</script>"
			$this->redirect('/Index/index');
	           }

	           $data['area']		=	I('post.blog');
	           $condition['artist']	=	session('user_id');
	           $PersonalData 	   	=	M('personal_data');
	           $result 			=	$PersonalData->where($condition)->save($data);
	           if($result){
	                    $this->ajaxReturn($action_result);
	            }else{
	            	      $action_result 	=	array('flag' => 1);
	                    $this->ajaxReturn($action_result);


	             }
 
              }

              //
              public function uploadCover(){
                        $action_result 	=	array('flag' => 0);
	          $user_type	=	session('user_type');
	          if($user_type	!=	1){
			echo "<script language=javascript>alert('不合法操作!');</script>"
			$this->redirect('/Index/index');
	           }
	          $upload 		    = new \Think\Upload();// 实例化上传类
	          $upload->maxSize   =     3145728 ;// 设置附件上传大小
	          $upload->exts     	   =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	          $upload->rootPath  =      './Uploads/'; // 设置附件上传根目录
	           // 上传单个文件 
	          $info   		   =   $upload->uploadOne($_FILES['photo1']);
	          if(!$info) {// 上传错误提示错误信息
	                       $this->error($upload->getError());
	           }else{// 上传成功 获取上传文件信息
	                    $name 	   		=	$info['savename'];
	                    $User 	   		=	M('user');
	                    $condition['user_id']		=	session('user_id');
	                    $data['photo']		=	$name;
	                    $result 			=	$User->where($condition)->save($data);
	                    if($result){
	                    	$this->redirect('PersonCenter/index');
	                    }else{
	                    	$this->error();

	                    }
	           }
              }
}