<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Heading Example</title>
    <style type="text/css">
       tr{
         text-align: left;
        }
</style>
</head>

<body>
    <h1 style="text-align:center">List product sold a day of <?php echo e(\Carbon\Carbon::parse($date)->format('d/m/Y')); ?></h1>
    <table border="1" style="text-align:center">
        <tr>
           <th style="width:230px;text-align:center;font-size:20px;">Product Name</th>
           <th style="width:230px;text-align:center;font-size:20px;">Quantity</th>
           <th style="width:235px;text-align:center;font-size:20px;">Total Price</th>
       </tr>
       <?php $__currentLoopData = $order_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aray): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
          <td style="width:200px;text-align:center"><?php echo e($aray->proname); ?></td>
          <td style="width:200px;text-align:center"><?php echo e($aray->quantity); ?></td>
          <td style="width:200px;text-align:center"><?php echo e($aray->totalprice*$aray->quantity); ?>.$</td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </table>
   <h3>Total money of a day: <?php echo e($ordertotal[0]->totalprice); ?>.$</h3>
</body>

</html>