
<nav class="navbar ">
  <div class="container">
    <ul class="nav navbar-nav">
      <li ><a href="customer/showall/show">Home</a></li>
      <li class="inline"><a href="customer/showall/aboutus">About Us</a></li>
      <li ><a href="customer/showall/product">Product</a></li>
      <li><a href="customer/showall/medicalknowledge">Kiến Thức Y Học</a></li>
      <li><a href="customer/showall/contact">Contact</a></li>
    </ul>
    <form class="navbar-form navbar-left" action="customer/showall/search" method="POST">
       <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
      <div class="form-group">
        <input type="text" class="form-control" name="all" placeholder="Search">
      </div>
      <button type="submit"   class="btn btn-default">Search</button>
    </form>
  </div>
</nav>
