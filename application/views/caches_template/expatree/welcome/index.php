<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title><?=$title ?></title>
  <meta content="<?=$keywords ?>" name="keywords" />
  <meta content="<?=$decriptions ?>" name="description" />
  <link type="text/css" href="<?php echo base_url('css/font-awesome.min.css')?>" rel="stylesheet" />
  <!--[if IE 7]>
  <link rel="stylesheet" href="<?php echo base_url('css/font-awesome-ie7.min.css')?>">
  <![endif]-->
  <!-- 新 Bootstrap 核心 CSS 文件 -->
  <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
  <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link type="text/css" href="<?php echo base_url('css/home.css')?>" rel="stylesheet" />
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <base href="<?php echo SITE_URL?>">
</head>
<body>
<div id="dialog" style="padding:0px;"></div>
<div class="navbar-wrapper">
  <div class="container">

    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="images/website-logo.png"> </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="<?php echo site_url()?>">首页</a></li>
            <li><a href="<?php echo site_url('page/cat/docs')?>">文档</a></li>
            <li><a href="https://github.com/hubinjie/ACI" target="_blank">下载</a></li>
            <li><a href="<?php echo site_url('member')?>">登录ACI模块生成器</a></li>
            <li> <a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=bad0214202bb89e4118c272a39b4cc81abf6bbae0ec7f46d68e5d4f06448cbda"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="ACI" title="ACI"></a></li>

          </ul>
        </div>
      </div>
    </nav>

  </div>
</div>

<!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <div class="container">
        <div class="carousel-caption">
          <h1>ACI —— 开源PHP后台管理系统</h1>
          <p> 基于PHP Codeigniter 开源框架功能扩展  </p>
          <p>自带后台管理，用户管理、用户组管理、权限管理、菜单管理、模块管理、扩展管理基本功能，适合于所有程序的基本需求,由此可以扩展出各类实用应用...</p>
          <p>
            
            <a class="btn btn-lg  btn-outline btn-default" href="http://demo.autocodeigniter.com" target="_blank" role="button">演示版</a>
            <a class="btn btn-lg  btn-outline btn-danger" href="https://github.com/hubinjie/ACI" target="_blank" role="button">查看 GitHub 项目主页</a></p>
        </div>
      </div>
    </div>
    <div class="item " >
      <div class="container" >
        <div class="carousel-caption">
          <h1>ACI —— 简易PHP代码生成器</h1>
          <p>简单配置就帮您写好了所有常用代码，完成复杂需求 <code>&lt;?php echo "ACI";?&gt; </code>  </p>
          <p>你可以甚至不用写一行代码，通过自己的需求点，手动配置就能完成你的功能需求，区别于其他内容管理系统的地方在于我们真实的是生成的WEB代码并带注释，方便查看或二次开发...</p>
          <p>
            <a class="btn btn-lg  btn-outline btn-default" href="http://demo.autocodeigniter.com" target="_blank" role="button">演示版</a>
           <a class="btn btn-lg  btn-outline btn-danger" target="_blank" href="https://github.com/hubinjie/ACI" role="button">查看 GitHub 项目主页</a></p>
        </div>
      </div>
    </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><!-- /.carousel -->

<!-- Marketing messaging and featurettes
    ================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

  <!-- Three columns of text below the carousel -->
  <div class="row">
    <div class="col-lg-4">

      <p class="circle"><i class="fa fa-desktop fa-4x"></i></p>
      <h2>后台管理</h2>
      <p>安装完成后，就自带了一套：用户管理、用户组管理、权限管理、菜单管理、模块管理、扩展管理基本功能，适合于所有程序的基本需求,由此可以扩展出各类实用应用...</p>

    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <p class="circle"><i class="fa fa-terminal fa-4x"></i></p>
      <h2>二次开发</h2>
      <p>你可以甚至不用写一行代码，通过自己的需求点，手动配置就能完成你的功能需求，区别于其他内容管理系统的地方在于我们真实的是生成的WEB代码并带注释，方便查看或二次开发...</p>

    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <p class="circle"><i class="fa fa-send fa-4x"></i> </p>
      <h2>技术支持</h2>
      <p>我们定期会做一些视频和文字教程，教大家如何利用框架更好的进行自定义的扩展二次开发，未来我们会兼容更多的开源框架或开发语言，我们也会发布更多的官方模块...</p>

    </div><!-- /.col-lg-4 -->
  </div><!-- /.row -->
</div>

<div class="container">
  <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <a name="about"></a>
        <h3 >关于项目</h3>
        <p >ACI 即 auto codeigniter和简称，之所以叫这个名字，是因为本人特别喜欢用PHP 中这的Codeigniter框架 ，因为它轻巧好用、文档完善，性能卓越。之所以前面加上AUTO这个单词是因为想在这个框架的基础上做到一些自动化编代码的工作，减轻重复写代码的烦脑。</p>
        <p>ACI 框架初始化安装便拥有了用户管理，用户组管理，模块管理，菜单管理，权限管理，非常友好的支持二次开发及代码一站式导入。</p>
        <p>ACI 的功能特点：如代码分离、模板化操作、模块化管理、权限不仅可以体现在单个页面上面，也可以细化到按钮上面。未来将兼容支持更多的开发语言及开源程序。</p>
     </div>
      <div class="col-md-5">
        <img src="images/divices.png" class="img-responsive">
      </div>
    </div>
</div>

<?php include template('public','footer_view'); ?>