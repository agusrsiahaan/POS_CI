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
	<!--<style>
		.row div{ border: #000 0px solid}
	</style> -->
</head>
<body>
	<!-- dalam div row harus ada kolom yang maksimum nilainya 12 -->
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<h1>Add New Product</h1>
			<div><?= validation_errors() ?></div>
			<?= form_open_multipart('admin/products/create/', ['class'=>'form-horizontal']) ?>
				
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" placeholder="Product Name" value="<?= set_value('name') ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="description"><?=set_value('description')?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Price</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="price" placeholder="Price" value="<?=set_value('price')?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Available Stock</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="stock" placeholder="Stock" value="<?=set_value('stock')?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Product Image</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="userfile" >
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Save</button>
      <?=anchor('admin/products/','Cancel',['class'=>'btn btn-danger']) ?>
    </div>
  </div>

			<?= form_close() ?> 	
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