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
	/*protected var $id_code;*/
            /**
	*展示不同类型用户的主页
	*/
	public function index(){
		
		if(session('user_type')===0){
			//一般用户登入 模板类型0
                   	$this->assign('type',0);
                      $name      =     session('username');
                            $this->assign('name',$name);
      			$this->display();	
                   	}else if(session('user_type')==1){
                   		//花艺师登入登入 模板类型1
                   		$this->assign('type',1);
                            $name      =     session('username');

                            $this->assign('name',$name);
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

   	 	$action_result 	    =	array('flag' => 0);
   	 	$type		           =	I('post.type');
   	 	$username	           =	I('post.username');
   	 	$password	           =	I('post.password');

   	 	//登入的为一般用户
   	 	if($type		==	0){
   	 		$User                                            =	  M('user');
   	 		$condition['user_name']	     =	   $username;
                      $condition['user_type']             =         0;
   	 		$result				                    =	$User->where($condition)->find();
   	 		//username not exist 
   	 		if(!$result){
   	 			$this->ajaxReturn($action_result);
   	 		}else{
   	 			$condition['password']		=	sha1($password);
   	 			$result 				              =	$User->where($condition)->find();
   	 			//password error
   	 			if(!$result){
   	 				$action_result 		=	 array('flag' => 1);
   	 				$this->ajaxReturn($action_result);
   	 			}else{
   	 				 $action_result 		  =	 array('flag' => 2);
                                    $limit['user_name']  =   $username;
                                    $limit['password']     =   sha1($password);
                                    $User                          =   M('user');
                                    $answer                     =   $User->where($limit)->find();
                                    session('user_id',$answer['user_id']);
   	 				 session('user_type',0);
   	 				 session('username',$username);

   	 				 cookie('user_type',0);
   	 				 cookie('username',$username);
   	 				 $this->ajaxReturn($action_result);
   	 			}

   	 		}
   	 	//登入的为花艺师
   	 	}else if($type		==	1){

   	   	 	$User    			                =	M('user');
   	 		$condition['user_name']	  =	$username;  
                    $condition['user_type']            =        1;
   	 		$result				                =	$User->where($condition)->find();
                      //echo $User->getLastSql();
   	 		//username not exist 
   	 		if(!$result){
   	 			$this->ajaxReturn($action_result);
   	 		}else{
   	 			$condition['password']		=	sha1($password);
   	 			$result 				              =	$User->where($condition)->find();
   	 			//password error
   	 			if(!$result){
   	 				$action_result 		=	 array('flag' => 1);

   	 				$this->ajaxReturn($action_result);
   	 			}else{
   	 				 $action_result 		=	 array('flag' => 2);
                                    $limit['user_name']  =   $username;
                                    $limit['password']     =   sha1($password);
                                    $User                         =   M('user');
                                    $answer                     =   $User->where($limit)->find();

                                    session('user_id',$answer['user_id']);
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
   
   	 	$action_result    =	array('flag' => 0);
     
   	 	$code 	       =	I('post.code');
              /*echo $code;*/
   	 	$user_name   =	I('post.username');
   	 	$phone	       =	I('post.phone');
       
   	 	$password 	       =	I('post.password');
                     //前端已经验证 却还是不正确格式 不正确方法链入
                     if((strlen($user_name )>20)&&(strlen($username)<5)){
                               echo "<script language=javascript>alert('不合法操作!');</script>";
                               return 0;
                     }
                      if((strlen($password )>50)&&(strlen($password)<5)){
                               echo "<script language=javascript>alert('不合法操作!');</script>";
                               return 0;
                     }

   	 	if($code        	!=	session('id_code')){
   	 		session('id_code',null);
   	 		$action_result 	       =	array('flag' => 1);
   	 		$this->ajaxReturn($action_result);
        
   	 	}else{
   	 		$User 				              =	M('user');
   	 		$condition['user_name']	=	$user_name;
   	 		$result				              =	$User->where($condition)->find();
                      error_save("mark01");
   	 		if($result){
   	 			$action_result 		               =	array('flag' => 0);
   	 			$this->ajaxReturn($action_result);
     
   	 		}else{
   	 			
   	 			if(session('phone')!=$phone){
                                   session('phone',null);
   	 				$action_result 		=	array('flag' => 2);
   	 				$this->ajaxReturn($action_result);
       
   	 			}else{
   	 				$data['user_name']	=	$user_name;
   	 				$data['password']	=	sha1($password);
   	 				$data['phone']		=	$phone;
                                   $data['user_type']         =         0;
                                    
   	 				$result 			      =	$User->data($data)->add();
   	 				if($result){
   	 					$action_result 	        =	array('flag' => 3);
                                          $limit['user_name']  =   $user_name;
                                          $limit['password']     =   sha1($password);
                                          $User                         =   M('user');
                                          $answer                     =   $User->where($limit)->find();
                                          session('user_id',$answer['user_id']);
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
   	 	$action_result 	             =	array('flag' => 0);
   	 	$code 	     	            =	I('post.code');
      
   	 	$city 		                      =	I('post.city');
     
   	 	$password 	                      =	I('post.password');
   
   	 	$name 		            =	I('post.username');
     
   	 	$phone		            =	I('post.phone');
   	 	if($code   	                       !=    	session('id_code')){
     
   	 		session('id_code',null);
   	 		$action_result 	=	array('flag' => 1);
   	 		$this->ajaxReturn($action_result);
   	 	}else{
   	 		$User 			              =	M('user');
   	 		
   	 		if(session('phone')!=$phone){
                            $session('phone',null);
   	 			$this->ajaxReturn($action_result);
   	 		}else{
   	 			$data['user_name']	=	$name;
                           /* error_save($name."d");*/
   	 			$data['phone']		=	$phone;
   	 			$data['city']		       =	$city;
   	 			$data['password']	=	sha1($password);
                            $data['user_type']   =    1;
   	 			$result 			       =	$User->data($data)->add();
   	 			if($result){

   	 				 $action_result	         =	array('flag' => 2);
                                    $limit['user_name']  =   $name;

                                    $limit['password']     =   sha1($password);
                                    $User                         =   M('user');
                                    $answer                     =   $User->where($limit)->find();
                                   /* error_save($User->getLastSql());*/
                                    $user_id                     =   $answer['user_id'];

                                    session('user_id',$user_id);
                                    //初始化服务区域
                                    $ServiceArea            =   M('service_area');
                                    $mess['artist']           =    $user_id;

                                    $mess['area']            =    " ";
                                   
                                    $ServiceArea->data($mess)->add();
                                  
                                    //初始化个人资料
                                    $Personaldata        =     M('personal_data');
                                    $info['artist']           =     $user_id;
                                    $info['content']       =     " ";
                                     $Personaldata->data($info)->add();

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
              $action_result               =  array('flag' => 0);
   	 	$phone		                =	I('post.phone');
          /*  echo $phone;*/
   	 	$id_code 	                 =	$this->generate_code();
                     $User                                     =   M('user');
                     $condition['phone']             =   $phone;  
                     /*echo $phone;*/
                     $pattern                                =   "((\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$) " ;
             
                     if(!preg_match($pattern, $phone)){

                              $action_result               =  array('flag' => 1);
                              $this->ajaxReturn($action_result);
                              return;
                     }
                     $result                                    = $User->where($condition)->find();
                     /*error_save($User->getLastSql());*/
                     if($result){
                                 $action_result             = array('flag' => 0);
                                 $this->ajaxReturn($action_result);
                     }else{
                                 session('phone',$phone);
                                 session('id_code',$id_code);
                            echo $id_code;
                                 $message    =  "[花艺生活]您的手机号为".$phone.",登入验证密码为".$id_code."请保管验证码，勿告诉他人。";
                                 //调用接口


                                 //发送短信
                     }

   	 	

   	 }


   	/**
   	  *@param int $length 
   	  * 	     生成验证码的长度
   	  *@return string $password
   	  *	      生成的验证码
   	  */
	public function generate_code( $length = 4 ) {
    	
    		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    		//generate dynamic password
    		$password = '';
    		for ( $i = 0; $i < $length; $i++ ) {
        			$password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
    		}

    		return $password;

	}

        //登出
        public function logout(){
          session(null);
          $this->redirect('Index/index');
        }
}