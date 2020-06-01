<!-- silakan desain dengan menggunakan CSS -->
<style type="text/css">
#table{
	width:800px;
	border:5px solid #666;
}
</style>
<table style='border-bottom: 1px solid #999999; padding-bottom: 10px; width: 203mm;'>
					<tr valign='top'>
						<td style='width: 203mm;' valign='middle'>
<div style='font-weight: bold; padding-bottom: 5px; font-size: 12pt;'>
								Struk Belanja
							</div>
<span style='font-size: 15pt;'>Toko IF|| P.O.S</span>
</td>
</tr>
</table>
<table id="table" border="1">
<?php
ob_start();
$now = date('Y-m-d');
foreach($data->result() as $row) 
{
	?>
	<thead align="center">
					<tr>
						<th>Id Transaksi</th>
						<th>Product ID</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Price</th>
					</tr>
	</thead>
	
	<?php	
	echo '<tr>
			<td>'.$row->invoice_id."</td>
			<td>".$row->product_id."</td>
			<td>".$row->product_name."</td>
			<td>".$row->qty."</td>
			<td>".$row->price."</td>
		 </tr>";	
}
?>
</table>