 <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Area - Hoang Anh</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                            <li><a href="admin/adminprofile"><i class="fa fa-user fa-fw"><?php echo e(Auth::user()->username); ?></i></a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="index.php/admin/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <?php echo $__env->make('admin.layout.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- /.navbar-static-side -->
        </nav>
