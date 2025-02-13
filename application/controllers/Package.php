<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Package extends CI_Controller
{

    public function index()
    {
        $data["components"]["aside"] = 'components/aside';
        $this->load->view('package_detail', $data);
    }
}
