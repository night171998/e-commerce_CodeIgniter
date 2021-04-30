<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model("Product");
		$view_data['product_details'] = $this->Product->get_all_products();
		$user_id = $this->Product->get_user_by_id(1);
		$this->session->set_userdata('user_id', $user_id['id']);
		$this->load->view('Products/index', $view_data);

	}
	public function buy()
	{
		$this->load->model("Product");
		$product_quantity =  $this->input->post("quantity");
		$product_id = $this->input->post("product_id");
		$user_id = $this->input->post("user_id");
		$product_data = $this->Product->get_product_by_id($product_id);
		$product_price = $product_data['price'];
		$unit_price = $product_quantity * $product_price;

		$cart_details = array(
			"user_id" => $user_id,
			"product_id" => $product_id,
			"quantity" => $product_quantity,
			"unit_price" => $unit_price
		);
		$add_cart = $this->Product->add_cart($cart_details);
		redirect("products/cart");
	
		
	}
	public function cart()
	{
		$this->load->model("Product");
		$view_data['product_details'] = $this->Product->get_all_cart();
		$this->load->view("Products/cart", $view_data);
	}
	public function remove($product_id)
	{
		$this->load->model("Product");
		$this->Product->delete_product($product_id);
		// $message = "YOU HAVE SUCCESFULLY DELETE A RECORD";
		// $this->session->set_flashdata('results', $message);
		redirect('Products/cart');
		
	}
	public function order()
	{
		$this->load->model("Product");
		$user_id = $this->input->post("user_id");
		$user_name =  $this->input->post("name");
		$user_address = $this->input->post("address");
		$user_card_number = $this->input->post("card_number");

		$user_details = array(
			"id" => $user_id,
			"name" => $user_name,
			"address" => $user_address,
			"user_card_number" => $user_card_number
		);
		

		$update_orders = $this->Product->update_order($user_details);
		redirect('/');
		
	}
	
}