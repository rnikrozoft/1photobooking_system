<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Package extends CI_Controller
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
        $this->db->from('package');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data["packages"] = $query->result_array(); 
        } else {
            $data["packages"] = []; 
        }

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
        try {
            if ($this->input->post()) {
                $now = date('Y-m-d H:i:s');
                $data = [
                    'package_name' => $this->input->post("package_name"),
                    'package_rate' => $this->input->post("package_rate"),
                    'package_detail' => $this->input->post("package_detail"),
                    'created_at' => $now,
                    'updated_at' => $now,
                ];

                $this->db->insert('package', $data);
                $error = $this->db->error();
                if ($error['code'] !== 0) {
                    throw new Exception(html_escape($error['message']));
                }

                redirect('admin/package/' . $this->db->insert_id() . '/add/image/');
                exit;
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', $e->getMessage());
        }

        redirect('admin/package/add');
        exit;
    }

    public function insert_images($package_id)
    {
        try {
            $query = $this->db->get_where('package', ['id' => $package_id]);
            $package = $query->row_array();
            if ($package) {
                $data["data"] = $package;
                $data["styles"] = ['assets/plugins/dropzone/min/dropzone.min.css'];
                $data['scripts'] = ['assets/plugins/dropzone/min/dropzone.min.js'];
                $data["components"]["aside"] = 'components/admin_aside';
                $data["components"]["footer"] = 'components/admin_footer';
                $this->load->view('admin/package_add_image', $data);
                return;
            } else {
                $this->session->set_flashdata('error', 'ไม่พบข้อมูลแพ็กเกจ');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'เกิดข้อผิดพลาด: ' . $e->getMessage());
        }
        show_404();
    }

    public function do_upload()
    {
        $upload_path = './uploads/';

        if (!is_dir($upload_path)) {
            if (!mkdir($upload_path, 0777, true)) {
                echo json_encode(['error' => "ไม่สามารถสร้างโฟลเดอร์อัปโหลดได้"]);
                return;
            }
        }

        $config['upload_path']   = $upload_path;
        $config['allowed_types'] = 'jpg|png|gif|pdf';
        $config['max_size']      = 2048;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            echo json_encode(['error' => "อัพโหลดรูปภาพไม่สำเร็จ: " . $this->upload->display_errors()]);
            return;
        }

        $upload_data = $this->upload->data();

        $data = [
            'package_id' => $this->input->post("package_id"),
            'image_name' => $upload_data['file_name'],
            'created_at' => date('Y-m-d H:i:s'),
        ];

        try {
            $this->db->insert('package_images', $data);
            $error = $this->db->error();

            if ($error['code'] !== 0) {
                throw new Exception(html_escape($error['message']));
            }

            echo json_encode([
                'success' => "อัพโหลดรูปภาพสำเร็จ",
                'image_id' => $this->db->insert_id(),
            ]);
            return;
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
            return;
        }
    }

    public function set_main_image()
    {
        try {
            $set_to_false = array(
                'is_cover' => "false",
            );
            $this->db->where('package_id', $this->input->post("package_id"));
            $this->db->update('package_images', $set_to_false);

            $data = array(
                'is_cover' => true,
            );
            $this->db->where('package_image_id', $this->input->post("image_id"));
            $this->db->update('package_images', $data);
            $error = $this->db->error();
            if ($error['code'] !== 0) {
                throw new Exception(html_escape($error['message']));
            }
            echo json_encode(['success' => "ตั้งค่าเป็นรูปหลัก"]);
            return;
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
            return;
        }
    }

    public function delete_image()
    {
        try {
            $image_id = $this->input->post("image_id");
            $this->db->where('package_image_id', $image_id);
            $query = $this->db->get('package_images');
            if ($query->num_rows() == 0) {
                echo json_encode(['error' => 'ไม่พบรูปภาพที่ต้องการลบ']);
                return;
            }

            $image = $query->row_array();
            if ($image["is_cover"] == "true") {
                echo json_encode(['error' => 'ไม่สามารถลบรูปหลักได้']);
                return;
            }

            $this->db->where('package_image_id', $image_id);
            $this->db->delete('package_images');
            $error = $this->db->error();
            if ($error['code'] !== 0) {
                throw new Exception(html_escape($error['message']));
            }

            echo json_encode(['success' => "ลบรูปภาพสำเร็จ"]);
            return;
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
            return;
        }
    }

    public function delete()
    {
        try {
            $this->db->where('id', $this->input->post("package_id"));
            $this->db->delete('package');
            $error = $this->db->error();
            if ($error['code'] !== 0) {
                throw new Exception(html_escape($error['message']));
            }

            echo json_encode(['success' => "ลบแพ็กเกจสำเร็จ"]);
            return;
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
            return;
        }
    }
}
