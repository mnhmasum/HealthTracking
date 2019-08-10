<?php
/**
 * Created by PhpStorm.
 * User: masum
 * Date: 02/11/2015
 * Time: 13:10
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Sensors extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation', 'email'));
    }

    //This function for checking is user is logged in or not
    function authentication_check()
    {
        if (!$this->session->userdata('is_logged_in')) {
            redirect('Login/login');
            return;
        }
    }

    public function create_appoinment()
    {
        //self::authentication_check();
        $this->load->view('sensors/create_appoinment.php');
    }

    public function save_appoinment()
    {
        $name = $this->input->post('name');
        $mobile_no = $this->input->post('mobile_no');
        $email = $this->input->post('email');
        $date = $this->input->post('date');
        $address = $this->input->post('address');
        $reference = $this->input->post('reference');
        $agenda = $this->input->post('agenda');
    

        $this->load->database();
        $query = $this->db->query('INSERT INTO appoinments 
        (appointment_for_name, mobile, email, appointment_date, address, reference, agenda) 
        VALUES("' . $name. '","' . $mobile_no . '","' . $email . '","' . $date . '","' . $address . '",
        "' . $reference . '","' . $agenda . '")');
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">New appoinment has been created!</div>');

        $arr = array('status' => 200, 'message' => 'Saved successfully! ');    

        //add the header here
        header('Content-Type: application/json');
        echo json_encode( $arr );
            
    }

    public function view_appoinments()
    {
        //self::authentication_check();
        $this->load->database();
        $query = $this->db->query('SELECT * FROM appoinments');
        $rows = array();
        foreach ($query->result() as $row) $rows[] = $row;
        $data['result'] = $rows;

        header('Content-Type: application/json');
        echo json_encode( $rows );

        //$this->load->view('sensors/view_appoinments', $data);
    }

    public function create_achievement()
    {
        //self::authentication_check();
        $this->load->view('sensors/create_achievement.php');
    }


    public function save_achievement()
    {
        $video = "";
        $new_name                   = time().$_FILES["images"]['name'];
        $config['file_name']        = $new_name;
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|mp4';
        //$config['max_size']             = 500;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 1024;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('images'))
        {
            $error = array('error' => $this->upload->display_errors());
        } 
        else
        {
            $data = array('upload_data' => $this->upload->data());
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";           
        }

        if (isset($_FILES["video"]['name'])) {
            $video                = time().$_FILES["video"]['name'];
            $config['file_name']        = $video;
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|mp4';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('video'))
            {
                $error = array('error' => $this->upload->display_errors());
            } 
            else
            {
                $data = array('upload_data' => $this->upload->data());
                          
            }
        }

        $title = $this->input->post('title');
        $image = $new_name;
        $details = $this->input->post('details');
        $video = $video;
    
        $this->load->database();
        $sql = 'INSERT INTO achievements
        (title, images, details, video_links) 
        VALUES("' . $title. '","' . $image . '","' . $details . '","' . $video . '")';

        $query = $this->db->query($sql);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">New achievement has been created!</div>');
        
        header('Content-Type: application/json');
        $arr = array('status' => 200, 'message' => 'Saved successfully! ');    
        echo json_encode( $arr );

    }

    public function achievements()
    {
        //self::authentication_check();
        $this->load->database();
        $query = $this->db->query('SELECT * FROM achievements');
        $rows = array();
        foreach ($query->result() as $row) $rows[] = $row;
        $data['result'] = $rows;

        header('Content-Type: application/json');
        echo json_encode( $rows );

        //$this->load->view('sensors/view_appoinments', $data);
    }

    public function save_feedback()
    {
        $name = $this->input->post('name');
        $mobile_no = $this->input->post('mobile_no');
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');

        $this->load->database();
        $query = $this->db->query('INSERT INTO feedback 
        (name, mobile, email, subject, message) 
        VALUES("' . $name. '","' . $mobile_no . '","' . $email . '","' . $subject . '","' . $message .'")');
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">New appoinment has been created!</div>');

        $arr = array('status' => 200, 'message' => 'Saved successfully! ');    

        //add the header here
        header('Content-Type: application/json');
        echo json_encode( $arr );
            
    }

    public function feedbacklist()
    {
        //self::authentication_check();
        $this->load->database();
        $query = $this->db->query('SELECT * FROM feedback');
        $rows = array();
        foreach ($query->result() as $row) $rows[] = $row;
        $data['result'] = $rows;

        header('Content-Type: application/json');
        echo json_encode( $rows );
    }

    public function save_press()
    {
        $new_name = "";
        if(isset($_FILES["image"])) {
            $new_name                   = time().$_FILES["image"]['name'];
            $config['file_name']        = $new_name;
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|mp4';    
            
            $this->load->library('upload', $config);
    
            if ( ! $this->upload->do_upload('image'))
            {
                $error = array('error' => $this->upload->display_errors());
            } 
            else
            {
                $data = array('upload_data' => $this->upload->data());          
            }

        } 

    
        $title = $this->input->post('title');
        $image = $new_name;
        $details = $this->input->post('details');
            
        $this->load->database();
        $sql = 'INSERT INTO press
        (title, details, thumb_image) 
        VALUES("' . $title. '","' . $details . '","' . $image . '")';

        $query = $this->db->query($sql);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">New achievement has been created!</div>');
        
        header('Content-Type: application/json');
        $arr = array('status' => 200, 'message' => 'Saved successfully! ');    
        echo json_encode( $arr );

    }

    public function press()
    {
        //self::authentication_check();
        $this->load->database();
        $query = $this->db->query('SELECT * FROM press');
        $rows = array();
        foreach ($query->result() as $row) $rows[] = $row;
        $data['result'] = $rows;

        header('Content-Type: application/json');
        echo json_encode( $rows );

        //$this->load->view('sensors/view_appoinments', $data);
    }


    //////////////////////////////////////////////

    public function create_sensor()
    {
        self::authentication_check();
        $this->load->view('sensors/create_sensor');
    }

    public function create_sensor_data()
    {
        self::authentication_check();
        $this->load->view('sensors/create_sensor_data');
    }

    public function save_sensor()
    {
        $sensor_name = $this->input->post('sensor_name');
        $sensor_type_id = $this->input->post('sensor_type_id');
        $user_id = $this->session->userdata('userid');
        $this->load->database();
        $query = $this->db->query('INSERT INTO ht_sensor_type (sensor_type_id, sensor_name) VALUES("' . $sensor_type_id. '","' . $sensor_name . '")');
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">New sensor type has been saved!</div>');
        redirect('/view_sensors');
    }

    public function save_data()
    {
        $client_id = $this->input->post('client_id');
        $test_id = $this->input->post('test_id');
        $data = $this->input->post('data');
        $sensor_type = $this->input->post('sensor_type');
        $user_id = $this->session->userdata('userid');
        $this->load->database();
        $sql = 'INSERT INTO ht_data (client_id, test_id, data, sensor_type, user_id) VALUES("' . $client_id . '","' . $test_id . '","' . $data . '", "' . $sensor_type . '", "' . $user_id . '")';
        $query = $this->db->query($sql);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">New sensor data has been recorded!</div>');
        redirect('/view_sensors_data');

    }

    public function update_note($id)
    {
        self::authentication_check();
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $this->load->database();
        $sql = "UPDATE `ht_notes` SET `title` = '" . $title . "',
        `description` = '" . $description . "' WHERE `id` =" . $id;
        $query = $this->db->query($sql);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center"> Note updated successfully!</div>');
        redirect('/view_notes');
    }

    public function edit_note($id)
    {
        self::authentication_check();
        $rows = array();
        $this->load->database();
        $sql = "SELECT * FROM ht_notes where id =" . $id;
        $query = $this->db->query($sql);
        foreach ($query->result() as $row) $rows[] = $row;
        $data['notes'] = $rows;
        $this->load->view('notes/edit_note', $data);
    }

    public function view_sensors()
    {
        self::authentication_check();
        $this->load->database();
        $query = $this->db->query('SELECT * FROM ht_sensor_type');
        $rows = array();
        foreach ($query->result() as $row) $rows[] = $row;
        $data['result'] = $rows;
        $this->load->view('sensors/view_sensors', $data);
    }

    public function view_sensors_data()
    {
        self::authentication_check();
        $this->load->database();
        //$query = $this->db->query('SELECT * FROM ht_data');
        $query = $this->db->query('SELECT ht_data.id, ht_data.`client_id`,ht_data.test_id, ht_data.data, ht_sensor_type.sensor_name
as sensor_type, ht_data.created_at, ht_data.user_id FROM `ht_data`,ht_sensor_type
WHERE ht_data.sensor_type = ht_sensor_type.sensor_type_id');
        $rows = array();
        foreach ($query->result() as $row) $rows[] = $row;
        $data['result'] = $rows;
        $this->load->view('sensors/view_sensors_data', $data);

    }

    public function delete_sensor($id)
    {
        self::authentication_check();
        $this->load->database();
        $sql = "Delete from ht_sensor_type where id=" . $id;
        $query = $this->db->query($sql);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center"> Sensor has been deleted!</div>');
        redirect('/view_sensors');

    }

    public function delete_sensor_data($id)
    {
        self::authentication_check();
        $this->load->database();
        $sql = "Delete from ht_data where id=" . $id;
        $query = $this->db->query($sql);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center"> Sensor data has been deleted!</div>');
        redirect('/view_sensors_data');

    }

}

?>
