 

 <?php $__env->startSection('content'); ?>

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                   
                    <div class="col-lg-12">
                        <h2 class="page-header" >List Product Sold A Day: <span style="color:green"><?php echo e($date); ?></span></h2>
                        
                    </div>
                    <!-- /.col-lg-12 -->
                    
                    <table class="table table-striped table-bordered table-hover"  >
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div ></div>
                            <!--loop to get all product  -->
                            <?php $__currentLoopData = $order_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aray): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr  class="odd gradeX" align="left">
                                    <td><?php echo e($aray->proname); ?></td>
                                    <td><?php echo e($aray->quantity); ?></td>
                                    <td><?php echo e($aray->totalprice*$aray->quantity); ?>.$</td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                        </tbody>
                        
                        <!-- if delete success ouput messages  -->
                         <?php if(session('messages')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('messages')); ?>

                            </div>
                        <?php endif; ?> 
                    </table>
                    <div><h3 class="page-header">Total Price:    <?php echo e($ordertotal[0]->totalprice); ?>.$</h3></div>
                    <div class="text-left">
                        <button type="submit" class="btn btn-default">
                            <a href="admin/order/pdf/<?php echo e($date); ?>">Download PDF</a>
                        </button>
                            
                    </div>  
                
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php $__env->stopSection(); ?>
   
   

<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>