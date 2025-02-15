<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book extends CI_Controller
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
        $data["components"]["aside"] = 'components/admin_aside';
        $data["components"]["footer"] = 'components/admin_footer';
        $this->load->view('admin/book_list', $data);
    }
}
