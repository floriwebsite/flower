<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>普通用户注册</title>
    <link rel="stylesheet" href="/flower/Public/css/lingdu.css">
    <script src="/flower/Public/js/jquery.js"></script>
    <script src="/flower/Public/js/lingdu.js"></script>
    <script src="/flower/Public/js/respond.js"></script>
    <script type="text/javascript">

    // 接收后端的验证，显示相应提示
 $(function(){

  $('#get_code').click(function(){

    

  $('#code_input').show(1000);

  $.post("<?php echo U('Index/id_code');?>",{phone:$('#phone').val()},function(data){
     
     if(data.flag == 0){
      
      alert("该手机号已被注册，请更换手机号获取验证码。");
      }

     },"json");

  return false;
  
});

 
  
 
    $('form[name="login"]').submit(function(){

    // 接收后端的验证，显示相应提示

         $.post("<?php echo U('Index/userRegister');?>",$(this).serialize(),function(data){

        if(data.flag==0){

        alert("用户名已被注册");//跳转到主页

        }else if(data.flag==1){

        alert('您输入的短信验证码有误!');

        }else if(data.flag == 2){
        
        alert("请勿在获取验证码后变更您的手机号");
        }

        else{

        window.location.href="<?php echo U('Index/index');?>";  //跳转到主页

        }

        },"json");
   
   return false;

  });





});




    </script>
<link rel="shortcut icon" type="image/x-icon" href="http://www.iswweb.com/images/favicon.ico" media="screen" /> 
    <style>
		.demo-nav.fixed.fixed-top{z-index:8;background:#fff;width:100%;padding:0;border-bottom:solid 3px #0a8;-webkit-box-shadow:0 3px 6px rgba(0, 0, 0, .175);box-shadow:0 3px 6px rgba(0, 0, 0, .175);}
    </style>
</head>

<body style="background-color:#F2F2F2">
  	<!--顶部-->
   <div class="keypoint  bg-inverse radius text-center" style="background-color:#B0E2FF;height:189px;">
      <img src="/flower/Public/images/logo1.png">
      <br/>
      <br/>
      <br/>
      <h2 style="font-size:23px;">欢迎登录</h2>
     </div>
     <br>
     <br>

<div class="container">
 

<div >

  <form  class="form form-block" style="width:250px;margin:auto;" name="login">

  <div class="form-group">
    <div class="label"><label for="username">*注册账号</label></div>
    <div class="field">
      <input type="text" class="input radius-rounded" id="user_name" name="username" size="50" data-validate="required:必填" placeholder="请输入用户名" />
    </div>
  </div>

  <div class="form-group">
    <div class="label"><label for="password">*密码</label></div>
    <div class="field">
      <input type="password" class="input radius-rounded" id="password" name="password" size="50" data-validate="required:必填" placeholder="请输入密码" />
    </div>
  </div>

  <div class="form-group">
    <div class="label"><label for="repassword">*确认密码</label></div>
    <div class="field">
      <input type="password" class="input radius-rounded" id="password" name="repassword" size="50" data-validate="required:必填,repeat#password:两次输入的密码不一致" placeholder="请再次输入密码" />
    </div>
  </div>

  <div class="form-group" >
    <div class="label"><label for="phone">*手机号码</label></div>
    <div class="field" >
      <input type="text" style="display:inline;width:50%;" class="input radius-rounded" id="phone" name="phone" size="30" data-validate="required:必填,length#==11:请正确填写您的手机号码以获取短信验证码" placeholder="请输入手机号码" />
       <button class="button bg-yellow-light" style="font-size:10px;" id="get_code">获取短信验证码</button>

    </div>
  </div>

  <div class="form-group" style="display:none;" id="code_input">
    <div class="label"><label for="code">*验证码</label></div>
    <div class="field">
      <input type="text" style="width:50%" class="input radius-rounded" id="code" name="code" size="50" data-validate="required:必填" placeholder="输入验证码" />
    </div>
  </div>



  <br>

  <div class="form-button" ><button class="button  border-main radius-rounded" type="submit" style="margin-left:58px;">登录</button>

    <button class="button  border-gray radius-rounded" type="reset" style="margin-left:10px;">重置</button>
  </div>
</form>
</div>

    

</div> 

<!-- 底部通用模版-->
<!--     <div class="layout bg-gray bg-inverse" style="width:100% ">
      <div class="container">
        <div class="navbar" >
          
          <div class="navbar-body nav-navicon" id="navbar-footer" style="margin-top:300px;">
            <div class="navbar-text hidden-s hidden-l" style="text-align:center">版权所有 &copy; <a href="http://www.pintuer.com" target="_blank">#</a> All Rights Reserved，蜀ICP备：380959609</div>
         
          </div>
        </div>
      </div>
    </div> -->
<!--模版结束-->




</body>
</html>