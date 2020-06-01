<!DOCTYPE html>
<html lang="en">
	<head><title>IF || P.O.S</title></head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
	<?php $this->load->view('layout/top_menu') ?>
	
  <table class="table table-bordered table-striped table=hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Product</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Subtotal</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $i=0;
        foreach ($this->cart->contents() as $items): 
        $i++;
    ?>
    <tr>
      <td><?= $i ?></td>
      <td><?= $items['name'] ?></td>
      <td><?= $items['qty'] ?></td>
      <td align="right"><?= number_format($items['price'],0,',','.') ?></td>
      <td align="right"><?= number_format($items['subtotal'],0,',','.') ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
    <tfoot>
      <tr>
          <td align="right" colspan="4"><b>Total</b></td>
          <td align="right" bgcolor="#FFFF66"><b><?= number_format($this->cart->total(),0,',','.'); ?></b></td>
      </tr>
    </tfoot>
  </table>
  <div align="center">
      <?=anchor('welcome/clear_cart','Clear Transaction',['class'=>'btn btn-danger']) ?>
      <?=anchor(base_url(),'Add Another',['class'=>'btn btn-primary']) ?>
      <?=anchor('order','Save Transaction',['class'=>'btn btn-success','onclick'=>'return confirm(\'Are You Sure Want to Save This Transaction ?\')']) ?>
  </div>
</body>
</html>