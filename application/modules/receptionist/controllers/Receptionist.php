<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Receptionist extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('receptionist_model');
        if (!$this->ion_auth->in_group('admin')) {
            redirect('home/permission');
        }
    }

    public function index()
    {

        $data['receptionists'] = $this->receptionist_model->getReceptionist();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard', $data);
        $this->load->view('receptionist', $data);
        $this->load->view('home/footer');
    }

    public function addNewView()
    {
        $this->load->view('home/dashboard');
        $this->load->view('add_new');
        $this->load->view('home/footer');
    }

    public function addNew()
    {

        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $profile = $this->input->post('profile');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        // Validating Name Field
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        // Validating Password Field
        if (empty($id)) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        }
        // Validating Email Field
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[5]|max_length[500]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[5]|max_length[50]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                show_swal(lang('form_validation_error'), 'error', lang('error'));
                redirect('receptionist/editReceptionist?id=' . $id);
            } else {
                $data = array();
                $data['setval'] = 'setval';
                $data['settings'] = $this->settings_model->getSettings();
                $this->load->view('home/dashboard', $data);
                $this->load->view('add_new');
                $this->load->view('home/footer');
            }
        } else {
            $file_name = $_FILES['img_url']['name'];
            $file_name_pieces = explode('_', $file_name);
            $new_file_name = '';
            $count = 1;
            foreach ($file_name_pieces as $piece) {
                if ($count !== 1) {
                    $piece = ucfirst($piece);
                }

                $new_file_name .= $piece;
                $count++;
            }
            $file_name1 = $_FILES['signature']['name'];
            $file_name_pieces1 = explode('_', $file_name1);
            $new_file_name1 = '';
            $count1 = 1;
            foreach ($file_name_pieces1 as $piece) {
                if ($count1 !== 1) {
                    $piece = ucfirst($piece);
                }

                $new_file_name1 .= $piece;
                $count1++;
            }

            $config1 = array(
                'file_name' => $new_file_name1,
                'upload_path' => "./uploads/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => False,
                'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "1768",
                'max_width' => "2024"
            );
            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./uploads/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => False,
                'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "1768",
                'max_width' => "2024"
            );

            $this->load->library('Upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('img_url')) {
                $path = $this->upload->data();
                $img_url = "uploads/" . $path['file_name'];
                $this->load->library('Upload', $config1);
                $this->upload->initialize($config1);
                if ($this->upload->do_upload('signature')) {
                    $path1 = $this->upload->data();
                    $signature = "uploads/" . $path1['file_name'];
                    $data = array();
                    $data = array(
                        'img_url' => $img_url,
                        'name' => $name,
                        'email' => $email,
                        'address' => $address,
                        'phone' => $phone,
                        'profile' => $profile,
                        'signature' => $signature,

                    );
                } else {
                    $data = array();
                    $data = array(
                        'img_url' => $img_url,
                        'name' => $name,
                        'email' => $email,
                        'address' => $address,
                        'phone' => $phone,
                        'profile' => $profile,



                    );
                }
            } else {
                $this->load->library('Upload', $config1);
                $this->upload->initialize($config1);

                if ($this->upload->do_upload('signature')) {
                    $path1 = $this->upload->data();
                    $signature = "uploads/" . $path1['file_name'];

                    $data = array();
                    $data = array(

                        'name' => $name,
                        'email' => $email,
                        'address' => $address,
                        'phone' => $phone,
                        'profile' => $profile,
                        'signature' => $signature

                    );
                } else {

                    $data = array();
                    $data = array(
                        'name' => $name,
                        'email' => $email,
                        'address' => $address,
                        'phone' => $phone,
                        'profile' => $profile,

                    );
                }
            }
            $username = $this->input->post('name');

            if (empty($id)) {     // Adding New Receptionist
                if ($this->ion_auth->email_check($email)) {
                    show_swal(lang('this_email_address_is_already_registered'), 'error', lang('error'));
                    redirect('receptionist/addNewView');
                } else {
                    $dfg = 10;
                    $this->ion_auth->register($username, $password, $email, $dfg);
                    $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                    $this->receptionist_model->insertReceptionist($data);
                    $receptionist_user_id = $this->db->get_where('receptionist', array('email' => $email))->row()->id;
                    $id_info = array('ion_user_id' => $ion_user_id);
                    $this->receptionist_model->updateReceptionist($receptionist_user_id, $id_info);
                    $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);
                    $base_url = str_replace(array('http://', 'https://', ' '), '', base_url()) . "auth/login";
                    $set['settings'] = $this->settings_model->getSettings();
                    $name1 = explode(' ', $name);
                    if (!isset($name1[1])) {
                        $name1[1] = null;
                    }
                    $data1 = array(
                        'firstname' => $name1[0],
                        'lastname' => $name1[1],
                        'name' => $name,
                        'base_url' => $base_url,
                        'email' => $email,
                        'password' => $password,
                        'company' => $set['settings']->system_vendor
                    );
                    $autoemail = $this->email_model->getAutoEmailByType('receptionist');
                    if ($autoemail->status == 'Active') {
                        $mail_provider = $this->settings_model->getSettings()->emailtype;
                        $settngs_name = $this->settings_model->getSettings()->system_vendor;
                        $email_Settings = $this->email_model->getEmailSettingsByType($mail_provider);
                        if (!empty($email_Settings->user)) {
                            $message1 = $autoemail->message;
                            $messageprint1 = $this->parser->parse_string($message1, $data1);
                            if ($mail_provider == 'Domain Email') {
                                $this->email->from($email_Settings->admin_email);
                            }
                            if ($mail_provider == 'Smtp') {
                                $this->email->from($email_Settings->user, $settngs_name);
                            }
                            $this->email->to($email);
                            $this->email->subject('Registration confirmation');
                            $this->email->message($messageprint1);
                            $this->email->send();
                        }
                    }
                    show_swal(lang('user') . ' ' . lang('added'), 'success', lang('added'));
                }
            } else { // Updating Receptionist
                $receptionist_details = $this->receptionist_model->getReceptionistById($id);
                if ($email != $receptionist_details->email) {
                    if ($this->ion_auth->email_check($email)) {
                        show_swal(lang('this_email_address_is_already_registered'), 'error', lang('error'));
                        redirect("receptionist/editReceptionist?id=" . $id);
                    }
                }
                $ion_user_id = $this->db->get_where('receptionist', array('id' => $id))->row()->ion_user_id;
                if (empty($password)) {
                    $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                } else {
                    $password = $this->ion_auth_model->hash_password($password);
                }
                $this->receptionist_model->updateIonUser($username, $email, $password, $ion_user_id);
                $this->receptionist_model->updateReceptionist($id, $data);
                show_swal(lang('user').' '.lang('updated'), 'success', lang('updated'));
            }
            // Loading View
            redirect('receptionist');
        }
    }

    function getReceptionist()
    {
        $data['receptionists'] = $this->receptionist_model->getReceptionist();
        $this->load->view('receptionist', $data);
    }

    function editReceptionist()
    {
        $data = array();
        $id = $this->input->get('id');
        $data['receptionist'] = $this->receptionist_model->getReceptionistById($id);
        $this->load->view('home/dashboard', $data);
        $this->load->view('add_new', $data);
        $this->load->view('home/footer');
    }

    function editReceptionistByJason()
    {
        $id = $this->input->get('id');
        $data['receptionist'] = $this->receptionist_model->getReceptionistById($id);
        echo json_encode($data);
    }

    function delete()
    {
        $data = array();
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('receptionist', array('id' => $id))->row();
        $path = $user_data->img_url;

        if (!empty($path)) {
            unlink($path);
        }
        $ion_user_id = $user_data->ion_user_id;
        $this->db->where('id', $ion_user_id);
        $this->db->delete('users');
        $this->receptionist_model->delete($id);
        show_swal(lang('user').' '.lang('deleted'), 'warning', lang('deleted'));
        redirect('receptionist');
    }
    function deleteReceptionistImage()
    {
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('receptionist', array('id' => $id))->row();
        $path = $user_data->signature;
        if (!empty($path)) {
            unlink($path);
        }
        $data = array('signature' => '');
        $this->receptionist_model->updateReceptionist($id, $data);
        $data_response = array();
        $data_response['response'] = 'yes';
        echo json_encode($data_response);
    }
}

/* End of file receptionist.php */
/* Location: ./application/modules/receptionist/controllers/receptionist.php */
