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
class IndexController extends Controller {
	protected var $id_code;
            /**
	*展示不同类型用户的主页
	*/
	public function index(){
		
		if(session('user_type')==0){
			//一般用户登入 模板类型0
                   		$this->assign('type',0);
      			$this->display();	
                   	}else if(session('user_type')==1){
                   		//花艺师登入登入 模板类型1
                   		$this->assign('type',1);
                   		$this->display();
                   	}else{
                   		//未登入 模板类型2
                   		$this->assign('type',2);
                   		$this->display();
                   	}

		
   	 }

   	//show normal user login interface
   	public function userLoginDisplay(){
   	 	$this->display();
   	 }
   	
   	//show artist user login interface
   	 public function artistLoginDisplay(){
   	 	$this->display();
   	 }

   	
   	 //the login function of normal user and artist
   	 public function login(){

   	 	$action_result 	=	array('flag' => 0);
   	 	$type		=	I('post.type');
   	 	$usrname	=	I('post.username');
   	 	$password	=	I('post.password');
   	 	//登入的为一般用户
   	 	if($type		==	0){
   	 		$User    =	M('user');
   	 		$condition['username']		=	$username;
   	 		$result				=	$User->where($condition)->find();
   	 		//username not exist 
   	 		if(!$result){
   	 			$this->ajaxReturn($action_result);
   	 		}else{
   	 			$condition['password']		=	sha1($password);
   	 			$result 				=	$User->where($condition)->find();
   	 			//password error
   	 			if(!$result){
   	 				$action_result 		=	 array('flag' => 1);
   	 				$this->ajaxReturn($action_result);
   	 			}else{
   	 				 $action_result 		=	 array('flag' => 2);
   	 				 session('user_type',0);
   	 				 session('username',$username);
   	 				 cookie('user_type',0);
   	 				 cookie('username',$username);
   	 				 $this->ajaxReturn($action_result);
   	 			}

   	 		}
   	 	//登入的为花艺师
   	 	}else if($type		==	1){

   	   	 	$User    			=	M('artist');
   	 		$condition['name']		=	$username;
   	 		$result				=	$User->where($condition)->find();
   	 		//username not exist 
   	 		if(!$result){
   	 			$this->ajaxReturn($action_result);
   	 		}else{
   	 			$condition['password']		=	sha1($password);
   	 			$result 				=	$User->where($condition)->find();
   	 			//password error
   	 			if(!$result){
   	 				$action_result 		=	 array('flag' => 1);
   	 				$this->ajaxReturn($action_result);
   	 			}else{
   	 				 $action_result 		=	 array('flag' => 2);
   	 				 session('user_type',1);
   	 				 session('username',$username);
   	 				 cookie('user_type',1);
   	 				 cookie('username',$username);
   	 				 $this->ajaxReturn($action_result);
   	 			}

   	 		}	 		
   	 	}

   	 }

   	
   	 //show normal user register interface
   	 public function userRegisterDisplay(){
   	 	$this->display();
   	 }
   	
   	 //show artist user register interface
   	  
   	 public function artistRegisterDisplay(){
   	 	$this->display();
   	 }

   	 
   	  //normal user register
   	 public function userRegister(){
   	 	$action_result 	=	array('flag' => 0);
   	 	$code 	     	=	I('post.code');
   	 	$user_name 	=	I('post.user_name');
   	 	$phone		=	I('post.phone');
   	 	$password 	=	I('post.password');

   	 	if($code   	!=	session('id_code')){
   	 		session('id_code',null);
   	 		$action_result 	=	array('flag' => 1);
   	 		$this->ajaxReturn($action_result);
   	 	}else{
   	 		$User 				=	M('user');
   	 		$condition['user_name']	=	$user_name;
   	 		$result				=	$User->where($condition)->find();
   	 		if($result){
   	 			$action_result 		=	array('flag' => 0);
   	 			$this->ajaxReturn($action_result);
   	 		}else{
   	 			$map['phone']		=	$phone;
   	 			$result			=	$User->where($map)->find();
   	 			if($result){
   	 				$action_result 		=	array('flag' => 2);
   	 				$this->ajaxReturn($action_result);
   	 			}else{
   	 				$data['user_name']	=	$user_name;
   	 				$data['password']	=	sha1($password);
   	 				$data['phone']		=	$phone;
   	 				$result 			=	$User->data($data)->add();
   	 				if($result){
   	 					$action_result 		=	array('flag' => 3);
   	 					session('user_type',0);
   	 				 	session('username',$user_name);
   	 				 	cookie('user_type',0);
   	 				 	cookie('username',$user_name);
   	 					$this->ajaxReturn($action_result);
   	 				}else{
   	 					echo "error";
   	 				}

   	 			}
   	 		}
   	 	}
   	 }
   	 
   	 
   	  //aritist user register
   	 public function artistRegister(){
   	 	$action_result 	=	array('flag' => 0);
   	 	$code 	     	=	I('post.code');
   	 	$city 		=	I('post.city');
   	 	$password 	=	I('post.password');
   	 	$name 		=	I('post.name');
   	 	$phone		=	I('post.phone');
   	 	if($code   	!=	session('id_code')){
   	 		session('id_code',null);
   	 		$action_result 	=	array('flag' => 1);
   	 		$this->ajaxReturn($action_result);
   	 	}else{
   	 		$User 			=	M('artist');
   	 		$condition['phone']	=	$phone;	
   	 		$result			=	$User->where($condition)->find();
   	 		if($result){
   	 			$this->ajaxReturn($action_result);
   	 		}else{
   	 			$data['name']		=	$name;
   	 			$data['phone']		=	$phone;
   	 			$data['city']		=	$city;
   	 			$data['password']	=	sha1($password);
   	 			$result 			=	$User->data($data)->add();
   	 			if($result){
   	 				$action_result	=	array('flag' => 2);
   	 				 session('user_type',1);
   	 				 session('username',$name);
   	 				 cookie('user_type',1);
   	 				 cookie('username',$name);	
   	 				$this->ajaxReturn($action_result);	
   	 			}else{
   	 				echo "error";
   	 			}
   	 		}
   	 	}	
   	 }

   	
   	  //send identify code to the user phone 
   	   public function id_code(){
   	 	$phone		=	I('post.phone');
   	 	$id_code 	=	generate_code();
   	 	session('id_code',$id_code);
   	 	$message 	=	"[花艺生活]您的手机号为".$phone",登入验证密码为".$id_code."请保管验证码，勿告诉他人。";
   	 	//调用接口


   	 	//发送短信

   	 }


   	/**
   	  *@param int $length 
   	  * 	     生成验证码的长度
   	  *@return string $password
   	  *	      生成的验证码
   	  */
	private function generate_code( $length = 4 ) {
    	
    		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    		//generate dynamic password
    		$password = '';
    		for ( $i = 0; $i < $length; $i++ ) {
        			$password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
    		}

    		return $password;

	}

}