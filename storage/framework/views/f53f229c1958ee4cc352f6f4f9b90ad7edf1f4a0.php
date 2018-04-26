 

 <?php $__env->startSection('content'); ?>
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add Payment Cart
                        </h1>
                    </div>
                    <!-- -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <!-- count error -->
                        <?php if(count($errors) > 0): ?>
                         <!-- if count > 0 System find all error -->
                            <div class="alert alert-danger">
                                 <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <!-- output message -->
                                    <?php echo e($err); ?><br>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                            </div>
                        <?php endif; ?>
                         <!-- if add success. System will ouput message -->
                        <?php if(session('messages')): ?>
                            <div class="alert alert-success">
                                 <!-- output message -->
                                <?php echo e(session('messages')); ?>

                            </div>
                        <?php endif; ?>
                        
                         <!-- Form use to input information of Category -->
                        <form action="admin/payment/addpayment" method="POST">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                            <div class="form-group">
                                <label>Code_pay</label>
                                <input class="form-control" name="codepay" />
                            </div>
                            <div class="form-group">
                                <label>Fullname</label>
                                <input class="form-control" name="fullname"/>
                            </div>
                            <div class="form-group">
                                <label>Limit Date</label>
                                <input class="form-control" type="date" name="limitdate" />
                            </div>
                            <div class="form-group">
                                <label>CVC</label>
                                <input class="form-control" name="cvc" />
                            </div>
                            <div class="form-group">
                                <label>Total Money</label>
                                <input class="form-control" name="total"/>
                            </div>
                            <button type="submit" class="btn btn-default">Add Cart</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>