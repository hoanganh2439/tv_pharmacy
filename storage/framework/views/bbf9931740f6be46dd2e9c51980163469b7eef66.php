<?php $__env->startSection('content'); ?>
<div class="center_title_bar">Danh Sách Sản Phẩm</div>
	<div class="center_content" id="result1"  >
      
      
       <?php $__currentLoopData = $pro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   
	      <div class="prod_box" id="result2"  >
	        <div class="top_prod_box"></div>
           <div class="center_prod_box"  >
	          <div class="product_title"  >
              <p>
                <a href="customer/showall/detailproduct/<?php echo e($pr->proid); ?>"><?php echo e($pr -> proname); ?></a>
              </p>
            </div>
           
	          <div class="product_img" >
	          	<a href="customer/showall/detailproduct/<?php echo e($pr->proid); ?>">
	              <?php $imge = DB::table('images')->where('pro_id',$pr['proid'])->first(); ?>
	              <img style="width:100px;height:70px" src="admin_asset/upload/images/san-pham/<?php echo e($imge->img_name); ?>"/>
	            </a>
	          </div>
           </div>
	        <div class="bottom_prod_box"></div>
	        <div class="prod_details_tab"> 
            <a href="#" title="header=[Add to cart] body=[&nbsp;] fade=[on]">
              <img src="thu/images/cart.gif" alt="" border="0" class="left_bt" />
            </a> 
            <a href="#" title="header=[Specials] body=[&nbsp;] fade=[on]">
              <img src="thu/images/favs.gif" alt="" border="0" class="left_bt" />
            </a> 
            <a href="#" title="header=[Gifts] body=[&nbsp;] fade=[on]">
              <img src="thu/images/favorites.gif" alt="" border="0" class="left_bt" />
            </a> 
            <a href="customer/showall/detailproduct/<?php echo e($pr->proid); ?>" class="prod_details">details</a> 
          </div>
	      </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
     
      <div class="center_title_bar1"><?php echo $pro ->links(); ?></div>
      <div id="appendToThis"></div>


  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('view.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>