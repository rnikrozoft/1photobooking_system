<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Workday extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('admin');
        }
    }
	
	public function index()
	{
		$data["styles"] = [
			'assets/plugins/fullcalendar/main.css'
		];
		$data["scripts"] = [
			'assets/plugins/moment/moment.min.js',
			'assets/plugins/fullcalendar/main.js'
		];
		$data["components"]["aside"] = 'components/admin_aside';
		$data["components"]["footer"] = 'components/admin_footer';
		$this->load->view('admin/workday', $data);
	}
}
