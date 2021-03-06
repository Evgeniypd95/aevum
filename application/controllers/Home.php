<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		//how to eliminate foreach?

		$this->db->where('date >= ', date('Y/m/d/h/i', strtotime('monday this week')));
		$this->db->where('date <= ', date('Y/m/d/h/i', strtotime('sunday this week')));
		$sql = $this->db->select_sum('time');
		$sql = $this->db->get('posts');
		$data['timedb'] = $sql->row();

		$sql = $this->db->select_sum('time');
		$sql = $this->db->get('posts');
		$data['timetotal'] = $sql->row();

		$this->db->order_by('id', 'DESC');
		$data['query'] = $this->db->get('posts');
		$this->load->view('templates_home/header');
		$this->load->view('templates_home/navigation');
		$this->load->view('home_page', $data);
		$this->load->view('templates_home/footer');
	}

	public function form()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'session'));

        $this->form_validation->set_rules('activity', 'Activity', 'required');
        $this->form_validation->set_rules('time', 'Time', 'required|numeric');
        $this->form_validation->set_rules('comment', 'Comment', '');

        if ($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
        	$data = array(
        		'activity' => $this->input->post('activity'),
        		'time' => $this->input->post('time'),
        		'comment' => $this->input->post('comment')
						);
			$this->db->insert('posts', $data);
        	$this->session->set_flashdata('success_msg', 'success');
        	$this->index();      
        }
    }


}
