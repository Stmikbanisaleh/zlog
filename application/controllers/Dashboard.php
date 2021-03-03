<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('administrator/model_dashboard');
    }

    function render_view($data)
    {
        $this->template->load('templateadmin', $data); //Display Page
    }
    
    public function index()
    {
        if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
            $data = array(
                'page_content'      => '../pageadmin/dashboard',
                'ribbon'            => '<li class="active">Dashboard</li>',
                'page_name'         => 'Dashboard',
            );
            $this->render_view($data); //Memanggil function render_view
        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
		$password = hash("sha512", $password);
		$result = $this->model_dashboard->checkLogin($email,$password);
        if ($result->num_rows() > 0) {
            $data = $result->result_array();
            foreach ($data as $value) {
				if($value['is_active'] != 1){
					$this->session->set_flashdata('category_error', 'Akun tersebut belum diaktifkan');
					redirect('dashboard/index');
				}
                $data = [
					'email' => $value['email'],
					'name' => $value['name'],
					'image' => $value['image'],
					'last_login' => $value['last_login'],
                ];
            }
            $this->session->set_userdata($data);
            redirect('dashboard/index');
        } else {
            $this->session->set_flashdata('category_error', 'Email atau password Password');
            redirect('dashboard/index');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('administrator/dashboard/index');
    }

    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('category_error', '<div class="alert alert-danger" role="alert">
            Email belum terdaftar!</div>');
            redirect('modulakasir/dashboard');
        } else {
            $email = $this->input->post('email');

            $guru = $this->db->get_where('tbpengawas', ['email' => $email, 'isdeleted' => 0])->row_array();
            if (count($guru) > 0) {
                $token = $this->_token();
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $insert = $this->model_dashboard->insert($user_token, 'msusertoken');
                $ngimail = $this->_send_email($token, 'forgot');
                $this->session->set_flashdata('category_success', '<div class="alert alert-success" role="alert">
            Periksa email untuk reset password!</div>');
                redirect('modulkasir/dashboard');
            } else {
                $this->session->set_flashdata('category_error', '<div class="alert alert-danger" role="alert">
            Email belum terdaftar!</div>');
                redirect('modulakasir/dashboard');
            }
        }
    }

    private function _send_email($token, $type)
    {
        require 'assets/PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        // Konfigurasi SMTP
        $mail->isSMTP();
        $mail->Host = HOST_EMAIL;
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL_BANTUAN;
        $mail->Password = PASSWORD_BANTUAN;
        $mail->SMTPSecure = 'tls';
        $mail->Port = EMAIL_PORT;
        $mail->setFrom(EMAIL_BANTUAN);
        // Menambahkan penerima
        $mail->addAddress($this->input->post('email'));
        if ($type == 'forgot') {
            // Subjek email
            $mail->Subject = 'School Gemanurani  - Reset Password';
            // Mengatur format email ke HTML
            $mail->isHTML(true);
            // Konten/isi email
            $mailContent = 'Klik untuk reset password akun anda : <a href="' . base_url() . 'modulkasir/dashboard/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>';
            $mail->Body = $mailContent;
        }

        // Kirim email
        if (!$mail->send()) {
            $pes = 'Pesan tidak dapat dikirim.';
            $mai = 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $pes = 'Pesan telah terkirim';
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('tbpengawas', ['email' => $email])->row_array();
        if (count($user) > 0) {
            $token = ['token' => $token];
            $user_token = $this->db->query("select token from msusertoken where email ='" . $email . "'")->result_array();
            if ($user_token[0]) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('category_error', '<div class="alert alert-danger" role="alert">
            Reset password gagal,token salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('category_error', '<div class="alert alert-danger" role="alert">
            Reset password gagal,Email salah</div>');
            redirect('auth');
        }
    }

    public function changepassword()
    {
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password Ulang', 'required|trim|min_length[8]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('pagekasir/changepassword');
        } else {
            $password = hash('sha512', md5($this->input->post('password1')));
            $email = $this->session->userdata('reset_email');
            $this->db->set('password', $password);
            $this->db->set('updatedAt', date('Y-m-d'));
            $this->db->where('email', $email);
            $this->db->update('tbpengawas');
            // print_r($this->db->last_query());exit;
            $this->db->query("delete from msusertoken where email = '" . $email . "'");
            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('category_change', '<div class="alert alert-success" role="alert">
            Password telah diubah,silahkan Login</div>');
            redirect('modulkasir/dashboard/login');
        }
    }

    private function _token($length = 12)
    {
        $str = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str  .= $characters[$rand];
        }
        return $str;
    }
}
