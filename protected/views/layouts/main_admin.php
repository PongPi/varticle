<!DOCTYPE html>
<html lang="en" xmlns:ng="http://angularjs.org" id="ng-app" ng-app="vnu20">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Pong Pi">
    <title>Admin - Đại học Quốc gia Thành phố Hồ Chí Minh 20 năm Xây dựng - Phát triển - Hội nhập</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/statics/admin/css/initialization/import.css" media="all" />
    <!-- <link href="css/shop-homepage.css" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <base href="<?php echo Yii::app()->request->hostInfo . Yii::app()->request->baseUrl; ?>/">
    <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/statics/admin/images/vnu20_logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/statics/admin/images/vnu20_logo.png" type="image/x-icon">
    
</head>
<body ng-controller='mainController'>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $this->createAbsoluteUrl('article/index');?>">Admin - VNU20</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <?php if(!(Yii::app()->controller->action->id == 'login' and Yii::app()->controller->id == 'accounts')){?>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo $this->createAbsoluteUrl('/');?>">Home</a>
                    </li>
                    <?php
                        if(in_array('article', Yii::app()->user->role)){
                     ?>
                    <li class="<?php if($this->getId()== 'article') echo 'active'; ?>">
                        <a href="<?php echo $this->createAbsoluteUrl('article/index');?>">Nội dung</a>
                    </li>
                    <?php }?>
                    <?php
                        if(in_array('albums', Yii::app()->user->role)){
                     ?>
                    <li class="<?php if($this->getId()== 'albums') echo 'active'; ?>">
                        <a href="<?php echo $this->createAbsoluteUrl('albums/index');?>">Hình ảnh</a>
                    </li>
                    <?php }?>
                    <?php
                        if(in_array('accounts', Yii::app()->user->role)){
                     ?>
                    <li class="<?php if($this->getId()== 'accounts') echo 'active'; ?>">
                        <a href="<?php echo $this->createAbsoluteUrl('accounts/index');?>">Người dùng</a>
                    </li>
                   <?php }?>
                   <?php
                        if(in_array('slider', Yii::app()->user->role)){
                     ?>
                    <li class="<?php if($this->getId() == 'slider') echo 'active'; ?>">
                        <a href="<?php echo $this->createAbsoluteUrl('slider/index');?>">Slider</a>
                    </li>
                   <?php }?>
                </ul>
            
            <a href="<?php echo $this->createAbsoluteUrl('default/logout');?>" class="navbar-text navbar-right">Logout (<?php echo Yii::app()->user->name;?>)</a>
            </div>
            <?php }?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

   <div id="content" class="container">

        <div class="row">
            <?php if(!(Yii::app()->controller->action->id == 'login' and Yii::app()->controller->id == 'default')){?>
            <div class="col-md-3">
                <div id="navi_vnu20_vertical" role="tablist" class="list-group">
                    <?php
                        if(in_array('article', Yii::app()->user->role)){
                     ?>
                    <a href="<?php echo $this->createAbsoluteUrl('article/index');?>" class="list-group-item <?php if($this->getId()== 'article') echo 'active'; ?>">
                        <strong>Quản lý Nội dung</strong>
                    </a>
                    <?php }?>  
                    <?php
                        if(in_array('albums', Yii::app()->user->role)){
                     ?>
                    <a href="<?php echo $this->createAbsoluteUrl('albums/index');?>" class="list-group-item <?php if($this->getId()== 'albums') echo 'active'; ?>" >
                        <strong>Quản lý Hình ảnh</strong>
                    </a>
                    <?php }?>   
                    <?php
                        if(in_array('accounts', Yii::app()->user->role)){
                     ?>
                    <a class="list-group-item <?php if($this->getId()== 'accounts') echo 'active'; ?>" href="<?php echo $this->createAbsoluteUrl('accounts/index');?>">
                        <strong>Quản lý Người dùng</strong>                  
                    </a>     
                    <?php }?>
                    <?php
                        if(in_array('slider', Yii::app()->user->role)){
                     ?>
                    <a class="list-group-item <?php if($this->getId()== 'slider') echo 'active'; ?>" href="<?php echo $this->createAbsoluteUrl('slider/index');?>">
                        <strong>Slider chính</strong>                  
                    </a>     
                    <?php }?>                
                </div>                
          </div>
            <div class="col-md-9"> 

                <?php echo $content; ?>
            </div>
       
<?php }else{?>
<div class="col-md-12">
                <?php echo $content; ?>
</div>
<?php }?>
 </div>
    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Alpha ISC</p>
                </div>
            </div>
        </footer>

    </div>
    <div id="loading-view" class="modal-backdrop">
        <div id="loading-project-container">
            <div class="loading-container" style="margin-top: 271.5px;">
                <div class="loading"></div>
                <div id="loading-text">loading...</div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <!--  <script src="js/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/statics/admin/js/initialization/common.js"></script>
</body>

</html>
