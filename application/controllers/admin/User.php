<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $this->db->select('*');
        $this->db->where('role !=', 'admin');
        $this->db->from('user');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data["users"] = $query->result_array();
        } else {
            $data["users"] = [];
        }

        $data["components"]["aside"] = 'components/admin_aside';
        $data["components"]["footer"] = 'components/admin_footer';
        $this->load->view('admin/user_list', $data);
    }

    public function delete()
    {
        try {
            $this->db->where('username', $this->input->post("username"));
            $this->db->delete('user');
            $error = $this->db->error();
            if ($error['code'] !== 0) {
                throw new Exception(html_escape($error['message']));
            }

            echo json_encode(['success' => "ลบผู้ใช้สำเร็จ"]);
            return;
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
            return;
        }
    }

    public function update()
    {
        $data = array(
            'fname'    => $this->input->post('fname'),
            'lname'    => $this->input->post('lname'),
            'tel'      => $this->input->post('tel')
        );

        $this->db->where('username', $this->input->post('username'));
        if ($this->db->update('user', $data)) {
            $this->session->set_flashdata('success', 'อัปเดตข้อมูลสำเร็จ!');
        } else {
            $this->session->set_flashdata('error', 'เกิดข้อผิดพลาดในการอัปเดตข้อมูล');
        }
        redirect('admin/user/list');
    }
}
