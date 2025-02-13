<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data["components"]["aside"] = 'components/admin_aside';
        $data["components"]["footer"] = 'components/admin_footer';
        $this->load->view('admin/user_list', $data);
    }
}
