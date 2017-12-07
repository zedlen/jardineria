<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->view('welcome_message');
	}

	public function addProduct()
	{
		$this->load->view('addProduct');
	}

	public function addP()
	{
		$params=$this->input->post();
		echo json_encode($this->db->insert("producto",$params));
	}
	public function editProduct()
	{
		$this->load->view('editProduct');
	}
	public function editP()
	{
		$params=$this->input->post();
		$this->db->where('Id_producto',$params["Id_producto"]);
		unset($params["Id_producto"]);
		echo json_encode($this->db->update("producto",$params));
	}
}
