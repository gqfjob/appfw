<!DOCTYPE html PUBLIC>
<html lang="zh">
<head>
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">

   <title>通用框架</title>

	<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet">
   <script src="<?= base_url('assets/js/swfobject.js') ?>"></script>
</head>

<body style="padding-top:50px">

    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <ul class="nav">
                  <?php if("main" == $curpage){?>
                  <li class="active"><a href="#">首页</a></li>
                  <?php }else{?>
                  <li><a href="<?php echo $base_URL,"/weibo/index";?>">首页</a></li>
                  <?php }?>
                  <li class="divider-vertical"></li>
                  <?php if("mycourse" == $curpage){?>
                  <li class="active"><a href="#">我的课堂</a></li>
                  <?php }else{?>
                  <li><a href="<?php echo $base_URL,"/classroom/loginroom";?>">我的课堂</a></li>
                  <?php }?>
                  <li class="divider-vertical"></li>
                  <?php if("usercenter" == $curpage){?>
                  <li class="active"><a href="#">个人中心</a></li>
                  <?php }else{?>
                  <li><a href="<?php echo $base_URL,"/classroom/showroom/1234";?>">个人中心</a></li>
                  <?php }?>
                </ul>
            </div>
        </div>
    </div>

<div class="container">
