<?php 
	$user_id = $this->session->userdata('user_id');
	$total_price = 0;
	$cart_count = count($product_details);
	$this->session->set_userdata('count', $cart_count);
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="assets/cart.css">
	</head>
	<body>
		<h1>Check Out</h1>
		<table class="items">
			<tr>
				<th>Qty</th>
				<th>Description</th>
				<th>Price</th>
			</tr>
<?php 		foreach($product_details as $product_detail)
			{
?>
			<tr>
				<td><?= $product_detail['quantity']?></td>
				<td><?= $product_detail['description']?></td>
				<td><?= $product_detail['unit_price']?></td>
				<td><a href="/Products/remove/<?=$product_detail['product_id']?>"> Delete </a>
				</td>
			</tr>
<?php 		
			$total_price += $product_detail['unit_price'];
			}	
?>

		</table>
		<table>
			<tr>
				<th></th>
				<th>Total</th>
				<th>$<?=$total_price?></th>
			</tr>
		</table>
		<h2>Billing Info</h2>
		<form action="/Products/order" method="post">
			<input type="hidden" name="user_id" value="<?= $user_id ?>">
			<label> Name: </label>
			<input type="text" name="name">
			<label> Address: </label>
			<input type="text" name="address">
			<label> Card #: </label>
			<input type="text" name="card_number">
			<input type="submit" value="Order">
		</form>
	</body>
</html>