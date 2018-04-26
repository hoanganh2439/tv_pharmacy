<?php $__env->startSection('content'); ?>    

    <div class="center_content">
        <div id="infotitle">Công Ty TNHH Dược Phẩm TP Pharma</div>
        <div class="contact_address" style="margin-top:10px;margin-bottom:10px;margin-left:0px;">
            <!--open contact_address div -->
            <address>
              <span class="marker">
                <img src="thu/images/con_address.png" alt="Địa chỉ: "  />
              </span>Địa Chỉ:134/1(Gian L19) Tô Hiến Thành - Phường 15 - Quận 10 - TP Hồ Chí Minh<br />
              <span class="marker">
                <img src="/images/M_images/con_tel.png" alt="Điện thoại: "  />
              </span>08 66574242 - 083866234 - 0989.010.678<br />
              <span class="marker">
                <img src="/images/M_images/con_fax.png" alt=" Fax: "  />
              </span>0838667234 | Email: dptppharma@gmail.com<br />
              <span class="marker">
                <img src="/images/M_images/con_fax.png" alt=" Email: "  />
              </span> dptppharma@gmail.com<br />
            </address>
        </div>
          <div class="prod_box_big"  style="text-align:center">
            <div class="top_prod_box_big"></div>
            <div class="center_prod_box_big">
              <?php if(count($errors) > 0): ?>
               <!-- if count > 0 System find all error -->
                <div class="alert alert-danger">
                   <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- output message -->
                      <?php echo e($err); ?><br>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                </div>
              <?php endif; ?>
              <?php if(session('messages')): ?>
                <div class="alert alert-success">
                     <!-- output message -->
                    <?php echo e(session('messages')); ?>

                </div>
              <?php endif; ?>
                                  
              <form action="khachhang/xem/lienhe" method="post">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                <div class="contact_form">
                  <div class="form_row" >
                    <label class="contact"><strong >Tên Bạn:</strong>
                      <input type="text" name="name" class="form-control" />
                    </label>
                  </div>
                  <div class="form_row">
                    <label class="contact"><strong >Địa Chỉ Email:</strong>
                      <input type="email" name="email" class="form-control" />
                    </label>
                  </div>
                  <div class="form_row">
                    <label class="contact"><strong >Số Điện Thoại:</strong>
                      <input type="text" name="phone" class="form-control" />
                    </label>
                  </div>
                  <div class="form_row">
                    <label class="contact"><strong >Nội Dung Thông Điệp:</strong>
                         <textarea name="noidung" class="form-control" ></textarea>
                    </label>
                  </div>
                  <div class="form_row"> <button  type="submit" class="btn btn-primary">Gửi</button> </div>
                </div>
              </form>
            </div>

            <div class="bottom_prod_box_big"></div>
          </div>
          
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('view.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>