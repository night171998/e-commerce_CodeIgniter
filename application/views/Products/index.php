<?php 
	$user_id = $this->session->userdata('user_id');
	$count = $this->session->userdata('count');
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="/assets/index.css">
	</head>
	<body>
		<h1>Products</h1>
		<a href="/Products/cart">Your Cart <?= $count ?></a>
		<table>
			<tr>
				<th>Description</th>
				<th>Price</th>
				<th>Qty</th>
			</tr>
<?php 		foreach($product_details as $product_detail)
			{
?>
			<tr>
				<td><?= $product_detail['description'] ?></td>
				<td>$<?= $product_detail['price'] ?></td>
				<form action="Products/buy" method="post">
					<input type="hidden" name="product_id" value="<?= $product_detail['id'] ?>">
					<input type="hidden" name="user_id" value="<?= $user_id ?>">
					<td><input type="number" name="quantity" value="0" min="0"></td>
					<td><input type="submit" value="Buy"></td>
				</form>
			</tr>
<?php 		}
?>
		</table>
	</body>
</html>