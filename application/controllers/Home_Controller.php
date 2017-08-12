<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Controller extends CI_Controller {

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
		if (isset($_SESSION['id'])==FALSE) {
			header("Location: http://127.0.0.1:4567/");
			die();
		}
		
		$userid = $_SESSION['id'];

		$this->db->where('userid', $userid);
		$this->db->where('date >= ', date('Y/m/d/h/i', strtotime('monday this week')));
		$this->db->where('date <= ', date('Y/m/d/h/i', strtotime('sunday this week')));
		$sql = $this->db->select_sum('time');
		$sql = $this->db->get('posts');
		$data['timedb'] = $sql->row();

		$this->db->where('userid', $userid);
		$sql = $this->db->select('start');
		$sql = $this->db->get('timer');
		$data['timer'] = $sql->row();

		$this->db->where('userid', $userid);
		$sql = $this->db->select_sum('time');
		$sql = $this->db->get('posts');
		$data['timetotal'] = $sql->row();

		$this->db->where('userid', $userid);
		$this->db->order_by('id', 'DESC');
		$data['query'] = $this->db->get('posts');
		$this->load->view('templates_user_account/header');
		$this->load->view('templates_user_account/navigation');
		$this->load->view('user_account/home_page', $data);
		$this->load->view('templates_user_account/footer');
	}

	public function form()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'session'));

        $this->form_validation->set_rules('activity', 'Activity', '');
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
        		'comment' => $this->input->post('comment'),
        		'userid' => $this->session->userdata('id')
						);
			$this->db->insert('posts', $data);
        	$this->session->set_flashdata('success_msg', 'success');
        	$this->index();      
        }
    }

    public function logout()
    {
    	$this->session->sess_destroy();
    	header("Location: http://127.0.0.1:4567/login_controller");
    }

    public function strtcountdown() {
    	$data = array(
    		'start' => date('Y/m/d/h:i:s'),
    		'userid' => $this->session->userdata('id')
    		);
    	$this->db->insert('timer', $data);
    	header("Location: http://127.0.0.1:4567/");
    }


}
