 

 <?php $__env->startSection('content'); ?>

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Delete Product
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <!--count error. if error >0  -->
                        <?php if(count($errors) > 0): ?>
                            <div class="alert alert-danger">
                                <!-- System will get all error -->
                                 <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <!-- ouput error -->
                                    <?php echo e($err); ?><br>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                            </div>
                        <?php endif; ?>
                        <!-- get message -->
                        <?php if(session('messages')): ?>
                            <div class="alert alert-success">
                                <!-- output message -->
                                <?php echo e(session('messages')); ?>

                            </div>
                        <?php endif; ?>
                        <!-- form use to edit Product  -->
                        <form action="admin/product/deleteproduct/<?php echo e($pro->proid); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="proname" value="<?php echo e($pro->proname); ?>" placeholder="Please Enter name Product" />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="price" value="<?php echo e($pro->price); ?>" placeholder="Please Enter price " />
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                
                                <textarea class="form-control"  name="description" rows="3"><?php echo e($pro->description); ?></textarea>
                            </div>
                           <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control" name="category">
                                    <!-- loop use to display catid of product id -->
                                    <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option 
                                            <?php if($pro->cate_id == $ca->cateid): ?>
                                                 <?php echo e("selected"); ?>

                                            <?php endif; ?>
                                         value="<?php echo e($ca->cateid); ?>"><?php echo e($ca->catename); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hãng Sản xuất</label>
                                <select class="form-control" name="made">
                                    <!-- loop to get all id of category -->
                                    <?php $__currentLoopData = $made; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $made): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option 
                                            <?php if($pro->made_id == $made->madeid): ?>
                                                 <?php echo e("selected"); ?>

                                            <?php endif; ?>
                                         value="<?php echo e($made->madeid); ?>"><?php echo e($made->madename); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Quanlity</label>
                                <input class="form-control" value="<?php echo e($pro->quanlity); ?>" name="quanlity" placeholder="Please Enter quanlity" />
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <label>OLD IMAGES
                                	<?php $imge = DB::table('images')->where('pro_id',$pro['proid'])->first(); ?>
                                	<img width="50px" src="public/admin_asset/upload/images/san-pham/<?php echo e($imge->img_name); ?>"/>
                                </label>
                                <input type="file" id="images" name="images">
                            </div>
                            <div class="form-group">
                                <label>Admin Import</label>
                                <input class="form-control" readonly="true" name="idadmin" value="<?php echo e(Auth::user()->userid); ?>" />
                            </div>
                            <button type="submit" class="btn btn-default"> Delete</button>
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