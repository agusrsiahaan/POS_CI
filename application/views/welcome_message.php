<!DOCTYPE html>
<html lang="en">
	<head><title>IF || P.O.S</title>
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

  <!-- Load DataTables dan Bootsrap dari CDN -->
  <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
  
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">

  </head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body>
	<?php $this->load->view('layout/top_menu') ?>
	<!-- Tampilkan smeua produk -->
	<div class="row">
	<div class="col-md-1"></div>
    <div class="col-md-10">
      <h1>Products Table</h1>
        <table id ="myTable" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Products Name</th>
        <th>Product Image</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Add To Transaction</th>
      </tr> 
    </thead>
    <tbody>
      <?php foreach ($products as $product) : ?>
      <tr>
        <td><?=$product->id?></td>
        <td><?=$product->name?></td>
        <td><?php 
            $product_image = [  'src'  => 'uploads/' . $product->image,
                      'height'=>'100'];
            echo img($product_image)
        ?></td>
        <td><?=$product->price?></td> 
        <td><?=$product->stock?></td>
        <td>
          <?=anchor('welcome/add_to_cart/' . $product->id, ' Add ', [
          'class' => 'btn btn-primary',
          'role'  => 'button'
        ])?>
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