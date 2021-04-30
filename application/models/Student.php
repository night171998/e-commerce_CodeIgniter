<?php
	class Student extends CI_Model 
	{

		// function get_all_products()
		// {
		// 	return $this->db->query("SELECT * FROM products ORDER BY id DESC")->result_array();
		// }
		function get_student_by_email($email)
		{
			return $this->db->query("SELECT * FROM students WHERE email = ?", array($email))->row_array();
		}
		function add_student($student)
		{
			$query = "INSERT INTO students (first_name, last_name, email, password, created_at) 
					  VALUES (?, ?, ?, ?, ?)";
			$values = array($student['first_name'], $student['last_name'], $student['email'], $student['password'], date("Y-m-d, H:i:s"));
			return $this->db->query($query, $values);
		}
		// function delete_product($id)
		// {
		// 	$this->db->delete('products', array('id' => $id));
		// }
		// function update_product($product)
		// {
		// 	$updated_data = array(
		// 		'name' => $product['name'],
		// 		'description' => $product['description'],
		// 		'price' => $product['price'],
		// 		'updated_at' => "NOW()"
		// 	);
		// 	$this->db->where('id', $product['id']);
		// 	$this->db->update('products', $updated_data);

		// }
	}
 ?>