<div class="right_content">
      
      <div class="title_box">Nhà Sản Xuất</div>
      <ul class="left_menu">
        <?php $__currentLoopData = $made; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $made): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="odd"><a href="customer/showall/typemade/<?php echo e($made ->madeid); ?>"><?php echo e($made -> madename); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
      <div class="">
        <div class="product_img">
          <a href="customer/showall/medicalknowledge"><img style="width:197px;height:300px" src="thu/images/yhoc.PNG" alt="" border="0" />
          </a>
        </div>
      </div>
      <div class="">
        <div class="product_img"><a href="customer/showall/medicalknowledge"><img style="width:197px;height:300px" src="thu/images/stress.PNG" alt="" border="0" /></a></div>
      </div>
</div>