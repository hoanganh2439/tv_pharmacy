 

 <?php $__env->startSection('content'); ?>

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Category
                             <!-- show name of Catogory need edit -->
                            <small><?php echo e($cate -> catname); ?></small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="index.php/admin/category/editcategory/<?php echo e($cate->cateid); ?>" method="POST">
                        <!-- output error if have error >0 -->
                        <?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                             <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <!-- ouput error -->
                                <?php echo e($err); ?><br>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                        </div>
                        <?php endif; ?>
                         <!-- ouput message if edit success -->
                        <?php if(session('messages')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('messages')); ?>

                            </div>
                        <?php endif; ?>
                             <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>    
                            <div class="form-group">
                                <label>Category name</label>
                                <input class="form-control" name="catename" value="<?php echo e($cate->catename); ?>" placeholder="Please Enter Category Name" />
                            </div>
                            <button type="submit" class="btn btn-default">Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>