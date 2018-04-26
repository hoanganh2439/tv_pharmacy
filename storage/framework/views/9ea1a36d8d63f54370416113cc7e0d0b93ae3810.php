 

 <?php $__env->startSection('content'); ?>

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">List Product
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        <div class="col-lg-6" style="text-align: left;">
                            <form action="admin/product/search" method="POST">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                                <div class="form-group">
                                    <button type="submit" >Search</button>
                                    <input  name="id" placeholder="Please Input" />
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6" style="text-align: right;">
                           
                                <form action="admin/order/report" method="POST">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                    <div class="form-group">
                                        
                                        <button type="submit" > Product sold a day</button>
                                        <input type="date" name="date" style="height: 27px;"/>
                                    </div>
                                </form>
                        </div>
                    </div>
                              
                    <table class="table table-striped table-bordered table-hover"  >
                        <thead>
                            <tr >
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Total Price</th>
                                <th>Status</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <div ></div>
                            <!--loop to get all product  -->
                            <?php $__currentLoopData = $listOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr  class="odd gradeX" align="left">
                                    <td><a href="admin/order/consider/<?php echo e($l->orderid); ?>"><?php echo e($l->orderid); ?></a></td>
                                    <td>
                                        <?php $cus = DB::table('Customers')->where('cusid',$l->cus_id)->first();?>
                                        <a href="admin/order/consider/<?php echo e($l->orderid); ?>"><?php echo e($cus->fullname); ?></a>
                                    </td>
                                    <td><a href="admin/order/consider/<?php echo e($l->orderid); ?>"><?php echo e($l->totalprice); ?></a></td>
                                
                                      <?php $order = DB::table('orders')->where('orderid',$l->orderid)->first() ?>
                                        <?php if($order->status ==1): ?>
                                            <td style="color:green;"><a href="admin/order/consider/<?php echo e($l->orderid); ?>">Finished</a></td>
                                        <?php else: ?>
                                            <td style="color:red;">Pending</td>
                                        <?php endif; ?>
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
                <div><?php echo e($listOrder->links()); ?></div> 
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>


        <!-- /#page-wrapper -->
<?php $__env->stopSection(); ?>
    <script>
    $(function(){
           $('.datepicker').datepicker({
              format: 'mm-dd-yyyy'
            });
        });
    });
    </script>
   

<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>