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
	
</head>
<body>
	<?php $this->load->view('layout/top_menu') ?>
	<!-- dalam div row harus ada kolom yang maksimum nilainya 12 -->
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<h1>Transaction Table</h1>
			<h2>
			<?=anchor(	'Pdf_controller/cetak/',
								'Print All Transaction',
								['class'=>'btn btn-danger btn-sm'])
					?>
				</h2>
				<table id ="myTable" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>ID Transaction</th>
				<th>Date and Time</th>
				<!--<th>Due Date</th>-->
				<!--<th>Status</th>-->
				<th>Actions</th>
			</tr>	
		</thead>
		<tbody>
			<?php foreach ($invoices as $invoice) : ?>
			<tr>
				<td><?=$invoice->id ?></td>
				<td><?=$invoice->date ?></td>
				<!--<td><?=$invoice->due_date ?></td> -->
				<!--<td><?=$invoice->status ?></td> -->
				<td>
					<?=anchor(	'transaction_kasir/detail/' .$invoice->id,
								'Details',
								['class'=>'btn btn-info btn-sm'])
					?>
					<?=anchor(	'Pdf_controller/index/' .$invoice->id,
								'Print PDF',
								['class'=>'btn btn-danger btn-sm'])
					?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
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