 

 <?php $__env->startSection('content'); ?>
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <h1 class="page-header">Report Product
                        </h1>
                        <h4 >Please chose date to view</h4>
                        <form action="admin/order/report" method="POST">
                        	<div class="form-group">
	                        	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
		                        <input class="form-control" type="date" name="date" />
	                        </div>
	                        <button type="submit" class="btn btn-success">View</button>
                        <form>
                    </div>
                    
                    <!-- -->
                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>