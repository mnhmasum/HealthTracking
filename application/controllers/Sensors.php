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
        $user_id = $this->session->userdata('userid');
        $this->load->database();
        $query = $this->db->query('INSERT INTO ht_sensor_type (sensor_name) VALUES("' . $sensor_name . '")');
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">New sensor type has been saved!</div>');
        redirect('/view_sensors');

    }

    public function save_data()
    {

        $client_id = $this->input->post('client_id');
        $data = $this->input->post('datas');
        $sensor_type = $this->input->post('sensor_type');
        echo $user_id = $this->session->userdata('userid');
        $this->load->database();
        $sql = 'INSERT INTO ht_datas (client_id, datas, sensor_type, user_id) VALUES("' . $client_id . '","' . $data . '", "' . $sensor_type . '", "' . $user_id . '")';
        $query = $this->db->query($sql);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">New sensor data has been recorded!</div>');
        redirect('/view_sensors_datas');

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

    public function view_sensors_datas()
    {
        self::authentication_check();
        $this->load->database();
        //$query = $this->db->query('SELECT * FROM ht_datas');
        $query = $this->db->query('SELECT ht_datas.id, ht_datas.`client_id`, ht_datas.datas, ht_sensor_type.sensor_name
as sensor_type, ht_datas.created_at, ht_datas.user_id FROM `ht_datas`,ht_sensor_type
WHERE ht_datas.sensor_type = ht_sensor_type.id');
        $rows = array();
        foreach ($query->result() as $row) $rows[] = $row;
        $data['result'] = $rows;
        $this->load->view('sensors/view_sensors_datas', $data);

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
        $sql = "Delete from ht_datas where id=" . $id;
        $query = $this->db->query($sql);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center"> Sensor data has been deleted!</div>');
        redirect('/view_sensors_datas');

    }

    //////////////////////////////// API ////////////////////////////////
    /////////////////////API for mobile application///////////////////////
    /////////////////////////////////////////////////////////////////////
    public function save_data_from_app()
    {
        $client_id = $this->input->post('client_id');
        $data = $this->input->post('datas');
        $sensor_type = $this->input->post('sensor_type');
        $user_id = $this->input->post('userid');
        //$user_id = $this->session->userdata('userid');
        $this->load->database();
        $sql = 'INSERT INTO ht_datas (client_id, datas, sensor_type, user_id) VALUES("' . $client_id . '","' . $data . '", "' . $sensor_type . '", "' . $user_id . '")';
        $query = $this->db->query($sql);

        if($query) { 
            echo "1";
        } else {
            echo "0";
        }

        //$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">New sensor data has been recorded!</div>');
        //redirect('/view_sensors_datas');

    }

    public function view_sensors_datas_api($id)
    {
        //self::authentication_check();
        $this->load->database();
        $query = $this->db->query('SELECT ht_datas.id, ht_datas.`client_id`, ht_datas.datas, ht_sensor_type.sensor_name
as sensor_type, ht_datas.created_at, ht_datas.user_id FROM `ht_datas`,ht_sensor_type
WHERE ht_datas.sensor_type = ht_sensor_type.id and ht_datas.client_id='.$id);
        $rows = array();
        foreach ($query->result() as $row) $rows[] = $row;
        $data['result'] = $rows;
        header('Content-Type: application/json');
        //echo json_encode($data);
        echo $this->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode($data));
        //$this->load->view('sensors/view_sensors_datas', $data);

    }


}

?>
