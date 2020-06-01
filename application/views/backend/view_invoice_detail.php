<!doctype html>
<html>
<head>
<title>IF || P.O.S</title>
<!--Load JQuery, Boostrap, dan DataTables dari CDN -->
<!-- Buka URL ini : http://pastebin.com/index/WeaY5FrA -->
<!-- Load JQUERY dari CDN -->
	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

	<!-- Load DataTables dan Bootsrap dari CDN -->
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">
	
	 <?php $this->load->view('backend/admin_menu')?>
</head>
<body>
	<!-- dalam div row harus ada kolom yang maksimum nilainya 12 -->
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			
			<h3>Items ordered in Transaction #<?=$invoice->id ?></h3>
				<table id ="myTable" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Subtotal</th>
			</tr>	
		</thead>
		<tbody>
			<?php 
				$total = 0;
				foreach ($orders as $order) : 
				$subtotal = $order->qty * $order->price;
				$total += $subtotal;
			?>
			<tr>
				<td><?=$order->product_id ?></td>
				<td><?=$order->product_name ?></td>
				<td><?=$order->qty ?></td>
				<td><?= number_format($order->price),'.' ?></td>
				<td><?= number_format($subtotal),'.' ?></td>
				<!--<td align="right"><?= number_format($items['subtotal'],0,',','.') ?></td>-->
			</tr>
			<?php endforeach; ?>
		</tbody>
			<tfoot>
				<tr>
					<td colspan="4" align="right"><b>Total</b></td>
					<td bgcolor="#FFFF99"><b><?= number_format($total),'.' ?></b></td>
				</tr>
			</tfoot>
	</table>
		</div>
		<div class="col-md-1"></div>
	</div>
	
	<script>
		$(document).ready(function(){
    	$('#myTable').DataTable();
		});
	</script>
</body>
</html>