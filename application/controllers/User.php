<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function register()
    {
        try {
            if ($this->input->post()) {
                $now = date('Y-m-d H:i:s');
                $data = [
                    'username' => $this->input->post("username"),
                    'password' => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
                    'fname' => $this->input->post("fname"),
                    'lname' => $this->input->post("lname"),
                    'tel' => $this->input->post("tel"),
                    'role' => "2",
                    'created_at' => $now,
                    'updated_at' => $now,
                ];

                $this->db->insert('user', $data);
                $error = $this->db->error();

                if (isset($error['code']) && !empty($error['code'])) {
                    $msg = ($error['code'] == 1062) ? "มีข้อมูลผู้ใช้นี้แล้ว" : $error['message'];
                    throw new Exception('เกิดข้อผิดพลาด: ' . $msg);
                }

                $this->session->set_flashdata('ok', 'ลงทะเบียนสำเร็จ');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', $e->getMessage());
        }
        redirect('home');
    }
}
