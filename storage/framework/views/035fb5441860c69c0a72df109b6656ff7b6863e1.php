 

 <?php $__env->startSection('content'); ?>

 <!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        
            <div class="row">
                <form action="admin/order/consider/<?php echo e($order->orderid); ?>" method="POST">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                <div class="col-lg-5">

                    <h1 class="page-header">Customer Information
                    </h1>
                    
                        <div class="form-group">
                            <label>User Name</label>
                            <?php $cus = DB::table('Customers')->where('cusid',$order->cus_id)->first();?>
                            <input class="form-control" value="<?php echo e($cus->fullname); ?>"  readonly />
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" value="<?php echo e($cus->email); ?>" readonly />
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" value="<?php echo e($cus->address); ?>" readonly />
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input class="form-control" value="<?php echo e($cus->phonenumber); ?>" readonly/>
                        </div>  
                        <?php if(session('messages')): ?>
                        <div class="alert alert-success">
                            <!-- output message -->
                            <?php echo e(session('messages')); ?>

                        </div>
                        <?php endif; ?>  
                </div>
                <div class="col-sm-7">
                    <div class="your-order">
                        <h1 class="page-header">Product</h1>
                        <div style="width:5 00px;height:350px;overflow:auto;">
                            <div class="your-order-body" style="padding: 0px 10px">
                                <div class="your-order-item">
                                    <div>
                                        <!--  one item   -->
                                        <?php $__currentLoopData = $orderdetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $de): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="media">
                                            <?php $imge = DB::table('images')->where('pro_id',$de->pro_id)->first(); ?>
                                            <img width="25%" src="admin_asset/upload/images/san-pham/<?php echo e($imge->img_name); ?>" class="pull-left"><br/>
                                            <div class="media-body">
                                                <p class="font-large">
                                                    <?php $pro = DB::table('products')->where('proid',$de->pro_id)->first() ?>
                                                    Product Name: <?php echo e($pro->proname); ?><br/>
                                                </p>
                                                <span class="color-gray your-order-info">
                                                    <?php $cate = DB::table('categories')->where('cateid',$pro->cate_id)->first() ?>
                                                    Category Name: <?php echo e($cate->catename); ?></span><br/>
                                                    <span class="color-gray your-order-info">
                                                        <?php $made = DB::table('mades')->where('madeid',$pro->made_id)->first() ?>
                                                        Made: <?php echo e($made->madename); ?><br/>
                                                    </span>
                                                    <span class="color-gray your-order-info">
                                                        Quantity: <?php echo e($de->quantity); ?><br/>
                                                    </span>
                                                    <span class="color-gray your-order-info">
                                                        Unit Price: <?php echo e($de->unit_price); ?>

                                                    </span>
                                                </div>
                                            </div>
                                            <h1 class="page-header"></h1>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <!-- end one item -->
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18"><h3>Total Price: <?php echo e($order->totalprice); ?></h3></p></div>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="text-center">
                                <?php if($order->status == 1): ?>
                                    <button type="submit" class="btn btn-success">Print</button>
                                <?php elseif($order->status ==0): ?>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    <button type="submit" class="btn btn-success">Accept</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <!-- /.row -->
            </div>
        
        <!-- /.container-fluid -->
    </div>
</div>
    <!-- /#page-wrapper -->
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>