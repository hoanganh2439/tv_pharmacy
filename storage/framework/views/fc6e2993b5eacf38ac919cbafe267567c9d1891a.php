<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<base href="<?php echo e(asset('')); ?>">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />

<link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link type="stylesheet" css="<?php echo e(asset('css/style.css')); ?>" />
<link rel="stylesheet" type="text/css" href="thu/style.css?v1" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


</head>
<body>
<div id="main_container">

  <?php echo $__env->make('view.layout.topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
  <?php echo $__env->make('view.layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div id="main_content">
  <?php echo $__env->make('view.layout.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   
    <!-- end of menu tab -->
    
  <?php echo $__env->make('view.layout.left', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- end of left content -->
    <?php echo $__env->yieldContent('content'); ?>

    <!-- end of center content -->
  
    <!-- end of right content -->
 
  </div>
  <?php echo $__env->make('view.layout.right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
  <!-- end of main content -->
  <div class="footer">

    <div class="left_footer">
          CÔNG TY TNHH DƯỢC PHẨM TP PHARMA<br />
          Địa Chỉ:134/1(Gian L19) Tô Hiến Thành - Phường 15 - Quận 10 - TP Hồ Chí Minh<br />
          Điện Thoại: 08 66574242 - 083866234 - 0989.010.678<br/>    
          Fax: 0838667234     |      Email: dptppharma@gmail.com
    </div>
    <div class="center_footer"></div>
    <div class="right_footer"> 
        <a href="customer/showall/product">Home</a>
        <a href="customer/showall/aboutus">About Us</a> 
        <a href="customer/showall/product">Product</a> 
        <a href="customer/showall/medicalknowledge">Kiến Thức Y học</a> 
        <a href="customer/showall/contact">Contact</a> </div>
    </div>
<!-- end of main_container -->
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script type="text/javascript" src="thu/js/boxOver.js"></script>
<script type="text/javascript" src="search.js"></script>
</body>

</html>
