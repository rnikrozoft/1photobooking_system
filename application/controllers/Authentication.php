<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication extends CI_Controller
{
    public function login()
    {
        try {
            $username = $this->input->post("username");
            $password = $this->input->post("password");

            $query = $this->db->get_where('user', ['username' => $username]);
            $user = $query->row_array();

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $this->session->set_userdata('logged_in', $user);
                } else {
                    $this->session->set_flashdata('error', 'รหัสผ่านไม่ถูกต้อง');
                }
            } else {
                $this->session->set_flashdata('error', 'ไม่พบผู้ใช้นี้');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'เกิดข้อผิดพลาด: ' . $e->getMessage());
        }
        redirect('home');
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        redirect('home');
    }

    public function admin_login()
    {
        try {
            $username = $this->input->post("username");
            $password = $this->input->post("password");

            $query = $this->db->get_where('user', ['username' => $username]);
            $user = $query->row_array();

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $this->session->set_userdata('logged_in', $user);
                    redirect('admin/book/list');
                } else {
                    $this->session->set_flashdata('error', 'รหัสผ่านไม่ถูกต้อง');
                }
            } else {
                $this->session->set_flashdata('error', 'ไม่พบผู้ใช้นี้');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'เกิดข้อผิดพลาด: ' . $e->getMessage());
        }
        redirect('admin');
    }

    public function admin_logout()
    {
        $this->session->unset_userdata('logged_in');
        redirect('admin');
    }
}
