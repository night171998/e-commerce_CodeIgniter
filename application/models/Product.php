<?php
	class Product extends CI_Model 
	{

		function get_all_products()
		{
			return $this->db->query("SELECT * FROM products ORDER BY id DESC")->result_array();
		}
		function get_all_cart()
		{
			return $this->db->query("SELECT orders.product_id, orders.quantity, products.description, orders.unit_price  FROM orders LEFT JOIN products ON products.id = orders.product_id")->result_array();
		}
		function get_product_by_id($id)
		{
			return $this->db->query("SELECT * FROM products WHERE id = ?", array($id))->row_array();
		}
		function get_user_by_id($id)
		{
			return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
		}
		function add_cart($cart)
		{
			$query = "INSERT INTO orders (user_id, product_id, quantity , unit_price) 
					  VALUES (?, ?, ?, ?)";
			$values = array($cart['user_id'], $cart['product_id'], $cart['quantity'], $cart['unit_price']);
			return $this->db->query($query, $values);
		}
		function delete_product($id)
		{
			$this->db->delete('orders', array('product_id' => $id));
		}
		function update_order($user)
		{
			$updated_data = array(
				'name' => $user['name'],
				'address' => $user['address'],
				'card' => $user['user_card_number']
			);
			$this->db->where('user_id', $user['id']);
			$this->db->update('orders', $updated_data);
		}
	}
 ?>