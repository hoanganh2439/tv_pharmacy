 

 <?php $__env->startSection('content'); ?>

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">List Category
                        </h1>
                    </div>
                    <!-- out message if delete success -->
                    <?php if(session('messages')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('messages')); ?>

                            </div>
                    <?php endif; ?>  
                    <form action="admin/category/search" method="POST">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                            <div class="form-group">
                                <button type="submit" >Search</button>
                                <input  name="id" placeholder="Please Input" />
                            </div>
                            
                    </form>  
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- loop to get all category -->   
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="odd gradeX" align="center">
                                    <td><?php echo e($l -> cateid); ?></td>
                                    <td><?php echo e($l -> catename); ?></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php/admin/category/editcategory/<?php echo e($l ->cateid); ?>">Edit</a></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php/admin/category/deletecategory/<?php echo e($l ->cateid); ?>"> Delete</a></td> 
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                        <?php echo $list ->links(); ?>

                    
                </div>
                <!--  -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>