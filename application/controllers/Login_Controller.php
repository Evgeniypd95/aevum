<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

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
		$this->load->library(array('form_validation', 'session'));

		

		$this->load->view('templates_notlog/header');
		$this->load->view('templates_notlog/navigation');
		$this->load->view('notlog/login');
		$this->load->view('templates_notlog/footer');
	}

	public function form()
	{
		$this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'session'));

        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|numeric');

        if ($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
        	$data = array(
                'name' => $this->input->post('login'),
                'password' => $this->input->post('password')
                );

            
            $this->db->where($data); $test = $this->db->count_all_results('users');
            if ($test==1) {
                $this->session->set_flashdata('success_msg', 'success');
        	$this->index();
            }
            else {
                $this->session->set_flashdata('success_msg', 'no success');
        	$this->index();
            }
        	
        }
	}
}