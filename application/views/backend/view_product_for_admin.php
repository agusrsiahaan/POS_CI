<!DOCTYPE html>
<html lang="en">
	<head><title>IF || P.O.S</title></head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
	<?php $this->load->view('layout/top_menu_admin') ?>
	<!-- Tampilkan smeua produk -->
	<div class="row">
	<!-- loooping products -->
	<?php foreach($products as $product) : ?>
  <div class="col-sm-3 col-md-3">
    <div class="thumbnail">
      <?=img([
      	'src'	=> 'uploads/' . $product->image,
      	'style' => 'max-width : 100%; max-height:100%; height:100px'
      ])?>
      <div class="caption">
        <h3 style="min-height:60px;"><?=$product->name?></h3>
        <p><?=$product->description?></p>
        <p>
        <?=anchor('admin/products/update/' . $product->id, 'Edit', [
        	'class' => 'btn btn-primary',
        	'role'  => 'button'
        ])?>
        </p>
      </div>
    </div>
  </div>
<?php endforeach; ?>
  <!-- end loopiing -->

</div>
</body>
</html>