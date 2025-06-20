<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('profile_model');
        $this->load->model('hoispital/hospital_model');
        $this->load->model('patient/patient_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('superadmin/superadmin_model');
    }

    public function index()
    {
        $data = array();
        $id = $this->ion_auth->get_user_id();
        $data['profile'] = $this->profile_model->getProfileById($id);
        $this->load->view('home/dashboard');
        $this->load->view('profile', $data);
        $this->load->view('home/footer');
    }

    public function addNew()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $language = $this->input->post('language');


        $data['profile'] = $this->profile_model->getProfileById($id);
        if ($data['profile']->email != $email) {
            if ($this->ion_auth->email_check($email)) {
                show_swal(lang('this_email_address_is_already_registered'), 'error', lang('error'));
                redirect('profile');
            }
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        // Validating Password Field
        if (!empty($password)) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        }
        // Validating Email Field
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $id = $this->ion_auth->get_user_id();
            $data['profile'] = $this->profile_model->getProfileById($id);
            $this->load->view('home/dashboard');
            $this->load->view('profile', $data);
            $this->load->view('home/footer');
        } else {
            // if ($this->ion_auth->in_group(array('Patient', 'Doctor', 'superadmin', 'admin'))) {
            $file_name = $_FILES['img_url']['name'];
            if (!empty($file_name)) {
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
                $config = array(
                    'file_name' => $new_file_name,
                    'upload_path' => "./uploads/",
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => False,
                    'max_size' => "10000000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    'max_height' => "10000",
                    'max_width' => "10000"
                );

                $this->load->library('Upload', $config);
                $this->upload->initialize($config);
                $this->load->library('Upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('img_url')) {
                    $path = $this->upload->data();
                    $img_url = "uploads/" . $path['file_name'];
                    $data = array();
                    $data = array(
                        'img_url' => $img_url,
                    );
                    if ($this->ion_auth->in_group(array('Patient'))) {
                        $patient_id = $this->db->get_where('patient', array('ion_user_id' => $this->ion_auth->get_user_id()))->row()->id;
                        $this->patient_model->updatePatient($patient_id, $data);
                    }
                    if ($this->ion_auth->in_group(array('Doctor'))) {
                        $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $this->ion_auth->get_user_id()))->row()->id;
                        $this->doctor_model->updateDoctor($doctor_id, $data);
                    }
                    if ($this->ion_auth->in_group(array('superadmin'))) {
                        $superadmin_id = $this->db->get_where('superadmin', array('ion_user_id' => $this->ion_auth->get_user_id()))->row()->id;
                        $this->superadmin_model->updateSuperadmin($superadmin_id, $data);
                    }
                    if ($this->ion_auth->in_group(array('admin'))) {
                        $this->profile_model->updateUser($this->ion_auth->get_user_id(), $data);
                    }
                }
            }
            // }

            if ($this->ion_auth->in_group(array('Patient', 'Doctor'))) {
                if (!empty($language)) {
                    $data_language = array(
                        'language' => $language,
                    );
                    if ($this->ion_auth->in_group(array('Patient'))) {
                        $patient_id = $this->db->get_where('patient', array('ion_user_id' => $this->ion_auth->get_user_id()))->row()->id;
                        $this->patient_model->updatePatient($patient_id, $data_language);
                    }
                    if ($this->ion_auth->in_group(array('Doctor'))) {
                        $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $this->ion_auth->get_user_id()))->row()->id;
                        $this->doctor_model->updateDoctor($doctor_id, $data_language);
                    }
                }
            }



            $data = array();
            $data = array(
                'name' => $name,
                'email' => $email,
            );

            $username = $this->input->post('name');
            $ion_user_id = $this->ion_auth->get_user_id();
            $group_id = $this->profile_model->getUsersGroups($ion_user_id)->row()->group_id;
            $group_name = $this->profile_model->getGroups($group_id)->row()->name;
            $group_name = strtolower($group_name);
            if (empty($password)) {
                $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
            } else {
                $password = $this->ion_auth_model->hash_password($password);
            }
            $this->profile_model->updateIonUser($username, $email, $password, $ion_user_id);
            if (!$this->ion_auth->in_group(array('superadmin'))) {
                if ($this->ion_auth->in_group(array('admin'))) {
                    $this->hospital_model->updateHospitalByIonId($ion_user_id, $data);
                } else {
                    $this->profile_model->updateProfile($ion_user_id, $data, $group_name);
                }
            } else {
                $this->superadmin_model->updateSuperadminByIonId($ion_user_id, $data);
            }


            if ($this->ion_auth->in_group(array('Pharmacist', 'Nurse', 'Accountant', 'Receptionist', 'Laboratorist'))) {
                $this->profile_model->updateProfile($ion_user_id, array('img_url' => $img_url), $group_name);
            }


            show_swal(lang('updated'), 'success', lang('updated'));


            redirect('profile');
        }
    }
    function updatePatientNotification()
    {
        $type = $this->input->get('type');
        $id = $this->input->get('patient_id');
        $value = $this->input->get('value');
        $data = array();
        $data = array($type => $value);
        $this->patient_model->updatePatient($id, $data);
        $data1['update'] = 'yes';
        echo json_encode($data);
    }
    function updateDoctorNotification()
    {
        $type = $this->input->get('type');
        $type_explode = explode("_", $type);
        $type_new = $type_explode[1] . '_' . $type_explode[2];
        $id = $this->input->get('doctor_id');
        $value = $this->input->get('value');
        $data = array();
        $data = array($type_new => $value);
        $this->doctor_model->updateDoctor($id, $data);
        $data1['update'] = 'yes';
        echo json_encode($data);
    }


    function changeLanguageFlag()
    {
        $language = $this->input->get('lang');
        if ($this->ion_auth->in_group(array('Patient', 'Doctor'))) {
            if (!empty($language)) {
                $data_language = array(
                    'language' => $language,
                );
                if ($this->ion_auth->in_group(array('Patient'))) {
                    $patient_id = $this->db->get_where('patient', array('ion_user_id' => $this->ion_auth->get_user_id()))->row()->id;
                    $this->patient_model->updatePatient($patient_id, $data_language);
                }
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $this->ion_auth->get_user_id()))->row()->id;
                    $this->doctor_model->updateDoctor($doctor_id, $data_language);
                }
            }
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}

/* End of file profile.php */
/* Location: ./application/modules/profile/controllers/profile.php */
