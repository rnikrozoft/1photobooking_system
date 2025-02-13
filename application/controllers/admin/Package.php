<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Package extends CI_Controller
{
    public function index()
    {
        $data["components"]["aside"] = 'components/admin_aside';
        $data["components"]["footer"] = 'components/admin_footer';
        $this->load->view('admin/package_list', $data);
    }

    // add layout
    public function add()
    {
        $data["components"]["aside"] = 'components/admin_aside';
        $data["components"]["footer"] = 'components/admin_footer';
        $this->load->view('admin/package_add', $data);
    }

    public function insert()
    {
        // echo "<pre>";
        // print_r($_REQUEST);
        // echo "</pre>";

        $data["styles"] = [
            'assets/plugins/dropzone/min/dropzone.min.css',
        ];
        $data['scripts'] = [
            'assets/plugins/dropzone/min/dropzone.min.js',
        ];
        $data["components"]["aside"] = 'components/admin_aside';
        $data["components"]["footer"] = 'components/admin_footer';
        $this->load->view('admin/package_add_image', $data);
    }
}
