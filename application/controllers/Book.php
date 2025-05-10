<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book extends CI_Controller
{

    public function summary()
    {
        // $data["components"]["footer"] = 'components/footer';
        // $data["components"]["topnav"] = 'components/top_nav';
        // $this->load->view('package_detail', $data);

        echo "<pre>";
        print_r($_POST);
        exit;
    }
}
