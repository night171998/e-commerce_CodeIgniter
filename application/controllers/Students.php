<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	public function index()
	{
	// 	$this->load->model("Product");
	// 	$view_data['product_details'] = $this->Product->get_all_products();
	// 	$this->load->view('Product/index', $view_data);
		$this->load->view('Students/register_and_login');
		
	}
	public function profile()
	{
		if($this->session->userdata('is_logged_in') === TRUE)
		{
			$this->load->view('Students/profile');
		}
		else
		{
			redirect('/');
		}
	}
	public function register()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "required|valid_email|is_unique[students.email]");
		$this->form_validation->set_rules("password", "Password", 'required|min_length[8]|matches[confirm_password]');
		if($this->form_validation->run() === FALSE)
		{
		     $errors = validation_errors();
		     $this->session->set_flashdata('errors', $errors);
		     redirect('/');
		}

		$this->load->model("Student");
		$student_first_name =  $this->input->post("first_name");
		$student_last_name = $this->input->post("last_name");
		$student_email = $this->input->post("email");
		$student_password = md5($this->input->post("password"));

		$student_details = array(
			"first_name" => $student_first_name,
			"last_name" => $student_last_name,
			"email" => $student_email,
			"password" => $student_password
		);

		$add_student = $this->Student->add_student($student_details);

		if($add_student === TRUE)	
		{
			echo "Student is added";
		}
		redirect('/');	
	}
	public function login()
	{
		$student_email = $this->input->post("email");
		$password = md5($this->input->post("password"));
		$this->load->model("Student");
		$student = $this->Student->get_student_by_email($student_email);
		if($student && $student['password'] == $password)
		{
			$student = array(
				'student_id' => $student['id'],
				'student_email' => $student['email'],
				'student_first_name' =>$student['first_name'],
				'student_last_name' =>$student['last_name'],
				'student_name' => $student['first_name'] . ' ' . $student['last_name'],
				'is_logged_in' => true
			);
			$this->session->set_userdata($student);
			redirect('/Students/profile');
		}
		else
		{
			$this->session->set_flashdata("login_error", "Invalid Email or Password!");
			redirect('/');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
	// public function show($id)
	// {
	// 	$this->load->model("Product");
	// 	$view_data['product_details'] = $this->Product->get_product_by_id($id);
	// 	$this->load->view("Product/show", $view_data);
	// }
	// public function edit($id)
	// {
	// 	$this->load->model("Product");
	// 	$view_data['product_details'] = $this->Product->get_product_by_id($id);
	// 	$this->load->view("Product/edit", $view_data);
	// }
	// public function update()
	// {
	// 	$this->load->library("form_validation");
	// 	$this->form_validation->set_rules("product_price", "Product Price", "required|numeric");
	// 	$this->load->model("Product");
	// 	$product_id = $this->input->post("product_id");
	// 	$product_name =  $this->input->post("product_name");
	// 	$product_description = $this->input->post("product_description");
	// 	$product_price = $this->input->post("product_price");

	// 	if($this->form_validation->run() === FALSE)
	// 	{
	// 	     $errors = validation_errors();
	// 	     $this->session->set_flashdata('errors', $errors);
	// 	     redirect("Products/edit/$product_id");
	// 	}
		

	// 	$product_details = array(
	// 		"id" => $product_id,
	// 		"name" => $product_name,
	// 		"description" => $product_description,
	// 		"price" => $product_price
	// 	);

	// 	$update_product = $this->Product->update_product($product_details);

	// 	if($update_product === TRUE)	
	// 		{
	// 			echo "Course is added";
	// 		}
	// 	redirect('Products/index');

	// }
	// public function new()
	// {
	// 	$this->load->view('Product/new');
	// }
	// public function create()
	// {
	// 	$this->load->library("form_validation");
	// 	$this->form_validation->set_rules("product_price", "Product Price", "required|numeric");
	
	// 	if($this->form_validation->run() === FALSE)
	// 	{
	// 	     $errors = validation_errors();
	// 	     $this->session->set_flashdata('errors', $errors);
	// 	     redirect('Products/new');
	// 	}
	// 	$this->load->model("Product");

	// 	$product_name =  $this->input->post("product_name");
	// 	$product_description = $this->input->post("product_description");
	// 	$product_price = $this->input->post("product_price");

	// 	$product_details = array(
	// 		"name" => $product_name,
	// 		"description" => $product_description,
	// 		"price" => $product_price
	// 	);

	// 	$add_product = $this->Product->add_product($product_details);

	// 		if($add_product === TRUE)	
	// 		{
	// 			echo "Course is added";
	// 		}
	// 	redirect('Products/index');       
	// }
	// public function destroy($id)
	// {
	// 	$this->load->model("Product");
	// 	$delete_id = $this->Product->delete_product($id);
	// 	$message = "YOU HAVE SUCCESFULLY DELETE A RECORD";
	// 	$this->session->set_flashdata('results', $message);
	// 	redirect('/');
	// }
}
