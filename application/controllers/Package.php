<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Package extends CI_Controller
{
    public function index()
    {
        $data["components"]["footer"] = 'components/footer';
        $data["components"]["topnav"] = 'components/top_nav';
        $this->load->view('package_detail', $data);
    }
}
