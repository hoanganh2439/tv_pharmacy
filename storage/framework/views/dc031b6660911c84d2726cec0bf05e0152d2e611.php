 

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
                    <form action="admin/product/search" method="POST">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                            <div class="form-group">
                                <button type="submit" >Search</button>
                                <input  name="id" placeholder="Please Input" />
                            </div>
                    </form>   
                    <table class="table table-striped table-bordered table-hover"  >
                        <thead>
                            <tr >
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Category Name</th>
                                <th>Images</th>
                                <th>Status</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div ></div>
                            <!--loop to get all product  -->
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr  class="odd gradeX" align="left">
                                    <td><?php echo e($l->proname); ?></td>
                                    <td><?php echo e($l->price); ?></td>
                                    <td>
                                        <?php $cate = DB::table('categories')->where('cateid',$l['cate_id'])->first(); ?>
                                        <?php echo $cate->catename; ?>

                                    </td>
                                    <td>
                                        <?php $imge = DB::table('images')->where('pro_id',$l['proid'])->first(); ?>
                                        <img width="50px" src="admin_asset/upload/images/san-pham/<?php echo e($imge->img_name); ?>"/>
                                    </td>
                                    <td>
                                        <?php if($l->status == 1): ?>
                                            On
                                        <?php elseif($l->status ==0): ?>
                                            Off
                                        <?php endif; ?>
                                       
                                    </td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/deleteproduct/<?php echo e($l->proid); ?>"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/editproduct/<?php echo e($l->proid); ?>">Edit</a></td>
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
                    <?php echo $list -> links(); ?>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>