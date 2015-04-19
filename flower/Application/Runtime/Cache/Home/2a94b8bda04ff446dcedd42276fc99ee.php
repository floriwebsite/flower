<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>花艺师之家</title>
    <link rel="stylesheet" href="/flower/Public/css/lingdu.css">
    <script src="/flower/Public/js/jquery.js"></script>
    <script src="/flower/Public/js/lingdu.js"></script>
    <script src="/flower/Public/js/respond.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="http://www.iswweb.com/images/favicon.ico" media="screen" /> 
    <style>
		/*.demo-nav.fixed.fixed-top{z-index:8;background:#fff;width:100%;padding:0;border-bottom:solid 3px #0a8;-webkit-box-shadow:0 3px 6px rgba(0, 0, 0, .175);box-shadow:0 3px 6px rgba(0, 0, 0, .175);}*/
    </style>
<script type="text/javascript">

$(function(){

   var type =  <?php echo ($type); ?> ;

     if(type == 1){

        $('#p2').show();
        $('#ilogin').hide();
        $('#outlogin').show();
     }

     if(type == 0){

        $('#p1').show();
        $('#ilogin').hide();
        $('#outlogin').show();
     }



})





</script>


</head>

<body>
  	<!--顶部-->
    <div class="layout bg-black bg-inverse">
      <div class="container height-large">
        <span class="float-right text-small text-gray hidden-l" id="ilogin">

          <a class="text-main" href="<?php echo U('Index/userLoginDisplay');?>">用户登录</a><span> | </span><a class="text-main" href="<?php echo U('Index/artistLoginDisplay');?>">花艺师登录</a><span> | </span><a class="text-main" href="<?php echo U('Index/userRegisterDisplay');?>">用户注册</a> <span> | </span> <a class="text-main" href="<?php echo U('artistRegisterDisplay');?>">花艺师注册</a>

        </span>

        欢迎来到<a href="index.html">零度花艺</a>

          <span class="float-right text-small text-gray hidden-l" id="outlogin" style="display:none;">
            <a class="text-main" href="<?php echo U('Index/logout');?>">退出</a>

          </span>
      </div>
    </div>

	<!--导航-->
    <div class="demo-nav padding-big-top padding-big-bottom " style="height:90px">
    <div class="container padding-top padding-bottom">
    
      <div class="line">
        <div class="xl12 xs3 xm3 xb2"><button class="button icon-navicon float-right" data-target="#header-demo"></button><a target="_blank" href="index.html"><img src="/flower/Public/images/ilogo2.png" style="margin:0px 0 18px 0px;" /></a></div>
        <div class=" xl12 xs9 xm9 xb10 nav-navicon" id="header-demo">
    
          <div class="xs8 xm6 xb5 padding-small">
            <ul class="nav nav-menu nav-inline nav-big" >

              <li><a href="<?php echo U('WorkShow/index');?>" style="font-weight:bold;">作品展示</a></li>
              <li><a href="<?php echo U('ArtistShow/index');?>" style="font-weight:bold;">花艺师</a></li>
              <li><a href="<?php echo U('FlowerLife/index');?>" style="font-weight:bold;">花艺生活</a></li>
               
            </ul>
            
            <!-- <div class="padding-small"><span>欢迎您，习远平</span><button>订单管理</button></div> -->
                
          </div>
         <div class="padding-small float-right text-big " style="display:none;" id="p1">

            <span class="icon icon-gittip"></span>
            <strong>欢迎您，<?php echo ($name); ?></strong>

             <button class="button button-small border-green radius-rounded" style="margin:0 30px 0 5px"><a href="<?php echo U('BookCenter/index');?>">我的订单</a></button>

        </div>
          
        <div class="padding-small float-right text-big " style="display:none;" id="p2">

            <span class="icon icon-gittip"></span>
            <strong>欢迎您，<a href="<?php echo U('PersonCenter/index');?>"><?php echo ($name); ?></a> </strong>

             <button class="button button-small border-green radius-rounded" style="margin:0 30px 0 5px"><a href="<?php echo U('BookCenter/index');?>">订单管理</a></button>

        </div>
                
        </div>
    
      </div>
    
    </div>
    
    </div>
    
    
    <!--banner-->
    <div class="banner" data-style="border-white" style="height:450px;">
      <div class="carousel">
        <div class="item"><img src="/flower/Public/images/home1.jpg" width="100%" /></div>
        <div class="item"><img src="/flower/Public/images/home2.jpg" width="100%" /></div>
        <div class="item"><img src="/flower/Public/images/home3.jpg" width="100%" /></div>
      </div>
    </div>
  	<br/>
    
  	<!--内容-->
    <div class="container">
     
      <br />



      <div id="three_list">
             <div id="p1">

              <h2 style="font-size:20px; text-align:center;"><a href="<?php echo U('WorkShow/index');?>">作品展示</a><h2>

                <hr   style="margin:0 auto;margin-top:5px; width:8%;height:3px;color:gray;"/>
                <br/>

                <div class="line-big" style="margin-left:217px">
                                    
                <div class="ring-hover x3 text-big  border-dot border-small border-left"><a href="<?php echo U('WorkShow/weddingShow');?>">婚礼花艺</div>
                 <div class="ring-hover x3  text-big border-dot border-small border-left"><a href="<?php echo U('WorkShow/businessShow');?>">商务花艺</div>
                  <div class="ring-hover x3 text-big border-dot border-small border-left"><a href="<?php echo U('WorkShow/presentShow');?>">礼品花艺</div>
                   <div class="ring-hover x3 text-big border-dot border-small border-left"><a href="<?php echo U('WorkShow/homeShow');?>">居家花艺</div>

                </div>

             </div>

             <br/>
              <br/>

             <div id="p2">
              <h2 style="font-size:20px; text-align:center;"><a href="<?php echo U('ArtistShow/index');?>">花艺师</a><h2>
                <hr   style="margin:0 auto;margin-top:5px; width:5%;height:3px;color:gray;"/>



             </div>
              <br/>
              <br/>
              <br/>

             <div id="p3">
              <h2 style="font-size:20px; text-align:center;"><a href="<?php echo U('FlowerLife/index');?>">花艺生活</a><h2>
                <hr   style="margin:0 auto;margin-top:5px; width:5%;height:3px;color:gray;"/>



             </div>






      </div>
    
    













    <br /><br />
    
    
    <!--底部-->
    <br /><br />

  
  </div> 

<!-- 底部通用模版-->
    <div class="layout bg-gray bg-inverse" style="width:100%">
      <div class="container">
        <div class="navbar" >
          
          <div class="navbar-body nav-navicon" id="navbar-footer">
            <div class="navbar-text hidden-s hidden-l" style="text-align:center">版权所有 &copy; <a href="http://www.pintuer.com" target="_blank">#</a> All Rights Reserved，蜀ICP备：380959609</div>
         
          </div>
        </div>
      </div>
    </div>
<!--模版结束-->

</body>
</html>