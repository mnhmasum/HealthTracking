<?php
/**
 * Created by PhpStorm.
 * User: masum
 * Date: 02/11/2015
 * Time: 13:10
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Sensors extends CI_Controller
{
    var $appId = "707558466353194";
    var $appSecretCode = "1f16d5b133f2ea75e6857742901c388c";
    //var $pageId = "785731355111522";
    var $pageId = "621448874644438";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation', 'email'));
    }

    //This function for checking is user is logged in or not
    public function authentication_check()
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

    public function save_appointment()
    {
        $name = $this->input->post('name');
        $mobile_no = $this->input->post('mobile_no');
        $email = $this->input->post('email');
        $date = $this->input->post('date');
        $address = $this->input->post('address');
        $reference = $this->input->post('reference');
        $agenda = $this->input->post('agenda');

        $this->load->database();
        $query = $this->db->query('INSERT INTO appointments
        (appointment_for_name, mobile, email, appointment_date, address, reference, agenda)
        VALUES("' . $name . '","' . $mobile_no . '","' . $email . '","' . $date . '","' . $address . '",
        "' . $reference . '","' . $agenda . '")');
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">New appoinment has been created!</div>');

        $arr = array('status' => 200, 'message' => 'Saved successfully! ');

        //add the header here
        header('Content-Type: application/json');
        echo json_encode($arr);

    }

    public function view_appointments()
    {
        //self::authentication_check();
        $this->load->database();
        $query = $this->db->query('SELECT * FROM appointments');
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $data['result'] = $rows;

        header('Content-Type: application/json');
        echo json_encode($rows);

        //$this->load->view('sensors/view_appoinments', $data);
    }

    public function delete_appointment($id)
    {
        //self::authentication_check();
        $this->load->database();
        $sql = "Delete from appointments where appointment_id=" . $id;
        $query = $this->db->query($sql);

        $arr = array('status' => 200, 'message' => 'Deleted successfully! ');
        //add the header here
        header('Content-Type: application/json');
        echo json_encode($arr);

    }

    public function update_appointment($id, $status)
    {
        //self::authentication_check();
        $this->load->database();
        $sql = "Update appointments set status=". $status ." where appointment_id=" . $id;
        $query = $this->db->query($sql);

        $arr = array('status' => 200, 'message' => 'Deleted successfully! ');
        //add the header here
        header('Content-Type: application/json');
        echo json_encode($arr);

    }

    public function create_achievement()
    {
        //self::authentication_check();
        $this->load->view('sensors/create_achievement.php');
    }

    public function save_achievement()
    {
        $video = "";
        $new_name = time() . $_FILES["images"]['name'];
        $config['file_name'] = $new_name;
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|mp4';
        //$config['max_size']             = 500;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 1024;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('images')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
        }

        if (isset($_FILES["video"]['name'])) {
            $video = time() . $_FILES["video"]['name'];
            $config['file_name'] = $video;
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|mp4';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('video')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
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
        VALUES("' . $image . '","' . $details . '","' . $video . '")';

        $query = $this->db->query($sql);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">New achievement has been created!</div>');

        header('Content-Type: application/json');
        $arr = array('status' => 200, 'message' => 'Saved successfully! ');
        echo json_encode($arr);

    }

    public function achievements()
    {
        //self::authentication_check();
        $this->load->database();
        $query = $this->db->query('SELECT * FROM achievements');
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $data['result'] = $rows;

        header('Content-Type: application/json');
        echo json_encode($rows);

        //$this->load->view('sensors/view_appoinments', $data);
    }

    public function delete_achievement($id)
    {
        //self::authentication_check();
        $this->load->database();
        $sql = "Delete from achievement where achievement_id=" . $id;
        $query = $this->db->query($sql);

        $arr = array('status' => 200, 'message' => 'Deleted successfully! ');
        //add the header here
        header('Content-Type: application/json');
        echo json_encode($arr);

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
        VALUES("' . $name . '","' . $mobile_no . '","' . $email . '","' . $subject . '","' . $message . '")');
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">New appoinment has been created!</div>');

        $arr = array('status' => 200, 'message' => 'Saved successfully! ');

        //add the header here
        header('Content-Type: application/json');
        echo json_encode($arr);

    }

    public function feedbacklist()
    {
        //self::authentication_check();
        $this->load->database();
        $query = $this->db->query('SELECT * FROM feedback');
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $data['result'] = $rows;

        header('Content-Type: application/json');
        echo json_encode($rows);
    }

    public function delete_feedback($id)
    {
        //self::authentication_check();
        $this->load->database();
        $sql = "Delete from feedback where feedback_id=" . $id;
        $query = $this->db->query($sql);

        $arr = array('status' => 200, 'message' => 'Deleted successfully! ');
        //add the header here
        header('Content-Type: application/json');
        echo json_encode($arr);

    }

    public function update_feedback($id)
    {
        //self::authentication_check();
        $this->load->database();
        $sql = "update feedback set name ='' where feedback_id=" . $id;
        $query = $this->db->query($sql);

        $arr = array('status' => 200, 'message' => 'Deleted successfully! ');
        //add the header here
        header('Content-Type: application/json');
        echo json_encode($arr);

    }

    public function save_press()
    {
        $new_name = "";
        if (isset($_FILES["image"])) {
            $new_name = time() . $_FILES["image"]['name'];
            $config['file_name'] = $new_name;
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|mp4';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }

        }

        $title = $this->input->post('title');
        $image = $new_name;
        $details = $this->input->post('details');

        $this->load->database();
        $sql = 'INSERT INTO press
        (title, details, thumb_image)
        VALUES("' . $title . '","' . $details . '","' . $image . '")';

        $query = $this->db->query($sql);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">New achievement has been created!</div>');

        header('Content-Type: application/json');
        $arr = array('status' => 200, 'message' => 'Saved successfully! ');
        echo json_encode($arr);

    }

    public function press()
    {
        //self::authentication_check();
        $this->load->database();
        $query = $this->db->query('SELECT * FROM press');
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $data['result'] = $rows;

        header('Content-Type: application/json');
        echo json_encode($rows);

        //$this->load->view('sensors/view_appoinments', $data);
    }

    public function delete_press($id)
    {
        //self::authentication_check();
        $this->load->database();
        $sql = "Delete from press where press_id=" . $id;
        $query = $this->db->query($sql);

        $arr = array('status' => 200, 'message' => 'Deleted successfully! ');
        //add the header here
        header('Content-Type: application/json');
        echo json_encode($arr);

    }

    public function facebook()
    {
        require_once "./Facebook/autoload.php";

        $fb = new Facebook\Facebook([
            'app_id' => $this->appId, // Replace {app-id} with your app id
            'app_secret' => $this->appSecretCode,
            'default_graph_version' => 'v3.2',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email', 'user_location',
            'user_birthday','publish_pages']; // Optional permissions
        $loginUrl = $helper->getLoginUrl('https://localhost/profile/sensors/fbcallback', $permissions);

        echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

    }

    public function fbcallback()
    {
        require_once "Facebook/autoload.php";
        $files1 = glob("Facebook/GraphNodes" . '/*.php');
        foreach ($files1 as $file) {
            require_once $file;
        }

        $this->load->database();

        $fb = new Facebook\Facebook([
            'app_id' => $this->appId, // Replace {app-id} with your app id
            'app_secret' => $this->appSecretCode,
            'default_graph_version' => 'v3.2',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        $postSummary = array('posts'=>array(), 'message' => 'Saved successfully! ');


        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (!isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }

        // Logged in
        // echo '<h3>Access Token</h3>';
        // var_dump($accessToken->getValue());
        $accessToken = $accessToken->getValue();

        //echo "<br><br>";
        //echo $accessToken;

        //$accessToken = "EAAKDhUsLeCoBAHaIpzcFxvAaZB9jhO8wnRdFAkfgmTM6oGX3DNgEQnvrgGyZBBjIdhiAbfjtBfh0sKnq2RYstfzYwPMkryvnA7yjWc0nKPCuTur90Jz37G120HzeCBminEQ0SDZA3ggfAciFumr2xmQ4pLiiAP5YQBZCQ2eh1QZDZD";

        try {
            // Returns a `Facebook\FacebookResponse` object
            ///785731355111522_909033056114684?fields=attachments
            $response = $fb->get(
                '/'.$this->pageId.'/feed?limit=20',
                $accessToken
            );
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $graphEdge = $response->getGraphEdge();

        echo "Page <pre>";

        //print_r($graphEdge);

        foreach ($graphEdge as $graphNode) {
            //print_r($graphNode);
            //echo $graphNode->getField('created_time');
            //echo $graphNode->getField('message');
            //$graphNode->getName();
            echo $graphNode->getField('message');
            echo "<br>";
            echo $graphNode['created_time']->format('d/m/Y H:i:s');
            echo "<br>";
            //echo $graphNode->getField('id');




            try {
                $responseSummary = $fb->get(
                    '/' . $graphNode->getField('id') . '?fields=shares,likes.summary(true),comments.summary(true)',
                    $accessToken
                );
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }


            echo "Likes Share =><br>";
            //print_r($reponse->getDecodedBody());

            $share = 0;

            if (array_key_exists('shares', $response->getDecodedBody())) {
                $share = $responseSummary->getDecodedBody()['shares']['count'];
                echo "Share: " . $responseSummary->getDecodedBody()['shares']['count'];
            } else {
                echo "Share: ". $share;
            }

            echo "<br>";
            echo "Likes: " . $responseSummary->getDecodedBody()['likes']['summary']['total_count'];
            echo "<br>";
            echo "Total Comments " . $responseSummary->getDecodedBody()['comments']['summary']['total_count'];

            echo "<br>";




//            array_push( $postSummary['posts']['summary'], array('likes'=> $response->getDecodedBody()['likes']['summary']['total_count'],
//                'comments'=>$response->getDecodedBody()['comments']['summary']['total_count'],
//                'shares'=>$share));


            try {
                $response = $fb->get(
                    '/' . $graphNode->getField('id') . '?fields=attachments',
                    $accessToken
                );
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }

            $graphNodeAttachment = $response->getGraphNode();

            echo "Attachment<pre>";

            $arrayAttachments = array();

            if (is_array($graphNodeAttachment->getField('attachments')) || is_object($graphNodeAttachment->getField('attachments')))
            {
                //echo $graphNodeAttachment->getField('attachments') ;
                try {
                    foreach ($graphNodeAttachment->getField('attachments') as $graphNode1) {
                        //print_r($graphNode->getFieldNames());
                    
                        $media = "";

                        if ($graphNode1->getField('media') !== null) {
                            echo "photo:" . $graphNode1->getField('media')->getField('image')->getField('src');
                            
                            echo "<br>";
                            echo "URL:" . $graphNode1->getField('url');

                            array_push( $postSummary['posts'], array(
                            'id'=> $graphNode->getField('id'),
                            'message'=> $graphNode->getField('message'),
                            'created_time'=> $graphNode['created_time']->format('d/m/Y H:i:s'),
                            'summary'=>array('likes'=> $responseSummary->getDecodedBody()['likes']['summary']['total_count'],
                                'comments'=>$responseSummary->getDecodedBody()['comments']['summary']['total_count'],
                                'shares'=>$share),
                            'attachments'=>
                                array('media'=> $graphNode1->getField('media')->getField('image')->getField('src'),
                                    'src'=> $graphNode1->getField('url'))));

                        } else {
                            echo "<br>";
                            echo "URl:" . $graphNode1->getField('url');
    
                            array_push( $postSummary['posts'], array(
                                'id'=> $graphNode->getField('id'),
                                'message'=> $graphNode->getField('message'),
                                'created_time'=> $graphNode['created_time']->format('d/m/Y H:i:s'),
                                'summary'=>array('likes'=> $responseSummary->getDecodedBody()['likes']['summary']['total_count'],
                                    'comments'=>$responseSummary->getDecodedBody()['comments']['summary']['total_count'],
                                    'shares'=>$share),
                                    'attachments'=> 
                                    array('media'=> "",
                                    'src'=> $graphNode1->getField('url'))
                            ));

                        }

                    }
                } catch (Facebook\Exceptions\FacebookSDKException $e) {

                }
            } else {
                array_push( $postSummary['posts'], array(
                    'id'=> $graphNode->getField('id'),
                    'message'=> $graphNode->getField('message'),
                    'created_time'=> $graphNode['created_time']->format('d/m/Y H:i:s'),
                    'summary'=>array('likes'=> $responseSummary->getDecodedBody()['likes']['summary']['total_count'],
                        'comments'=>$responseSummary->getDecodedBody()['comments']['summary']['total_count'],
                        'shares'=>$share)));
            }

            echo "<br>----------====------------------<br>";
        }

        $comments = array();

        foreach ($postSummary['posts'] as $post) {

            if ($post['summary']['comments'] > 0) {

                echo "comments ase: ". $post['id'];

                try {
                    // Returns a `Facebook\FacebookResponse` object
                    ///785731355111522_909033056114684?fields=attachments
                    $response = $fb->get(
                        '/'. $post['id'] .'/comments',
                        $accessToken
                    );
                } catch (Facebook\Exceptions\FacebookSDKException $e) {
                    echo 'Facebook SDK returned an error: ' . $e->getMessage();
                    exit;
                }

                $graphEdge = $response->getGraphEdge();

                echo "<br>";
                echo "Commetnts <pre>";
                //echo count($graphEdge);
                print_r($graphEdge);

                echo "</pre>";

                foreach ($graphEdge as $graphNode) {
                    //$graphNode->getName();
//                    echo $graphNode->getField('message');
//                    echo "<br>";
//                    echo $graphNode->getField('id');
//                    echo "<br>";
//                    echo $graphNode['created_time']->format('d/m/Y H:i:s');
//                    echo "<br>";
//                    echo "From: " .$graphNode->getField('from')->getField('name');
//                    echo "<br>";
//                    echo "From ID " .$graphNode->getField('from')->getField('id');
//                    echo "<br>----------------------------<br>";


                    array_push($comments, array('post_id'=>$post['id'],
                        'comment'=> array('comment_id'=> $graphNode->getField('id'),
                        'message'=> $graphNode->getField('message'),
                        'created_time'=> $graphNode['created_time']->format('d/m/Y H:i:s'))));


                }

                //$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">New achievement has been created!</div>');

            }

        }

        $sql = 'INSERT INTO fb_post (details)
        VALUES("' . $this->db->escape_str(json_encode($postSummary,JSON_UNESCAPED_SLASHES)) . '")';
        $this->db->query($sql);


        // foreach ($comments as $comment) {
        //     $sql = 'INSERT INTO fb_comments (post_id, comments) VALUES("' . $comment['post_id'] . '","' . $this->db->escape_str(json_encode($comment['comment'],
        //             JSON_UNESCAPED_SLASHES)) . '")';
        //     $this->db->query($sql);

        // }


// The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

        // Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
        //echo '<h3>Metadata</h3>';
        //var_dump($tokenMetadata);

        // Validation (these will throw FacebookSDKException's when they fail)
        $tokenMetadata->validateAppId($this->appId); // Replace {app-id} with your app id
        // If you know the user ID this access token belongs to, you can validate it here
        //$tokenMetadata->validateUserId('123');
        $tokenMetadata->validateExpiration();

//        if (!$accessToken->isLongLived()) {
//            // Exchanges a short-lived access token for a long-lived one
//            try {
//                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
//            } catch (Facebook\Exceptions\FacebookSDKException $e) {
//                echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
//                exit;
//            }
//
//            echo '<h3>Long-lived</h3>';
//            var_dump($accessToken->getValue());
//        }

        $_SESSION['fb_access_token'] = (string) $accessToken;
    }

    public function view_fbposts()
    {
        //self::authentication_check();
        $this->load->database();
        $query = $this->db->query('SELECT * FROM fb_post');
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $data['result'] = $rows;

        header('Content-Type: application/json');
        echo json_encode($rows);

        //$this->load->view('sensors/view_appoinments', $data);
    }

    public function view_fb_comments($id)
    {
        //self::authentication_check();
        $this->load->database();
        $sql = "SELECT * FROM fb_comments where post_id='" . $id ."'";
        $query = $this->db->query($sql);
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $data['result'] = $rows;

        header('Content-Type: application/json');
        echo json_encode($rows);

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
        $query = $this->db->query('INSERT INTO ht_sensor_type (sensor_type_id, sensor_name) VALUES("' . $sensor_type_id . '","' . $sensor_name . '")');
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
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $data['notes'] = $rows;
        $this->load->view('notes/edit_note', $data);
    }

    public function view_sensors()
    {
        self::authentication_check();
        $this->load->database();
        $query = $this->db->query('SELECT * FROM ht_sensor_type');
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

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
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

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
